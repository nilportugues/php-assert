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

class FloatAssertions
{
    /**
     * @param $value
     * @param string $message
     *
     * @return bool
     */
    public static function isFloat($value, $message = '')
    {
        return is_float($value);
    }

    /**
     * @param $value
     * @param string $message
     *
     * @return bool
     */
    public static function isNotZero($value, $message = '')
    {
        settype($value, 'float');

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
        settype($value, 'float');

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
        settype($value, 'float');

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
        settype($value, 'float');

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
        settype($value, 'float');

        return 0 > $value;
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
     * @return bool
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
            return (($min < $value) && ($value < $max));
        }

        return (($min <= $value) && ($value <= $max));
    }

    /**
     * @param float  $value
     * @param string $message
     *
     * @return bool
     */
    public static function isOdd($value, $message = '')
    {
        settype($value, 'int');

        return 1 == ($value % 2);
    }

    /**
     * @param float  $value
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
     * @param float  $value
     * @param float  $multiple
     * @param string $message
     *
     * @return bool
     */
    public static function isMultiple($value, $multiple, $message = '')
    {
        settype($value, 'float');
        settype($multiple, 'float');

        return (float) 0 == fmod($value, $multiple);
    }
}
