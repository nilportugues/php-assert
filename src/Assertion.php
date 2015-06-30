<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 6/30/15
 * Time: 10:39 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NilPortugues\Assert;

use NilPortugues\Validator\Traits\Object\ObjectTrait;
use NilPortugues\Validator\Traits\String\StringTrait;

class Assertion
{
    /**
     * @param mixed  $value
     * @param string $message
     *
     * @return void
     * @throws AssertionFailedException
     */
    public static function notNull($value, $message = 'Provided value must be a non null value.')
    {
    }


    /**
     * @param mixed  $value
     * @param string $message
     *
     * @return void
     * @throws AssertionFailedException
     */
    public static function notZero($value, $message = 'Provided value must not be zero.')
    {
    }

    /**
     * @param mixed  $value
     * @param string $message
     *
     * @return void
     * @throws AssertionFailedException
     */
    public static function positive($value, $message = 'Provided value must be a positive value.')
    {
    }

    /**
     * @param mixed  $value
     * @param string $message
     *
     * @return void
     * @throws AssertionFailedException
     */
    public static function positiveOrZero($value, $message = 'Provided value must be a positive value or zero.')
    {
    }

    /**
     * @param mixed  $value
     * @param string $message
     *
     * @return void
     * @throws AssertionFailedException
     */
    public static function negative($value, $message = 'Provided value must be a negative value.')
    {
    }

    /**
     * @param mixed  $value
     * @param string $message
     *
     * @return void
     * @throws AssertionFailedException
     */
    public static function negativeOrZero($value, $message = 'Provided value must be a negative value or zero')
    {
    }

    /**
     * @param mixed  $value
     * @param string $message
     *
     * @return void
     * @throws AssertionFailedException
     */
    public static function between($value, $message = 'Provided value must be between :min and :max.')
    {
    }

    /**
     * @param mixed  $value
     * @param string $message
     */
    public static function odd($value, $message = 'Provided value must be divisible by 3.')
    {
    }

    /**
     * @param mixed  $value
     * @param string $message
     *
     * @return void
     * @throws AssertionFailedException
     */
    public static function even($value, $message = 'Provided value must be divisible by 2.')
    {
    }

    /**
     * @param mixed  $value
     * @param string $message
     *
     * @return void
     * @throws AssertionFailedException
     */
    public static function multiple($value, $message = 'Provided value must be multiple of :size.')
    {
    }

    /**
     * @param mixed  $value
     * @param string $message
     *
     * @return void
     * @throws AssertionFailedException
     */
    public static function alphanumeric($value, $message = 'Provided value must only contain letters and digits.')
    {
    }

    /**
     * @param mixed  $value
     * @param string $message
     *
     * @return void
     * @throws AssertionFailedException
     */
    public static function alpha($value, $message = 'Provided value must only contain letters.')
    {
    }


    /**
     * @param mixed  $value
     * @param string $message
     *
     * @return void
     * @throws AssertionFailedException
     */
    public static function charset($value, $message = 'Provided value charset is not valid.')
    {
    }

    /**
     * @param mixed  $value
     * @param string $message
     *
     * @return void
     * @throws AssertionFailedException
     */
    public static function allConsonants($value, $message = 'Provided value must only have consonants.')
    {
    }

    /**
     * @param mixed  $value
     * @param string $message
     *
     * @return void
     * @throws AssertionFailedException
     */
    public static function contains($value, $message = '')
    {
    }

    /**
     * @param mixed  $value
     * @param string $message
     *
     * @return void
     * @throws AssertionFailedException
     */
    public static function controlCharacters($value, $message = '')
    {
    }

    /**
     * @param mixed  $value
     * @param string $message
     *
     * @return void
     * @throws AssertionFailedException
     */
    public static function digit($value, $message = '')
    {
    }

    /**
     * @param mixed  $value
     * @param string $message
     *
     * @return void
     * @throws AssertionFailedException
     */
    public static function endsWith($value, $message = '')
    {
    }

