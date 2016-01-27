<?php

namespace NilPortugues\Tests\Assert;

use Exception;
use NilPortugues\Assert\Assert;
use stdClass;

class AssertStringTest extends \PHPUnit_Framework_TestCase
{
    public function testIsStringWillThrowException()
    {
        $this->setExpectedException(Exception::class);
        Assert::isString(new stdClass());
    }

    public function testIsAlphanumericWillThrowException()
    {
    }

    public function testIsAlphaWillThrowException()
    {
    }

    public function testIsBetweenWillThrowException()
    {
    }

    public function testIsCharsetWillThrowException()
    {
    }

    public function testIsAllConsonantsWillThrowException()
    {
    }

    public function testContainsWillThrowException()
    {
    }

    public function testIsControlCharactersWillThrowException()
    {
    }

    public function testIsDigitWillThrowException()
    {
    }

    public function testEndsWithWillThrowException()
    {
    }

    public function testEqualsWillThrowException()
    {
    }

    public function testInWillThrowException()
    {
    }

    public function testHasGraphicalCharsOnlyWillThrowException()
    {
    }

    public function testHasLengthWillThrowException()
    {
    }

    public function testIsLowercaseWillThrowException()
    {
    }

    public function testNotEmptyWillThrowException()
    {
    }

    public function testNoWhitespaceWillThrowException()
    {
    }

    public function testHasPrintableCharsOnlyWillThrowException()
    {
    }

    public function testIsPunctuationWillThrowException()
    {
    }

    public function testMatchesRegexWillThrowException()
    {
    }

    public function testIsSlugWillThrowException()
    {
    }

    public function testIsSpaceWillThrowException()
    {
    }

    public function testStartsWithWillThrowException()
    {
    }

    public function testIsUppercaseWillThrowException()
    {
    }

    public function testIsVersionWillThrowException()
    {
    }

    public function testIsVowelWillThrowException()
    {
    }

    public function testIsHexDigitWillThrowException()
    {
    }

    public function testHasLowercaseWillThrowException()
    {
    }

    public function testHasUppercaseWillThrowException()
    {
    }

    public function testHasNumericWillThrowException()
    {
    }

    public function testHasSpecialCharactersWillThrowException()
    {
    }

    public function testIsEmailWillThrowException()
    {
    }

    public function testIsUrlWillThrowException()
    {
    }

    public function testIsUUIDWillThrowException()
    {
    }
}
