<?php

namespace NilPortugues\Tests\Assert;

use Exception;
use NilPortugues\Assert\Assert;
use NilPortugues\Assert\Assertions\FloatAssertions;

class AssertFloatTest extends \PHPUnit_Framework_TestCase
{
    public function testItShouldCheckIfItIsFloat()
    {
        Assert::isFloat(3.14);
    }

    public function testItShouldCheckIfItIsFloatThrowsException()
    {
        $this->setExpectedException(Exception::class);
        FloatAssertions::isFloat(3);
    }

    public function testItShouldCheckIfItIsNotZero()
    {
        Assert::isNotZero(3.14);
        Assert::isNotZero(0.00000001);
    }

    public function testItShouldCheckIfItIsNotZeroThrowsException1()
    {
        $this->setExpectedException(Exception::class);
        Assert::isNotZero(0.00);
    }

    public function testItShouldCheckIfItIsNotZeroThrowsException2()
    {
        $this->setExpectedException(Exception::class);
        Assert::isNotZero(0);
    }

    public function testItShouldCheckIfItIsPositive()
    {
        Assert::isPositive(3.14);
    }

    public function testItShouldCheckIfItIsPositiveThrowsException1()
    {
        $this->setExpectedException(Exception::class);
        Assert::isPositive(0);
    }

    public function testItShouldCheckIfItIsPositiveThrowsException2()
    {
        $this->setExpectedException(Exception::class);
        Assert::isPositive(-3.14);
    }

    public function testItShouldCheckIfItIsPositiveOrZero()
    {
        Assert::isPositiveOrZero(3.14);
        Assert::isPositiveOrZero(0);
    }

    public function testItShouldCheckIfItIsPositiveOrZeroThrowsException1()
    {
        $this->setExpectedException(Exception::class);
        Assert::isPositiveOrZero(-3.14);
    }

    public function testItShouldCheckIfItIsNegative()
    {
        Assert::isNegative(-3.14);
    }

    public function testItShouldCheckIfItIsNegativeThrowsException1()
    {
        $this->setExpectedException(Exception::class);
        Assert::isNegative(0);
    }

    public function testItShouldCheckIfItIsNegativeThrowsException2()
    {
        $this->setExpectedException(Exception::class);
        Assert::isNegative(3.14);
    }

    public function testItShouldCheckIfItIsNegativeOrZero()
    {
        Assert::isNegativeOrZero(-3.14);
        Assert::isNegativeOrZero(0);
    }

    public function testItShouldCheckIfItIsNegativeOrZeroThrowsException()
    {
        $this->setExpectedException(Exception::class);
        Assert::isNegativeOrZero(3.14);
    }

    public function testItShouldCheckIfItIsBetween()
    {
        Assert::isBetween(3.14, 1.2, 5.6, false);
        Assert::isBetween(3.14, 1.2, 3.14, true);
    }

    public function testItShouldCheckIfItIsBetweenThrowsException1()
    {
        $this->setExpectedException(Exception::class);
        Assert::isBetween(13.14, 1.2, 5.6, false);
    }

    public function testItShouldCheckIfItIsBetweenThrowsException2()
    {
        $this->setExpectedException(Exception::class);
        Assert::isBetween(13.14, 1.2, 3.14, true);
    }

    public function testItShouldCheckStringIsBetweenThrowsException()
    {
        $this->setExpectedException(Exception::class);
        Assert::isBetween(3.14, 12.3, 4.2, false);
    }

    public function testItShouldCheckIfItIsOdd()
    {
        Assert::isOdd(1.1);
    }

    public function testItShouldCheckIfItIsOddThrowsException()
    {
        $this->setExpectedException(Exception::class);
        Assert::isOdd(6.5);
    }

    public function testItShouldCheckIfItIsOddWithIntegers()
    {
        FloatAssertions::isOdd(1);
    }

    public function testItShouldCheckIfItIsOddWithIntegersThrowsException()
    {
        $this->setExpectedException(Exception::class);
        FloatAssertions::isOdd(6);
    }

    public function testItShouldCheckIfItIsEven()
    {
        Assert::isEven(2.2);
    }

    public function testItShouldCheckIfItIsEvenThrowsException()
    {
        $this->setExpectedException(Exception::class);
        Assert::isEven(5.4);
    }

    public function testItShouldCheckIfItIsEvenWithIntegers()
    {
        FloatAssertions::isEven(2);
    }

    public function testItShouldCheckIfItIsEvenWithIntegersThrowsException()
    {
        $this->setExpectedException(Exception::class);
        FloatAssertions::isEven(5);
    }

    public function testItShouldCheckIfItIsMultiple()
    {
        Assert::isMultiple(5.00, 2.50);
    }

    public function testItShouldCheckIfItIsMultipleThrowsException()
    {
        $this->setExpectedException(Exception::class);
        Assert::isMultiple(3.14, 1);
    }
}