    /**
     * @param mixed  $value
     * @param string $message
     *
     * @return void
     * @throws AssertionFailedException
     */
    public static function equals($value, $message = '')
    {
    }

    /**
     * @param mixed  $value
     * @param string $message
     *
     * @return void
     * @throws AssertionFailedException
     */
    public static function in($value, $message = '')
    {
    }

    /**
     * @param mixed  $value
     * @param string $message
     *
     * @return void
     * @throws AssertionFailedException
     */
    public static function graphicalCharsOnly($value, $message = '')
    {
    }

    /**
     * @param mixed  $value
     * @param string $message
     *
     * @return void
     * @throws AssertionFailedException
     */
    public static function length($value, $message = '')
    {
    }

    /**
     * @param mixed  $value
     * @param string $message
     *
     * @return void
     * @throws AssertionFailedException
     */
    public static function lowercase($value, $message = '')
    {
    }

    /**
     * @param mixed  $value
     * @param string $message
     *
     * @return void
     * @throws AssertionFailedException
     */
    public static function notEmpty($value, $message = '')
    {
    }

    /**
     * @param mixed  $value
     * @param string $message
     *
     * @return void
     * @throws AssertionFailedException
     */
    public static function noWhitespace($value, $message = '')
    {
    }

    /**
     * @param mixed  $value
     * @param string $message
     *
     * @return void
     * @throws AssertionFailedException
     */
    public static function printableCharsOnly($value, $message = '')
    {
    }

    /**
     * @param mixed  $value
     * @param string $message
     *
     * @return void
     * @throws AssertionFailedException
     */
    public static function punctuation($value, $message = '')
    {
    }

    /**
     * @param mixed  $value
     * @param string $message
     *
     * @return void
     * @throws AssertionFailedException
     */
    public static function matchesRegex($value, $message = '')
    {
    }

    /**
     * @param mixed  $value
     * @param string $message
     *
     * @return void
     * @throws AssertionFailedException
     */
    public static function slug($value, $message = '')
    {
    }

    /**
     * @param mixed  $value
     * @param string $message
     *
     * @return void
     * @throws AssertionFailedException
     */
    public static function space($value, $message = '')
    {
    }

    /**
     * @param mixed  $value
     * @param string $message
     *
     * @return void
     * @throws AssertionFailedException
     */
    public static function startsWith($value, $message = '')
    {
    }

    /**
     * @param mixed  $value
     * @param string $message
     *
     * @return void
     * @throws AssertionFailedException
     */
    public static function uppercase($value, $message = '')
    {
    }

    /**
     * @param mixed  $value
     * @param string $message
     *
     * @return void
     * @throws AssertionFailedException
     */
    public static function version($value, $message = '')
    {
    }

    /**
     * @param mixed  $value
     * @param string $message
     *
     * @return void
     * @throws AssertionFailedException
     */
    public static function vowel($value, $message = '')
    {
    }

    /**
     * @param mixed  $value
     * @param string $message
     *
     * @return void
     * @throws AssertionFailedException
     */
    public static function hexDigit($value, $message = '')
    {
    }


    /**
     * @param mixed  $value
     * @param string $message
     *
     * @return void
     * @throws AssertionFailedException
     */
    public static function numeric($value, $message = '')
    {
    }

    /**
     * @param mixed  $value
     * @param string $message
     *
     * @return void
     * @throws AssertionFailedException
     */
    public static function specialCharacters($value, $message = '')
    {
    }

    /**
     * @param mixed  $value
     * @param string $message
     *
     * @return void
     * @throws AssertionFailedException
     */
    public static function email($value, $message = '')
    {
    }

    /**
     * @param mixed  $value
     * @param string $message
     *
     * @return void
     * @throws AssertionFailedException
     */
    public static function url($value, $message = '')
    {
    }

