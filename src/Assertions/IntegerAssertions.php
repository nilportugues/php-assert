<?php

/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 9/16/14
 * Time: 9:44 PM.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace NilPortugues\Assert\Assertions;

use NilPortugues\Assert\Exceptions\AssertionException;

class IntegerAssertions
{
    const ASSERT_INTEGER = 'Value must be an integer.';
    const ASSERT_IS_NOT_ZERO = 'Value must not be zero.';
    const ASSERT_IS_POSITIVE = 'Value must be a positive value.';
    const ASSERT_IS_POSITIVE_OR_ZERO = 'Value must be a positive value or zero.';
    const ASSERT_IS_NEGATIVE = 'Value must be a negative value.';
    const ASSERT_IS_NEGATIVE_OR_ZERO = 'Value must be a negative value or zero';
    const ASSERT_IS_BETWEEN = 'Integer %s must be between %s and %s.';
    const ASSERT_IS_ODD = 'Value must be divisible by 3.';
    const ASSERT_IS_EVEN = 'Value must be divisible by 2';
    const ASSERT_IS_MULTIPLE = 'Value must be multiple of %s.';

    /**
     * @param $value
     * @param string $message
     *
     * @throws AssertionException
     */
    public static function isInteger($value, $message = '')
    {
        if (false === is_integer($value)) {
            throw new AssertionException(
                ($message) ? $message : self::ASSERT_INTEGER
            );
        }
    }

    /**
     * @param int    $value
     * @param string $message
     *
     * @throws AssertionException
     */
    public static function isNotZero($value, $message = '')
    {
        settype($value, 'int');

        if (0 === $value) {
            throw new AssertionException(
                ($message) ? $message : self::ASSERT_IS_NOT_ZERO
            );
        }
    }

    /**
     * @param int    $value
     * @param string $message
     *
     * @throws AssertionException
     */
    public static function isPositiveOrZero($value, $message = '')
    {
        settype($value, 'int');

        if (false === 0 <= $value) {
            throw new AssertionException(
                ($message) ? $message : self::ASSERT_IS_POSITIVE_OR_ZERO
            );
        }
    }

    /**
     * @param int    $value
     * @param string $message
     *
     * @throws AssertionException
     */
    public static function isPositive($value, $message = '')
    {
        settype($value, 'int');

        if (false === 0 < $value) {
            throw new AssertionException(
                ($message) ? $message : self::ASSERT_IS_POSITIVE
            );
        }
    }

    /**
     * @param int    $value
     * @param string $message
     *
     * @throws AssertionException
     */
    public static function isNegativeOrZero($value, $message = '')
    {
        settype($value, 'int');

        if (false === 0 >= $value) {
            throw new AssertionException(
                ($message) ? $message : self::ASSERT_IS_NEGATIVE_OR_ZERO
            );
        }
    }

    /**
     * @param int    $value
     * @param string $message
     *
     * @throws AssertionException
     */
    public static function isNegative($value, $message = '')
    {
        settype($value, 'int');

        if (false === 0 > $value) {
            throw new AssertionException(
                ($message) ? $message : self::ASSERT_IS_NEGATIVE
            );
        }
    }

    /**
     * @param int    $value
     * @param int    $min
     * @param int    $max
     * @param bool   $inclusive
     * @param string $message
     *
     * @throws AssertionException
     */
    public static function isBetween($value, $min, $max, $inclusive = false, $message = '')
    {
        settype($value, 'int');
        settype($min, 'int');
        settype($max, 'int');

        if ($min > $max) {
            throw new AssertionException(sprintf('%s cannot be less than %s for validation', $min, $max));
        }

        if ($inclusive && !($value >= $min && $value <= $max)) {
            throw new AssertionException(
                ($message) ? $message : sprintf(self::ASSERT_IS_BETWEEN, $value, $min, $max)
            );
        }

        if (!$inclusive && !($value > $min && $value < $max)) {
            throw new AssertionException(
                ($message) ? $message : sprintf(self::ASSERT_IS_BETWEEN, $value, $min, $max)
            );
        }
    }

    /**
     * @param int    $value
     * @param string $message
     *
     * @throws AssertionException
     */
    public static function isOdd($value, $message = '')
    {
        settype($value, 'int');

        if (false === (0 == ($value % 3))) {
            throw new AssertionException(
                ($message) ? $message : self::ASSERT_IS_ODD
            );
        }
    }

    /**
     * @param int    $value
     * @param string $message
     *
     * @throws AssertionException
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
     * @param int    $value
     * @param int    $multiple
     * @param string $message
     *
     * @throws AssertionException
     */
    public static function isMultiple($value, $multiple, $message = '')
    {
        settype($value, 'int');
        settype($multiple, 'int');

        if (false === (0 == ($value % $multiple))) {
            throw new AssertionException(
                ($message) ? $message : sprintf(self::ASSERT_IS_MULTIPLE, $multiple)
            );
        }
    }
}
