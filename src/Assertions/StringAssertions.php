<?php

/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 9/16/14
 * Time: 10:20 PM.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace NilPortugues\Assert\Assertions;

use NilPortugues\Assert\Exceptions\AssertionException;

class StringAssertions
{
    const ASSERT_IS_STRING = 'Asserting that value is string failed. Value provided is of type %s.';
    const ASSERT_HAS_STRING_SUBSET = '';
    const ASSERT_IS_UUID = '';
    const ASSERT_IS_URL = '';
    const ASSERT_IS_EMAIL = '';
    const ASSERT_HAS_SPECIAL_CHARACTERS = '';
    const ASSERT_HAS_NUMERIC = '';
    const ASSERT_HAS_UPPERCASE = '';
    const ASSERT_HAS_LOWERCASE = '';
    const ASSERT_IS_HEX_DIGIT = '';
    const ASSERT_IS_VOWEL = '';
    const ASSERT_IS_CONTROL_CHARACTERS = '';
    const ASSERT_IS_ALPHANUMERIC = '';
    const ASSERT_IS_ALPHA = '';
    const ASSERT_IS_BETWEEN = '';
    const ASSERT_IS_CHARSET = '';
    const ASSERT_ALL_CONSONANTS = '';
    const ASSERT_CONTAINS = '';
    const ASSERT_IS_DIGIT = '';
    const ASSERT_HAS_GRAPHICAL_CHARS_ONLY = '';
    const ASSERT_HAS_LENGTH = '';
    const ASSERT_IS_LOWERCASE = '';
    const ASSERT_NOT_EMPTY = '';
    const ASSERT_NO_WHITESPACE = '';
    const ASSERT_HAS_PRINTABLE_CHARS_ONLY = '';
    const ASSERT_IS_PUNCTUATION = '';
    const ASSERT_MATCHES_REGEX = '';

    /**
     * @param $value
     * @param string $message
     *
     * @throws AssertionException
     */
    public static function isString($value, $message = '')
    {
        if (false === is_string($value)) {
            throw new AssertionException(
                ($message) ? $message : sprintf(self::ASSERT_IS_STRING, gettype($value))
            );
        }
    }

    /**
     * @param string $value
     * @param string $message
     *
     * @throws AssertionException
     */
    public static function isAlphanumeric($value, $message = '')
    {
        if (false === preg_match('/^[a-z0-9]+$/i', $value) > 0) {
            throw new AssertionException(
                ($message) ? $message : sprintf(self::ASSERT_IS_ALPHANUMERIC, gettype($value))
            );
        }
    }

    /**
     * @param string $value
     * @param string $message
     *
     * @throws AssertionException
     */
    public static function isAlpha($value, $message = '')
    {
        if (false === preg_match('/^[a-z]+$/i', $value) > 0) {
            throw new AssertionException(
                ($message) ? $message : sprintf(self::ASSERT_IS_ALPHA, gettype($value))
            );
        }
    }

    /**
     * @param string $value
     * @param int    $min
     * @param int    $max
     * @param bool   $inclusive
     * @param string $message
     *
     * @throws \InvalidArgumentException
     * @throws AssertionException
     */
    public static function isBetween($value, $min, $max, $inclusive = false, $message = '')
    {
        settype($min, 'int');
        settype($max, 'int');
        settype($inclusive, 'bool');

        $length = mb_strlen($value, mb_detect_encoding($value));

        if ($min > $max) {
            throw new \InvalidArgumentException(sprintf('%s cannot be less than  %s for validation', $min, $max));
        }

        if (false === $inclusive) {
            if (false === $min < $length && $length < $max) {
                throw new AssertionException(
                    ($message) ? $message : sprintf(self::ASSERT_IS_BETWEEN, gettype($value))
                );
            }
        }

        if (false === $min <= $length && $length <= $max) {
            throw new AssertionException(
                ($message) ? $message : sprintf(self::ASSERT_IS_BETWEEN, gettype($value))
            );
        }
    }

    /**
     * @param string $value
     * @param string $charset
     * @param string $message
     *
     * @throws AssertionException
     */
    public static function isCharset($value, $charset, $message = '')
    {
        $available = mb_list_encodings();

        $charset = is_array($charset) ? $charset : array($charset);

        $charsetList = array_filter(
            $charset,
            function ($charsetName) use ($available) {
                return in_array($charsetName, $available, true);
            }
        );

        $detectedEncoding = mb_detect_encoding($value, $charset, true);

        if (false === in_array($detectedEncoding, $charsetList, true)) {
            throw new AssertionException(
                ($message) ? $message : sprintf(self::ASSERT_IS_CHARSET, gettype($value))
            );
        }
    }

