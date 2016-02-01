<?php

/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 9/24/14
 * Time: 1:12 PM.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace NilPortugues\Assert\Assertions;

use NilPortugues\Assert\Exceptions\AssertionException;
use NilPortugues\Assert\Exceptions\FileUploadException;

class FileUploadAssertions
{
    const ASSERT_FILE_UPLOAD = 'Value has no files.';
    const ASSERT_IS_BETWEEN = 'Value must be between :min and :max :formatBytes.';
    const ASSERT_IS_MIME_TYPE = 'Value is not a valid file format.';
    const ASSERT_HAS_FILE_NAME_FORMAT = 'Value file name format is not valid.';
    const ASSERT_HAS_VALID_UPLOAD_DIRECTORY = 'Value upload directory is not valid.';
    const ASSERT_NOT_OVERWRITING_EXISTING_FILE = 'Value upload will overwrite an existing file.';
    const ASSERT_UPLOAD_ERR_INI_SIZE = 'Value upload exceeds the maximum file size allowed by the server.';
    const ASSERT_UPLOAD_ERR_FORM_SIZE = 'Value upload exceeds the maximum file size specified in the form.';
    const ASSERT_UPLOAD_ERR_PARTIAL = 'Value was only partially uploaded.';
    const ASSERT_UPLOAD_ERR_NO_FILE = 'No :attribute file was uploaded.';
    const ASSERT_UPLOAD_ERR_NO_TMP_DIR = 'Upload failed. Missing a temporary upload folder.';
    const ASSERT_UPLOAD_ERR_CANT_WRITE = 'Upload failed. Failed to write file to disk.';
    const ASSERT_UPLOAD_ERR_EXTENSION = 'Upload failed. File upload was stopped.';
    const ASSERT_IS_IMAGE = 'Value must be a valid image file.';
    const ASSERT_HAS_LENGTH = 'Value must be :size files.';

    /**
     * @var array
     */
    private static $byte = [
        'K' => 1000,
        'KB' => 1000,
        'M' => 1000000,
        'MB' => 1000000,
        'G' => 1000000000,
        'GB' => 1000000000,
        'T' => 1000000000000,
        'TB' => 1000000000000,
    ];

    /**
     * Validates if the given data is a file that was uploaded.
     *
     * @param string $uploadName
     * @param string $message
     *
     * @return AssertionException
     */
    public static function isFileUploaded($uploadName, $message = '')
    {
        return array_key_exists($uploadName, $_FILES);
    }

    /**
     * @return int
     */
    private static function getMaxServerFileSize()
    {
        $maxFileSize = min(ini_get('post_max_size'), ini_get('upload_max_filesize'));
        $maxFileSizeUnit = preg_replace('/\d/', '', $maxFileSize);

        $finalMaxFileSize = 0;
        if (array_key_exists(strtoupper($maxFileSizeUnit), self::$byte)) {
            $multiplier = self::$byte[$maxFileSizeUnit];
            $finalMaxFileSize = preg_replace('/[^0-9,.]/', '', $maxFileSize);
            $finalMaxFileSize = $finalMaxFileSize * $multiplier;
        }

        return (int) $finalMaxFileSize;
    }

    /**
     * @param string $uploadName
     * @param string $minSize
     * @param string $maxSize
     * @param string $format
     * @param bool   $inclusive
     * @param string $message
     *
     * @return AssertionException
     *
     * @throws FileUploadException
     */
    public static function isFileUploadedBetweenFileSize($uploadName, $minSize, $maxSize, $format = 'B', $inclusive = false, $message = '')
    {
        $multiplier = 1;
        if (array_key_exists(strtoupper($format), self::$byte)) {
            $multiplier = self::$byte[$format];
        }

        $minSize = $minSize * $multiplier;
        $maxSize = $maxSize * $multiplier;
        $maxSize = min(self::getMaxServerFileSize(), $maxSize);

        if (isset($_FILES[$uploadName]['size']) && is_array($_FILES[$uploadName]['size'])) {
            $isValid = true;
            foreach ($_FILES[$uploadName]['size'] as $size) {
                self::checkIfMaximumUploadFileSizeHasBeenExceeded($uploadName, $maxSize, $size);
                $isValid = $isValid && IntegerAssertions::isBetween($size, $minSize, $maxSize, $inclusive);
            }

            return $isValid;
        }

        if (!isset($_FILES[$uploadName]['size'])) {
            return false;
        }

        self::checkIfMaximumUploadFileSizeHasBeenExceeded($uploadName, $maxSize, $_FILES[$uploadName]['size']);

        return IntegerAssertions::isBetween($_FILES[$uploadName]['size'], $minSize, $maxSize, $inclusive);
    }

