<?php

namespace NilPortugues\Tests\Assert;

use Exception;
use NilPortugues\Assert\Assert;
use NilPortugues\Assert\Assertions\StringAssertions;
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
        StringAssertions::isString($value);
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

    public function testIsBetweenWillThrowException1()
    {
        $this->setExpectedException(Exception::class);
        Assert::isBetween('Nil', 12, 4, false);
    }

    public function testIsBetweenWillThrowException2()
    {
        $this->setExpectedException(Exception::class);
        Assert::isBetween('Nil', 5, 8, false);
    }

    public function testIsBetweenWillThrowException3()
    {
        $this->setExpectedException(Exception::class);
        Assert::isBetween('Nil', 5, 8, true);
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
    }

    public function testItShouldCheckStringIsContainsIdentical()
    {
        $value = 'AAAAAAAaaaA';
        $contains = 'aaa';
        $identical = true;
        Assert::contains($value, $contains, $identical);
    }

    public function testContainsWillThrowException()
    {
        $this->setExpectedException(Exception::class);
        $value = 'AAAAAAAaaaA';
        $contains = 'B';
        $identical = true;
        Assert::contains($value, $contains, $identical);
    }

    public function testContainsWillThrowException2()
    {
        $this->setExpectedException(Exception::class);
        $value = 'AAAAAAAaa1aA';
        $contains = 2;
        $identical = false;
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
        $value = '145';
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

    public function testEndsWithWillThrowException1()
    {
        $this->setExpectedException(Exception::class);
        $value = 'AAAAAAAaaaA1';
        $contains = '2';
        $identical = false;
        Assert::endsWith($value, $contains, $identical);
    }

    public function testEndsWithWillThrowException2()
    {
        $this->setExpectedException(Exception::class);
        $value = 'AAAAAAAaaaA1';
        $contains = 2;
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

    public function testEqualsWillThrowException1()
    {
        $this->setExpectedException(Exception::class);
        $value = '1';
        $comparedValue = 1;
        $identical = true;
        Assert::equals($value, $comparedValue, $identical);
    }

    public function testEqualsWillThrowException2()
    {
        $this->setExpectedException(Exception::class);
        $value = '1';
        $comparedValue = '2';
        $identical = false;
        Assert::equals($value, $comparedValue, $identical);
    }

    public function testItShouldCheckStringIsIn()
    {
        $haystack = 'a12245 asdhsjasd 63-211';
        $value = 122;
        $identical = false;
        Assert::in($value, $haystack, $identical);
    }

    public function testItShouldCheckStringIsInStrict()
    {
        $haystack = 'a12245 asdhsjasd 63-211';
        $value = '5 asd';
        $identical = true;
        Assert::in($value, $haystack, $identical);
    }

    public function testInWillThrowException()
    {
        $this->setExpectedException(Exception::class);
        $haystack = 'a12245 asdhsjasd 63-211';
        $value = '@@@@';
        $identical = true;
        Assert::in($value, $haystack, $identical);
    }

    public function testInWillThrowException2()
    {
        $this->setExpectedException(Exception::class);
        $haystack = 'a12245 asdhsjasd 63-211';
        $value = 122;
        $identical = true;
        Assert::in($value, $haystack, $identical);
    }

    public function testInWillThrowException3()
    {
        $this->setExpectedException(Exception::class);
        $haystack = 'a12245 asdhsjasd 63-211';
        $value = 1227;
        $identical = false;
        Assert::in($value, $haystack, $identical);
    }

    public function testItShouldCheckStringIsGraph()
    {
        $value = 'arf12';
        Assert::hasGraphicalCharsOnly($value);
    }

    public function testHasGraphicalCharsOnlyWillThrowException()
    {
        $this->setExpectedException(Exception::class);
        $value = "asdf\n\r\t";
        Assert::hasGraphicalCharsOnly($value);
    }

    public function testItShouldCheckStringIsLength()
    {
        $value = 'abcdefgh';
        $length = 8;
        Assert::hasLength($value, $length);
    }

    public function testHasLengthWillThrowException()
    {
        $this->setExpectedException(Exception::class);
        $value = 'abcdefgh';
        $length = 5;
        Assert::hasLength($value, $length);
    }

    public function testItShouldCheckStringIsLowercase()
    {
        $value = 'strtolower';
        Assert::isLowercase($value);
    }

    public function testIsLowercaseWillThrowException()
    {
        $this->setExpectedException(Exception::class);
        $value = 'STRTOLOWER';
        Assert::isLowercase($value);
    }

    public function testItShouldCheckStringIsNotEmpty()
    {
        $value = 'a';
        Assert::notEmpty($value);
    }

    public function testNotEmptyWillThrowException()
    {
        $this->setExpectedException(Exception::class);
        $value = '';
        Assert::notEmpty($value);
    }

    public function testItShouldCheckStringIsNoWhitespace()
    {
        $value = 'aaaaa';
        Assert::noWhitespace($value);
    }

    public function testNoWhitespaceWillThrowException()
    {
        $this->setExpectedException(Exception::class);
        $value = 'lorem ipsum';
        Assert::noWhitespace($value);
    }

    public function testItShouldCheckStringIsPrintable()
    {
        $value = 'LMKA0$% _123';
        Assert::hasPrintableCharsOnly($value);
    }

    public function testHasPrintableCharsOnlyWillThrowException()
    {
        $this->setExpectedException(Exception::class);
        $value = "LMKA0$%\t_123";
        Assert::hasPrintableCharsOnly($value);
    }

    public function testItShouldCheckStringIsPunctuation()
    {
        $value = '&,.;[]';
        Assert::isPunctuation($value);
    }

    public function testIsPunctuationWillThrowException()
    {
        $this->setExpectedException(Exception::class);
        $value = 'a';
        Assert::isPunctuation($value);
    }

    public function testItShouldCheckStringIsRegex()
    {
        $value = 'a';
        $regex = '/[a-z]/';
        Assert::matchesRegex($value, $regex);
    }

    public function testMatchesRegexWillThrowException()
    {
        $this->setExpectedException(Exception::class);
        $value = 'A';
        $regex = '/[a-z]/';
        Assert::matchesRegex($value, $regex);
    }

    public function testItShouldCheckStringIsSlug()
    {
        $value = 'hello-world-yeah';
        Assert::isSlug($value);
    }

    public function testIsSlugWillThrowExceptionVariation1()
    {
        $this->setExpectedException(Exception::class);
        $value = '-hello-world-yeah';
        Assert::isSlug($value);
    }

    public function testIsSlugWillThrowExceptionVariation2()
    {
        $this->setExpectedException(Exception::class);
        $value = 'hello-world-yeah-';
        Assert::isSlug($value);
    }

    public function testIsSlugWillThrowExceptionVariation3()
    {
        $this->setExpectedException(Exception::class);
        $value = 'hello-world----yeah';
        Assert::isSlug($value);
    }

    public function testItShouldCheckStringIsSpace()
    {
        $value = '    ';
        Assert::isSpace($value);
    }

    public function testIsSpaceWillThrowException()
    {
        $this->setExpectedException(Exception::class);
        $value = 'e e';
        Assert::isSpace($value);
    }

    public function testItShouldCheckStringIsStartsWith()
    {
        $value = 'aaaAAAAAAAA';
        $contains = 'aaaA';
        $identical = true;
        Assert::startsWith($value, $contains, $identical);

        $value = '123AAAAAAA';
        $contains = 123;
        $identical = false;
        Assert::startsWith($value, $contains, $identical);
    }

    public function testStartsWithWillThrowExceptionVariation1()
    {
        $this->setExpectedException(Exception::class);
        $value = '123AAAAAAA';
        $contains = 134;
        $identical = false;
        Assert::startsWith($value, $contains, $identical);
    }

    public function testStartsWithWillThrowExceptionVariation2()
    {
        $this->setExpectedException(Exception::class);
        $value = '123AAAAAAA';
        $contains = '134';
        $identical = true;
        Assert::startsWith($value, $contains, $identical);
    }

    public function testItShouldCheckStringIsUppercase()
    {
        $value = 'AAAAAA';
        Assert::isUppercase($value);
    }

    public function testIsUppercaseWillThrowException()
    {
        $this->setExpectedException(Exception::class);
        $value = 'aaaa';
        Assert::isUppercase($value);
    }

    public function testItShouldCheckStringIsVersion()
    {
        $value = '1.0.2';
        Assert::isVersion($value);

        $value = '1.0.2-beta';
        Assert::isVersion($value);

        $value = '1.0';
        Assert::isVersion($value);
    }

    public function testIsVersionWillThrowException()
    {
        $this->setExpectedException(Exception::class);
        $value = '1.0.2 beta';
        Assert::isVersion($value);
    }

    public function testItShouldCheckStringIsVowel()
    {
        $value = 'aeA';
        Assert::isVowel($value);
    }

    public function testIsVowelWillThrowException()
    {
        $this->setExpectedException(Exception::class);
        $value = 'cds';
        Assert::isVowel($value);
    }

    public function testItShouldCheckStringIsHexDigit()
    {
        $value = '100';
        Assert::isHexDigit($value);
    }

    public function testIsHexDigitWillThrowException()
    {
        $this->setExpectedException(Exception::class);
        $value = 'h0000';
        Assert::isHexDigit($value);
    }

    public function testItShouldCheckIfHasLowercase()
    {
        Assert::hasLowercase('HELLOWOrLD');
        Assert::hasLowercase('HeLLoWOrLD', 3);
    }

    public function testHasLowercaseWillThrowException()
    {
        $this->setExpectedException(Exception::class);
        Assert::hasLowercase('HELLOWORLD');
    }

    public function testHasLowercaseWithCountWillThrowException()
    {
        $this->setExpectedException(Exception::class);
        Assert::hasLowercase('el', 3);
    }

    public function testItShouldCheckIfHasLowercaseAndUppercase()
    {
        Assert::hasUppercase('hello World');
        Assert::hasUppercase('Hello World', 2);
    }

    public function testHasUppercaseWillThrowException()
    {
        $this->setExpectedException(Exception::class);
        Assert::hasUppercase('hello world');
    }

    public function testHasUppercaseWithCountWillThrowException()
    {
        $this->setExpectedException(Exception::class);
        Assert::hasUppercase('helloWorld', 2);
    }

    public function testItShouldCheckIfHasNumeric()
    {
        Assert::hasNumeric('hell0 W0rld');
        Assert::hasNumeric('H3ll0 W0rld', 3);
    }

    public function testHasNumericWillThrowException()
    {
        $this->setExpectedException(Exception::class);
        Assert::hasNumeric('hello world');
    }

    public function testHasNumericWithCountWillThrowException()
    {
        $this->setExpectedException(Exception::class);
        Assert::hasNumeric('h3lloWorld', 2);
    }

    public function testItShouldCheckIfHasSpecialCharacters()
    {
        Assert::hasSpecialCharacters('hell0@W0rld');
        Assert::hasSpecialCharacters('H3ll0@W0@rld', 2);
    }

    public function testHasSpecialCharactersWillThrowException()
    {
        $this->setExpectedException(Exception::class);
        Assert::hasSpecialCharacters('hello world');
    }

    public function testHasSpecialCharactersWithCountWillThrowException()
    {
        $this->setExpectedException(Exception::class);
        Assert::hasSpecialCharacters('h3llo@World', 2);
    }

    public function testItShouldCheckIfIsEmail()
    {
        Assert::isEmail('hello@world.com');
        Assert::isEmail('hello.earth@world.com');
        Assert::isEmail('hello.earth+moon@world.com');
        Assert::isEmail('hello@subdomain.world.com');
        Assert::isEmail('hello.earth@subdomain.world.com');
        Assert::isEmail('hello.earth+moon@subdomain.world.com');
        Assert::isEmail('hello.earth+moon@127.0.0.1');
    }

    public function testIsEmailWillThrowException()
    {
        $this->setExpectedException(Exception::class);
        Assert::isEmail('hello.earth+moon@localhost');
    }

    public function testIsUrl()
    {
        Assert::isUrl('http://google.com');
        Assert::isUrl('http://google.com/robots.txt');
        Assert::isUrl('https://google.com');
        Assert::isUrl('https://google.com/robots.txt');
        Assert::isUrl('//google.com');
        Assert::isUrl('//google.com/robots.txt');
    }

    public function testIsUrlWillThrowException()
    {
        $this->setExpectedException(Exception::class);
        Assert::isUrl('hello');
    }

    public function testItShouldValidateUUID()
    {
        Assert::isUUID('6ba7b810-9dad-11d1-80b4-00c04fd430c8');
        Assert::isUUID('6ba7b811-9dad-11d1-80b4-00c04fd430c8');
        Assert::isUUID('6ba7b812-9dad-11d1-80b4-00c04fd430c8');
        Assert::isUUID('6ba7b814-9dad-11d1-80b4-00c04fd430c8');
        Assert::isUUID('00000000-0000-0000-0000-000000000000');

        Assert::isUUID('6ba7b810-9dad-11d1-80b4-00c04fd430c8', false);
        Assert::isUUID('6ba7b811-9dad-11d1-80b4-00c04fd430c8', false);
        Assert::isUUID('6ba7b812-9dad-11d1-80b4-00c04fd430c8', false);
        Assert::isUUID('6ba7b814-9dad-11d1-80b4-00c04fd430c8', false);
        Assert::isUUID('00000000-0000-0000-0000-000000000000', false);

        Assert::isUUID('{6ba7b810-9dad-11d1-80b4-00c04fd430c8}', false);
        Assert::isUUID('216f-ff40-98d9-11e3-a5e2-0800-200c-9a66', false);
        Assert::isUUID('{216fff40-98d9-11e3-a5e2-0800200c9a66}', false);
        Assert::isUUID('216fff4098d911e3a5e20800200c9a66', false);
    }

    public function testIsUUIDWillThrowExceptionVariation1()
    {
        $this->setExpectedException(Exception::class);
        Assert::isUUID('{6ba7b810-9dad-11d1-80b4-00c04fd430c8}');
    }

    public function testIsUUIDWillThrowExceptionVariation2()
    {
        $this->setExpectedException(Exception::class);
        Assert::isUUID('216f-ff40-98d9-11e3-a5e2-0800-200c-9a66');
    }

    public function testIsUUIDWillThrowExceptionVariation3()
    {
        $this->setExpectedException(Exception::class);
        Assert::isUUID('{216fff40-98d9-11e3-a5e2-0800200c9a66}');
    }

    public function testIsUUIDWillThrowExceptionVariation4()
    {
        $this->setExpectedException(Exception::class);
        Assert::isUUID('216fff4098d911e3a5e20800200c9a66');
    }
}