    /**
     * @param string $value
     * @param string $message
     *
     * @throws AssertionException
     */
    public static function isAllConsonants($value, $message = '')
    {
        if (false === preg_match('/^(\s|[b-df-hj-np-tv-zB-DF-HJ-NP-TV-Z])+$/', $value) > 0) {
            throw new AssertionException(
                ($message) ? $message : sprintf(self::ASSERT_ALL_CONSONANTS, gettype($value))
            );
        }
    }

    /**
     * @param string $value
     * @param string $contains
     * @param bool   $identical
     * @param string $message
     *
     * @throws AssertionException
     */
    public static function contains($value, $contains, $identical = false, $message = '')
    {
        if (false === $identical) {
            return false !== mb_stripos($value, $contains, 0, mb_detect_encoding($value));
        }

        return false !== mb_strpos($value, $contains, 0, mb_detect_encoding($value));
    }

    /**
     * @param string $value
     * @param string $message
     *
     * @throws AssertionException
     */
    public static function isControlCharacters($value, $message = '')
    {
        if (false === ctype_cntrl($value)) {
            throw new AssertionException(
                ($message) ? $message : sprintf(self::ASSERT_IS_CONTROL_CHARACTERS, gettype($value))
            );
        }
    }

    /**
     * @param string $value
     * @param string $message
     *
     * @throws AssertionException
     */
    public static function isDigit($value, $message = '')
    {
        if (false === ctype_digit($value)) {
            throw new AssertionException(
                ($message) ? $message : sprintf(self::ASSERT_IS_DIGIT, gettype($value))
            );
        }
    }

    /**
     * @param string $value
     * @param string $contains
     * @param bool   $identical
     * @param string $message
     *
     * @throws AssertionException
     */
    public static function endsWith($value, $contains, $identical = false, $message = '')
    {
        $enc = mb_detect_encoding($value);

        if (false === $identical) {
            return mb_strripos($value, $contains, -1, $enc) === (mb_strlen($value, $enc) - mb_strlen($contains, $enc));
        }

        return mb_strrpos($value, $contains, 0, $enc) === (mb_strlen($value, $enc) - mb_strlen($contains, $enc));
    }

    /**
     * Validates if the input is equal some value.
     *
     * @param string $value
     * @param string $comparedValue
     * @param bool   $identical
     * @param string $message
     *
     * @throws AssertionException
     */
    public static function equals($value, $comparedValue, $identical = false, $message = '')
    {
        if (false === $identical) {
            return $value == $comparedValue;
        }

        return $value === $comparedValue;
    }

    /**
     * @param string $value
     * @param string $haystack
     * @param bool   $identical
     * @param string $message
     *
     * @throws AssertionException
     */
    public static function in($value, $haystack, $identical = false, $message = '')
    {
        $haystack = (string) $haystack;
        $enc = mb_detect_encoding($value);

        if (false === $identical) {
            return (false !== mb_stripos($haystack, $value, 0, $enc));
        }

        return (false !== mb_strpos($haystack, $value, 0, $enc));
    }

    /**
     * @param string $value
     * @param string $message
     *
     * @throws AssertionException
     */
    public static function hasGraphicalCharsOnly($value, $message = '')
    {
        if (false === ctype_graph($value)) {
            throw new AssertionException(
                ($message) ? $message : sprintf(self::ASSERT_HAS_GRAPHICAL_CHARS_ONLY, gettype($value))
            );
        }
    }

    /**
     * @param string $value
     * @param int    $length
     * @param string $message
     *
     * @throws AssertionException
     */
    public static function hasLength($value, $length, $message = '')
    {
        settype($length, 'int');

        if (mb_strlen($value, mb_detect_encoding($value)) !== $length) {
            throw new AssertionException(
                ($message) ? $message : sprintf(self::ASSERT_HAS_LENGTH, gettype($value))
            );
        }
    }

    /**
     * @param string $value
     * @param string $message
     *
     * @throws AssertionException
     */
    public static function isLowercase($value, $message = '')
    {
        if ($value !== mb_strtolower($value, mb_detect_encoding($value))) {
            throw new AssertionException(
                ($message) ? $message : sprintf(self::ASSERT_IS_LOWERCASE, gettype($value))
            );
        }
    }

