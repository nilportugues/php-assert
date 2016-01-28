<?php

/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 6/30/15
 * Time: 10:39 PM.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace NilPortugues\Assert;

use Exception;
use NilPortugues\Assert\Exceptions\AssertionException;
use RuntimeException;

/**
 * METHODSTART.
 *
 * @method static void contains($value, $contains, $identical = false, $message = '')
 * @method static void each($value, callable $valueValidator, callable $keyValidator = null, $message = '')
 * @method static void endsWith($value, $contains, $identical = false, $message = '')
 * @method static void equals($value, $comparedValue, $identical = false, $message = '')
 * @method static void greaterThan($property, $value, $message = '')
 * @method static void greaterThanOrEqual($property, $value, $message = '')
 * @method static void hasGraphicalCharsOnly($value, $message = '')
 * @method static void hasInterface($value, $interface, $message = '')
 * @method static void hasKey($value, $keyName, $message = '')
 * @method static void hasKeyFormat($value, callable $keyValidator, $message = '')
 * @method static void hasLength($value, $length, $message = '')
 * @method static void hasLowercase($value, $amount = null, $message = '')
 * @method static void hasMethod($value, $method, $message = '')
 * @method static void hasNumeric($value, $amount = null, $message = '')
 * @method static void hasParentClass($value, $message = '')
 * @method static void hasPrintableCharsOnly($value, $message = '')
 * @method static void hasProperty($value, $property, $message = '')
 * @method static void hasSpecialCharacters($value, $amount = null, $message = '')
 * @method static void hasUppercase($value, $amount = null, $message = '')
 * @method static void hasValidUploadDirectory($uploadName, $uploadDir, $message = '')
 * @method static void in($value, $haystack, $identical = false, $message = '')
 * @method static void inheritsFrom($value, $inheritsClass, $message = '')
 * @method static void isAfter($value, $limit, $inclusive = false, $message = '')
 * @method static void isAfternoon($value, $message = '')
 * @method static void isAllConsonants($value, $message = '')
 * @method static void isAlpha($value, $message = '')
 * @method static void isAlphanumeric($value, $message = '')
 * @method static void isArray($value, $message = '')
 * @method static void isBefore($value, $limit, $inclusive = false, $message = '')
 * @method static void isBetween($value, $min, $max, $inclusive = false, $message = '')
 * @method static void isBetweenFileSize($uploadName, $minSize, $maxSize, $format = 'B', $inclusive = false, $message = '')
 * @method static void isCharset($value, $charset, $message = '')
 * @method static void isChildOf($value, $parentClass, $message = '')
 * @method static void isControlCharacters($value, $message = '')
 * @method static void isDateTime($value, $message = '')
 * @method static void isDigit($value, $message = '')
 * @method static void isEmail($value, $message = '')
 * @method static void isEven($value, $message = '')
 * @method static void isEvening($value, $message = '')
 * @method static void isFloat($value, $message = '')
 * @method static void isFriday($value, $message = '')
 * @method static void isHexDigit($value, $message = '')
 * @method static void isImage($uploadName, $message = '')
 * @method static void isInstanceOf($value, $instanceOf, $message = '')
 * @method static void isInteger($value, $message = '')
 * @method static void isLeapYear($value, $message = '')
 * @method static void isLowercase($value, $message = '')
 * @method static void isMimeType($uploadName, array $allowedTypes, $message = '')
 * @method static void isMonday($value, $message = '')
 * @method static void isMorning($value, $message = '')
 * @method static void isMultiple($value, $multiple, $message = '')
 * @method static void isNegative($value, $message = '')
 * @method static void isNegativeOrZero($value, $message = '')
 * @method static void isNight($value, $message = '')
 * @method static void isNotEmpty($value, $message = '')
 * @method static void isNotNull($value, $message = '')
 * @method static void isNotZero($value, $message = '')
 * @method static void isObject($value, $message = '')
 * @method static void isOdd($value, $message = '')
 * @method static void isPositive($value, $message = '')
 * @method static void isPositiveOrZero($value, $message = '')
 * @method static void isPunctuation($value, $message = '')
 * @method static void isRequired($value, $message = '')
 * @method static void isSaturday($value, $message = '')
 * @method static void isSlug($value, $message = '')
 * @method static void isSpace($value, $message = '')
 * @method static void isString($value, $message = '')
 * @method static void isSunday($value, $message = '')
 * @method static void isThursday($value, $message = '')
 * @method static void isToday($value, $message = '')
 * @method static void isTomorrow($value, $message = '')
 * @method static void isTuesday($value, $message = '')
 * @method static void isUploaded($uploadName, $message = '')
 * @method static void isUppercase($value, $message = '')
 * @method static void isUrl($value, $message = '')
 * @method static void isUUID($value, $strict = true, $message = '')
 * @method static void isVersion($value, $message = '')
 * @method static void isVowel($value, $message = '')
 * @method static void isWednesday($value, $message = '')
 * @method static void isWeekday($value, $message = '')
 * @method static void isWeekend($value, $message = '')
 * @method static void isYesterday($value, $message = '')
 * @method static void lessThan($property, $value, $message = '')
 * @method static void lessThanOrEqual($property, $value, $message = '')
 * @method static void matchesRegex($value, $regex, $message = '')
 * @method static void notEmpty($value, $message = '')
 * @method static void notEquals($property, $value, $message = '')
 * @method static void notOverwritingExistingFile($uploadName, $uploadDir, $message = '')
 * @method static void noWhitespace($value, $message = '')
 * @method static void nullOrAfter($value, $limit, $inclusive = false, $message = '')
 * @method static void nullOrAfternoon($value, $message = '')
 * @method static void nullOrAllConsonants($value, $message = '')
 * @method static void nullOrAlpha($value, $message = '')
 * @method static void nullOrAlphanumeric($value, $message = '')
 * @method static void nullOrBefore($value, $limit, $inclusive = false, $message = '')
 * @method static void nullOrBetween($value, $min, $max, $inclusive = false, $message = '')
 * @method static void nullOrCharset($value, $charset, $message = '')
 * @method static void nullOrChildOf($value, $parentClass, $message = '')
 * @method static void nullOrContains($value, $contains, $identical = false, $message = '')
 * @method static void nullOrControlCharacters($value, $message = '')
 * @method static void nullOrDateTime($value, $message = '')
 * @method static void nullOrDigit($value, $message = '')
 * @method static void nullOrEmail($value, $message = '')
 * @method static void nullOrEndsWith($value, $contains, $identical = false, $message = '')
 * @method static void nullOrEquals($value, $comparedValue, $identical = false, $message = '')
 * @method static void nullOrEven($value, $message = '')
 * @method static void nullOrEvening($value, $message = '')
 * @method static void nullOrFloat($value, $message = '')
 * @method static void nullOrFriday($value, $message = '')
 * @method static void nullOrGreaterThan($property, $value, $message = '')
 * @method static void nullOrGreaterThanOrEqual($property, $value, $message = '')
 * @method static void nullOrHasGraphicalCharsOnly($value, $message = '')
 * @method static void nullOrHasInterface($value, $interface, $message = '')
 * @method static void nullOrHasLength($value, $length, $message = '')
 * @method static void nullOrHasLowercase($value, $amount = null, $message = '')
 * @method static void nullOrHasMethod($value, $method, $message = '')
 * @method static void nullOrHasNumeric($value, $amount = null, $message = '')
 * @method static void nullOrHasParentClass($value, $message = '')
 * @method static void nullOrHasPrintableCharsOnly($value, $message = '')
 * @method static void nullOrHasProperty($value, $property, $message = '')
 * @method static void nullOrHasSpecialCharacters($value, $amount = null, $message = '')
 * @method static void nullOrHasUppercase($value, $amount = null, $message = '')
 * @method static void nullOrHexDigit($value, $message = '')
 * @method static void nullOrIn($value, $haystack, $identical = false, $message = '')
 * @method static void nullOrInheritsFrom($value, $inheritsClass, $message = '')
 * @method static void nullOrInstanceOf($value, $instanceOf, $message = '')
 * @method static void nullOrInteger($value, $message = '')
 * @method static void nullOrLeapYear($value, $message = '')
 * @method static void nullOrLessThan($property, $value, $message = '')
 * @method static void nullOrLessThanOrEqual($property, $value, $message = '')
 * @method static void nullOrLowercase($value, $message = '')
 * @method static void nullOrMatchesRegex($value, $regex, $message = '')
 * @method static void nullOrMonday($value, $message = '')
 * @method static void nullOrMorning($value, $message = '')
 * @method static void nullOrMultiple($value, $multiple, $message = '')
 * @method static void nullOrNegative($value, $message = '')
 * @method static void nullOrNegativeOrZero($value, $message = '')
 * @method static void nullOrNight($value, $message = '')
 * @method static void nullOrNotEmpty($value, $message = '')
 * @method static void nullOrNotEquals($property, $value, $message = '')
 * @method static void nullOrNotZero($value, $message = '')
 * @method static void nullOrNoWhitespace($value, $message = '')
 * @method static void nullOrObject($value, $message = '')
 * @method static void nullOrOdd($value, $message = '')
 * @method static void nullOrPositive($value, $message = '')
 * @method static void nullOrPositiveOrZero($value, $message = '')
 * @method static void nullOrPunctuation($value, $message = '')
 * @method static void nullOrSaturday($value, $message = '')
 * @method static void nullOrSlug($value, $message = '')
 * @method static void nullOrSpace($value, $message = '')
 * @method static void nullOrStartsWith($value, $contains, $identical = false, $message = '')
 * @method static void nullOrString($value, $message = '')
 * @method static void nullOrSunday($value, $message = '')
 * @method static void nullOrThursday($value, $message = '')
 * @method static void nullOrToday($value, $message = '')
 * @method static void nullOrTomorrow($value, $message = '')
 * @method static void nullOrTuesday($value, $message = '')
 * @method static void nullOrUppercase($value, $message = '')
 * @method static void nullOrUrl($value, $message = '')
 * @method static void nullOrUUID($value, $strict = true, $message = '')
 * @method static void nullOrVersion($value, $message = '')
 * @method static void nullOrVowel($value, $message = '')
 * @method static void nullOrWednesday($value, $message = '')
 * @method static void nullOrWeekday($value, $message = '')
 * @method static void nullOrWeekend($value, $message = '')
 * @method static void nullOrYesterday($value, $message = '')
 * @method static void startsWith($value, $contains, $identical = false, $message = '')
 *
 * METHODEND
 */
