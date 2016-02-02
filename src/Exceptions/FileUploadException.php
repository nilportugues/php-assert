<?php

/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 9/25/14
 * Time: 10:53 PM.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace NilPortugues\Assert\Exceptions;

class FileUploadException extends AssertionException
{
    const ASSERT_UPLOAD_ERR_INI_SIZE = 'Value upload exceeds the maximum file size allowed by the server.';
    const ASSERT_UPLOAD_ERR_FORM_SIZE = 'Value upload exceeds the maximum file size specified in the form.';
    const ASSERT_UPLOAD_ERR_PARTIAL = 'Value was only partially uploaded.';
    const ASSERT_UPLOAD_ERR_NO_FILE = 'No %s file was uploaded.';
    const ASSERT_UPLOAD_ERR_NO_TMP_DIR = 'Upload failed. Missing a temporary upload folder.';
    const ASSERT_UPLOAD_ERR_CANT_WRITE = 'Upload failed. Failed to write file to disk.';
    const ASSERT_UPLOAD_ERR_EXTENSION = 'Upload failed. File upload was stopped.';

    /**
     * @var array
     */
    private $errorMessages = [
        UPLOAD_ERR_INI_SIZE => self::ASSERT_UPLOAD_ERR_INI_SIZE,
        UPLOAD_ERR_FORM_SIZE => self::ASSERT_UPLOAD_ERR_FORM_SIZE,
        UPLOAD_ERR_PARTIAL => self::ASSERT_UPLOAD_ERR_PARTIAL,
        UPLOAD_ERR_NO_FILE => self::ASSERT_UPLOAD_ERR_NO_FILE,
        UPLOAD_ERR_NO_TMP_DIR => self::ASSERT_UPLOAD_ERR_NO_TMP_DIR,
        UPLOAD_ERR_CANT_WRITE => self::ASSERT_UPLOAD_ERR_CANT_WRITE,
        UPLOAD_ERR_EXTENSION => self::ASSERT_UPLOAD_ERR_EXTENSION,
    ];

    /**
     * @param string $uploadName
     */
    public function __construct($uploadName)
    {
        $error = 4;

        if (!empty($_FILES[$uploadName]['error']) && is_int($_FILES[$uploadName]['error'])) {
            $error = $_FILES[$uploadName]['error'];
        }

        if (!empty($_FILES[$uploadName]['error'])
            && is_array($_FILES[$uploadName]['error'])
            && is_int($_FILES[$uploadName]['error'][0])
        ) {
            $error = reset($_FILES[$uploadName]['error']);
        }

        $this->message = $this->errorMessages[$error];
    }
}
