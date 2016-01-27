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

class ObjectAssertions
{
    /**
     * @param $value
     * @param string $message
     *
     * @return bool
     */
    public static function isObject($value, $message = '')
    {
        return is_object($value);
    }

    /**
     * @param mixed  $value
     * @param string $instanceOf
     * @param string $message
     *
     * @return bool
     */
    public static function isInstanceOf($value, $instanceOf, $message = '')
    {
        return $value instanceof $instanceOf;
    }

    /**
     * @param $value
     * @param $property
     * @param string $message
     *
     * @return bool
     */
    public static function hasProperty($value, $property, $message = '')
    {
        return is_object($value) && property_exists(get_class($value), $property);
    }

    /**
     * @param $value
     * @param $method
     * @param string $message
     *
     * @return bool
     */
    public static function hasMethod($value, $method, $message = '')
    {
        return is_object($value) && method_exists(get_class($value), $method);
    }

    /**
     * @param $value
     * @param string $message
     *
     * @return bool
     */
    public static function hasParentClass($value, $message = '')
    {
        return is_object($value) && get_parent_class($value) !== false;
    }

    /**
     * @param $value
     * @param $parentClass
     * @param string $message
     *
     * @return bool
     */
    public static function isChildOf($value, $parentClass, $message = '')
    {
        return is_object($value) && get_parent_class($value) === $parentClass;
    }

    /**
     * @param $value
     * @param $inheritsClass
     * @param string $message
     *
     * @return bool
     */
    public static function inheritsFrom($value, $inheritsClass, $message = '')
    {
        return is_object($value) && is_subclass_of($value, $inheritsClass);
    }

    /**
     * @param $value
     * @param $interface
     * @param string $message
     *
     * @return bool
     */
    public static function hasInterface($value, $interface, $message = '')
    {
        return is_object($value) && in_array($interface, class_implements($value));
    }
}
