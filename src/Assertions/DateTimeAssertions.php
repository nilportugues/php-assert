<?php

/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 9/21/14
 * Time: 8:18 PM.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace NilPortugues\Assert\Assertions;

use DateTime;
use NilPortugues\Assert\Exceptions\AssertionException;

class DateTimeAssertions
{
    const ASSERT_DATE_TIME = 'Value is not a valid date.';
    const ASSERT_IS_MORNING = 'Time provided is not morning.';
    const ASSERT_IS_AFTERNOON = 'Time provided is not afternoon.';
    const ASSERT_IS_EVENING = 'Time provided is not evening.';
    const ASSERT_IS_NIGHT = 'Time provided is not night.';
    const ASSERT_IS_BETWEEN = 'Date provided must be between %s and %s.';
    const ASSERT_IS_WEEKEND = 'Day provided is not a weekend day.';
    const ASSERT_IS_WEEKDAY = 'Day provided is not a weekday.';
    const ASSERT_IS_MONDAY = 'Day provided is not Monday.';
    const ASSERT_IS_TUESDAY = 'Day provided is not Tuesday.';
    const ASSERT_IS_WEDNESDAY = 'Day provided is not Wednesday.';
    const ASSERT_IS_THURSDAY = 'Day provided is not Thursday.';
    const ASSERT_IS_FRIDAY = 'Day provided is not Friday.';
    const ASSERT_IS_SATURDAY = 'Day provided is not Saturday.';
    const ASSERT_IS_SUNDAY = 'Day provided is not Sunday.';
    const ASSERT_IS_TODAY = 'Day provided is not today.';
    const ASSERT_IS_YESTERDAY = 'Day provided is not yesterday.';
    const ASSERT_IS_TOMORROW = 'Day provided is not tomorrow.';
    const ASSERT_IS_LEAP_YEAR = 'Year provided is not a leap year.';
    const ASSERT_IS_AFTER = 'Date provided must be a after %s.';
    const ASSERT_IS_BEFORE = 'Date provided must be a before %s.';

    /**
     * Checks if a value is a a valid datetime format.
     *
     * @param string|DateTime $value
     * @param string          $message
     *
     * @return AssertionException
     */
    public static function isDateTime($value, $message = '')
    {
        if ($value instanceof DateTime) {
            return;
        }

        try {
            $date = new DateTime($value);
            $errors = $date->getLastErrors();
        } catch (\Exception $e) {
            $errors['warning_count'] = 1;
            $errors['error_count'] = 1;
        }

        if (false === (0 == $errors['warning_count'] && 0 == $errors['error_count'])) {
            throw new AssertionException(
                ($message) ? $message : sprintf(self::ASSERT_DATE_TIME, gettype($value))
            );
        }
    }

    /**
     * @param string|DateTime $value
     *
     * @return DateTime
     */
    private static function convertToDateTime($value)
    {
        if ($value instanceof DateTime) {
            return $value;
        }

        return new DateTime($value);
    }

    /**
     * Checks if a given date is happening after the given limiting date.
     *
     * @param string|DateTime $value
     * @param string|DateTime $limit
     * @param bool            $inclusive
     * @param string          $message
     *
     * @return AssertionException
     */
    public static function isAfter($value, $limit, $inclusive = false, $message = '')
    {
        $value = self::convertToDateTime($value);
        $limit = self::convertToDateTime($limit);

        if (false === $inclusive) {
            if (!(strtotime($value->format('Y-m-d H:i:s')) > strtotime($limit->format('Y-m-d H:i:s')))) {
                throw new AssertionException(
                    ($message) ? $message : sprintf(self::ASSERT_IS_AFTER, $limit->format('Y-m-d H:i:s'))
                );
            }
        }

        if (!(strtotime($value->format('Y-m-d H:i:s')) >= strtotime($limit->format('Y-m-d H:i:s')))) {
            throw new AssertionException(
                ($message) ? $message : sprintf(self::ASSERT_IS_AFTER, $limit->format('Y-m-d H:i:s'))
            );
        }
    }

