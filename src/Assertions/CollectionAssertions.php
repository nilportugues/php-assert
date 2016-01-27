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

class CollectionAssertions
{
    /**
     * @param $value
     * @param string $message
     *
     * @return bool
     */
    public static function isArray($value, $message = '')
    {
        return is_array($value)
        || (is_object($value) && $value instanceof \ArrayObject)
        || (is_object($value) && $value instanceof \SplFixedArray);
    }

    /**
     * @param $value
     * @param callable      $valueValidator
     * @param callable|null $keyValidator
     * @param string        $message
     *
     * @return bool
     */
    public static function each($value, callable $valueValidator, callable $keyValidator = null, $message = '')
    {
        $isValid = true;

        foreach ($value as $key => $data) {
            $isValid = $isValid && $keyValidator($key);
            $isValid = $isValid && $valueValidator($data);
        }

        return $isValid;
    }

    /**
     * @param $value
     * @param callable $keyValidator
     * @param string   $message
     *
     * @return bool
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
        $isValid = true;

        foreach ($arrayKeys as $key) {
            $isValid = $isValid && $keyValidator->validate($key);
        }

        return $isValid;
    }

    /**
     * @param $haystack
     * @param $needle
     * @param bool   $strict
     * @param string $message
     *
     * @return bool
     */
    public static function endsWith($haystack, $needle, $strict = false, $message = '')
    {
        $last = end($haystack);
        settype($strict, 'bool');

        if (false === $strict) {
            return $last == $needle;
        }

        return $last === $needle;
    }

    /**
     * @param $haystack
     * @param $needle
     * @param bool   $strict
     * @param string $message
     *
     * @return bool
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
            return in_array($needle, $haystack, false);
        }

        return in_array($needle, $haystack, true);
    }

    /**
     * @param $value
     * @param $keyName
     * @param string $message
     *
     * @return bool
     */
    public static function hasKey($value, $keyName, $message = '')
    {
        return array_key_exists($keyName, $value);
    }

    /**
     * @param $value
     * @param $length
     * @param string $message
     *
     * @return bool
     */
    public static function hasLength($value, $length, $message = '')
    {
        settype($length, 'int');

        return count($value) === $length;
    }

    /**
     * @param $value
     * @param string $message
     *
     * @return bool
     */
    public static function isNotEmpty($value, $message = '')
    {
        return count($value) > 0;
    }

    /**
     * @param $haystack
     * @param $needle
     * @param bool   $strict
     * @param string $message
     *
     * @return bool
     */
    public static function startsWith($haystack, $needle, $strict = false, $message = '')
    {
        $first = reset($haystack);
        settype($strict, 'bool');

        if (false === $strict) {
            return $first == $needle;
        }

        return $first === $needle;
    }
}
