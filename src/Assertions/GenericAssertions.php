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

use NilPortugues\Assert\Exceptions\AssertionException;

class GenericAssertions
{
    const ASSERT_IS_REQUIRED = 'Value field is required.';
    const ASSERT_IS_NOT_NULL = 'Value must be a non null value.';
    const ASSERT_NOT_EQUALS = 'Values are not equal';
    const ASSERT_GREATER_THAN_OR_EQUAL = 'Value is not greater or equal than the provided value.';
    const ASSERT_GREATER = 'Value is not greater than the provided value.';
    const ASSERT_LESS_THAN_OR_EQUAL = 'Value is not less or equal than the provided value.';
    const ASSERT_LESS = 'Value is not less than the provided value.';
    const ASSERT_IS_SCALAR = 'Value must be a scalar.';

    /**
     * @param $value
     * @param string $message
     */
    public static function isScalar($value, $message = '')
    {
        if (false === is_scalar($value)) {
            throw new AssertionException(
                ($message) ? $message : self::ASSERT_IS_SCALAR
            );
        }
    }

    /**
     * @param string|null $value
     * @param string      $message
     *
     * @return AssertionException
     */
    public static function isRequired($value, $message = '')
    {
        if (false === (isset($value) === true && is_null($value) === false && empty($value) === false)) {
            throw new AssertionException(
                ($message) ? $message : self::ASSERT_IS_REQUIRED
            );
        }
    }

    /**
     * @param string|null $value
     * @param string      $message
     *
     * @return AssertionException
     */
    public static function isNotNull($value, $message = '')
    {
        if (false === ($value !== null && $value !== '')) {
            throw new AssertionException(
                ($message) ? $message : self::ASSERT_IS_NOT_NULL
            );
        }
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
        if (false === ($property != $value)) {
            throw new AssertionException(
                ($message) ? $message : self::ASSERT_NOT_EQUALS
            );
        }
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
        if (false === ($property >= $value)) {
            throw new AssertionException(
                ($message) ? $message : self::ASSERT_GREATER_THAN_OR_EQUAL
            );
        }
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
        if (false === ($property > $value)) {
            throw new AssertionException(
                ($message) ? $message : self::ASSERT_GREATER
            );
        }
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
        if (false === ($property <= $value)) {
            throw new AssertionException(
                ($message) ? $message : self::ASSERT_LESS_THAN_OR_EQUAL
            );
        }
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
        if (false === ($property < $value)) {
            throw new AssertionException(
                ($message) ? $message : self::ASSERT_LESS
            );
        }
    }
}
