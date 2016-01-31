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

class ObjectAssertions
{
    const ASSERT_OBJECT = 'Value is not a valid object.';
    const ASSERT_IS_INSTANCE_OF = 'Value is not an instance of %s.';
    const ASSERT_HAS_PROPERTY = 'Value property %s is not valid.';
    const ASSERT_HAS_METHOD = 'Value method %s is not valid.';
    const ASSERT_HAS_PARENT_CLASS = 'Value has no parent class.';
    const ASSERT_IS_CHILD_OF = 'Value is not child of class %s.';
    const ASSERT_INHERITS_FROM = 'Value does not inherit from class %s.';
    const ASSERT_HAS_INTERFACE = 'Value does not implement interface %s.';

    /**
     * @param mixed  $value
     * @param string $message
     *
     * @return AssertionException
     */
    public static function isObject($value, $message = '')
    {
        if (false === is_object($value)) {
            throw new AssertionException(
                ($message) ? $message : self::ASSERT_OBJECT
            );
        }
    }

    /**
     * @param mixed  $value
     * @param string $instanceOf
     * @param string $message
     *
     * @return AssertionException
     */
    public static function isInstanceOf($value, $instanceOf, $message = '')
    {
        if (false === ($value instanceof $instanceOf)) {
            throw new AssertionException(
                ($message) ? $message : sprintf(self::ASSERT_IS_INSTANCE_OF, $instanceOf)
            );
        }
    }

    /**
     * @param mixed  $value
     * @param string $property
     * @param string $message
     *
     * @return AssertionException
     */
    public static function hasProperty($value, $property, $message = '')
    {
        if (false === (is_object($value) && property_exists(get_class($value), $property))) {
            throw new AssertionException(
                ($message) ? $message : sprintf(self::ASSERT_HAS_PROPERTY, gettype($value))
            );
        }
    }

    /**
     * @param mixed  $value
     * @param string $method
     * @param string $message
     *
     * @return AssertionException
     */
    public static function hasMethod($value, $method, $message = '')
    {
        if (false === (is_object($value) && method_exists(get_class($value), $method))) {
            throw new AssertionException(
                ($message) ? $message : sprintf(self::ASSERT_HAS_METHOD, $method)
            );
        }
    }

    /**
     * @param mixed  $value
     * @param string $message
     *
     * @return AssertionException
     */
    public static function hasParentClass($value, $message = '')
    {
        if (false === (is_object($value) && get_parent_class($value) !== false)) {
            throw new AssertionException(
                ($message) ? $message : self::ASSERT_HAS_PARENT_CLASS
            );
        }
    }

    /**
     * @param mixed  $value
     * @param string $parentClass
     * @param string $message
     *
     * @return AssertionException
     */
    public static function isChildOf($value, $parentClass, $message = '')
    {
        if (false === (is_object($value) && get_parent_class($value) === $parentClass)) {
            throw new AssertionException(
                ($message) ? $message : sprintf(self::ASSERT_IS_CHILD_OF, $parentClass)
            );
        }
    }

    /**
     * @param mixed  $value
     * @param string $inheritsClass
     * @param string $message
     *
     * @return AssertionException
     */
    public static function inheritsFrom($value, $inheritsClass, $message = '')
    {
        if (false === (is_object($value) && is_subclass_of($value, $inheritsClass))) {
            throw new AssertionException(
                ($message) ? $message : sprintf(self::ASSERT_INHERITS_FROM, $inheritsClass)
            );
        }
    }

    /**
     * @param mixed  $value
     * @param string $interface
     * @param string $message
     *
     * @return AssertionException
     */
    public static function hasInterface($value, $interface, $message = '')
    {
        if (false === (is_object($value) && in_array($interface, class_implements($value)))) {
            throw new AssertionException(
                ($message) ? $message : sprintf(self::ASSERT_HAS_INTERFACE, $interface)
            );
        }
    }
}
