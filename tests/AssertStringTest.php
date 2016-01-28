<?php

namespace NilPortugues\Tests\Assert;

use Exception;
use NilPortugues\Assert\Assert;
use stdClass;

class AssertStringTest extends \PHPUnit_Framework_TestCase
{
    public function testItShouldCheckStringIsString()
    {
        $value = 'asdsdadds';
        Assert::isString($value);
        $this->assertTrue(true);
    }

    public function testItShouldCheckStringIsStringThrowsException()
    {
        $value = new stdClass();

        $this->setExpectedException(Exception::class);
        Assert::isString($value);
    }

    public function testItShouldCheckStringIsAlphanumeric()
    {
        $value = 'Qwerty1234';
        Assert::isAlphanumeric($value);
        $this->assertTrue(true);
    }

    public function testIsAlphanumericWillThrowException()
    {
        $value = '';
        $this->setExpectedException(Exception::class);
        Assert::isAlphanumeric($value);
    }

    public function testItShouldCheckStringIsAlpha()
    {
        $value = 'querty';
        Assert::isAlpha($value);
        $this->assertTrue(true);
    }

    public function testIsAlphaWillThrowException()
    {
        $value = 'querty123';
        $this->setExpectedException(Exception::class);
        Assert::isAlpha($value);
    }

    public function testItShouldCheckStringIsBetween()
    {
        $value = 'Nil';
        Assert::isBetween($value, 2, 4, false);
        $this->assertTrue(true);
    }

    public function testItShouldCheckStringIsBetweenInclusive()
    {
        $value = 'Nilo';
        Assert::isBetween($value, 2, 4, true);
        $this->assertTrue(true);
    }

    public function testIsBetweenWillThrowException()
    {
        $this->setExpectedException(Exception::class);
        Assert::isBetween('Nil', 12, 4, false);
    }

    public function testItShouldCheckStringIsCharset()
    {
        $value = 'Portugués';
        Assert::isCharset($value, 'UTF-8');
        $this->assertTrue(true);
    }

    public function testIsCharsetWillThrowException()
    {
        $this->setExpectedException(Exception::class);
        $value = '日本語';
        Assert::isCharset($value, 'iso-8859-15');
    }

    public function testItShouldCheckStringIsAllConsonants()
    {
        $value = 'bs';
        Assert::isAllConsonants($value);
        $this->assertTrue(true);
    }

    public function testIsAllConsonantsWillThrowException()
    {
        $this->setExpectedException(Exception::class);
        $value = 'a';
        Assert::isAllConsonants($value);
    }

    public function testItShouldCheckStringIsContains()
    {
        $value = 'AAAAAAA123A';
        $contains = 123;
        $identical = false;
        Assert::contains($value, $contains, $identical);
        $this->assertTrue(true);
    }

    public function testItShouldCheckStringIsContainsIdentical()
    {
        $value = 'AAAAAAAaaaA';
        $contains = 'aaa';
        $identical = true;
        Assert::contains($value, $contains, $identical);
        $this->assertTrue(true);
    }

    public function testContainsWillThrowException()
    {
        $this->setExpectedException(Exception::class);
        $value = 'AAAAAAAaaaA';
        $contains = 'B';
        $identical = true;
        Assert::contains($value, $contains, $identical);
    }

    public function testItShouldCheckStringIsControlCharacters()
    {
        $value = "\n\t";
        Assert::isControlCharacters($value);
        $this->assertTrue(true);
    }

    public function testIsControlCharactersWillThrowException()
    {
        $this->setExpectedException(Exception::class);
        $value = "\nHello\tWorld";
        Assert::isControlCharacters($value);
    }

    public function testIsDigit()
    {
        $value = 145;
        Assert::isDigit($value);
        $this->assertTrue(true);
    }

    public function testIsDigitWillThrowException()
    {
        $this->setExpectedException(Exception::class);
        $value = 145.6;
        Assert::isDigit($value);
    }
    public function testItShouldCheckStringIsEndsWith()
    {
        $value = 'AAAAAAA123';
        $contains = 123;
        $identical = false;
        Assert::endsWith($value, $contains, $identical);
        $this->assertTrue(true);
    }

    public function testItShouldCheckStringIsEndsWithIdentical()
    {
        $value = 'AAAAAAAaaaA';
        $contains = 'aaaA';
        $identical = true;
        Assert::endsWith($value, $contains, $identical);
        $this->assertTrue(true);
    }

    public function testEndsWithWillThrowException()
    {
        $this->setExpectedException(Exception::class);
        $value = 'AAAAAAAaaaA';
        $contains = 'aaaA';
        $identical = true;
        Assert::endsWith($value, $contains, $identical);
    }

    public function testItShouldCheckStringIsEquals()
    {
        $value = '1';
        $comparedValue = 1;
        $identical = false;
        Assert::equals($value, $comparedValue, $identical);

        $this->assertTrue(true);
    }

    public function testItShouldCheckStringIsEqualsIdentical()
    {
        $value = 'hello';
        $comparedValue = 'hello';
        $identical = true;
        Assert::equals($value, $comparedValue, $identical);
        $this->assertTrue(true);
    }

    public function testEqualsWillThrowException()
    {
        $this->setExpectedException(Exception::class);
        $value = '1';
        $comparedValue = 1;
        $identical = true;
        Assert::equals($value, $comparedValue, $identical);
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
