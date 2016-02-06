<?php

namespace NilPortugues\Tests\Assert;

use DateTime;
use DateTimeZone;
use Exception;
use NilPortugues\Assert\Assert;
use NilPortugues\Assert\Assertions\DateTimeAssertions;

class AssertDateTimeTest extends \PHPUnit_Framework_TestCase
{
    public function testItShouldCheckIfDate()
    {
        $date1 = '2012-01-01 00:00:00';
        $date2 = new DateTime($date1);

        DateTimeAssertions::isDateTime($date1);
        DateTimeAssertions::isDateTime($date2);
    }

    public function testItShouldCheckIfDateThrowsException1()
    {
        $this->setExpectedException(Exception::class);
        $date1 = '2012-13-13 00:00:00';
        DateTimeAssertions::isDateTime($date1);
    }

    public function testItShouldCheckIfDateIsBefore()
    {
        $date1 = '2012-01-01 00:00:00';
        $date2 = new DateTime($date1);
        $limit1 = '2013-12-31 23:59:59';

        Assert::isBefore($date1, $limit1, false);
        Assert::isBefore($date2, $limit1, false);
        Assert::isBefore($date1, $date1, true);
        Assert::isBefore($date2, $date2, true);
    }

    public function testItShouldCheckIfDateIsBeforeThrowsException1()
    {
        $date1 = '2012-01-01 00:00:00';
        $limit2 = '2010-01-01 00:00:00';

        $this->setExpectedException(Exception::class);
        Assert::isBefore($date1, $limit2);
    }

    public function testItShouldCheckIfDateIsBeforeThrowsException2()
    {
        $date1 = '2012-01-01 00:00:00';
        $date2 = new DateTime($date1);
        $limit2 = '2010-01-01 00:00:00';

        $this->setExpectedException(Exception::class);
        Assert::isBefore($date2, $limit2, true);
    }

    public function testItShouldCheckIfDateIsAfter()
    {
        $date1 = '2014-01-01 00:00:00';
        $date2 = new DateTime($date1);

        $limit1 = '2013-12-31 23:59:59';

        Assert::isAfter($date1, $limit1, false);
        Assert::isAfter($date2, $limit1, false);

        Assert::isAfter($date1, $date1, true);
        Assert::isAfter($date2, $date2, true);
    }

    public function testItShouldCheckIfDateIsAfterThrowsException1()
    {
        $date1 = '2014-01-01 00:00:00';
        $limit2 = '2015-01-01 00:00:00';

        $this->setExpectedException(Exception::class);
        Assert::isAfter($date1, $limit2);
    }

    public function testItShouldCheckIfDateIsAfterThrowsException2()
    {
        $date1 = '2014-01-01 00:00:00';
        $date2 = new DateTime($date1);
        $limit2 = '2015-01-01 00:00:00';

        $this->setExpectedException(Exception::class);
        Assert::isAfter($date2, $limit2, true);
    }

    public function testItShouldCheckIfDateisDateRange()
    {
        $date1 = '2014-01-01 00:00:00';
        $date2 = new DateTime($date1);

        $minDate = '2013-01-01 00:00:00';
        $maxDate = '2015-01-01 00:00:00';

        Assert::isDateRange($date1, $minDate, $maxDate, false);
        Assert::isDateRange($date2, $minDate, $maxDate, false);

        Assert::isDateRange($date1, $minDate, $maxDate, true);
        Assert::isDateRange($date2, $minDate, $maxDate, true);
    }

    public function testItShouldCheckIfDateisDateRangeThrowsException1()
    {
        $date1 = '2014-01-01 00:00:00';
        $minDate = '2013-12-01 00:00:00';
        $maxDate = '2013-12-30 00:00:00';

        $this->setExpectedException(Exception::class);
        Assert::isDateRange($date1, $minDate, $maxDate, false);
    }

    public function testItShouldCheckIfDateisDateRangeThrowsException2()
    {
        $date1 = '2014-01-01 00:00:00';
        $minDate = '2013-12-01 00:00:00';
        $maxDate = '2013-12-30 00:00:00';

        $this->setExpectedException(Exception::class);
        Assert::isDateRange($date1, $minDate, $maxDate, true);
    }

    public function testItShouldCheckIfIsMonday()
    {
        Assert::isMonday('2014-09-22');
    }

    public function testItShouldCheckIfIsMondayThrowsException()
    {
        $this->setExpectedException(Exception::class);
        Assert::isMonday('2014-09-23');
    }

    public function testItShouldCheckIfIsTuesday()
    {
        Assert::isTuesday('2014-09-23');
    }

    public function testItShouldCheckIfIsTuesdayThrowsException()
    {
        $this->setExpectedException(Exception::class);
        Assert::isTuesday('2014-09-24');
    }

    public function testItShouldCheckIfIsWednesday()
    {
        Assert::isWednesday('2014-09-24');
    }

    public function testItShouldCheckIfIsWednesdayThrowsException()
    {
        $this->setExpectedException(Exception::class);
        Assert::isWednesday('2014-09-25');
    }

    public function testItShouldCheckIfIsThursday()
    {
        Assert::isThursday('2014-09-25');
    }

