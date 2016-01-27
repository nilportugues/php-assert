<?php

/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 9/20/14
 * Time: 11:46 AM.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace NilPortugues\Assert\Assertions;

class GenericAssertions
{
    /**
     * @param string|null $value
     * @param string      $message
     *
     * @return bool
     */
    public static function isRequired($value, $message = '')
    {
        return isset($value) === true
        && is_null($value) === false
        && empty($value) === false;
    }

    /**
     * @param string|null $value
     * @param string      $message
     *
     * @return bool
     */
    public static function isNotNull($value, $message = '')
    {
        return $value !== null && $value !== '';
    }

    /**
     * @param string           $property
     * @param string|int|float $value
     * @param string           $message
     *
     * @return \Closure
     */
    public static function notEquals($property, $value, $message = '')
    {
        return $property != $value;
    }

    /**
     * @param string           $property
     * @param string|int|float $value
     * @param string           $message
     *
     * @return \Closure
     */
    public static function greaterThanOrEqual($property, $value, $message = '')
    {
        return $property >= $value;
    }

    /**
     * @param string           $property
     * @param string|int|float $value
     * @param string           $message
     *
     * @return \Closure
     */
    public static function greaterThan($property, $value, $message = '')
    {
        return $property > $value;
    }

    /**
     * @param string           $property
     * @param string|int|float $value
     * @param string           $message
     *
     * @return \Closure
     */
    public static function lessThanOrEqual($property, $value, $message = '')
    {
        return $property <= $value;
    }

    /**
     * @param string           $property
     * @param string|int|float $value
     * @param string           $message
     *
     * @return \Closure
     */
    public static function lessThan($property, $value, $message = '')
    {
        return $property < $value;
    }
}