    /**
     * Checks if a given date is happening before the given limiting date.
     *
     * @param string|DateTime $value
     * @param string|DateTime $limit
     * @param bool            $inclusive
     * @param string          $message
     *
     * @return AssertionException
     */
    public static function isBefore($value, $limit, $inclusive = false, $message = '')
    {
        $value = self::convertToDateTime($value);
        $limit = self::convertToDateTime($limit);

        if (false === $inclusive) {
            if (!(strtotime($value->format('Y-m-d H:i:s')) < strtotime($limit->format('Y-m-d H:i:s')))) {
                throw new AssertionException(
                    ($message) ? $message : sprintf(self::ASSERT_IS_BEFORE, $limit->format('Y-m-d H:i:s'))
                );
            }
        }

        if (!(strtotime($value->format('Y-m-d H:i:s')) <= strtotime($limit->format('Y-m-d H:i:s')))) {
            throw new AssertionException(
                ($message) ? $message : sprintf(self::ASSERT_IS_BEFORE, $limit->format('Y-m-d H:i:s'))
            );
        }
    }

    /**
     * Checks if a given date is in a given range of dates.
     *
     * @param string|DateTime $value
     * @param bool            $inclusive
     * @param string          $minDate
     * @param string          $maxDate
     * @param string          $message
     *
     * @return AssertionException
     */
    public static function isDateRange($value, $minDate, $maxDate, $inclusive = false, $message = '')
    {
        $value = self::convertToDateTime($value);
        $minDate = self::convertToDateTime($minDate);
        $maxDate = self::convertToDateTime($maxDate);

        if (!$inclusive && !($value > $minDate && $value < $maxDate)) {
            $minDate = $minDate->format('Y-m-d H:i:s');
            $maxDate = $maxDate->format('Y-m-d H:i:s');
            throw new AssertionException(
                ($message) ? $message : sprintf(self::ASSERT_IS_BETWEEN, $minDate, $maxDate)
            );
        }

        if ($inclusive && !($value >= $minDate && $value <= $maxDate)) {
            $minDate = $minDate->format('Y-m-d H:i:s');
            $maxDate = $maxDate->format('Y-m-d H:i:s');
            throw new AssertionException(
                ($message) ? $message : sprintf(self::ASSERT_IS_BETWEEN, $minDate, $maxDate)
            );
        }
    }

    /**
     * @param string $value
     * @param string $message
     *
     * @return AssertionException
     */
    public static function isWeekend($value, $message = '')
    {
        $value = self::convertToDateTime($value);

        if ('0' != $value->format('w') && '6' != $value->format('w')) {
            throw new AssertionException(
                ($message) ? $message : self::ASSERT_IS_WEEKEND
            );
        }
    }

    /**
     * @param string $value
     * @param string $message
     *
     * @return AssertionException
     */
    public static function isWeekday($value, $message = '')
    {
        $value = self::convertToDateTime($value);

        if ($value->format('w') == 0 || $value->format('w') == 6) {
            throw new AssertionException(
                ($message) ? $message : self::ASSERT_IS_WEEKDAY
            );
        }
    }

    /**
     * @param string $value
     * @param string $message
     *
     * @return AssertionException
     */
    public static function isMonday($value, $message = '')
    {
        $value = self::convertToDateTime($value);

        if (!('1' == $value->format('w'))) {
            throw new AssertionException(
                ($message) ? $message : self::ASSERT_IS_MONDAY
            );
        }
    }

    /**
     * @param string $value
     * @param string $message
     *
     * @return AssertionException
     */
    public static function isTuesday($value, $message = '')
    {
        $value = self::convertToDateTime($value);

        if (!('2' == $value->format('w'))) {
            throw new AssertionException(
                ($message) ? $message : self::ASSERT_IS_TUESDAY
            );
        }
    }

    /**
     * @param string $value
     * @param string $message
     *
     * @return AssertionException
     */
    public static function isWednesday($value, $message = '')
    {
        $value = self::convertToDateTime($value);

        if (!('3' == $value->format('w'))) {
            throw new AssertionException(
                ($message) ? $message : self::ASSERT_IS_WEDNESDAY
            );
        }
    }

    /**
     * @param string $value
     * @param string $message
     *
     * @return AssertionException
     */
    public static function isThursday($value, $message = '')
    {
        $value = self::convertToDateTime($value);

        if (!('4' == $value->format('w'))) {
            throw new AssertionException(
                ($message) ? $message : self::ASSERT_IS_THURSDAY
            );
        }
    }

    /**
     * @param string $value
     * @param string $message
     *
     * @return AssertionException
     */
    public static function isFriday($value, $message = '')
    {
        $value = self::convertToDateTime($value);

        if (!('5' == $value->format('w'))) {
            throw new AssertionException(
                ($message) ? $message : self::ASSERT_IS_FRIDAY
            );
        }
    }

