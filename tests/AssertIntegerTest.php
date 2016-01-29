<?php

namespace NilPortugues\Tests\Assert;

use Exception;
use NilPortugues\Assert\Assert;
use NilPortugues\Assert\Assertions\IntegerAssertions;

class AssertIntegerTest extends \PHPUnit_Framework_TestCase
{
    public function testItShouldCheckIfItIsFloat()
    {
        Assert::isInteger(3);
    }

    public function testItShouldCheckIfItIsFloatThrowsException()
    {
        $this->setExpectedException(Exception::class);
        IntegerAssertions::isInteger(3.14);
    }

    public function testItShouldCheckIfItIsNotZero()
    {
        Assert::isNotZero(3);
    }

    public function testItShouldCheckIfItIsNotZeroThrowsException()
    {
        $this->setExpectedException(Exception::class);
        Assert::isNotZero(0);
    }

    public function testItShouldCheckIfItIsPositive()
    {
        Assert::isPositive(3);
    }

    public function testItShouldCheckIfItIsPositiveThrowsException1()
    {
        $this->setExpectedException(Exception::class);
        Assert::isPositive(-3);
    }

    public function testItShouldCheckIfItIsPositiveThrowsException2()
    {
        $this->setExpectedException(Exception::class);
        Assert::isPositive(0);
    }

    public function testItShouldCheckIfItIsPositiveOrZero()
    {
        Assert::isPositiveOrZero(3);
        Assert::isPositiveOrZero(0);
    }

    public function testItShouldCheckIfItIsPositiveOrZeroThrowsException()
    {
        $this->setExpectedException(Exception::class);
        Assert::isPositiveOrZero(-3);
    }

    public function testItShouldCheckIfItIsNegativeOrZero()
    {
        Assert::isNegativeOrZero(-3);
        Assert::isNegativeOrZero(0);
    }

    public function testItShouldCheckIfItIsNegativeOrZeroThrowsException()
    {
        $this->setExpectedException(Exception::class);
        Assert::isNegativeOrZero(3);
    }

    public function testItShouldCheckIfItIsNegative()
    {
        Assert::isNegative(-3);
    }

    public function testItShouldCheckIfItIsNegativeThrowsException()
    {
        $this->setExpectedException(Exception::class);
        Assert::isNegative(3);
    }

    public function testItShouldCheckIfItIsBetween()
    {
        Assert::isBetween(3, 1, 5, false);
        Assert::isBetween(3, 1, 3, true);
    }

    public function testItShouldCheckIfItIsBetweenThrowsException1()
    {
        $this->setExpectedException(Exception::class);
        Assert::isBetween(13, 1, 5, false);
    }

    public function testItShouldCheckIfItIsBetweenThrowsException2()
    {
        $this->setExpectedException(Exception::class);
        Assert::isBetween(13, 1, 3, true);
    }

    public function testItShouldCheckStringIsBetweenException()
    {
        $this->setExpectedException(Exception::class);
        Assert::isBetween(3, 12, 4, false);
    }

    public function testItShouldCheckIfItIsOdd()
    {
        Assert::isOdd(3);
    }

    public function testItShouldCheckIfItIsOddThrowsException()
    {
        $this->setExpectedException(Exception::class);
        Assert::isOdd(4);
    }

    public function testItShouldCheckIfItIsEven()
    {
        Assert::isEven(4);
    }

    public function testItShouldCheckIfItIsEvenThrowsException()
    {
        $this->setExpectedException(Exception::class);
        Assert::isEven(3);
    }

    public function testItShouldCheckIfItIsMultiple()
    {
        Assert::isMultiple(6, 3);
    }

    public function testItShouldCheckIfItIsMultipleThrowsException()
    {
        $this->setExpectedException(Exception::class);
        Assert::isMultiple(13, 7);
    }
}
