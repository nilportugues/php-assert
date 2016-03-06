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
use DateTimeImmutable;
use DateTimeInterface;
use DateTimeZone;
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
    const ASSERT_FUTURE_DATE = 'Date provided is not set in the future.';
    const ASSERT_PAST_DATE = 'Date provided is not set in the past.';
    const ASSERT_IS_QUARTER = 'Date provided does not belong to the quarter %s of the year.';
    const ASSERT_IS_TRIMESTER = 'Date provided does not belong to the trimester %s of the year.';
    const ASSERT_IS_SECOND_FIRST_YEAR = 'Date provided does not belong to the second half of the year.';
    const ASSERT_IS_SECOND_HALF_YEAR = 'Date provided does not belong to the second half of the year.';
    const ASSERT_IS_IN_YEAR = 'Date provided does not belong to year %s.';
    const ASSERT_IS_IN_NEXT_YEAR = 'Date provided does not belong to next year (%s).';
    const ASSERT_IS_IN_PAST_YEAR = 'Date provided does not belong to past year (%s).';
    const ASSERT_IS_IN_MONTH = 'Date provided does not belong to month (%s).';
    const ASSERT_IS_IN_NEXT_MONTH = 'Date provided does not belong to next month (%s).';
    const ASSERT_IS_IN_PAST_MONTH = 'Date provided does not belong to last month (%s).';
    const ASSERT_IS_IN_WEEK = 'Date provided does not belong to week %s.';
    const ASSERT_IS_NEXT_WEEK = 'Date provided does not belong to next week.';
    const ASSERT_IS_LAST_WEEK = 'Date provided does not belong to last week.';
    const ASSERT_IS_DST = 'Date provided is not in DST.';

    /**
     * Checks if a value is a a valid datetime format.
     *
     * @param string|DateTimeInterface $value
     * @param string                   $message
     *
     * @throws AssertionException
     */
    public static function isDateTime($value, $message = '')
    {
        if ($value instanceof DateTimeInterface) {
            return;
        }

        try {
            $date = new DateTimeImmutable($value);
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
     * Checks if a given date is happening after the given limiting date.
     *
     * @param string|DateTimeInterface $value
     * @param string|DateTimeInterface $limit
     * @param bool                     $inclusive
     * @param string                   $message
     *
     * @throws AssertionException
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
     * @param string|DateTimeInterface $value
     *
     * @return DateTimeImmutable
     */
    private static function convertToDateTime($value)
    {
        if ($value instanceof DateTimeInterface) {
            return new DateTimeImmutable($value->format(DATE_ATOM));
        }

        return new DateTimeImmutable($value);
    }

    /**
     * Checks if a given date is happening before the given limiting date.
     *
     * @param string|DateTimeInterface $value
     * @param string|DateTimeInterface $limit
     * @param bool                     $inclusive
     * @param string                   $message
     *
     * @throws AssertionException
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
     * @param string|DateTimeInterface $value
     * @param bool                     $inclusive
     * @param string                   $minDate
     * @param string                   $maxDate
     * @param string                   $message
     *
     * @throws AssertionException
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
     * @param string|DateTimeInterface $value
     * @param string                   $message
     *
     * @throws AssertionException
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
     * @param string|DateTimeInterface $value
     * @param string                   $message
     *
     * @throws AssertionException
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
     * @param string|DateTimeInterface $value
     * @param string                   $message
     *
     * @throws AssertionException
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
     * @param string|DateTimeInterface $value
     * @param string                   $message
     *
     * @throws AssertionException
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
     * @param string|DateTimeInterface $value
     * @param string                   $message
     *
     * @throws AssertionException
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
     * @param string|DateTimeInterface $value
     * @param string                   $message
     *
     * @throws AssertionException
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
     * @param string|DateTimeInterface $value
     * @param string                   $message
     *
     * @throws AssertionException
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
     * @param string|DateTimeInterface $value
     * @param string                   $message
     *
     * @throws AssertionException
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
     * @param string|DateTimeInterface $value
     * @param string                   $message
     *
     * @throws AssertionException
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
     * @param string|DateTimeInterface $value
     * @param string                   $message
     *
     * @throws AssertionException
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
     * @param string|DateTimeInterface $value
     * @param string                   $message
     *
     * @throws AssertionException
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
     * @param string|DateTimeInterface $value
     * @param string                   $message
     *
     * @throws AssertionException
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
     * @param string|DateTimeInterface $value
     * @param string                   $message
     *
     * @throws AssertionException
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
     * @param string|DateTimeInterface $value
     * @param string                   $message
     *
     * @throws AssertionException
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
     * @param string|DateTimeInterface $value
     * @param string                   $message
     *
     * @throws AssertionException
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
     * @param string|DateTimeInterface $value
     * @param string                   $message
     *
     * @throws AssertionException
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
     * @param string|DateTimeInterface $value
     * @param string                   $message
     *
     * @throws AssertionException
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

    /**
     * @param string|DateTimeInterface $value
     * @param string                   $message
     *
     * @throws AssertionException
     */
    public static function isFutureDate($value, $message = '')
    {
        $value = self::convertToDateTime($value);

        if (false === ($value > new DateTime())) {
            throw new AssertionException(
                ($message) ? $message : self::ASSERT_FUTURE_DATE
            );
        }
    }

    /**
     * @param string|DateTimeInterface $value
     * @param string                   $message
     *
     * @throws AssertionException
     */
    public static function isPastDate($value, $message = '')
    {
        $value = self::convertToDateTime($value);

        if (false === ($value < new DateTime())) {
            throw new AssertionException(
                ($message) ? $message : self::ASSERT_PAST_DATE
            );
        }
    }

    /**
     * @param string|DateTimeInterface $value
     * @param string                   $message
     *
     * @throws AssertionException
     */
    public static function isInNextWeek($value, $message = '')
    {
        $nextWeek = (new DateTime('now +1 week'))->format('W');

        self::isInWeek(
            $value,
            $nextWeek,
            ($message) ? $message : sprintf(self::ASSERT_IS_NEXT_WEEK, $nextWeek)
        );
    }

    /**
     * @param string|DateTimeInterface $value
     * @param                          $weekNumber
     * @param string                   $message
     */
    public static function isInWeek($value, $weekNumber, $message = '')
    {
        $weekValue = (int) self::convertToDateTime($value)->format('W');
        $weekNumber = (int) $weekNumber;

        if (false === ($weekValue == $weekNumber)) {
            throw new AssertionException(
                ($message) ? $message : sprintf(self::ASSERT_IS_IN_WEEK, $weekNumber)
            );
        }
    }

    /**
     * @param string|DateTimeInterface $value
     * @param string                   $message
     *
     * @throws AssertionException
     */
    public static function isInLastWeek($value, $message = '')
    {
        $lastWeek = (int) (new DateTime('now -1 week'))->format('W');

        self::isInWeek(
            $value,
            $lastWeek,
            ($message) ? $message : sprintf(self::ASSERT_IS_LAST_WEEK, $lastWeek)
        );
    }

    /**
     * @param string|DateTimeInterface $value
     * @param string                   $message
     *
     * @throws AssertionException
     */
    public static function isInLastMonth($value, $message = '')
    {
        $date = strtotime('-1 month');
        $past = DateTime::createFromFormat('U', $date);

        self::isInMonth(
            $value,
            $past->format('m'),
            ($message) ? $message : sprintf(self::ASSERT_IS_IN_PAST_MONTH, $past->format('F'))
        );
    }

    /**
     * @param string|DateTimeInterface $value
     * @param                          $monthNumber
     * @param string                   $message
     */
    public static function isInMonth($value, $monthNumber, $message = '')
    {
        $value = self::convertToDateTime($value);
        $currentYear = date('Y');


        if ($currentYear != $value->format('Y') ||
            $monthNumber != $value->format('n')
        ) {
            throw new AssertionException(
                ($message) ? $message : sprintf(self::ASSERT_IS_IN_MONTH, (new DateTime('1970-'.$monthNumber.'-01'))->format('F'))
            );
        }
    }

    /**
     * @param string|DateTimeInterface $value
     * @param string                   $message
     *
     * @throws AssertionException
     */
    public static function isInNextMonth($value, $message = '')
    {
        $date = strtotime('+1 month');
        $next = DateTime::createFromFormat('U', $date);

        self::isInMonth(
            $value,
            $next->format('m'),
            ($message) ? $message : sprintf(self::ASSERT_IS_IN_NEXT_MONTH, $next->format('F'))
        );
    }

    /**
     * @param string|DateTimeInterface $value
     * @param string                   $message
     *
     * @throws AssertionException
     */
    public static function isInLastYear($value, $message = '')
    {
        $pastYear = (new DateTime('now -1 year'))->format('Y');

        self::isInYear(
            $value,
            $pastYear,
            ($message) ? $message : sprintf(self::ASSERT_IS_IN_PAST_YEAR, $pastYear)
        );
    }

    /**
     * @param string|DateTimeInterface $value
     * @param string                   $yearNumber
     * @param string                   $message
     */
    public static function isInYear($value, $yearNumber, $message = '')
    {
        $value = self::convertToDateTime($value);

        if ($value->format('Y') != $yearNumber) {
            throw new AssertionException(
                ($message) ? $message : sprintf(self::ASSERT_IS_IN_YEAR, $yearNumber)
            );
        }
    }

    /**
     * @param string|DateTimeInterface $value
     * @param string                   $message
     *
     * @throws AssertionException
     */
    public static function isInNextYear($value, $message = '')
    {
        $next = (new DateTime('now +1 year'))->format('Y');

        self::isInYear(
            $value,
            $next,
            ($message) ? $message : sprintf(self::ASSERT_IS_IN_NEXT_YEAR, $next)
        );
    }

    /**
     * @param string|DateTimeInterface $value
     * @param string                   $message
     *
     * @throws AssertionException
     */
    public static function isFirstHalfOfYear($value, $message = '')
    {
        $value = self::convertToDateTime($value);
        $half = (int) (($value->format('n') - 1) / 6);

        if (1 == $half) {
            throw new AssertionException(
                ($message) ? $message : self::ASSERT_IS_SECOND_HALF_YEAR
            );
        }
    }

    /**
     * @param string|DateTimeInterface $value
     * @param string                   $message
     *
     * @throws AssertionException
     */
    public static function isSecondHalfOfYear($value, $message = '')
    {
        $value = self::convertToDateTime($value);
        $half = (int) (($value->format('n') - 1) / 6);

        if (0 == $half) {
            throw new AssertionException(
                ($message) ? $message : self::ASSERT_IS_SECOND_HALF_YEAR
            );
        }
    }

    /**
     * @param string|DateTimeInterface $value
     * @param string                   $trimester
     * @param string                   $message
     *
     * @throws AssertionException
     */
    public static function isTrimesterOfYear($value, $trimester, $message = '')
    {
        $trimester = (int) $trimester;

        if ($trimester < 1 || $trimester > 4) {
            throw new AssertionException('Provided trimester value must range from 1 to 4');
        }

        $value = self::convertToDateTime($value);
        $currentTrimester = (int) (($value->format('n') - 1) / 3);

        if ($currentTrimester != ($trimester - 1)) {
            throw new AssertionException(
                ($message) ? $message : sprintf(self::ASSERT_IS_TRIMESTER, $trimester)
            );
        }
    }

    /**
     * @param string|DateTimeInterface $value
     * @param string                   $quarter
     * @param string                   $message
     *
     * @throws AssertionException
     */
    public static function isQuarterOfYear($value, $quarter, $message = '')
    {
        $quarter = (int) $quarter;
        if ($quarter < 1 || $quarter > 3) {
            throw new AssertionException('Provided quarter value must range from 1 to 3');
        }

        $value = self::convertToDateTime($value);
        $currentQuarter = (($value->format('n')) / 4);

        if ($currentQuarter != $quarter) {
            throw new AssertionException(
                ($message) ? $message : sprintf(self::ASSERT_IS_QUARTER, $quarter)
            );
        }
    }

    /**
     * @param string|DateTimeInterface $value
     * @param DateTimeZone             $timeZone
     * @param string                   $message
     */
    public static function isDayLightSavingTime($value, DateTimeZone $timeZone, $message = '')
    {
        $value = self::convertToDateTime($value);
        $transitions = timezone_transitions_get($timeZone, $value->getTimestamp(), $value->getTimestamp());

        if (is_array($transitions) && !empty($transitions)) {
            foreach ($transitions as $transition) {
                if (0 == $transition['isdst']) {
                    throw new AssertionException(($message) ? $message : self::ASSERT_IS_DST);
                }
            }
        }
    }
}
