<?php

namespace NilPortugues\Tests\Assert;

use DateTime;
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
}
