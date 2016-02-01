<?php

/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 9/16/14
 * Time: 10:19 PM.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace NilPortugues\Assert\Assertions;

use Exception;
use NilPortugues\Assert\Exceptions\AssertionException;

class CollectionAssertions
{
    const ASSERT_IS_ARRAY = 'Value must be an array.';
    const ASSERT_KEY_FORMAT = 'Value array key format is not valid.';
    const ASSERT_ENDS_WITH = 'Value array does not end as expected.';
    const ASSERT_CONTAINS = 'Value was not found.';
    const ASSERT_HAS_KEY = 'Value array has no %s.';
    const ASSERT_HAS_LENGTH = 'Value must contain %s items.';
    const ASSERT_IS_NOT_EMPTY = 'Value must have at least 1 item.';
    const ASSERT_STARTS_WITH = 'Value array does not start as expected.';

    /**
     * @param $value
     * @param string $message
     *
     * @throws AssertionException
     */
    public static function isArray($value, $message = '')
    {
        $result = is_array($value)
        || (is_object($value) && $value instanceof \ArrayObject)
        || (is_object($value) && $value instanceof \SplFixedArray);

        if (false === $result) {
            throw new AssertionException(
                ($message) ? $message : self::ASSERT_IS_ARRAY
            );
        }
    }

    /**
     * @param $value
     * @param callable      $valueValidator
     * @param callable|null $keyValidator
     * @param string        $message
     *
     * @throws AssertionException
     */
    public static function each($value, callable $valueValidator, callable $keyValidator = null, $message = '')
    {
        foreach ($value as $key => $data) {
            try {
                $keyValidator($key);
                $valueValidator($data);
            } catch (\Exception $e) {
                throw new AssertionException(
                    ($message) ? $message : $e->getMessage()
                );
            }
        }
    }

    /**
     * @param $value
     * @param callable $keyValidator
     * @param string   $message
     *
     * @throws AssertionException
     */
    public static function hasKeyFormat($value, callable $keyValidator, $message = '')
    {
        if ($value instanceof \ArrayObject) {
            $value = $value->getArrayCopy();
        }

        if ($value instanceof \SplFixedArray) {
            $value = $value->toArray();
        }

        $arrayKeys = array_keys($value);

        foreach ($arrayKeys as $key) {
            try {
                $keyValidator($key);
            } catch (Exception $e) {
                throw new AssertionException(
                    ($message) ? $message : self::ASSERT_KEY_FORMAT
                );
            }
        }
    }

    /**
     * @param $haystack
     * @param $needle
     * @param bool   $strict
     * @param string $message
     *
     * @throws AssertionException
     */
    public static function endsWith($haystack, $needle, $strict = false, $message = '')
    {
        $last = end($haystack);
        settype($strict, 'bool');

        if (false === $strict) {
            if ($last != $needle) {
                throw new AssertionException(
                    ($message) ? $message : self::ASSERT_ENDS_WITH
                );
            }

            return;
        }

        if ($last !== $needle) {
            throw new AssertionException(
                ($message) ? $message : self::ASSERT_ENDS_WITH
            );
        }
    }

    /**
     * @param $haystack
     * @param $needle
     * @param bool   $strict
     * @param string $message
     *
     * @throws AssertionException
     */
    public static function contains($haystack, $needle, $strict = false, $message = '')
    {
        if ($haystack instanceof \ArrayObject) {
            $haystack = $haystack->getArrayCopy();
        }

        if ($haystack instanceof \SplFixedArray) {
            $haystack = $haystack->toArray();
        }

        settype($strict, 'bool');

        if (false === $strict) {
            if (false === (in_array($needle, $haystack, false))) {
                throw new AssertionException(
                    ($message) ? $message : self::ASSERT_CONTAINS
                );
            }

            return;
        }

        if (false === (in_array($needle, $haystack, true))) {
            throw new AssertionException(
                ($message) ? $message : self::ASSERT_CONTAINS
            );
        }
    }

    /**
     * @param $value
     * @param $keyName
     * @param string $message
     *
     * @throws AssertionException
     */
    public static function hasKey($value, $keyName, $message = '')
    {
        if (false === array_key_exists($keyName, $value)) {
            throw new AssertionException(
                ($message) ? $message : sprintf(self::ASSERT_HAS_KEY, $keyName);
            );
        }
    }

    /**
     * @param $value
     * @param $length
     * @param string $message
     *
     * @throws AssertionException
     */
    public static function hasLength($value, $length, $message = '')
    {
        settype($length, 'int');

        if (false === (count($value) === $length)) {
            throw new AssertionException(
                ($message) ? $message : sprintf(self::ASSERT_HAS_LENGTH, $length)
            );
        }
    }

    /**
     * @param $value
     * @param string $message
     *
     * @throws AssertionException
     */
    public static function isNotEmpty($value, $message = '')
    {
        if (false === (count($value) > 0)) {
            throw new AssertionException(
                ($message) ? $message : self::ASSERT_IS_NOT_EMPTY
            );
        }
    }

    /**
     * @param $haystack
     * @param $needle
     * @param bool   $strict
     * @param string $message
     *
     * @throws AssertionException
     */
    public static function startsWith($haystack, $needle, $strict = false, $message = '')
    {
        $first = reset($haystack);
        settype($strict, 'bool');

        if (false === $strict) {
            if ($first != $needle) {
                throw new AssertionException(
                    ($message) ? $message : self::ASSERT_STARTS_WITH
                );
            }

            return;
        }

        if ($first !== $needle) {
            throw new AssertionException(
                ($message) ? $message : self::ASSERT_STARTS_WITH
            );
        }
    }
}
