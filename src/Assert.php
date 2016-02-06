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
 * @method static void isArray($value, $message = '')
 * @method static void each($value, callable $valueValidator, callable $keyValidator = null, $message = '')
 * @method static void hasKeyFormat($value, callable $keyValidator, $message = '')
 * @method static void endsWith($haystack, $needle, $strict = false, $message = '')
 * @method static void contains($haystack, $needle, $strict = false, $message = '')
 * @method static void hasKey($value, $keyName, $message = '')
 * @method static void hasLength($value, $length, $message = '')
 * @method static void isNotEmpty($value, $message = '')
 * @method static void startsWith($haystack, $needle, $strict = false, $message = '')
 * @method static void isFileUploaded($uploadName, $message = '')
 * @method static void isFileUploadedBetweenFileSize($uploadName, $minSize, $maxSize, $format = 'B', $inclusive = false, $message = '')
 * @method static void hasFileUploadedFileNameFormat($uploadName, callable $assertion, $message = '')
 * @method static void hasFileUploadedValidUploadDirectory($uploadName, $uploadDir, $message = '')
 * @method static void isFileUploadedNotOverwritingExistingFile($uploadName, $uploadDir, $message = '')
 * @method static void hasFileUploadedFileNameLength($uploadName, $size, $message = '')
 * @method static void isFileUploadedImage($uploadName, $message = '')
 * @method static void isFileUploadedMimeType($uploadName, array $allowedTypes, $message = '')
 * @method static void isDateTime($value, $message = '')
 * @method static void isAfter($value, $limit, $inclusive = false, $message = '')
 * @method static void isBefore($value, $limit, $inclusive = false, $message = '')
 * @method static void isDateRange($value, $minDate, $maxDate, $inclusive = false, $message = '')
 * @method static void isWeekend($value, $message = '')
 * @method static void isWeekday($value, $message = '')
 * @method static void isMonday($value, $message = '')
 * @method static void isTuesday($value, $message = '')
 * @method static void isWednesday($value, $message = '')
 * @method static void isThursday($value, $message = '')
 * @method static void isFriday($value, $message = '')
 * @method static void isSaturday($value, $message = '')
 * @method static void isSunday($value, $message = '')
 * @method static void isToday($value, $message = '')
 * @method static void isYesterday($value, $message = '')
 * @method static void isTomorrow($value, $message = '')
 * @method static void isLeapYear($value, $message = '')
 * @method static void isMorning($value, $message = '')
 * @method static void isAfternoon($value, $message = '')
 * @method static void isEvening($value, $message = '')
 * @method static void isNight($value, $message = '')
 * @method static void isFloat($value, $message = '')
 * @method static void isNotZero($value, $message = '')
 * @method static void isPositiveOrZero($value, $message = '')
 * @method static void isPositive($value, $message = '')
 * @method static void isNegativeOrZero($value, $message = '')
 * @method static void isNegative($value, $message = '')
 * @method static void isBetween($value, $min, $max, $inclusive = false, $message = '')
 * @method static void isOdd($value, $message = '')
 * @method static void isEven($value, $message = '')
 * @method static void isMultiple($value, $multiple, $message = '')
 * @method static void isInteger($value, $message = '')
 * @method static void isObject($value, $message = '')
 * @method static void isInstanceOf($value, $instanceOf, $message = '')
 * @method static void hasProperty($value, $property, $message = '')
 * @method static void hasMethod($value, $method, $message = '')
 * @method static void hasParentClass($value, $message = '')
 * @method static void isChildOf($value, $parentClass, $message = '')
 * @method static void inheritsFrom($value, $inheritsClass, $message = '')
 * @method static void hasInterface($value, $interface, $message = '')
 * @method static void isString($value, $message = '')
 * @method static void isAlphanumeric($value, $message = '')
 * @method static void isAlpha($value, $message = '')
 * @method static void isCharset($value, $charset, $message = '')
 * @method static void isAllConsonants($value, $message = '')
 * @method static void isControlCharacters($value, $message = '')
 * @method static void isDigit($value, $message = '')
 * @method static void equals($value, $comparedValue, $identical = false, $message = '')
 * @method static void in($value, $haystack, $identical = false, $message = '')
 * @method static void hasGraphicalCharsOnly($value, $message = '')
 * @method static void isLowercase($value, $message = '')
 * @method static void notEmpty($value, $message = '')
 * @method static void noWhitespace($value, $message = '')
 * @method static void hasPrintableCharsOnly($value, $message = '')
 * @method static void isPunctuation($value, $message = '')
 * @method static void matchesRegex($value, $regex, $message = '')
 * @method static void isSlug($value, $message = '')
 * @method static void isSpace($value, $message = '')
 * @method static void isUppercase($value, $message = '')
 * @method static void isVersion($value, $message = '')
 * @method static void isVowel($value, $message = '')
 * @method static void isHexDigit($value, $message = '')
 * @method static void hasLowercase($value, $amount = null, $message = '')
 * @method static void hasUppercase($value, $amount = null, $message = '')
 * @method static void hasNumeric($value, $amount = null, $message = '')
 * @method static void hasSpecialCharacters($value, $amount = null, $message = '')
 * @method static void isEmail($value, $message = '')
 * @method static void isUrl($value, $message = '')
 * @method static void isUUID($value, $strict = true, $message = '')
 * @method static void isRequired($value, $message = '')
 * @method static void isNotNull($value, $message = '')
 * @method static void notEquals($property, $value, $message = '')
 * @method static void greaterThanOrEqual($property, $value, $message = '')
 * @method static void greaterThan($property, $value, $message = '')
 * @method static void lessThanOrEqual($property, $value, $message = '')
 * @method static void lessThan($property, $value, $message = '')
 * @method static void nullOrEach($value, callable $valueValidator, callable $keyValidator = null, $message = '')
 * @method static void nullOrHasKeyFormat($value, callable $keyValidator, $message = '')
 * @method static void nullOrEndsWith($haystack, $needle, $strict = false, $message = '')
 * @method static void nullOrContains($haystack, $needle, $strict = false, $message = '')
 * @method static void nullOrHasKey($value, $keyName, $message = '')
 * @method static void nullOrHasLength($value, $length, $message = '')
 * @method static void nullOrIsNotEmpty($value, $message = '')
 * @method static void nullOrStartsWith($haystack, $needle, $strict = false, $message = '')
 * @method static void nullOrIsFileUploaded($uploadName, $message = '')
 * @method static void nullOrIsFileUploadedBetweenFileSize($uploadName, $minSize, $maxSize, $format = 'B', $inclusive = false, $message = '')
 * @method static void nullOrHasFileUploadedFileNameFormat($uploadName, callable $assertion, $message = '')
 * @method static void nullOrHasFileUploadedValidUploadDirectory($uploadName, $uploadDir, $message = '')
 * @method static void nullOrIsFileUploadedNotOverwritingExistingFile($uploadName, $uploadDir, $message = '')
 * @method static void nullOrHasFileUploadedFileNameLength($uploadName, $size, $message = '')
 * @method static void nullOrIsFileUploadedImage($uploadName, $message = '')
 * @method static void nullOrIsFileUploadedMimeType($uploadName, array $allowedTypes, $message = '')
 * @method static void nullOrIsDateTime($value, $message = '')
 * @method static void nullOrIsAfter($value, $limit, $inclusive = false, $message = '')
 * @method static void nullOrIsBefore($value, $limit, $inclusive = false, $message = '')
 * @method static void nullOrIsDateRange($value, $minDate, $maxDate, $inclusive = false, $message = '')
 * @method static void nullOrIsWeekend($value, $message = '')
 * @method static void nullOrIsWeekday($value, $message = '')
 * @method static void nullOrIsMonday($value, $message = '')
 * @method static void nullOrIsTuesday($value, $message = '')
 * @method static void nullOrIsWednesday($value, $message = '')
 * @method static void nullOrIsThursday($value, $message = '')
 * @method static void nullOrIsFriday($value, $message = '')
 * @method static void nullOrIsSaturday($value, $message = '')
 * @method static void nullOrIsSunday($value, $message = '')
 * @method static void nullOrIsToday($value, $message = '')
 * @method static void nullOrIsYesterday($value, $message = '')
 * @method static void nullOrIsTomorrow($value, $message = '')
 * @method static void nullOrIsLeapYear($value, $message = '')
 * @method static void nullOrIsMorning($value, $message = '')
 * @method static void nullOrIsAfternoon($value, $message = '')
 * @method static void nullOrIsEvening($value, $message = '')
 * @method static void nullOrIsNight($value, $message = '')
 * @method static void nullOrIsFloat($value, $message = '')
 * @method static void nullOrIsNotZero($value, $message = '')
 * @method static void nullOrIsPositiveOrZero($value, $message = '')
 * @method static void nullOrIsPositive($value, $message = '')
 * @method static void nullOrIsNegativeOrZero($value, $message = '')
 * @method static void nullOrIsNegative($value, $message = '')
 * @method static void nullOrIsBetween($value, $min, $max, $inclusive = false, $message = '')
 * @method static void nullOrIsOdd($value, $message = '')
 * @method static void nullOrIsEven($value, $message = '')
 * @method static void nullOrIsMultiple($value, $multiple, $message = '')
 * @method static void nullOrIsInteger($value, $message = '')
 * @method static void nullOrIsObject($value, $message = '')
 * @method static void nullOrIsInstanceOf($value, $instanceOf, $message = '')
 * @method static void nullOrHasProperty($value, $property, $message = '')
 * @method static void nullOrHasMethod($value, $method, $message = '')
 * @method static void nullOrHasParentClass($value, $message = '')
 * @method static void nullOrIsChildOf($value, $parentClass, $message = '')
 * @method static void nullOrInheritsFrom($value, $inheritsClass, $message = '')
 * @method static void nullOrHasInterface($value, $interface, $message = '')
 * @method static void nullOrIsString($value, $message = '')
 * @method static void nullOrIsAlphanumeric($value, $message = '')
 * @method static void nullOrIsAlpha($value, $message = '')
 * @method static void nullOrIsCharset($value, $charset, $message = '')
 * @method static void nullOrIsAllConsonants($value, $message = '')
 * @method static void nullOrIsControlCharacters($value, $message = '')
 * @method static void nullOrIsDigit($value, $message = '')
 * @method static void nullOrEquals($value, $comparedValue, $identical = false, $message = '')
 * @method static void nullOrIn($value, $haystack, $identical = false, $message = '')
 * @method static void nullOrHasGraphicalCharsOnly($value, $message = '')
 * @method static void nullOrIsLowercase($value, $message = '')
 * @method static void nullOrNotEmpty($value, $message = '')
 * @method static void nullOrNoWhitespace($value, $message = '')
 * @method static void nullOrHasPrintableCharsOnly($value, $message = '')
 * @method static void nullOrIsPunctuation($value, $message = '')
 * @method static void nullOrMatchesRegex($value, $regex, $message = '')
 * @method static void nullOrIsSlug($value, $message = '')
 * @method static void nullOrIsSpace($value, $message = '')
 * @method static void nullOrIsUppercase($value, $message = '')
 * @method static void nullOrIsVersion($value, $message = '')
 * @method static void nullOrIsVowel($value, $message = '')
 * @method static void nullOrIsHexDigit($value, $message = '')
 * @method static void nullOrHasLowercase($value, $amount = null, $message = '')
 * @method static void nullOrHasUppercase($value, $amount = null, $message = '')
 * @method static void nullOrHasNumeric($value, $amount = null, $message = '')
 * @method static void nullOrHasSpecialCharacters($value, $amount = null, $message = '')
 * @method static void nullOrIsEmail($value, $message = '')
 * @method static void nullOrIsUrl($value, $message = '')
 * @method static void nullOrIsUUID($value, $strict = true, $message = '')
 * @method static void nullOrIsRequired($value, $message = '')
 * @method static void nullOrIsNotNull($value, $message = '')
 * @method static void nullOrNotEquals($property, $value, $message = '')
 * @method static void nullOrGreaterThanOrEqual($property, $value, $message = '')
 * @method static void nullOrGreaterThan($property, $value, $message = '')
 * @method static void nullOrLessThanOrEqual($property, $value, $message = '')
 * @method static void nullOrLessThan($property, $value, $message = '')
 * @method static void nullOrIsLatitude($latitude, $message = '')
 * @method static void nullOrIsLongitude($lontitude, $message = '')
 * @method static void isLatitude($latitude, $message = '')
 * @method static void isLongitude($lontitude, $message = '')
 * @method static void isScalar($value, $message = '')
 * @method static void nullOrIsScalar($value, $message = '')
 * @method static void isFutureDate($value, $message = '')
 * @method static void isPastDate($value, $message = '')
 * @method static void nullOrIsFutureDate($value, $message = '')
 * @method static void nullOrIsPastDate($value, $message = '')
 * @method static void isTimeString($value, $message = '')
 * @method static void isDateString($value, $message = '')
 * @method static void isHexColor($value, $message = '')
 * @method static void isIpAddress($value, $message = '')
 * @method static void isIpv4Address($value, $message = '')
 * @method static void isIpv6Address($value, $message = '')
 * @method static void nullOrIsTimeString($value, $message = '')
 * @method static void nullOrIsDateString($value, $message = '')
 * @method static void nullOrIsHexColor($value, $message = '')
 * @method static void nullOrIsIpAddress($value, $message = '')
 * @method static void nullOrIsIpv4Address($value, $message = '')
 * @method static void nullOrIsIpv6Address($value, $message = '')
 * @method static void isInNextWeek($value, $message = '')
 * @method static void isInWeek($value, $weekNumber, $message = '')
 * @method static void isInLastWeek($value, $message = '')
 * @method static void isInLastMonth($value, $message = '')
 * @method static void isInMonth($value, $monthNumber, $message = '')
 * @method static void isInNextMonth($value, $message = '')
 * @method static void isInLastYear($value, $message = '')
 * @method static void isInYear($value, $yearNumber, $message = '')
 * @method static void isInNextYear($value, $message = '')
 * @method static void isFirstHalfOfYear($value, $message = '')
 * @method static void isSecondHalfOfYear($value, $message = '')
 * @method static void isTrimesterOfYear($value, $trimester, $message = '')
 * @method static void isQuarterOfYear($value, $quarter, $message = '')
 * @method static void isDayLightSavingTime($value, $message = '')
 * @method static void nullOrIsInNextWeek($value, $message = '')
 * @method static void nullOrIsInWeek($value, $weekNumber, $message = '')
 * @method static void nullOrIsInLastWeek($value, $message = '')
 * @method static void nullOrIsInLastMonth($value, $message = '')
 * @method static void nullOrIsInMonth($value, $monthNumber, $message = '')
 * @method static void nullOrIsInNextMonth($value, $message = '')
 * @method static void nullOrIsInLastYear($value, $message = '')
 * @method static void nullOrIsInYear($value, $yearNumber, $message = '')
 * @method static void nullOrIsInNextYear($value, $message = '')
 * @method static void nullOrIsFirstHalfOfYear($value, $message = '')
 * @method static void nullOrIsSecondHalfOfYear($value, $message = '')
 * @method static void nullOrIsTrimesterOfYear($value, $trimester, $message = '')
 * @method static void nullOrIsQuarterOfYear($value, $quarter, $message = '')
 * @method static void nullOrIsDayLightSavingTime($value, $message = '')
 * @method static void isJson($value, $message = '')
 * @method static void isCreditCard($value, $message = '')
 * @method static void nullOrIsJson($value, $message = '')
 * @method static void nullOrIsCreditCard($value, $message = '')
 * @method static void nullOrIsPalindrome($value, $message = '')
 * @method static void isPalindrome($value, $message = '')
 * @method static void isUnderScore($value, $message = '')
 * @method static void nullOrIsUnderScore($value, $message = '')
 * @method static void isCamelCase($value, $message = '')
 * @method static void nullOrIsCamelCase($value, $message = '')
 * @method static void isTitleCase($value, $message = '')
 * @method static void nullOrIsTitleCase($value, $message = '')
 *
 * METHODEND
 */
