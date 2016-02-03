# Assert

[![Build Status](https://travis-ci.org/nilportugues/php-assert.svg)](https://travis-ci.org/nilportugues/php-assert) [![Coverage Status](https://coveralls.io/repos/nilportugues/php-assert/badge.svg?branch=master)](https://coveralls.io/r/nilportugues/php-assert?branch=master) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/nilportugues/php-assert/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/nilportugues/php-assert/?branch=master) [![SensioLabsInsight](https://insight.sensiolabs.com/projects/c37360c4-7280-4e08-bff1-0f0053103003/mini.png?)](https://insight.sensiolabs.com/projects/c37360c4-7280-4e08-bff1-0f0053103003) [![Latest Stable Version](https://poser.pugx.org/nilportugues/assert/v/stable)](https://packagist.org/packages/nilportugues/assert) [![Total Downloads](https://poser.pugx.org/nilportugues/assert/downloads)](https://packagist.org/packages/nilportugues/assert) [![License](https://poser.pugx.org/nilportugues/assert/license)](https://packagist.org/packages/nilportugues/assert) 


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

## Assertion Methods

All assertion methods can be used against different data types (integer, double, objects..).

If you try to validate data for an unexpected data type, an Exception will be thrown making your assertion fail as expected. 

Most methods can be called using the "nullOr" prefix instead of the "is" prefix. For instance: 


```php
Assert::nullOrLowercase('lowercase'); //OK
Assert::isLowercase(null); //raises Exception
```

## Assertion List

All methods allow specifying a custom `$message` value. If not passed in, a library-defined default will be used.

Those accepting a `callable` as an argument, expect an Assert statement to be used inside the callable.

#### Generic Assertions

```php
Assert::isRequired($value, $message = '');
Assert::isNotNull($value, $message = '');
Assert::notEquals($property, $value, $message = '');
Assert::greaterThanOrEqual($property, $value, $message = '');
Assert::greaterThan($property, $value, $message = '');
Assert::lessThanOrEqual($property, $value, $message = '');
Assert::lessThan($property, $value, $message = '');

// nullOr assertions
Assert::nullOrNotEquals($property, $value, $message = '');
Assert::nullOrGreaterThanOrEqual($property, $value, $message = '');
Assert::nullOrGreaterThan($property, $value, $message = '');
Assert::nullOrLessThanOrEqual($property, $value, $message = '');
Assert::nullOrLessThan($property, $value, $message = '');
```

#### String Assertions

```php
Assert::isString($value, $message = '')
Assert::isAlphanumeric($value, $message = '')
Assert::isAlpha($value, $message = '')
Assert::isBetween($value, $min, $max, $inclusive = false, $message = '')
Assert::isCharset($value, $charset, $message = '')
Assert::isAllConsonants($value, $message = '')
Assert::contains($value, $contains, $identical = false, $message = '')
Assert::isControlCharacters($value, $message = '')
Assert::isDigit($value, $message = '')
Assert::endsWith($value, $contains, $identical = false, $message = '')
Assert::equals($value, $comparedValue, $identical = false, $message = '')
Assert::in($value, $haystack, $identical = false, $message = '')
Assert::hasGraphicalCharsOnly($value, $message = '')
Assert::hasLength($value, $length, $message = '')
Assert::isLowercase($value, $message = '')
Assert::notEmpty($value, $message = '')
Assert::noWhitespace($value, $message = '')
Assert::hasPrintableCharsOnly($value, $message = '')
Assert::isPunctuation($value, $message = '')
Assert::matchesRegex($value, $regex, $message = '')
Assert::isSlug($value, $message = '')
Assert::isSpace($value, $message = '')
Assert::startsWith($value, $contains, $identical = false, $message = '')
Assert::isUppercase($value, $message = '')
Assert::isVersion($value, $message = '')
Assert::isVowel($value, $message = '')
Assert::isHexDigit($value, $message = '')
Assert::hasLowercase($value, $amount = null, $message = '')
Assert::hasUppercase($value, $amount = null, $message = '')
Assert::hasNumeric($value, $amount = null, $message = '')
Assert::hasSpecialCharacters($value, $amount = null, $message = '')
Assert::isEmail($value, $message = '')
Assert::isUrl($value, $message = '')
Assert::isUUID($value, $strict = true, $message = '')
Assert::isLatitude($latitude, $message = '')
Assert::isLongitude($lontitude, $message = '')

// nullOr assertions
Assert::nullOrIsString($value, $message = '')
Assert::nullOrIsAlphanumeric($value, $message = '')
Assert::nullOrIsAlpha($value, $message = '')
Assert::nullOrIsBetween($value, $min, $max, $inclusive = false, $message = '')
Assert::nullOrIsCharset($value, $charset, $message = '')
Assert::nullOrIsAllConsonants($value, $message = '')
Assert::nullOrContains($value, $contains, $identical = false, $message = '')
Assert::nullOrIsControlCharacters($value, $message = '')
Assert::nullOrIsDigit($value, $message = '')
Assert::nullOrEndsWith($value, $contains, $identical = false, $message = '')
Assert::nullOrEquals($value, $comparedValue, $identical = false, $message = '')
Assert::nullOrIn($value, $haystack, $identical = false, $message = '')
Assert::nullOrHasGraphicalCharsOnly($value, $message = '')
Assert::nullOrHasLength($value, $length, $message = '')
Assert::nullOrIsLowercase($value, $message = '')
Assert::nullOrNotEmpty($value, $message = '')
Assert::nullOrNoWhitespace($value, $message = '')
Assert::nullOrHasPrintableCharsOnly($value, $message = '')
Assert::nullOrIsPunctuation($value, $message = '')
Assert::nullOrMatchesRegex($value, $regex, $message = '')
Assert::nullOrIsSlug($value, $message = '')
Assert::nullOrIsSpace($value, $message = '')
Assert::nullOrStartsWith($value, $contains, $identical = false, $message = '')
Assert::nullOrIsUppercase($value, $message = '')
Assert::nullOrIsVersion($value, $message = '')
Assert::nullOrIsVowel($value, $message = '')
Assert::nullOrIsHexDigit($value, $message = '')
Assert::nullOrHasLowercase($value, $amount = null, $message = '')
Assert::nullOrHasUppercase($value, $amount = null, $message = '')
Assert::nullOrHasNumeric($value, $amount = null, $message = '')
Assert::nullOrHasSpecialCharacters($value, $amount = null, $message = '')
Assert::nullOrIsEmail($value, $message = '')
Assert::nullOrIsUrl($value, $message = '')
Assert::nullOrIsUUID($value, $strict = true, $message = '')
Assert::nullOrIsLatitude($latitude, $message = '')
Assert::nullOrIsLongitude($lontitude, $message = '')
```

#### Integer Assertions

```php
Assert::isInteger($value, $message = '')
Assert::isNotZero($value, $message = '')
Assert::isPositiveOrZero($value, $message = '')
Assert::isPositive($value, $message = '')
Assert::isNegativeOrZero($value, $message = '')
Assert::isNegative($value, $message = '')
Assert::isBetween($value, $min, $max, $inclusive = false, $message = '')
Assert::isOdd($value, $message = '')
Assert::isEven($value, $message = '')
Assert::isMultiple($value, $multiple, $message = '')

// nullOr assertions
Assert::nullOrIsInteger($value, $message = '')
Assert::nullOrIsNotZero($value, $message = '')
Assert::nullOrIsPositiveOrZero($value, $message = '')
Assert::nullOrIsPositive($value, $message = '')
Assert::nullOrIsNegativeOrZero($value, $message = '')
Assert::nullOrIsNegative($value, $message = '')
Assert::nullOrIsBetween($value, $min, $max, $inclusive = false, $message = '')
Assert::nullOrIsOdd($value, $message = '')
Assert::nullOrIsEven($value, $message = '')
Assert::nullOrIsMultiple($value, $multiple, $message = '')
```

#### Float & Double Assertions

```php
Assert::isFloat($value, $message = '')
Assert::isNotZero($value, $message = '')
Assert::isPositiveOrZero($value, $message = '')
Assert::isPositive($value, $message = '')
Assert::isNegativeOrZero($value, $message = '')
Assert::isNegative($value, $message = '')
Assert::isBetween($value, $min, $max, $inclusive = false, $message = '')
Assert::isOdd($value, $message = '')
Assert::isEven($value, $message = '')
Assert::isMultiple($value, $multiple, $message = '')

// nullOr assertions
Assert::nullOrIsFloat($value, $message = '')
Assert::nullOrIsNotZero($value, $message = '')
Assert::nullOrIsPositiveOrZero($value, $message = '')
Assert::nullOrIsPositive($value, $message = '')
Assert::nullOrIsNegativeOrZero($value, $message = '')
Assert::nullOrIsNegative($value, $message = '')
Assert::nullOrIsBetween($value, $min, $max, $inclusive = false, $message = '')
Assert::nullOrIsOdd($value, $message = '')
Assert::nullOrIsEven($value, $message = '')
Assert::nullOrIsMultiple($value, $multiple, $message = '')
```

#### Array & Collection Assertions

```php
Assert::isArray($value, $message = '')
Assert::each($value, callable $valueValidator, callable $keyValidator = null, $message = '')
Assert::hasKeyFormat($value, callable $keyValidator, $message = '')
Assert::endsWith($haystack, $needle, $strict = false, $message = '')
Assert::contains($haystack, $needle, $strict = false, $message = '')
Assert::hasKey($value, $keyName, $message = '')
Assert::hasLength($value, $length, $message = '')
Assert::isNotEmpty($value, $message = '')
Assert::startsWith($haystack, $needle, $strict = false, $message = '')

// nullOr assertions
Assert::nullOrIsArray($value, $message = '')
Assert::nullOrEach($value, callable $valueValidator, callable $keyValidator = null, $message = '')
Assert::nullOrHasKeyFormat($value, callable $keyValidator, $message = '')
Assert::nullOrEndsWith($haystack, $needle, $strict = false, $message = '')
Assert::nullOrContains($haystack, $needle, $strict = false, $message = '')
Assert::nullOrHasKey($value, $keyName, $message = '')
Assert::nullOrHasLength($value, $length, $message = '')
Assert::nullOrIsNotEmpty($value, $message = '')
Assert::nullOrStartsWith($haystack, $needle, $strict = false, $message = '')
```

#### DateTime Assertions

```php
Assert::isDateTime($value, $message = '')
Assert::isAfter($value, $limit, $inclusive = false, $message = '')
Assert::isBefore($value, $limit, $inclusive = false, $message = '')
Assert::isDateRange($value, $minDate, $maxDate, $inclusive = false, $message = '')
Assert::isWeekend($value, $message = '')
Assert::isWeekday($value, $message = '')
Assert::isMonday($value, $message = '')
Assert::isTuesday($value, $message = '')
Assert::isWednesday($value, $message = '')
Assert::isThursday($value, $message = '')
Assert::isFriday($value, $message = '')
Assert::isSaturday($value, $message = '')
Assert::isSunday($value, $message = '')
Assert::isToday($value, $message = '')
Assert::isYesterday($value, $message = '')
Assert::isTomorrow($value, $message = '')
Assert::isLeapYear($value, $message = '')
Assert::isMorning($value, $message = '')
Assert::isAfternoon($value, $message = '')
Assert::isEvening($value, $message = '')
Assert::isNight($value, $message = '')

// nullOr assertions
Assert::nullOrIsDateTime($value, $message = '')
Assert::nullOrIsAfter($value, $limit, $inclusive = false, $message = '')
Assert::nullOrIsBefore($value, $limit, $inclusive = false, $message = '')
Assert::nullOrIsDateRange($value, $minDate, $maxDate, $inclusive = false, $message = '')
Assert::nullOrIsWeekend($value, $message = '')
Assert::nullOrIsWeekday($value, $message = '')
Assert::nullOrIsMonday($value, $message = '')
Assert::nullOrIsTuesday($value, $message = '')
Assert::nullOrIsWednesday($value, $message = '')
Assert::nullOrIsThursday($value, $message = '')
Assert::nullOrIsFriday($value, $message = '')
Assert::nullOrIsSaturday($value, $message = '')
Assert::nullOrIsSunday($value, $message = '')
Assert::nullOrIsToday($value, $message = '')
Assert::nullOrIsYesterday($value, $message = '')
Assert::nullOrIsTomorrow($value, $message = '')
Assert::nullOrIsLeapYear($value, $message = '')
Assert::nullOrIsMorning($value, $message = '')
Assert::nullOrIsAfternoon($value, $message = '')
Assert::nullOrIsEvening($value, $message = '')
Assert::nullOrIsNight($value, $message = '')
```

#### Object Assertions

```php
Assert::isObject($value, $message = '')
Assert::isInstanceOf($value, $instanceOf, $message = '')
Assert::hasProperty($value, $property, $message = '')
Assert::hasMethod($value, $method, $message = '')
Assert::hasParentClass($value, $message = '')
Assert::isChildOf($value, $parentClass, $message = '')
Assert::inheritsFrom($value, $inheritsClass, $message = '')
Assert::hasInterface($value, $interface, $message = '')

// nullOr assertions
Assert::nullOrIsObject($value, $message = '')
Assert::nullOrIsInstanceOf($value, $instanceOf, $message = '')
Assert::nullOrHasProperty($value, $property, $message = '')
Assert::nullOrHasMethod($value, $method, $message = '')
Assert::nullOrHasParentClass($value, $message = '')
Assert::nullOrIsChildOf($value, $parentClass, $message = '')
Assert::nullOrInheritsFrom($value, $inheritsClass, $message = '')
Assert::nullOrHasInterface($value, $interface, $message = '')
```

#### FileUpload Assertions

FileUpload Assertions look into the `$_FILES` global variable.

```php
Assert::isFileUploaded($uploadName, $message = '')
Assert::isFileUploadedBetweenFileSize($uploadName, $minSize, $maxSize, $format='B', $inclusive = false, $message = '')
Assert::hasFileUploadedFileNameFormat($uploadName, callable $assertion, $message = '')
Assert::hasFileUploadedValidUploadDirectory($uploadName, $uploadDir, $message = '')
Assert::isFileUploadedNotOverwritingExistingFile($uploadName, $uploadDir, $message = '')
Assert::hasFileUploadedFileNameLength($uploadName, $size, $message = '')
Assert::isFileUploadedImage($uploadName, $message = '')
Assert::isFileUploadedMimeType($uploadName, array $allowedTypes, $message = '') 

// nullOr assertions
Assert::nullOrIsFileUploaded($uploadName, $message = '')
Assert::nullOrIsFileUploadedBetweenFileSize($uploadName, $minSize, $maxSize, $format='B', $inclusive=false, $message='')
Assert::nullOrHasFileUploadedFileNameFormat($uploadName, callable $assertion, $message = '')
Assert::nullOrHasFileUploadedValidUploadDirectory($uploadName, $uploadDir, $message = '')
Assert::nullOrIsFileUploadedNotOverwritingExistingFile($uploadName, $uploadDir, $message = '')
Assert::nullOrHasFileUploadedFileNameLength($uploadName, $size, $message = '')
Assert::nullOrIsFileUploadedImage($uploadName, $message = '')
Assert::nullOrIsFileUploadedMimeType($uploadName, array $allowedTypes, $message = '') 
```

## Contribute

Contributions to the package are always welcome!

* Report any bugs or issues you find on the [issue tracker](https://github.com/nilportugues/php-assert/issues/new).
* You can grab the source code at the package's [Git repository](https://github.com/nilportugues/php-assert).


## Support

Get in touch with me using one of the following means:

 - Emailing me at <contact@nilportugues.com>
 - Opening an [Issue](https://github.com/nilportugues/php-assert/issues/new)

## Authors

* [Nil Portugués Calderó](http://nilportugues.com)
* [The Community Contributors](https://github.com/nilportugues/php-assert/graphs/contributors)


## License
The code base is licensed under the [MIT license](LICENSE).
