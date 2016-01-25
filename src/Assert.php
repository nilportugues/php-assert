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

/**
 * METHODSTART.
 *
 * @method static void isString($value)
 * @method static void isAlphanumeric($value)
 * @method static void isAlpha($value)
 * @method static void isBetween($value, $min, $max, $inclusive = false)
 * @method static void isCharset($value, $charset)
 * @method static void isAllConsonants($value)
 * @method static void contains($value, $contains, $identical = false)
 * @method static void isControlCharacters($value)
 * @method static void isDigit($value)
 * @method static void endsWith($value, $contains, $identical = false)
 * @method static void equals($value, $comparedValue, $identical = false)
 * @method static void in($value, $haystack, $identical = false)
 * @method static void hasGraphicalCharsOnly($value)
 * @method static void hasLength($value, $length)
 * @method static void isLowercase($value)
 * @method static void notEmpty($value)
 * @method static void noWhitespace($value)
 * @method static void hasPrintableCharsOnly($value)
 * @method static void isPunctuation($value)
 * @method static void matchesRegex($value, $regex)
 * @method static void isSlug($value)
 * @method static void isSpace($value)
 * @method static void startsWith($value, $contains, $identical = false)
 * @method static void isUppercase($value)
 * @method static void isVersion($value)
 * @method static void isVowel($value)
 * @method static void isHexDigit($value)
 * @method static void hasLowercase($value, $amount = null)
 * @method static void hasUppercase($value, $amount = null)
 * @method static void hasNumeric($value, $amount = null)
 * @method static void hasSpecialCharacters($value, $amount = null)
 * @method static void isEmail($value)
 * @method static void isUrl($value)
 * @method static void isUUID($value, $strict = true)
 * @method static void nullOrString($value)
 * @method static void nullOrAlphanumeric($value)
 * @method static void nullOrAlpha($value)
 * @method static void nullOrBetween($value, $min, $max, $inclusive = false)
 * @method static void nullOrCharset($value, $charset)
 * @method static void nullOrAllConsonants($value)
 * @method static void nullOrContains($value, $contains, $identical = false)
 * @method static void nullOrControlCharacters($value)
 * @method static void nullOrDigit($value)
 * @method static void nullOrEndsWith($value, $contains, $identical = false)
 * @method static void nullOrEquals($value, $comparedValue, $identical = false)
 * @method static void nullOrIn($value, $haystack, $identical = false)
 * @method static void nullOrHasGraphicalCharsOnly($value)
 * @method static void nullOrHasLength($value, $length)
 * @method static void nullOrLowercase($value)
 * @method static void nullOrNotEmpty($value)
 * @method static void nullOrNoWhitespace($value)
 * @method static void nullOrHasPrintableCharsOnly($value)
 * @method static void nullOrPunctuation($value)
 * @method static void nullOrMatchesRegex($value, $regex)
 * @method static void nullOrSlug($value)
 * @method static void nullOrSpace($value)
 * @method static void nullOrStartsWith($value, $contains, $identical = false)
 * @method static void nullOrUppercase($value)
 * @method static void nullOrVersion($value)
 * @method static void nullOrVowel($value)
 * @method static void nullOrHexDigit($value)
 * @method static void nullOrHasLowercase($value, $amount = null)
 * @method static void nullOrHasUppercase($value, $amount = null)
 * @method static void nullOrHasNumeric($value, $amount = null)
 * @method static void nullOrHasSpecialCharacters($value, $amount = null)
 * @method static void nullOrEmail($value)
 * @method static void nullOrUrl($value)
 * @method static void nullOrUUID($value, $strict = true)
 * @method static void isObject($value)
 * @method static void isInstanceOf($value, $instanceOf)
 * @method static void hasProperty($value, $property)
 * @method static void hasMethod($value, $method)
 * @method static void hasParentClass($value)
 * @method static void isChildOf($value, $parentClass)
 * @method static void inheritsFrom($value, $inheritsClass)
 * @method static void hasInterface($value, $interface)
 * @method static void nullOrObject($value)
 * @method static void nullOrInstanceOf($value, $instanceOf)
 * @method static void nullOrHasProperty($value, $property)
 * @method static void nullOrHasMethod($value, $method)
 * @method static void nullOrHasParentClass($value)
 * @method static void nullOrChildOf($value, $parentClass)
 * @method static void nullOrInheritsFrom($value, $inheritsClass)
 * @method static void nullOrHasInterface($value, $interface)
 * @method static void isInteger($value)
 * @method static void isNotZero($value)
 * @method static void isPositiveOrZero($value)
 * @method static void isPositive($value)
 * @method static void isNegativeOrZero($value)
 * @method static void isNegative($value)
 * @method static void isOdd($value)
 * @method static void isEven($value)
 * @method static void isMultiple($value, $multiple)
 * @method static void nullOrInteger($value)
 * @method static void nullOrNotZero($value)
 * @method static void nullOrPositiveOrZero($value)
 * @method static void nullOrPositive($value)
 * @method static void nullOrNegativeOrZero($value)
 * @method static void nullOrNegative($value)
 * @method static void nullOrOdd($value)
 * @method static void nullOrEven($value)
 * @method static void nullOrMultiple($value, $multiple)
 * @method static void isRequired($value)
 * @method static void isNotNull($value)
 * @method static void isFloat($value)
 * @method static void nullOrFloat($value)
 * @method static void isUploaded($uploadName)
 * @method static void isBetweenFileSize($uploadName, $minSize, $maxSize, $format = 'B', $inclusive = false)
 * @method static void isMimeType($uploadName, array $allowedTypes)
 * @method static void hasValidUploadDirectory($uploadName, $uploadDir)
 * @method static void notOverwritingExistingFile($uploadName, $uploadDir)
 * @method static void isImage($uploadName)
 * @method static void isDateTime($value)
 * @method static void isAfter($value, $limit, $inclusive = false)
 * @method static void isBefore($value, $limit, $inclusive = false)
 * @method static void isWeekend($value)
 * @method static void isWeekday($value)
 * @method static void isMonday($value)
 * @method static void isTuesday($value)
 * @method static void isWednesday($value)
 * @method static void isThursday($value)
 * @method static void isFriday($value)
 * @method static void isSaturday($value)
 * @method static void isSunday($value)
 * @method static void isToday($value)
 * @method static void isYesterday($value)
 * @method static void isTomorrow($value)
 * @method static void isLeapYear($value)
 * @method static void isMorning($value)
 * @method static void isAfternoon($value)
 * @method static void isEvening($value)
 * @method static void isNight($value)
 * @method static void nullOrDateTime($value)
 * @method static void nullOrAfter($value, $limit, $inclusive = false)
 * @method static void nullOrBefore($value, $limit, $inclusive = false)
 * @method static void nullOrWeekend($value)
 * @method static void nullOrWeekday($value)
 * @method static void nullOrMonday($value)
 * @method static void nullOrTuesday($value)
 * @method static void nullOrWednesday($value)
 * @method static void nullOrThursday($value)
 * @method static void nullOrFriday($value)
 * @method static void nullOrSaturday($value)
 * @method static void nullOrSunday($value)
 * @method static void nullOrToday($value)
 * @method static void nullOrYesterday($value)
 * @method static void nullOrTomorrow($value)
 * @method static void nullOrLeapYear($value)
 * @method static void nullOrMorning($value)
 * @method static void nullOrAftenoon($value)
 * @method static void nullOrEvening($value)
 * @method static void nullOrNight($value)
 * @method static void isArray($value)
 * @method static void each($value, callable $valueValidator, callable $keyValidator = null)
 * @method static void hasKeyFormat($value, callable $keyValidator)
 * @method static void hasKey($value, $keyName)
 * @method static void isNotEmpty($value)
 *
 * METHODEND
 */
