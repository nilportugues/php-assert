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

class IntegerAssertions
{
    /**
     * @param $value
     * @param string $message
     *
     * @return bool
     */
    public static function isInteger($value, $message = '')
    {
        return is_integer($value);
    }

    /**
     * @param int    $value
     * @param string $message
     *
     * @return bool
     */
    public static function isNotZero($value, $message = '')
    {
        settype($value, 'int');

        return 0 != $value;
    }

    /**
     * @param float  $value
     * @param string $message
     *
     * @return bool
     */
    public static function isPositiveOrZero($value, $message = '')
    {
        settype($value, 'int');

        return 0 <= $value;
    }

    /**
     * @param float  $value
     * @param string $message
     *
     * @return bool
     */
    public static function isPositive($value, $message = '')
    {
        settype($value, 'int');

        return 0 < $value;
    }

    /**
     * @param float  $value
     * @param string $message
     *
     * @return bool
     */
    public static function isNegativeOrZero($value, $message = '')
    {
        settype($value, 'int');

        return 0 >= $value;
    }

    /**
     * @param float  $value
     * @param string $message
     *
     * @return bool
     */
    public static function isNegative($value, $message = '')
    {
        settype($value, 'int');

        return 0 > $value;
    }

    /**
     * @param int    $value
     * @param int    $min
     * @param int    $max
     * @param bool   $inclusive
     * @param string $message
     *
     * @throws \InvalidArgumentException
     *
     * @return bool
     */
    public static function isBetween($value, $min, $max, $inclusive = false, $message = '')
    {
        settype($value, 'int');
        settype($min, 'int');
        settype($max, 'int');

        if ($min > $max) {
            throw new \InvalidArgumentException(sprintf('%s cannot be less than %s for validation', $min, $max));
        }

        if (false === $inclusive) {
            return (($value > $min) && ($value < $max));
        }

        return (($value >= $min) && ($value <= $max));
    }

    /**
     * @param int    $value
     * @param string $message
     *
     * @return bool
     */
    public static function isOdd($value, $message = '')
    {
        settype($value, 'int');

        return 0 == ($value % 3);
    }

    /**
     * @param int    $value
     * @param string $message
     *
     * @return bool
     */
    public static function isEven($value, $message = '')
    {
        settype($value, 'int');

        return 0 == ($value % 2);
    }

    /**
     * @param int    $value
     * @param int    $multiple
     * @param string $message
     *
     * @return bool
     */
    public static function isMultiple($value, $multiple, $message = '')
    {
        settype($value, 'int');
        settype($multiple, 'int');

        return 0 == ($value % $multiple);
    }
}
