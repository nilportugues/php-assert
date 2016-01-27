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

use NilPortugues\Assert\Exceptions\AssertionException;

class FloatAssertions
{
    const ASSERT_FLOAT = 'Value must be a float.';
    const ASSERT_IS_NOT_ZERO = 'Value must not be zero.';
    const ASSERT_IS_POSITIVE = 'Value must be a positive value.';
    const ASSERT_IS_POSITIVE_OR_ZERO = 'Value must be a positive value or zero.';
    const ASSERT_IS_NEGATIVE = 'Value must be a negative value.';
    const ASSERT_IS_NEGATIVE_OR_ZERO = 'Value must be a negative value or zero';
    const ASSERT_IS_BETWEEN = 'Value must be between %s and %s.';
    const ASSERT_IS_ODD = 'Value must be divisible by 3.';
    const ASSERT_IS_EVEN = 'Value must be divisible by 2.';
    const ASSERT_IS_MULTIPLE = 'Value must be multiple of %s.';

    /**
     * @param $value
     * @param string $message
     *
     * @return AssertionException
     */
    public static function isFloat($value, $message = '')
    {
        if (false === is_float($value)) {
            throw new AssertionException(
                ($message) ? $message : self::ASSERT_FLOAT
            );
        }
    }

    /**
     * @param $value
     * @param string $message
     *
     * @return AssertionException
     */
    public static function isNotZero($value, $message = '')
    {
        settype($value, 'float');

        if (false === (0 != $value)) {
            throw new AssertionException(
                ($message) ? $message : self::ASSERT_IS_NOT_ZERO
            );
        }
    }

    /**
     * @param float  $value
     * @param string $message
     *
     * @return AssertionException
     */
    public static function isPositiveOrZero($value, $message = '')
    {
        settype($value, 'float');

        if (false === (0 <= $value)) {
            throw new AssertionException(
                ($message) ? $message : self::ASSERT_IS_POSITIVE_OR_ZERO
            );
        }
    }

    /**
     * @param float  $value
     * @param string $message
     *
     * @return AssertionException
     */
    public static function isPositive($value, $message = '')
    {
        settype($value, 'float');

        if (false === (0 < $value)) {
            throw new AssertionException(
                ($message) ? $message : self::ASSERT_IS_POSITIVE
            );
        }
    }

    /**
     * @param float  $value
     * @param string $message
     *
     * @return AssertionException
     */
    public static function isNegativeOrZero($value, $message = '')
    {
        settype($value, 'float');

        if (false === (0 >= $value)) {
            throw new AssertionException(
                ($message) ? $message : self::ASSERT_IS_NEGATIVE_OR_ZERO
            );
        }
    }

    /**
     * @param float  $value
     * @param string $message
     *
     * @return AssertionException
     */
    public static function isNegative($value, $message = '')
    {
        settype($value, 'float');

        if (false === (0 > $value)) {
            throw new AssertionException(
                ($message) ? $message : self::ASSERT_IS_NEGATIVE
            );
        }
    }

    /**
     * @param float  $value
     * @param float  $min
     * @param float  $max
     * @param bool   $inclusive
     * @param string $message
     *
     * @throws \InvalidArgumentException
     *
     * @return AssertionException
     */
    public static function isBetween($value, $min, $max, $inclusive = false, $message = '')
    {
        settype($value, 'float');
        settype($min, 'float');
        settype($max, 'float');

        if ($min > $max) {
            throw new \InvalidArgumentException(sprintf('%s cannot be less than  %s for validation', $min, $max));
        }

        if (false === $inclusive) {
            if (false === (($min < $value) && ($value < $max))) {
                throw new AssertionException(
                    ($message) ? $message : sprintf(self::ASSERT_IS_BETWEEN, $min, $max)
                );
            }
        }

        if (false === (($min <= $value) && ($value <= $max))) {
            throw new AssertionException(
                ($message) ? $message : sprintf(self::ASSERT_IS_BETWEEN, $min, $max)
            );
        }
    }

    /**
     * @param float  $value
     * @param string $message
     *
     * @return AssertionException
     */
    public static function isOdd($value, $message = '')
    {
        settype($value, 'int');

        if (false === (1 == ($value % 2))) {
            throw new AssertionException(
                ($message) ? $message : self::ASSERT_IS_ODD
            );
        }
    }

    /**
     * @param float  $value
     * @param string $message
     *
     * @return AssertionException
     */
    public static function isEven($value, $message = '')
    {
        settype($value, 'int');

        if (false === (0 == ($value % 2))) {
            throw new AssertionException(
                ($message) ? $message : self::ASSERT_IS_EVEN
            );
        }
    }

    /**
     * @param float  $value
     * @param float  $multiple
     * @param string $message
     *
     * @return AssertionException
     */
    public static function isMultiple($value, $multiple, $message = '')
    {
        settype($value, 'float');
        settype($multiple, 'float');

        if (false === ((float) 0 == fmod($value, $multiple))) {
            throw new AssertionException(
                ($message) ? $message : sprintf(self::ASSERT_IS_MULTIPLE, $multiple)
            );
        }
    }
}
