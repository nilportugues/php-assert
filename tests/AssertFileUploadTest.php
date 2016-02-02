<?php

namespace NilPortugues\Tests\Assert;

use Exception;
use NilPortugues\Assert\Assert;
use NilPortugues\Assert\Assertions\FileUploadAssertions;
use NilPortugues\Assert\Exceptions\FileUploadException;

class AssertFileUploadTest extends \PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        $_FILES = [
            'image_one' => [
                'name' => 'sample.png',
                'type' => 'image/png',
                'tmp_name' => realpath(dirname(__FILE__)).'/resources/phpGpKMlf',
                'error' => '0',
                'size' => '203868',
            ],
            'image_set' => [
                'name' => ['sample.png', 'sample.png', 'sample.png'],
                'type' => ['image/png', 'image/png', 'image/png'],
                'tmp_name' => [
                    \realpath(\dirname(__FILE__)).'/resources/phpGpKMlf',
                    \realpath(\dirname(__FILE__)).'/resources/phpGpKMlf',
                    \realpath(\dirname(__FILE__)).'/resources/phpGpKMlf',
                ],
                'error' => [],
                'size' => [203868, 203868, 203868],
            ],
        ];
    }
    public function testIsFileUploaded()
    {
        FileUploadAssertions::isFileUploaded('image_one');
    }

    public function testIsFileUploadedThrowsException()
    {
        $this->setExpectedException(Exception::class);
        FileUploadAssertions::isFileUploaded('no');
    }

    public function testItShouldCheckIfHasLength()
    {
        Assert::hasFileUploadedFileNameLength('image_one', 1);
    }

    public function testItShouldCheckIfHasLengthThrowsException()
    {
        $this->setExpectedException(Exception::class);
        Assert::hasFileUploadedFileNameLength('image_one', 2000);
    }

    public function testItShouldCheckIfHasLengthUploadMany()
    {
        Assert::hasFileUploadedFileNameLength('image_set', 3);
    }

    public function testItShouldCheckIfHasLengthUploadManyThrowsException()
    {
        $this->setExpectedException(Exception::class);
        Assert::hasFileUploadedFileNameLength('image_set', 2000);
    }

    public function testItShouldCheckIfIsBetween()
    {
        Assert::isFileUploadedBetweenFileSize('image_one', 0, 2, 'MB');
    }

    public function testItShouldCheckIfIsBetweenInclusive()
    {
        Assert::isFileUploadedBetweenFileSize('image_one', 0, 1, 'MB', true);
    }

    public function testItShouldCheckIfIsBetweenThrowsExceptionifMinIsAboveMaxFileSize()
    {
        $this->setExpectedException(Exception::class);
        Assert::isFileUploadedBetweenFileSize('image_one', 2, 0, 'MB');
    }

    public function testItShouldCheckIfIsBetweenThrowsExceptionWhenNotExists()
    {
        $this->setExpectedException(Exception::class);
        Assert::isFileUploadedBetweenFileSize('image_one0', 20, 30, 'MB');
    }

    public function testItShouldCheckIfIsBetweenUploadMany()
    {
        Assert::isFileUploadedBetweenFileSize('image_set', 0, 2, 'MB', true);
    }

    public function testItShouldCheckIfIsBetweenUploadManyThrowsException()
    {
        $this->setExpectedException(Exception::class);
        Assert::isFileUploadedBetweenFileSize('image_set', 2000, 3000, 'MB', true);
    }

    public function testItShouldCheckIfIsMimeType()
    {
        Assert::isFileUploadedMimeType('image_one', ['image/png', 'image/gif', 'image/jpg']);
    }

    public function testItShouldCheckIfIsMimeTypeThrowsException()
    {
        $this->setExpectedException(Exception::class);
        Assert::isFileUploadedMimeType('image_one', ['image/bmp']);
    }

    public function testItShouldCheckIfIsMimeTypeThrowsExceptionIfTmpNameNotSet()
    {
        unset($_FILES['image_one']['tmp_name']);
        $this->setExpectedException(Exception::class);
        Assert::isFileUploadedMimeType('image_one', ['image/png']);
    }

    public function testItShouldCheckIfIsMimeTypeUploadMany()
    {
        Assert::isFileUploadedMimeType('image_set', ['image/png', 'image/gif', 'image/jpg']);
    }

    public function testItShouldCheckIfIsMimeTypeUploadManyThrowsException()
    {
        $this->setExpectedException(Exception::class);
        Assert::isFileUploadedMimeType('image_set', ['image/bmp']);
    }

    public function testItShouldCheckIfIsImage()
    {
        Assert::isFileUploadedImage('image_one');
    }

    public function testItShouldCheckIfHasFileNameFormat()
    {
        $validator = function ($value) {
            Assert::isLowercase($value);
        };
        Assert::hasFileUploadedFileNameFormat('image_one', $validator);
    }

    public function testItShouldCheckIfHasFileNameFormatThrowsException()
    {
        $validator = function ($value) {
            Assert::isAlpha($value);
        };
        $_FILES['image_one']['name'] = '@sample.png';

        $this->setExpectedException(Exception::class);
        Assert::hasFileUploadedFileNameFormat('image_one', $validator);
    }

    public function testItShouldCheckIfHasFileNameFormatUploadMany()
    {
        $validator = function ($value) {
            Assert::isLowercase($value);
        };
        Assert::hasFileUploadedFileNameFormat('image_set', $validator);
    }

    public function testItShouldCheckIfHasFileNameFormatUploadManyThrowsException()
    {
        $validator = function ($value) {
            Assert::isAlpha($value);
        };

        $_FILES['image_set']['name'][0] = '@sample.png';
        $this->setExpectedException(Exception::class);
        Assert::hasFileUploadedFileNameFormat('image_set', $validator);
    }

    public function testItShouldCheckIfHasValidUploadDirectory()
    {
        Assert::hasFileUploadedValidUploadDirectory('image_one', realpath(dirname(__FILE__)));
    }

    public function testItShouldCheckIfHasValidUploadDirectoryThrowsException()
    {
        $this->setExpectedException(Exception::class);
        Assert::hasFileUploadedValidUploadDirectory('image_one', realpath(dirname(__FILE__)).'/not/');
    }

    public function testItShouldCheckIfHasValidUploadDirectoryUploadMany()
    {
        Assert::hasFileUploadedValidUploadDirectory('image_set', realpath(dirname(__FILE__)).'/resources/');
    }

    public function testItShouldCheckIfHasValidUploadDirectoryUploadManyThrowsException()
    {
        $this->setExpectedException(Exception::class);
        Assert::hasFileUploadedValidUploadDirectory('image_set', realpath(dirname(__FILE__)).'/not/');
    }

    public function testItShouldCheckIfNotOverwritingExistingFile()
    {
        $_FILES['image_one']['name'] = 'a.png';
        Assert::isFileUploadedNotOverwritingExistingFile('image_one', realpath(dirname(__FILE__)).'/resources');
    }

    public function testItShouldCheckIfNotOverwritingExistingFileThrowsException()
    {
        $this->setExpectedException(Exception::class);
        Assert::isFileUploadedNotOverwritingExistingFile('image_one', realpath(dirname(__FILE__)).'/resources');
    }

    public function testItShouldCheckIfNotOverwritingExistingFileUploadMany()
    {
        $_FILES['image_set']['name'][0] = 'a.png';
        $_FILES['image_set']['name'][1] = 'b.png';
        $_FILES['image_set']['name'][2] = 'c.png';
        Assert::isFileUploadedNotOverwritingExistingFile('image_set', \realpath(\dirname(__FILE__)).'/resources');
    }

    public function testItShouldCheckIfNotOverwritingExistingFileUploadManyThrowsException()
    {
        $this->setExpectedException(Exception::class);
        Assert::isFileUploadedNotOverwritingExistingFile('image_set', \realpath(\dirname(__FILE__)).'/resources');
    }

    public function testItShouldReturnErrorForNonMultipleFilesArray()
    {
        $_FILES = [
            'image' => [
                'name' => 'sample.png',
                'type' => 'image/png',
                'tmp_name' => \realpath(\dirname(__FILE__)).'/resources/phpGpKMlf',
                'error' => 1,
                'size' => '203868',
            ],
        ];
        $this->setExpectedException(Exception::class);
        throw new FileUploadException('image');
    }

    public function testItShouldReturnErrorForMultipleFilesArray()
    {
        $_FILES = [
            'image' => [
                'name' => ['sample.png', 'sample.png', 'sample.png'],
                'type' => ['image/png', 'image/png', 'image/png'],
                'tmp_name' => [
                    \realpath(\dirname(__FILE__)).'/resources/phpGpKMlf',
                    \realpath(\dirname(__FILE__)).'/resources/phpGpKMlf',
                    \realpath(\dirname(__FILE__)).'/resources/phpGpKMlf',
                ],
                'error' => [1, 1, 1],
                'size' => [203868, 203868, 203868],
            ],
        ];

        $this->setExpectedException(Exception::class);
        throw new FileUploadException('image');
    }
}