    /**
     * @param string $value
     * @param string $message
     *
     * @throws AssertionException
     */
    public static function notEmpty($value, $message = '')
    {
        $value = trim($value);

        if (empty($value)) {
            throw new AssertionException(
                ($message) ? $message : sprintf(self::ASSERT_NOT_EMPTY, gettype($value))
            );
        }
    }

    /**
     * @param string $value
     * @param string $message
     *
     * @throws AssertionException
     */
    public static function noWhitespace($value, $message = '')
    {
        if (0 !== preg_match('/\s/', $value)) {
            throw new AssertionException(
                ($message) ? $message : sprintf(self::ASSERT_NO_WHITESPACE, gettype($value))
            );
        }
    }

    /**
     * @param string $value
     * @param string $message
     *
     * @throws AssertionException
     */
    public static function hasPrintableCharsOnly($value, $message = '')
    {
        if (false === ctype_print($value)) {
            throw new AssertionException(
                ($message) ? $message : sprintf(self::ASSERT_HAS_PRINTABLE_CHARS_ONLY, gettype($value))
            );
        }
    }

    /**
     * @param string $value
     * @param string $message
     *
     * @throws AssertionException
     */
    public static function isPunctuation($value, $message = '')
    {
        if (false === ctype_punct($value)) {
            throw new AssertionException(
                ($message) ? $message : sprintf(self::ASSERT_IS_PUNCTUATION, gettype($value))
            );
        }
    }

    /**
     * @param string $value
     * @param string $regex
     * @param string $message
     *
     * @throws AssertionException
     */
    public static function matchesRegex($value, $regex, $message = '')
    {
        if (false === preg_match($regex, $value) > 0) {
            throw new AssertionException(
                ($message) ? $message : sprintf(self::ASSERT_MATCHES_REGEX, gettype($value))
            );
        }
    }

    /**
     * @param string $value
     * @param string $message
     *
     * @throws AssertionException
     */
    public static function isSlug($value, $message = '')
    {
        if ((false !== strstr($value, '--'))
            || (!preg_match('@^[0-9a-z\-]+$@', $value))
            || (preg_match('@^-|-$@', $value))
        ) {
            return false;
        }

        return true;
    }

    /**
     * @param string $value
     * @param string $message
     *
     * @throws AssertionException
     */
    public static function isSpace($value, $message = '')
    {
        if (false === ctype_space($value)) {
            throw new AssertionException(
                ($message) ? $message : sprintf(self::ASSERT_IS_STRING, gettype($value))
            );
        }
    }

    /**
     * @param string $value
     * @param        $contains
     * @param bool   $identical
     * @param string $message
     *
     * @throws AssertionException
     */
    public static function startsWith($value, $contains, $identical = false, $message = '')
    {
        $enc = mb_detect_encoding($value);

        if (false === $identical) {
            return 0 === mb_stripos($value, $contains, 0, $enc);
        }

        return 0 === mb_strpos($value, $contains, 0, $enc);
    }

    /**
     * @param string $value
     * @param string $message
     *
     * @throws AssertionException
     */
    public static function isUppercase($value, $message = '')
    {
        if ($value != mb_strtoupper($value, mb_detect_encoding($value))) {
            throw new AssertionException(
                ($message) ? $message : sprintf(self::ASSERT_IS_STRING, gettype($value))
            );
        }
    }

    /**
     * @param string $value
     * @param string $message
     *
     * @throws AssertionException
     */
    public static function isVersion($value, $message = '')
    {
        if (false === preg_match('/^[0-9]+\.[0-9]+(\.[0-9]*)?([+-][^+-][0-9A-Za-z-.]*)?$/', $value) > 0) {
            throw new AssertionException(
                ($message) ? $message : sprintf(self::ASSERT_IS_STRING, gettype($value))
            );
        }
    }

    /**
     * @param string $value
     * @param string $message
     *
     * @throws AssertionException
     */
    public static function isVowel($value, $message = '')
    {
        if (false === preg_match('/^(\s|[aeiouAEIOU])*$/', $value) > 0) {
            throw new AssertionException(
                ($message) ? $message : sprintf(self::ASSERT_IS_VOWEL, gettype($value))
            );
        }
    }

    /**
     * @param string $value
     * @param string $message
     *
     * @throws AssertionException
     */
    public static function isHexDigit($value, $message = '')
    {
        if (false === ctype_xdigit($value)) {
            throw new AssertionException(
                ($message) ? $message : sprintf(self::ASSERT_IS_HEX_DIGIT, gettype($value))
            );
        }
    }