class Assert
{
    /**
     * @var array
     */
    private static $classMap = [
        'Collection' => '\NilPortugues\Assert\Assertions\CollectionAssertions',
        'String' => '\NilPortugues\Assert\Assertions\StringAssertions',
        'Object' => '\NilPortugues\Assert\Assertions\ObjectAssertions',
        'Integer' => '\NilPortugues\Assert\Assertions\IntegerAssertions',
        'Float' => '\NilPortugues\Assert\Assertions\FloatAssertions',
        'DateTime' => '\NilPortugues\Assert\Assertions\DateTimeAssertions',
        'FileUpload' => '\NilPortugues\Assert\Assertions\FileUploadAssertions',
        'Generic' => '\NilPortugues\Assert\Assertions\GenericAssertions',
    ];

    /**
     * @var array
     */
    private static $methods = [
        'isRequired' => ['Generic'],
        'isNotNull' => ['Generic'],
        'notEquals' => ['Generic'],
        'greaterThanOrEqual' => ['Generic'],
        'greaterThan' => ['Generic'],
        'lessThanOrEqual' => ['Generic'],
        'lessThan' => ['Generic'],
        'isString' => ['String'],
        'isAlphanumeric' => ['String'],
        'isAlpha' => ['String'],
        'isBetween' => ['String', 'Integer', 'Float', 'DateTime'],
        'isCharset' => ['String'],
        'isAllConsonants' => ['String'],
        'contains' => ['String', 'Collection'],
        'isControlCharacters' => ['String'],
        'isDigit' => ['String'],
        'endsWith' => ['String', 'Collection'],
        'equals' => ['String'],
        'in' => ['String'],
        'hasGraphicalCharsOnly' => ['String'],
        'hasLength' => ['String', 'FileUpload', 'Collection'],
        'isLowercase' => ['String'],
        'notEmpty' => ['String'],
        'noWhitespace' => ['String'],
        'hasPrintableCharsOnly' => ['String'],
        'isPunctuation' => ['String'],
        'matchesRegex' => ['String'],
        'isSlug' => ['String'],
        'isSpace' => ['String'],
        'startsWith' => ['String', 'Collection'],
        'isUppercase' => ['String'],
        'isVersion' => ['String'],
        'isVowel' => ['String'],
        'isHexDigit' => ['String'],
        'hasLowercase' => ['String'],
        'hasUppercase' => ['String'],
        'hasNumeric' => ['String'],
        'hasSpecialCharacters' => ['String'],
        'isEmail' => ['String'],
        'isUrl' => ['String'],
        'isUUID' => ['String'],
        'isObject' => ['Object'],
        'isInstanceOf' => ['Object'],
        'hasProperty' => ['Object'],
        'hasMethod' => ['Object'],
        'hasParentClass' => ['Object'],
        'isChildOf' => ['Object'],
        'inheritsFrom' => ['Object'],
        'hasInterface' => ['Object'],
        'isInteger' => ['Integer'],
        'isFloat' => ['Float'],
        'isNotZero' => ['Integer', 'Float'],
        'isPositiveOrZero' => ['Integer', 'Float'],
        'isPositive' => ['Integer', 'Float'],
        'isNegativeOrZero' => ['Integer', 'Float'],
        'isNegative' => ['Integer', 'Float'],
        'isOdd' => ['Integer', 'Float'],
        'isEven' => ['Integer', 'Float'],
        'isMultiple' => ['Integer', 'Float'],
        'isUploaded' => ['FileUpload'],
        'isBetweenFileSize' => ['FileUpload'],
        'isMimeType' => ['FileUpload'],
        'hasFileNameFormat' => ['FileUpload'],
        'hasValidUploadDirectory' => ['FileUpload'],
        'notOverwritingExistingFile' => ['FileUpload'],
        'isImage' => ['FileUpload'],
        'isDateTime' => ['DateTime'],
        'isAfter' => ['DateTime'],
        'isBefore' => ['DateTime'],
        'isWeekend' => ['DateTime'],
        'isWeekday' => ['DateTime'],
        'isMonday' => ['DateTime'],
        'isTuesday' => ['DateTime'],
        'isWednesday' => ['DateTime'],
        'isThursday' => ['DateTime'],
        'isFriday' => ['DateTime'],
        'isSaturday' => ['DateTime'],
        'isSunday' => ['DateTime'],
        'isToday' => ['DateTime'],
        'isYesterday' => ['DateTime'],
        'isTomorrow' => ['DateTime'],
        'isLeapYear' => ['DateTime'],
        'isMorning' => ['DateTime'],
        'isAfternoon' => ['DateTime'],
        'isEvening' => ['DateTime'],
        'isNight' => ['DateTime'],
        'isArray' => ['Collection'],
        'each' => ['Collection'],
        'hasKeyFormat' => ['Collection'],
        'hasKey' => ['Collection'],
        'isNotEmpty' => ['Collection'],
    ];

    /**
     * @param $method
     * @param $args
     *
     * @throws Exception
     */
    public static function __callStatic($method, $args)
    {
        if (empty(self::$methods[$method])) {
            throw new RuntimeException(sprintf('Method %s does not exist.', $method));
        }

        $error = false;
        $message = '';

        foreach (self::$methods[$method] as $className) {
            try {
                call_user_func_array(self::$classMap[$className].'::'.$method, $args);
            } catch (AssertionException $e) {
                $error = true;
                $message = $e->getMessage();
            }
        }

        if ($error) {
            throw new Exception($message);
        }
    }
}