    public function testItShouldCheckIfIsThursdayThrowsException()
    {
        $this->setExpectedException(Exception::class);
        Assert::isThursday('2014-09-26');
    }

    public function testItShouldCheckIfIsFriday()
    {
        Assert::isFriday('2014-09-26');
    }

    public function testItShouldCheckIfIsFridayThrowsException()
    {
        $this->setExpectedException(Exception::class);
        Assert::isFriday('2014-09-27');
    }

    public function testItShouldCheckIfIsSaturday()
    {
        Assert::isSaturday('2014-09-27');
    }

    public function testItShouldCheckIfIsSaturdayThrowsException()
    {
        $this->setExpectedException(Exception::class);
        Assert::isSaturday('2014-09-28');
    }

    public function testItShouldCheckIfIsSunday()
    {
        Assert::isSunday('2014-09-28');
    }

    public function testItShouldCheckIfIsSundayThrowsException()
    {
        $this->setExpectedException(Exception::class);
        Assert::isSunday('2014-09-29');
    }

    public function testItShouldCheckIfIsToday()
    {
        $date = new DateTime('now');
        Assert::isToday($date);
    }

    public function testItShouldCheckIfIsTodayThrowsException()
    {
        $this->setExpectedException(Exception::class);
        $date = new DateTime('now -1day');
        Assert::isToday($date);
    }

    public function testItShouldCheckIfIsYesterday()
    {
        $date = new DateTime('now -1 day');
        Assert::isYesterday($date);
    }

    public function testItShouldCheckIfIsYesterdayThrowsException()
    {
        $this->setExpectedException(Exception::class);
        $date = new DateTime('now');
        Assert::isYesterday($date);
    }

    public function testItShouldCheckIfIsTomorrow()
    {
        $date = new DateTime('now +1 day');
        Assert::isTomorrow($date);
    }

    public function testItShouldCheckIfIsTomorrowThrowsException()
    {
        $this->setExpectedException(Exception::class);
        $date = new DateTime('now');
        Assert::isTomorrow($date);
    }

    public function testItShouldCheckIfIsLeapYear()
    {
        $date = new DateTime('2016-01-01');
        Assert::isLeapYear($date);
    }

    public function testItShouldCheckIfIsLeapYearThrowsException()
    {
        $this->setExpectedException(Exception::class);
        $date = new DateTime('2015-01-01');
        Assert::isLeapYear($date);
    }

    public function testItShouldCheckIfIsWeekend()
    {
        Assert::isWeekend('2014-09-20');

        $this->setExpectedException(Exception::class);
        Assert::isWeekend('2014-09-22');
    }

    public function testItShouldCheckIfIsWeekday()
    {
        Assert::isWeekday('2016-01-29');
    }

    public function testItShouldCheckIfIsWeekdayThrowsException()
    {
        $this->setExpectedException(Exception::class);
        Assert::isWeekday('2016-01-30');
    }

    public function testItShouldCheckIfIsMorning()
    {
        Assert::isMorning('07:20:15');
    }

    public function testItShouldCheckIfIsMorningThrowsException()
    {
        $this->setExpectedException(Exception::class);
        Assert::isMorning('20:15:00');
    }

    public function testItShouldCheckIfIsAfternoon()
    {
        Assert::isAfternoon('12:00:00');
    }

    public function testItShouldCheckIfIsAfternoonThrowsException()
    {
        $this->setExpectedException(Exception::class);
        Assert::isAfternoon('20:15:00');
    }

    public function testItShouldCheckIfIsEvening()
    {
        Assert::isEvening('18:00:00');
    }

    public function testItShouldCheckIfIsEveningThrowsException()
    {
        $this->setExpectedException(Exception::class);
        Assert::isEvening('07:15:00');
    }

    public function testItShouldCheckIfIsNight()
    {
        Assert::isNight('01:00:00');
    }

    public function testItShouldCheckIfIsNightThrowsException()
    {
        $this->setExpectedException(Exception::class);
        Assert::isNight('12:15:00');
    }

    public function testItShouldCheckIfIsPast()
    {
        Assert::isPastDate(new DateTime('now -1 day'));
    }

    public function testItShouldCheckIfIsPastThrowsException()
    {
        $this->setExpectedException(Exception::class);
        Assert::isPastDate(new DateTime('now'));
    }

    public function testItShouldCheckIfIsFuture()
    {
        Assert::isFutureDate(new DateTime('now +1 day'));
    }

    public function testItShouldCheckIfIsFutureThrowsException()
    {
        $this->setExpectedException(Exception::class);
        Assert::isFutureDate(new DateTime('now'));
    }

    public function testItIsInNextWeek()
    {
        Assert::isInNextWeek(new DateTime('now +1 week'));
    }

    public function testItIsInNextWeekThrowsException()
    {
        $this->setExpectedException(Exception::class);
        Assert::isInNextWeek(new DateTime('now -1 week'));
    }

    public function testItIsInWeek()
    {
        $value = new DateTime('07-02-2016');
        $weekNumber = $value->format('W');
        Assert::isInWeek($value, $weekNumber);
    }