    /**
     * @param string $value
     * @param int    $amount
     * @param string $message
     *
     * @throws AssertionException
     */
    public static function hasLowercase($value, $amount = null, $message = '')
    {
        if (false === self::hasStringSubset($value, $amount, '/[a-z]/')) {
            throw new AssertionException(
                ($message) ? $message : sprintf(self::ASSERT_HAS_LOWERCASE, gettype($value))
            );
        }
    }

    /**
     * @param string   $value
     * @param int|null $amount
     * @param string   $regex
     * @param string   $message
     *
     * @throws AssertionException
     */
    private static function hasStringSubset($value, $amount, $regex, $message = '')
    {
        $isInvalid = true;
        settype($value, 'string');

        $minMatches = 1;
        if (!empty($amount)) {
            $minMatches = $amount;
        }

        $value = preg_replace('/\s+/', '', $value);
        $length = strlen($value);

        $counter = 0;
        for ($i = 0; $i < $length; ++$i) {
            if (preg_match($regex, $value[$i]) > 0) {
                ++$counter;
            }

            if ($counter === $minMatches) {
                $isInvalid = true;
            }
        }

        if ($isInvalid) {
            throw new AssertionException(
                ($message) ? $message : sprintf(self::ASSERT_HAS_STRING_SUBSET, gettype($value))
            );
        }
    }

    /**
     * @param string $value
     * @param int    $amount
     * @param string $message
     *
     * @throws AssertionException
     */
    public static function hasUppercase($value, $amount = null, $message = '')
    {
        if (false === self::hasStringSubset($value, $amount, '/[A-Z]/')) {
            throw new AssertionException(
                ($message) ? $message : sprintf(self::ASSERT_HAS_UPPERCASE, gettype($value))
            );
        }
    }

    /**
     * @param string $value
     * @param int    $amount
     * @param string $message
     *
     * @throws AssertionException
     */
    public static function hasNumeric($value, $amount = null, $message = '')
    {
        if (false === self::hasStringSubset($value, $amount, '/[0-9]/')) {
            throw new AssertionException(
                ($message) ? $message : sprintf(self::ASSERT_HAS_NUMERIC, gettype($value))
            );
        }
    }

    /**
     * @param string $value
     * @param int    $amount
     * @param string $message
     *
     * @throws AssertionException
     */
    public static function hasSpecialCharacters($value, $amount = null, $message = '')
    {
        if (false === self::hasStringSubset($value, $amount, '/[^a-zA-Z\d\s]/')) {
            throw new AssertionException(
                ($message) ? $message : sprintf(self::ASSERT_HAS_SPECIAL_CHARACTERS, gettype($value))
            );
        }
    }

    /**
     * @param string $value
     * @param string $message
     *
     * @throws AssertionException
     */
    public static function isEmail($value, $message = '')
    {
        settype($value, 'string');

        if (false === preg_match('/^[A-Z0-9._%\-+]+@(?:[A-Z0-9\-]+\.)+(?:[A-Z0-9\-]+)$/i', $value) > 0) {
            throw new AssertionException(
                ($message) ? $message : sprintf(self::ASSERT_IS_EMAIL, gettype($value))
            );
        }
    }

    /**
     * @param string $value
     * @param string $message
     *
     * @throws AssertionException
     */
    public static function isUrl($value, $message = '')
    {
        if ($value[0] == $value[1] && $value[0] == '/') {
            $value = 'http:'.$value;
        }

        if (false === filter_var($value, FILTER_VALIDATE_URL, ['options' => ['flags' => FILTER_FLAG_PATH_REQUIRED]])) {
            throw new AssertionException(
                ($message) ? $message : sprintf(self::ASSERT_IS_URL, gettype($value))
            );
        }
    }

    /**
     * @param string $value
     * @param bool   $strict
     * @param string $message
     *
     * @throws AssertionException
     */
    public static function isUUID($value, $strict = true, $message = '')
    {
        settype($value, 'string');

        $pattern = '/^[0-9A-Fa-f]{8}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{12}$/i';
        if (true !== $strict) {
            $value = trim($value, '[]{}');
            $pattern = '/^[a-f0-9]{4}(?:-?[a-f0-9]{4}){7}$/i';
        }

        if (false === preg_match($pattern, $value) > 0) {
            throw new AssertionException(
                ($message) ? $message : sprintf(self::ASSERT_IS_UUID, gettype($value))
            );
        }
    }
}