    /**
     * @param string $uploadName
     * @param $size
     * @param $maxSize
     * @param string $message
     *
     * @throws FileUploadException
     */
    private static function checkIfMaximumUploadFileSizeHasBeenExceeded($uploadName, $size, $maxSize, $message = '')
    {
        if ($size < $maxSize) {
            throw new FileUploadException($uploadName);
        }
    }

    /**
     * @param $filePath
     * @param string $message
     *
     * @return string
     */
    private static function getMimeType($filePath, $message = '')
    {
        $currentErrorReporting = error_reporting();
        error_reporting(0);

        $mimeType = '';
        $fileInfo = finfo_open(FILEINFO_MIME_TYPE);
        if (false !== $fileInfo) {
            $mimeType = (string) finfo_file($fileInfo, $filePath);
            finfo_close($fileInfo);
        }
        error_reporting($currentErrorReporting);

        return $mimeType;
    }

    /**
     * @param string   $uploadName
     * @param string[] $allowedTypes
     * @param string   $message
     *
     * @return AssertionException
     */
    public static function isFileUploadedMimeType($uploadName, array $allowedTypes, $message = '')
    {
        if (isset($_FILES[$uploadName]['tmp_name']) && is_array($_FILES[$uploadName]['tmp_name'])) {
            $isValid = true;

            array_filter($_FILES[$uploadName]['tmp_name']);
            foreach ($_FILES[$uploadName]['tmp_name'] as $name) {
                $isValid = $isValid && in_array(self::getMimeType($name), $allowedTypes, true);
            }

            return $isValid;
        }

        if (!isset($_FILES[$uploadName]['tmp_name'])) {
            return false;
        }

        return in_array(self::getMimeType($_FILES[$uploadName]['tmp_name']), $allowedTypes, true);
    }

    /**
     * @param string   $uploadName
     * @param callable $validator
     * @param string   $message
     *
     * @return AssertionException
     */
    public static function hasFileUploadedFileNameFormat($uploadName, callable $validator, $message = '')
    {
        if (isset($_FILES[$uploadName]['name']) && is_array($_FILES[$uploadName]['name'])) {
            $isValid = true;
            foreach ($_FILES[$uploadName]['name'] as $name) {
                $isValid = $isValid && $validator->validate($name);
            }

            return $isValid;
        }

        return $validator->validate($_FILES[$uploadName]['name']);
    }

    /**
     * @param string $uploadName
     * @param string $uploadDir
     * @param string $message
     *
     * @return AssertionException
     */
    public static function hasFileUploadedValidUploadDirectory($uploadName, $uploadDir, $message = '')
    {
        if (!isset($_FILES[$uploadName]['name'])) {
            return false;
        }

        return file_exists($uploadDir)
        && is_dir($uploadDir)
        && is_writable($uploadDir);
    }

    /**
     * @param string $uploadName
     * @param string $uploadDir
     * @param string $message
     *
     * @return AssertionException
     */
    public static function isFileUploadedNotOverwritingExistingFile($uploadName, $uploadDir, $message = '')
    {
        if (isset($_FILES[$uploadName]['name']) && is_array($_FILES[$uploadName]['name'])) {
            $isValid = true;
            foreach ($_FILES[$uploadName]['name'] as $name) {
                $isValid = $isValid && !file_exists($uploadDir.DIRECTORY_SEPARATOR.$name);
            }

            return $isValid;
        }

        if (!isset($_FILES[$uploadName]['name'])) {
            return false;
        }

        return !file_exists($uploadDir.DIRECTORY_SEPARATOR.$_FILES[$uploadName]['name']);
    }

    /**
     * @param string            $uploadName
     * @param IntegerAssertions $size
     * @param string            $message
     *
     * @return AssertionException
     */
    public static function hasFileUploadedFileNameLength($uploadName, $size, $message = '')
    {
        settype($size, 'int');

        if (isset($_FILES[$uploadName]['name']) && is_array($_FILES[$uploadName]['name']) && $size >= 0) {
            return $size == count($_FILES[$uploadName]['name']);
        }

        return 1 == $size && isset($_FILES[$uploadName]['name']);
    }

    /**
     * @param string $uploadName
     * @param string $message
     *
     * @return AssertionException
     */
    public static function isFileUploadedImage($uploadName, $message = '')
    {
        return self::isMimeType($uploadName, ['image/gif', 'image/jpeg', 'image/png']);
    }
}
