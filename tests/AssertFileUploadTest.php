<?php

namespace NilPortugues\Tests\Assert;

use NilPortugues\Assert\Assert;
use NilPortugues\Assert\Exceptions\AssertionException;

class AssertFileUploadTest extends \PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        $_FILES = [
            'image_one' => [
                'name'     => 'sample.png',
                'type'     => 'image/png',
                'tmp_name' => realpath(dirname(__FILE__)).'/resources/phpGpKMlf',
                'error'    => '0',
                'size'     => '203868',
            ],
        ];
    }

    public function testItShouldCheckIfHasLength()
    {
        Assert::hasFileUploadedFileNameLength('image_one', 1);
    }

    public function testItShouldCheckIfHasLengthThrowsException()
    {
        $this->setExpectedException(AssertionException::class);
        Assert::hasFileUploadedFileNameLength('image_one', 2);
    }

    public function testItShouldCheckIfIsBetween()
    {
        Assert::isFileUploadedBetweenFileSize('image_one', 1, 2, 'MB');
    }

    public function testItShouldCheckIfIsBetweenInclusive()
    {
        Assert::isFileUploadedBetweenFileSize('image_one', 0, 1, 'MB', true);
    }

    public function testItShouldCheckIfIsBetweenThrowsException()
    {
        $_FILES = [
            'image_one' => [
                'name'     => 'sample.png',
                'type'     => 'image/png',
                'tmp_name' => realpath(dirname(__FILE__)).'/resources/phpGpKMlf',
                'error'    => '0',
                'size'     => '2000003868',
            ],
        ];
        
        $this->setExpectedException(AssertionException::class);
        Assert::isFileUploadedBetweenFileSize('image_one', 1, 2, 'MB');
    }

    public function testItShouldCheckIfIsMimeType()
    {
        Assert::isFileUploadedMimeType('image_one', ['image/png', 'image/gif', 'image/jpg']);
    }

    public function testItShouldCheckIfIsMimeTypeThrowsException()
    {
        $this->setExpectedException(AssertionException::class);
        Assert::isFileUploadedMimeType('image_one', ['image/bmp']);
    }

    public function testItShouldCheckIfIsImage()
    {
        Assert::isFileUploadedImage('image_one');
    }

    public function testItShouldCheckIfHasFileNameFormat()
    {
        $validator = function($value){
            Assert::isLowercase($value);
        };
        Assert::hasFileUploadedFileNameFormat('image_one', $validator);
    }

    public function testItShouldCheckIfHasFileNameFormatThrowsException()
    {
        $stringValidator = function($value){
            Assert::isAlphanumeric($value);
        };
        $_FILES['image_one']['name'] = '@sample.png';

        $this->setExpectedException(AssertionException::class);
        Assert::hasFileUploadedFileNameFormat('image_one', $stringValidator);
    }

    public function testItShouldCheckIfHasValidUploadDirectory()
    {
        Assert::hasFileUploadedValidUploadDirectory('image_one', realpath(dirname(__FILE__)).'/resources/');      
    }

    public function testItShouldCheckIfHasValidUploadDirectoryThrowsException()
    {
        $this->setExpectedException(AssertionException::class);
        Assert::hasFileUploadedValidUploadDirectory('image_one', realpath(dirname(__FILE__)).'/not/');
    }

    public function testItShouldCheckIfNotOverwritingExistingFile()
    {
        $_FILES['image_one']['name'] = 'a.png';
        Assert::isFileUploadedNotOverwritingExistingFile('image_one', realpath(dirname(__FILE__)).'/resources');
    }

    public function testItShouldCheckIfNotOverwritingExistingFileThrowsException()
    {
        $this->setExpectedException(AssertionException::class);
        Assert::isFileUploadedNotOverwritingExistingFile('image_one', realpath(dirname(__FILE__)).'/resources');
    }
}
