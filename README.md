# [WIP] Assert

[![Build Status](https://travis-ci.org/nilportugues/php-assert.svg)](https://travis-ci.org/nilportugues/php-assert) [![Coverage Status](https://coveralls.io/repos/nilportugues/assert/badge.svg?branch=master)](https://coveralls.io/r/nilportugues/assert?branch=master) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/nilportugues/php-assert/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/nilportugues/php-assert/?branch=master) [![SensioLabsInsight](https://insight.sensiolabs.com/projects/c37360c4-7280-4e08-bff1-0f0053103003/mini.png)](https://insight.sensiolabs.com/projects/c37360c4-7280-4e08-bff1-0f0053103003) [![Latest Stable Version](https://poser.pugx.org/nilportugues/assert/v/stable)](https://packagist.org/packages/nilportugues/assert) [![Total Downloads](https://poser.pugx.org/nilportugues/assert/downloads)](https://packagist.org/packages/nilportugues/assert) [![License](https://poser.pugx.org/nilportugues/assert/license)](https://packagist.org/packages/nilportugues/assert) 


While I know there are out there other assertion libraries I was unhappy with them, so I wrote my own.

## Usage
 
Assertion library is really straight forward. Pass input to the method call and it will just run or throw an `\Exception` if it doesn't meet the requirements. 


```php
use NilPortugues\Assert\Assert;

try {
    Assert::nullOrLowercase(null);
    Assert::isUppercase('THIS IS GREAT');
    Assert::isNight(new \DateTime('now'));
    
} catch (Exception $e) {
    echo 'Did not meet the requirements, too bad!';
}
```

## Assertion methods:

All assertion methods can be used against different data types (integer, double, objects..).

If you try to validate data for an unexpected data type, an Exception will be thrown making your assertion fail as expected. 

Most methods can be called using the "nullOr" prefix instead of the "is" prefix. For instance: 


```php
Assert::nullOrLowercase('lowercase'); //OK
Assert::isLowercase(null); //raises Exception
```

## Method list:

All methods allow specifying a custom `$message` value. If not passed in, a library-defined default will be used.

 - `Assert::contains($value, $contains, $identical = false, $message = '')`
 - `Assert::each($value, callable $valueValidator, callable $keyValidator = null, $message = '')`
 - `Assert::endsWith($value, $contains, $identical = false, $message = '')`
 - `Assert::equals($value, $comparedValue, $identical = false, $message = '')`
 - `Assert::greaterThan($property, $value, $message = '')`
 - `Assert::greaterThanOrEqual($property, $value, $message = '')`
 - `Assert::hasGraphicalCharsOnly($value, $message = '')`
 - `Assert::hasInterface($value, $interface, $message = '')`
 - `Assert::hasKey($value, $keyName, $message = '')`
 - `Assert::hasKeyFormat($value, callable $keyValidator, $message = '')`
 - `Assert::hasLength($value, $length, $message = '')`
 - `Assert::hasLowercase($value, $amount = null, $message = '')`
 - `Assert::hasMethod($value, $method, $message = '')`
 - `Assert::hasNumeric($value, $amount = null, $message = '')`
 - `Assert::hasParentClass($value, $message = '')`
 - `Assert::hasPrintableCharsOnly($value, $message = '')`
 - `Assert::hasProperty($value, $property, $message = '')`
 - `Assert::hasSpecialCharacters($value, $amount = null, $message = '')`
 - `Assert::hasUppercase($value, $amount = null, $message = '')`
 - `Assert::hasValidUploadDirectory($uploadName, $uploadDir, $message = '')`
 - `Assert::in($value, $haystack, $identical = false, $message = '')`
 - `Assert::inheritsFrom($value, $inheritsClass, $message = '')`
 - `Assert::isAfter($value, $limit, $inclusive = false, $message = '')`
 - `Assert::isAfternoon($value, $message = '')`
 - `Assert::isAllConsonants($value, $message = '')`
 - `Assert::isAlpha($value, $message = '')`
 - `Assert::isAlphanumeric($value, $message = '')`
 - `Assert::isArray($value, $message = '')`
 - `Assert::isBefore($value, $limit, $inclusive = false, $message = '')`
 - `Assert::isBetween($value, $min, $max, $inclusive = false, $message = '')`
 - `Assert::isBetweenFileSize($uploadName, $minSize, $maxSize, $format = 'B', $inclusive = false, $message = '')`
 - `Assert::isCharset($value, $charset, $message = '')`
 - `Assert::isChildOf($value, $parentClass, $message = '')`
 - `Assert::isControlCharacters($value, $message = '')`
 - `Assert::isDateTime($value, $message = '')`
 - `Assert::isDigit($value, $message = '')`
 - `Assert::isEmail($value, $message = '')`
 - `Assert::isEven($value, $message = '')`
 - `Assert::isEvening($value, $message = '')`
 - `Assert::isFloat($value, $message = '')`
 - `Assert::isFriday($value, $message = '')`
 - `Assert::isHexDigit($value, $message = '')`
 - `Assert::isImage($uploadName, $message = '')`
 - `Assert::isInstanceOf($value, $instanceOf, $message = '')`
 - `Assert::isInteger($value, $message = '')`
 - `Assert::isLeapYear($value, $message = '')`
 - `Assert::isLowercase($value, $message = '')`
 - `Assert::isMimeType($uploadName, array $allowedTypes, $message = '')`
 - `Assert::isMonday($value, $message = '')`
 - `Assert::isMorning($value, $message = '')`
 - `Assert::isMultiple($value, $multiple, $message = '')`
 - `Assert::isNegative($value, $message = '')`
 - `Assert::isNegativeOrZero($value, $message = '')`
 - `Assert::isNight($value, $message = '')`
 - `Assert::isNotEmpty($value, $message = '')`
 - `Assert::isNotNull($value, $message = '')`
 - `Assert::isNotZero($value, $message = '')`
 - `Assert::isObject($value, $message = '')`
 - `Assert::isOdd($value, $message = '')`
 - `Assert::isPositive($value, $message = '')`
 - `Assert::isPositiveOrZero($value, $message = '')`
 - `Assert::isPunctuation($value, $message = '')`
 - `Assert::isRequired($value, $message = '')`
 - `Assert::isSaturday($value, $message = '')`
 - `Assert::isSlug($value, $message = '')`
 - `Assert::isSpace($value, $message = '')`
 - `Assert::isString($value, $message = '')`
 - `Assert::isSunday($value, $message = '')`
 - `Assert::isThursday($value, $message = '')`
 - `Assert::isToday($value, $message = '')`
 - `Assert::isTomorrow($value, $message = '')`
 - `Assert::isTuesday($value, $message = '')`
 - `Assert::isUploaded($uploadName, $message = '')`
 - `Assert::isUppercase($value, $message = '')`
 - `Assert::isUrl($value, $message = '')`
 - `Assert::isUUID($value, $strict = true, $message = '')`
 - `Assert::isVersion($value, $message = '')`
 - `Assert::isVowel($value, $message = '')`
 - `Assert::isWednesday($value, $message = '')`
 - `Assert::isWeekday($value, $message = '')`
 - `Assert::isWeekend($value, $message = '')`
 - `Assert::isYesterday($value, $message = '')`
 - `Assert::lessThan($property, $value, $message = '')`
 - `Assert::lessThanOrEqual($property, $value, $message = '')`
 - `Assert::matchesRegex($value, $regex, $message = '')`
 - `Assert::notEmpty($value, $message = '')`
 - `Assert::notEquals($property, $value, $message = '')`
 - `Assert::notOverwritingExistingFile($uploadName, $uploadDir, $message = '')`
 - `Assert::noWhitespace($value, $message = '')`
 - `Assert::nullOrAfter($value, $limit, $inclusive = false, $message = '')`
 - `Assert::nullOrAfternoon($value, $message = '')`
 - `Assert::nullOrAllConsonants($value, $message = '')`
 - `Assert::nullOrAlpha($value, $message = '')`
 - `Assert::nullOrAlphanumeric($value, $message = '')`
 - `Assert::nullOrBefore($value, $limit, $inclusive = false, $message = '')`
 - `Assert::nullOrBetween($value, $min, $max, $inclusive = false, $message = '')`
 - `Assert::nullOrCharset($value, $charset, $message = '')`
 - `Assert::nullOrChildOf($value, $parentClass, $message = '')`
 - `Assert::nullOrContains($value, $contains, $identical = false, $message = '')`
 - `Assert::nullOrControlCharacters($value, $message = '')`
 - `Assert::nullOrDateTime($value, $message = '')`
 - `Assert::nullOrDigit($value, $message = '')`
 - `Assert::nullOrEmail($value, $message = '')`
 - `Assert::nullOrEndsWith($value, $contains, $identical = false, $message = '')`
 - `Assert::nullOrEquals($value, $comparedValue, $identical = false, $message = '')`
 - `Assert::nullOrEven($value, $message = '')`
 - `Assert::nullOrEvening($value, $message = '')`
 - `Assert::nullOrFloat($value, $message = '')`
 - `Assert::nullOrFriday($value, $message = '')`
 - `Assert::nullOrGreaterThan($property, $value, $message = '')`
 - `Assert::nullOrGreaterThanOrEqual($property, $value, $message = '')`
 - `Assert::nullOrHasGraphicalCharsOnly($value, $message = '')`
 - `Assert::nullOrHasInterface($value, $interface, $message = '')`
 - `Assert::nullOrHasLength($value, $length, $message = '')`
 - `Assert::nullOrHasLowercase($value, $amount = null, $message = '')`
 - `Assert::nullOrHasMethod($value, $method, $message = '')`
 - `Assert::nullOrHasNumeric($value, $amount = null, $message = '')`
 - `Assert::nullOrHasParentClass($value, $message = '')`
 - `Assert::nullOrHasPrintableCharsOnly($value, $message = '')`
 - `Assert::nullOrHasProperty($value, $property, $message = '')`
 - `Assert::nullOrHasSpecialCharacters($value, $amount = null, $message = '')`
 - `Assert::nullOrHasUppercase($value, $amount = null, $message = '')`
 - `Assert::nullOrHexDigit($value, $message = '')`
 - `Assert::nullOrIn($value, $haystack, $identical = false, $message = '')`
 - `Assert::nullOrInheritsFrom($value, $inheritsClass, $message = '')`
 - `Assert::nullOrInstanceOf($value, $instanceOf, $message = '')`
 - `Assert::nullOrInteger($value, $message = '')`
 - `Assert::nullOrLeapYear($value, $message = '')`
 - `Assert::nullOrLessThan($property, $value, $message = '')`
 - `Assert::nullOrLessThanOrEqual($property, $value, $message = '')`
 - `Assert::nullOrLowercase($value, $message = '')`
 - `Assert::nullOrMatchesRegex($value, $regex, $message = '')`
 - `Assert::nullOrMonday($value, $message = '')`
 - `Assert::nullOrMorning($value, $message = '')`
 - `Assert::nullOrMultiple($value, $multiple, $message = '')`
 - `Assert::nullOrNegative($value, $message = '')`
 - `Assert::nullOrNegativeOrZero($value, $message = '')`
 - `Assert::nullOrNight($value, $message = '')`
 - `Assert::nullOrNotEmpty($value, $message = '')`
 - `Assert::nullOrNotEquals($property, $value, $message = '')`
 - `Assert::nullOrNotZero($value, $message = '')`
 - `Assert::nullOrNoWhitespace($value, $message = '')`
 - `Assert::nullOrObject($value, $message = '')`
 - `Assert::nullOrOdd($value, $message = '')`
 - `Assert::nullOrPositive($value, $message = '')`
 - `Assert::nullOrPositiveOrZero($value, $message = '')`
 - `Assert::nullOrPunctuation($value, $message = '')`
 - `Assert::nullOrSaturday($value, $message = '')`
 - `Assert::nullOrSlug($value, $message = '')`
 - `Assert::nullOrSpace($value, $message = '')`
 - `Assert::nullOrStartsWith($value, $contains, $identical = false, $message = '')`
 - `Assert::nullOrString($value, $message = '')`
 - `Assert::nullOrSunday($value, $message = '')`
 - `Assert::nullOrThursday($value, $message = '')`
 - `Assert::nullOrToday($value, $message = '')`
 - `Assert::nullOrTomorrow($value, $message = '')`
 - `Assert::nullOrTuesday($value, $message = '')`
 - `Assert::nullOrUppercase($value, $message = '')`
 - `Assert::nullOrUrl($value, $message = '')`
 - `Assert::nullOrUUID($value, $strict = true, $message = '')`
 - `Assert::nullOrVersion($value, $message = '')`
 - `Assert::nullOrVowel($value, $message = '')`
 - `Assert::nullOrWednesday($value, $message = '')`
 - `Assert::nullOrWeekday($value, $message = '')`
 - `Assert::nullOrWeekend($value, $message = '')`
 - `Assert::nullOrYesterday($value, $message = '')`
 - `Assert::startsWith($value, $contains, $identical = false, $message = '')`
 