    /**
     * @param mixed  $value
     * @param string $message
     *
     * @return void
     * @throws AssertionFailedException
     */
    public static function uuid($value, $message = 'Provided value is not a valid UUID.')
    {
        if (false === StringTrait::isString($value) || false === StringTrait::isUUID($value)) {
            throw new AssertionFailedException($message);
        }
    }


    /**
     * @param mixed  $class
     * @param        $value
     * @param string $message
     *
     * @throws AssertionFailedException
     * @return void
     */
    public static function property($class, $value, $message = 'Provided value property :property is not valid.')
    {
        if (false === ObjectTrait::isObject($class) || false === ObjectTrait::hasProperty($class, $value)) {
            throw new AssertionFailedException($message);
        }
    }

    /**
     * @param        $class
     * @param mixed  $value
     * @param string $message
     *
     * @throws AssertionFailedException
     * @return void
     */
    public static function method($class, $value, $message = 'Provided value method :method is not valid.')
    {
        if (false === ObjectTrait::isObject($class) || false === ObjectTrait::hasMethod($class, $value)) {
            throw new AssertionFailedException($message);
        }
    }

    /**
     * @param        $class
     * @param string $message
     *
     * @throws AssertionFailedException
     * @return void
     */
    public static function parentClass($class, $message = 'Provided value has no parent class :object.')
    {
        if (false === ObjectTrait::isObject($class) || false === ObjectTrait::hasParentClass($class)) {
            throw new AssertionFailedException($message);
        }
    }

    /**
     * @param        $class
     * @param        $parent
     * @param string $message
     *
     * @throws AssertionFailedException
     * @return void
     */
    public static function childOf($class, $parent, $message = 'Provided value is not child of class :object.')
    {
        if (false === ObjectTrait::isObject($class) || false === ObjectTrait::isChildOf($class, $parent)) {
            throw new AssertionFailedException($message);
        }
    }

    /**
     * @param mixed  $value
     * @param string $message
     *
     * @return void
     * @throws AssertionFailedException
     */
    public static function inheritsFrom($value, $message = 'Provided value does not inherit from class :object.')
    {
    }

    /**
     * @param mixed  $value
     * @param string $message
     *
     * @return void
     * @throws AssertionFailedException
     */
    public static function implementsInterface(
        $value,
        $message = 'Provided value does not implement interface :object.'
    ) {
    }


    /**
     * @param mixed  $value
     * @param string $message
     *
     * @return void
     * @throws AssertionFailedException
     */
    public static function dayAfter($value, $message = 'Provided value date must be a after :date.')
    {
    }

    /**
     * @param mixed  $value
     * @param string $message
     *
     * @return void
     * @throws AssertionFailedException
     */
    public static function dayBefore($value, $message = 'Provided value date must be a before :date.')
    {
    }

    /**
     * @param mixed  $value
     * @param string $message
     *
     * @return void
     * @throws AssertionFailedException
     */
    public static function weekend($value, $message = 'Provided value date is not a weekend day.')
    {
    }

    /**
     * @param mixed  $value
     * @param string $message
     *
     * @return void
     * @throws AssertionFailedException
     */
    public static function weekday($value, $message = 'Provided value date is not a weekday.')
    {
    }

    /**
     * @param mixed  $value
     * @param string $message
     *
     * @return void
     * @throws AssertionFailedException
     */
    public static function monday($value, $message = 'Provided value date is not Monday.')
    {
    }

    /**
     * @param mixed  $value
     * @param string $message
     *
     * @return void
     * @throws AssertionFailedException
     */
    public static function tuesday($value, $message = 'Provided value date is not Tuesday.')
    {
    }

    /**
     * @param mixed  $value
     * @param string $message
     *
     * @return void
     * @throws AssertionFailedException
     */
    public static function wednesday($value, $message = 'Provided value date is not Wednesday.')
    {
    }

    /**
     * @param mixed  $value
     * @param string $message
     *
     * @return void
     * @throws AssertionFailedException
     */
    public static function thursday($value, $message = 'Provided value date is not Thursday.')
    {
    }

