<?php

namespace NilPortugues\Tests\Assert;

use Exception;
use NilPortugues\Assert\Assert;
use NilPortugues\Assert\Assertions\ObjectAssertions;

class AssertObjectTest extends \PHPUnit_Framework_TestCase
{
    public function testItShouldCheckIfIsObject()
    {
        Assert::isObject(new \stdClass());
    }

    public function testItShouldCheckIfIsObjectThrowsException()
    {
        $this->setExpectedException(Exception::class);
        ObjectAssertions::isObject('a');
    }

    public function testItShouldCheckIfIsInstanceOf()
    {
        Assert::isInstanceOf(new \DateTime(), 'DateTime');
    }

    public function testItShouldCheckIfIsInstanceOfThrowsException1()
    {
        $this->setExpectedException(Exception::class);
        Assert::isInstanceOf(new \stdClass(), 'DateTime');
    }

    public function testItShouldCheckIfIsInstanceOfThrowsException2()
    {
        $this->setExpectedException(Exception::class);
        Assert::isInstanceOf('a', 'DateTime');
    }

    public function testItShouldCheckIfHasProperty()
    {
        $dummy = new Dummy();
        Assert::hasProperty($dummy, 'userName');
    }

    public function testItShouldCheckIfHasPropertyThrowException()
    {
        $dummy = new Dummy();
        $this->setExpectedException(Exception::class);
        Assert::hasProperty($dummy, 'password');
    }

    public function testItShouldCheckIfHasMethod()
    {
        $dummy = new Dummy();
        Assert::hasMethod($dummy, 'getUserName');
    }

    public function testItShouldCheckIfHasMethodThrowException()
    {
        $dummy = new Dummy();
        $this->setExpectedException(Exception::class);
        Assert::hasMethod($dummy, 'getPassword');
    }

    public function testItShouldCheckIfHasParentClass()
    {
        Assert::hasParentClass(new Dummy());
    }

    public function testItShouldCheckIfHasParentClassThrowException()
    {
        $this->setExpectedException(Exception::class);
        Assert::hasParentClass(new \stdClass());
    }

    public function testItShouldCheckIfIsChildOf()
    {
        $dummy = new Dummy();
        Assert::isChildOf($dummy, 'DateTime');
    }

    public function testItShouldCheckIfIsChildOfThrowException()
    {
        $dummy = new Dummy();
        $this->setExpectedException(Exception::class);
        Assert::isChildOf($dummy, 'DateTimeZone');
    }

    public function testItShouldCheckIfInheritsFrom()
    {
        $dummy = new Dummy();
        Assert::inheritsFrom($dummy, 'DateTime');
    }

    public function testItShouldCheckIfInheritsFromThrowException()
    {
        $dummy = new Dummy();
        $this->setExpectedException(Exception::class);
        Assert::inheritsFrom($dummy, 'DateTimeZone');
    }

    public function testItShouldCheckHasInterface()
    {
        $dummy = new Dummy();
        Assert::hasInterface($dummy, DummyInterface::class);
    }

    public function testItShouldCheckHasInterfaceFromThrowException()
    {
        $this->setExpectedException(Exception::class);
        Assert::hasInterface(new \stdClass(), DummyInterface::class);
    }
}