    /**
     * @param string $value
     * @param string $message
     *
     * @return AssertionException
     */
    public static function isSaturday($value, $message = '')
    {
        $value = self::convertToDateTime($value);

        if (!('6' == $value->format('w'))) {
            throw new AssertionException(
                ($message) ? $message : self::ASSERT_IS_SATURDAY
            );
        }
    }

    /**
     * @param string $value
     * @param string $message
     *
     * @return AssertionException
     */
    public static function isSunday($value, $message = '')
    {
        $value = self::convertToDateTime($value);

        if (!('0' == $value->format('w'))) {
            throw new AssertionException(
                ($message) ? $message : self::ASSERT_IS_SUNDAY
            );
        }
    }

    /**
     * @param DateTime $value
     * @param string   $message
     *
     * @return AssertionException
     */
    public static function isToday($value, $message = '')
    {
        $value = self::convertToDateTime($value);

        $date = new DateTime('now');

        if (!($date->format('Y-m-d') === $value->format('Y-m-d'))) {
            throw new AssertionException(
                ($message) ? $message : self::ASSERT_IS_TODAY
            );
        }
    }

    /**
     * @param DateTime $value
     * @param string   $message
     *
     * @return AssertionException
     */
    public static function isYesterday($value, $message = '')
    {
        $value = self::convertToDateTime($value);

        $date = new DateTime('now - 1 day');

        if (!($date->format('Y-m-d') === $value->format('Y-m-d'))) {
            throw new AssertionException(
                ($message) ? $message : self::ASSERT_IS_YESTERDAY
            );
        }
    }

    /**
     * @param DateTime $value
     * @param string   $message
     *
     * @return AssertionException
     */
    public static function isTomorrow($value, $message = '')
    {
        $value = self::convertToDateTime($value);

        $date = new DateTime('now + 1 day');

        if (!($date->format('Y-m-d') === $value->format('Y-m-d'))) {
            throw new AssertionException(
                ($message) ? $message : self::ASSERT_IS_TOMORROW
            );
        }
    }

    /**
     * Determines if the instance is a leap year.
     *
     *
     * @param DateTime $value
     * @param string   $message
     *
     * @return AssertionException
     */
    public static function isLeapYear($value, $message = '')
    {
        $value = self::convertToDateTime($value);

        if (!(('1' == $value->format('L')))) {
            throw new AssertionException(
                ($message) ? $message : self::ASSERT_IS_LEAP_YEAR
            );
        }
    }

    /**
     * @param string $value
     * @param string $message
     *
     * @return AssertionException
     */
    public static function isMorning($value, $message = '')
    {
        $value = self::convertToDateTime($value);
        $date = strtotime($value->format('H:i:s'));

        if (!($date >= strtotime($value->format('06:00:00')) && $date <= strtotime($value->format('11:59:59')))) {
            throw new AssertionException(
                ($message) ? $message : self::ASSERT_IS_MORNING
            );
        }
    }

    /**
     * @param string $value
     * @param string $message
     *
     * @return AssertionException
     */
    public static function isAfternoon($value, $message = '')
    {
        $value = self::convertToDateTime($value);
        $date = strtotime($value->format('H:i:s'));

        if (!($date >= strtotime($value->format('12:00:00')) && $date <= strtotime($value->format('17:59:59')))) {
            throw new AssertionException(
                ($message) ? $message : self::ASSERT_IS_AFTERNOON
            );
        }
    }

    /**
     * @param string $value
     * @param string $message
     *
     * @return AssertionException
     */
    public static function isEvening($value, $message = '')
    {
        $value = self::convertToDateTime($value);
        $date = strtotime($value->format('H:i:s'));

        if (!($date >= strtotime($value->format('18:00:00')) && $date <= strtotime($value->format('23:59:59')))) {
            throw new AssertionException(
                ($message) ? $message : self::ASSERT_IS_EVENING
            );
        }
    }

    /**
     * @param        $value
     * @param string $message
     *
     * @return AssertionException
     */
    public static function isNight($value, $message = '')
    {
        $value = self::convertToDateTime($value);
        $date = strtotime($value->format('H:i:s'));

        if (!($date >= strtotime($value->format('00:00:00')) && $date <= strtotime($value->format('05:59:59')))) {
            throw new AssertionException(
                ($message) ? $message : self::ASSERT_IS_NIGHT
            );
        }
    }
}