class Assert
{
    /**
     * @var array
     */
    private static $classMap = [
        'String' => '\NilPortugues\Assertions\StringAssertions',
        'Object' => '\NilPortugues\Assertions\ObjectAssertions',
        'Integer' => '\NilPortugues\Assertions\IntegerAssertions',
        'Float' => '\NilPortugues\Assertions\FloatAssertions',
        'DateTime' => '\NilPortugues\Assertions\DateTimeAssertions',
        'FileUpload' => '\NilPortugues\Assertions\FileUploadAssertions',
        'Generic' => '\NilPortugues\Assertions\GenericAssertions',
    ];

    /**
     * @var array
     */
    private static $methods = [
        'Generic' => [
            'isRequired',
            'isNotNull',
        ],
        'String' => [
            'isString',
            'isAlphanumeric',
            'isAlpha',
            'isBetween',
            'isCharset',
            'isAllConsonants',
            'contains',
            'isControlCharacters',
            'isDigit',
            'endsWith',
            'equals',
            'in',
            'hasGraphicalCharsOnly',
            'hasLength',
            'isLowercase',
            'notEmpty',
            'noWhitespace',
            'hasPrintableCharsOnly',
            'isPunctuation',
            'matchesRegex',
            'isSlug',
            'isSpace',
            'startsWith',
            'isUppercase',
            'isVersion',
            'isVowel',
            'isHexDigit',
            'hasLowercase',
            'hasUppercase',
            'hasNumeric',
            'hasSpecialCharacters',
            'isEmail',
            'isUrl',
            'isUUID',
        ],
        'Object' => [
            'isObject',
            'isInstanceOf',
            'hasProperty',
            'hasMethod',
            'hasParentClass',
            'isChildOf',
            'inheritsFrom',
            'hasInterface',
        ],
        'Integer' => [
            'isInteger',
            'isNotZero',
            'isPositiveOrZero',
            'isPositive',
            'isNegativeOrZero',
            'isNegative',
            'isBetween',
            'isOdd',
            'isEven',
            'isMultiple',
        ],
        'Float' => [
            'isFloat',
            'isNotZero',
            'isPositiveOrZero',
            'isPositive',
            'isNegativeOrZero',
            'isNegative',
            'isBetween',
            'isOdd',
            'isEven',
            'isMultiple',
        ],
        'FileUpload' => [
            'isUploaded',
            'isBetweenFileSize',
            'isMimeType',
            'hasFileNameFormat',
            'hasValidUploadDirectory',
            'notOverwritingExistingFile',
            'hasLength',
            'isImage',
        ],
        'DateTime' => [
            'isDateTime',
            'isAfter',
            'isBefore',
            'isBetween',
            'isWeekend',
            'isWeekday',
            'isMonday',
            'isTuesday',
            'isWednesday',
            'isThursday',
            'isFriday',
            'isSaturday',
            'isSunday',
            'isToday',
            'isYesterday',
            'isTomorrow',
            'isLeapYear',
            'isMorning',
            'isAfternoon',
            'isEvening',
            'isNight',
        ],
        'Collection' => [
            'isArray',
            'each',
            'hasKeyFormat',
            'endsWith',
            'contains',
            'hasKey',
            'hasLength',
            'isNotEmpty',
            'startsWith',
        ]
    ];
}