    /**
     * @param mixed  $value
     * @param string $message
     *
     * @return void
     * @throws AssertionFailedException
     */
    public static function friday($value, $message = 'Provided value date is not Friday.')
    {
    }

    /**
     * @param mixed  $value
     * @param string $message
     *
     * @return void
     * @throws AssertionFailedException
     */
    public static function saturday($value, $message = 'Provided value date is not Saturday.')
    {
    }

    /**
     * @param mixed  $value
     * @param string $message
     *
     * @return void
     * @throws AssertionFailedException
     */
    public static function sunday($value, $message = 'Provided value date is not Sunday.')
    {
    }

    /**
     * @param mixed  $value
     * @param string $message
     *
     * @return void
     * @throws AssertionFailedException
     */
    public static function today($value, $message = 'Provided value date is not today.')
    {
    }

    /**
     * @param mixed  $value
     * @param string $message
     *
     * @return void
     * @throws AssertionFailedException
     */
    public static function yesterday($value, $message = 'Provided value date is not yesterday.')
    {
    }

    /**
     * @param mixed  $value
     * @param string $message
     *
     * @return void
     * @throws AssertionFailedException
     */
    public static function tomorrow($value, $message = 'Provided value date is not tomorrow.')
    {
    }

    /**
     * @param mixed  $value
     * @param string $message
     *
     * @return void
     * @throws AssertionFailedException
     */
    public static function leapYear($value, $message = 'Provided value must be a valid leap year.')
    {
    }

    /**
     * @param mixed  $value
     * @param string $message
     *
     * @return void
     * @throws AssertionFailedException
     */
    public static function morning($value, $message = 'Provided value is not morning.')
    {
    }

    /**
     * @param mixed  $value
     * @param string $message
     *
     * @return void
     * @throws AssertionFailedException
     */
    public static function aftenoon($value, $message = 'Provided value is not afternoon.')
    {
    }

    /**
     * @param mixed  $value
     * @param string $message
     *
     * @return void
     * @throws AssertionFailedException
     */
    public static function evening($value, $message = 'Provided value is not evening.')
    {
    }

    /**
     * @param mixed  $value
     * @param string $message
     *
     * @return void
     * @throws AssertionFailedException
     */
    public static function night($value, $message = 'Provided value is not night.')
    {
    }

    /**
     * @param mixed  $value
     * @param string $message
     *
     * @return void
     * @throws AssertionFailedException
     */
    public static function keyFormat($value, $message = 'Provided value key format is not valid.')
    {
    }


    /**
     * @param mixed  $value
     * @param string $message
     *
     * @return void
     * @throws AssertionFailedException
     */
    public static function containsKey($value, $message = 'Provided value has no :key.')
    {
    }


    /**
     * @param mixed  $value
     * @param string $message
     *
     * @return void
     * @throws AssertionFailedException
     */
    public static function mimeType($value, $message = 'Provided value is not a valid file format.')
    {
    }

    /**
     * @param mixed  $value
     * @param string $message
     *
     * @return void
     * @throws AssertionFailedException
     */
    public static function fileNameFormat($value, $message = 'Provided value format is not valid.')
    {
    }

    /**
     * @param mixed  $value
     * @param string $message
     *
     * @return void
     * @throws AssertionFailedException
     */
    public static function validUploadDirectory($value, $message = 'Provided upload value directory is not valid.')
    {
    }

    /**
     * @param mixed  $value
     * @param string $message
     *
     * @return void
     * @throws AssertionFailedException
     */
    public static function notOverwritingExistingFile(
        $value,
        $message = 'Provided upload value will overwrite an existing file.'
    ) {
    }

    /**
     * @param mixed  $value
     * @param string $message
     *
     * @return void
     * @throws AssertionFailedException
     */
    public static function image($value, $message = 'Provided value must be a valid image file.')
    {
    }
}