    public function testItIsInWeekThrowsException()
    {
        $this->setExpectedException(Exception::class);
        $value = new DateTime('07-02-2016');
        $weekNumber = (int) $value->format('W');
        Assert::isInWeek($value, $weekNumber + 1);
    }

    public function testItIsInLastWeek()
    {
        $dateTime = new DateTime();
        $lastWeek = $dateTime->modify('-7 days');
        Assert::isInLastWeek($lastWeek);
    }

    public function testItIsInLastWeekThrowsException()
    {
        $this->setExpectedException(Exception::class);
        $value = new DateTime('07-02-2015');
        Assert::isInLastWeek($value);
    }

    public function testItIsInLastMonth()
    {
        $lastMonth = new DateTime('now -20 days');
        Assert::isInLastMonth($lastMonth);
    }

    public function testItIsInLastMonthThrowsException()
    {
        $this->setExpectedException(Exception::class);
        $value = new DateTime('07-02-2015');
        Assert::isInLastMonth($value);
    }

    public function testItIsInMonth()
    {
        $next = new DateTime('07-02-2015');
        Assert::isInMonth($next, 2);
    }

    public function testItIsInMonthThrowsException()
    {
        $this->setExpectedException(Exception::class);
        $next = new DateTime('07-02-2015');
        Assert::isInMonth($next, 3);
    }

    public function testItIsInNextMonth()
    {
        $next = new DateTime('now +1 month');
        Assert::isInNextMonth($next);
    }

    public function testItIsInNextMonthThrowsException()
    {
        $this->setExpectedException(Exception::class);
        $next = new DateTime('07-02-2015');
        Assert::isInNextMonth($next);
    }

    public function testItIsInLastYear()
    {
        $next = new DateTime('now -1 year');
        Assert::isInLastYear($next);
    }

    public function testItIsInLastYearThrowsException()
    {
        $this->setExpectedException(Exception::class);
        $next = new DateTime('07-02-2013');
        Assert::isInLastYear($next);
    }

    public function testItIsInYear()
    {
        $next = new DateTime('05-02-2016');
        Assert::isInYear($next, 2016);
    }

    public function testItIsInYearThrowsException()
    {
        $this->setExpectedException(Exception::class);
        $next = new DateTime('05-02-2016');
        Assert::isInYear($next, 2017);
    }

    public function testItIsInNextYear()
    {
        $next = new DateTime('now +1 year');
        Assert::isInNextYear($next);
    }

    public function testItIsInNextYearThrowsException()
    {
        $this->setExpectedException(Exception::class);
        $next = new DateTime('now +2 year');
        Assert::isInNextYear($next);
    }

    public function testItIsFirstHalfOfYear()
    {
        $date = new DateTime('05-02-2016');
        Assert::isFirstHalfOfYear($date);
    }

    public function testItIsFirstHalfOfYearThrowsException()
    {
        $this->setExpectedException(Exception::class);
        $date = new DateTime('05-12-2016');
        Assert::isFirstHalfOfYear($date);
    }

    public function testItIsSecondHalfOfYear()
    {
        $date = new DateTime('05-12-2016');
        Assert::isSecondHalfOfYear($date);
    }

    public function testItIsSecondHalfOfYearThrowsException()
    {
        $this->setExpectedException(Exception::class);
        $date = new DateTime('05-02-2016');
        Assert::isSecondHalfOfYear($date);
    }

    public function testItIsTrimesterOfYear()
    {
        $date = new DateTime('05-12-2016');
        Assert::isTrimesterOfYear($date, 4);
    }

    public function testItIsTrimesterOfYearThrowsException()
    {
        $this->setExpectedException(Exception::class);
        $date = new DateTime('05-12-2016');
        Assert::isTrimesterOfYear($date, 3);
    }

    public function testItIsTrimesterOfYearWrongBoundsThrowsException()
    {
        $this->setExpectedException(Exception::class);
        $date = new DateTime('05-12-2016');
        Assert::isTrimesterOfYear($date, 100);
    }

    public function testItIsQuarterOfYearWrongBoundsThrowsException()
    {
        $this->setExpectedException(Exception::class);
        $date = new DateTime('05-12-2016');
        Assert::isQuarterOfYear($date, 100);
    }

    public function testItIsQuarterOfYear()
    {
        $date = new DateTime('05-12-2016');
        Assert::isQuarterOfYear($date, 3);
    }

    public function testItIsQuarterOfYearThrowsException()
    {
        $this->setExpectedException(Exception::class);
        $date = new DateTime('05-12-2016');
        Assert::isQuarterOfYear($date, 1);
    }

    public function testItIsDayLightSavingTime()
    {
        $value = new DateTime('28-03-2016', new DateTimeZone('Europe/Madrid'));
        Assert::isDayLightSavingTime($value, $value->getTimezone());
    }

    public function testItIsDayLightSavingTimeThrowsException()
    {
        $this->setExpectedException(Exception::class);
        $value = new DateTime('22-03-2016', new DateTimeZone('Europe/Madrid'));
        Assert::isDayLightSavingTime($value, $value->getTimezone());
    }
}