class Assert
{
    /**
     * @var array
     */
    protected static $classMap = [
        'Collection' => '\NilPortugues\Assert\Assertions\CollectionAssertions',
        'String' => '\NilPortugues\Assert\Assertions\StringAssertions',
        'Object' => '\NilPortugues\Assert\Assertions\ObjectAssertions',
        'Integer' => '\NilPortugues\Assert\Assertions\IntegerAssertions',
        'Float' => '\NilPortugues\Assert\Assertions\FloatAssertions',
        'DateTime' => '\NilPortugues\Assert\Assertions\DateTimeAssertions',
        'FileUpload' => '\NilPortugues\Assert\Assertions\FileUploadAssertions',
        'Generic' => '\NilPortugues\Assert\Assertions\GenericAssertions',
    ];

    protected static $filterByType = [
        'NULL' => ['Generic', 'String', 'Integer', 'Float', 'Object', 'DateTime', 'Collection'],
        'integer' => ['Integer', 'Generic', 'String'],
        'double' => ['Float', 'Generic', 'String'],
        'string' => ['String', 'DateTime', 'Generic', 'FileUpload'],
        'object' => ['DateTime', 'Object', 'Generic', 'Collection'],
        'array' => ['Collection', 'Generic'],
    ];

    /**
     * @var array
     */
    protected static $methods = [
        'istitlecase' => ['String'],
        'iscamelcase' => ['String'],
        'isunderscore' => ['String'],
        'ispalindrome' => ['String'],
        'isjson' => ['String'],
        'iscreditcard' => ['String'],
        'isinnextweek' => ['DateTime'],
        'isinweek' => ['DateTime'],
        'isinlastweek' => ['DateTime'],
        'isinlastmonth' => ['DateTime'],
        'isinmonth' => ['DateTime'],
        'isinnextmonth' => ['DateTime'],
        'isinlastyear' => ['DateTime'],
        'isinyear' => ['DateTime'],
        'isinnextyear' => ['DateTime'],
        'isfirsthalfofyear' => ['DateTime'],
        'issecondhalfofyear' => ['DateTime'],
        'istrimesterofyear' => ['DateTime'],
        'isquarterofyear' => ['DateTime'],
        'isdaylightsavingtime' => ['DateTime'],
        'isfuturedate' => ['DateTime'],
        'ispastdate' => ['DateTime'],
        'islatitude' => ['String'],
        'islongitude' => ['String'],
        'isrequired' => ['Generic'],
        'isnotnull' => ['Generic'],
        'notequals' => ['Generic'],
        'greaterthanorequal' => ['Generic'],
        'greaterthan' => ['Generic'],
        'lessthanorequal' => ['Generic'],
        'lessthan' => ['Generic'],
        'isstring' => ['String'],
        'isalphanumeric' => ['String'],
        'isalpha' => ['String'],
        'isbetween' => ['DateTime', 'String', 'Integer', 'Float'],
        'isdaterange' => ['DateTime'],
        'ischarset' => ['String'],
        'isallconsonants' => ['String'],
        'contains' => ['String', 'Collection'],
        'iscontrolcharacters' => ['String'],
        'isdigit' => ['String'],
        'endswith' => ['String', 'Collection'],
        'equals' => ['String'],
        'in' => ['String'],
        'hasgraphicalcharsonly' => ['String'],
        'haslength' => ['String', 'Collection'],
        'islowercase' => ['String'],
        'notempty' => ['String'],
        'nowhitespace' => ['String'],
        'hasprintablecharsonly' => ['String'],
        'ispunctuation' => ['String'],
        'matchesregex' => ['String'],
        'isslug' => ['String'],
        'isspace' => ['String'],
        'startswith' => ['String', 'Collection'],
        'isuppercase' => ['String'],
        'isversion' => ['String'],
        'isvowel' => ['String'],
        'ishexdigit' => ['String'],
        'haslowercase' => ['String'],
        'hasuppercase' => ['String'],
        'hasnumeric' => ['String'],
        'hasspecialcharacters' => ['String'],
        'isemail' => ['String'],
        'isurl' => ['String'],
        'isuuid' => ['String'],
        'isobject' => ['Object'],
        'isinstanceof' => ['Object'],
        'hasproperty' => ['Object'],
        'hasmethod' => ['Object'],
        'hasparentclass' => ['Object'],
        'ischildof' => ['Object'],
        'inheritsfrom' => ['Object'],
        'hasinterface' => ['Object'],
        'isinteger' => ['Integer'],
        'isfloat' => ['Float'],
        'isnotzero' => ['Integer', 'Float'],
        'ispositiveorzero' => ['Integer', 'Float'],
        'ispositive' => ['Integer', 'Float'],
        'isnegativeorzero' => ['Integer', 'Float'],
        'isnegative' => ['Integer', 'Float'],
        'isodd' => ['Integer', 'Float'],
        'iseven' => ['Integer', 'Float'],
        'ismultiple' => ['Integer', 'Float'],
        'isfileuploaded' => ['FileUpload'],
        'isfileuploadedbetweenfilesize' => ['FileUpload'],
        'hasfileuploadedfilenameformat' => ['FileUpload'],
        'hasfileuploadedvaliduploaddirectory' => ['FileUpload'],
        'isfileuploadednotoverwritingexistingfile' => ['FileUpload'],
        'hasfileuploadedfilenamelength' => ['FileUpload'],
        'isfileuploadedimage' => ['FileUpload'],
        'isfileuploadedmimetype' => ['FileUpload'],
        'isdatetime' => ['DateTime'],
        'isafter' => ['DateTime'],
        'isbefore' => ['DateTime'],
        'isweekend' => ['DateTime'],
        'isweekday' => ['DateTime'],
        'ismonday' => ['DateTime'],
        'istuesday' => ['DateTime'],
        'iswednesday' => ['DateTime'],
        'isthursday' => ['DateTime'],
        'isfriday' => ['DateTime'],
        'issaturday' => ['DateTime'],
        'issunday' => ['DateTime'],
        'istoday' => ['DateTime'],
        'isyesterday' => ['DateTime'],
        'istomorrow' => ['DateTime'],
        'isleapyear' => ['DateTime'],
        'ismorning' => ['DateTime'],
        'isafternoon' => ['DateTime'],
        'isevening' => ['DateTime'],
        'isnight' => ['DateTime'],
        'isarray' => ['Collection'],
        'each' => ['Collection'],
        'haskeyformat' => ['Collection'],
        'haskey' => ['Collection'],
        'isnotempty' => ['Collection'],
        'isscalar' => ['Generic'],
        'nullorisscalar' => ['Generic'],
        'ishexcolor' => ['String'],
        'isipaddress' => ['String'],
        'isipv4address' => ['String'],
        'isipv6address' => ['String'],
        'istimestring' => ['String'],
        'isdatestring' => ['String'],
    ];

