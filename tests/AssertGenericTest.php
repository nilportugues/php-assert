<?php

namespace NilPortugues\Tests\Assert;

use Exception;
use NilPortugues\Assert\Assert;

class AssertGenericTest extends \PHPUnit_Framework_TestCase
{
    public function testItShouldCheckIfIsRequired()
    {
        $value = 'asdsdadds';
        Assert::isRequired($value);
    }

    public function testItShouldCheckIfIsRequiredThrowsException1()
    {
        $this->setExpectedException(Exception::class);
        $value = null;
        Assert::isRequired($value);
    }

    public function testItShouldCheckIsNotNull()
    {
        $value = 'asdsdadds';
        Assert::isNotNull($value);
    }

    public function testItShouldCheckIsNotNullThrowsException1()
    {
        $this->setExpectedException(Exception::class);
        $value = null;
        Assert::isNotNull($value);
    }

    public function testItShouldCheckIsNotNullThrowsException2()
    {
        $this->setExpectedException(Exception::class);
        $value = '';
        Assert::isNotNull($value);
    }

    public function testItShouldCheckLessThanOrEqual()
    {
        Assert::lessThanOrEqual(10, 10);
    }

    public function testItShouldCheckLessThanOrEqualThrowsException()
    {
        $this->setExpectedException(Exception::class);
        Assert::lessThanOrEqual(15, 10);
    }

    public function testItShouldCheckLessThan()
    {
        Assert::lessThan(5, 10);
    }

    public function testItShouldCheckLessThanThrowsException()
    {
        $this->setExpectedException(Exception::class);
        Assert::lessThan(15, 10);
    }

    public function testItShouldCheckGreaterThan()
    {
        Assert::greaterThan(100, 10);
    }

    public function testItShouldCheckGreaterThanThrowsException()
    {
        $this->setExpectedException(Exception::class);
        Assert::greaterThan(5, 10);
    }

    public function testItShouldCheckGreaterThanOrEqual()
    {
        Assert::greaterThanOrEqual(10, 10);
    }

    public function testItShouldCheckGreaterThanOrEqualThrowsException()
    {
        $this->setExpectedException(Exception::class);
        Assert::greaterThanOrEqual(5, 10);
    }

    public function testItShouldCheckNotEquals()
    {
        Assert::notEquals(6, 10);
    }

    public function testItShouldCheckNotEqualsThrowsException()
    {
        $this->setExpectedException(Exception::class);
        Assert::notEquals(10, 10);
    }
}