    /**
     * @param $method
     * @param $args
     *
     * @throws Exception
     */
    public static function __callStatic($method, $args)
    {
        $normalized = ltrim(strtolower($method), 'nullor');

        if (self::isDefinedMethod($method, $normalized)) {
            throw new RuntimeException(sprintf('Method %s does not exist.', $method));
        }

        $message = 'Method not found';
        $normalized = self::resolveName($method, $normalized);
        $classNames = self::bestAssertionMethod($normalized, $args);

        foreach ($classNames as $className) {
            try {
                if (self::isNullOrMethod($method, $args)) {
                    return;
                }

                call_user_func_array(self::$classMap[$className].'::'.$normalized, $args);

                return;
            } catch (AssertionException $e) {
                $message = $e->getMessage();
            }
        }

        throw new Exception($message);
    }

    /**
     * @param string $method
     * @param string $normalized
     *
     * @return bool
     */
    protected static function isDefinedMethod($method, $normalized)
    {
        return empty(self::$methods[strtolower($method)]) && empty(self::$methods[$normalized]);
    }

    /**
     * @param string $method
     * @param string $normalized
     *
     * @return string
     */
    protected static function resolveName($method, $normalized)
    {
        return empty(self::$methods[strtolower($method)]) ? $normalized : strtolower($method);
    }

    /**
     * @param string $method
     * @param array  $args
     *
     * @return array
     */
    protected static function bestAssertionMethod($method, array &$args)
    {
        $classNames = array_intersect(self::$filterByType[gettype($args[0])], self::$methods[$method]);

        if (count($classNames) > 1) {
            $classNames = [array_shift($classNames)];
        }

        return $classNames;
    }

    /**
     * @param string $method
     * @param array  $args
     *
     * @return bool
     */
    protected static function isNullOrMethod($method, array $args)
    {
        return 'nullor' === strtolower(substr($method, 0, 6)) && null === $args[0];
    }
}
