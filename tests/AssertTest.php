<?php

namespace NilPortugues\Tests\Assert;

use NilPortugues\Assert\Assert;
use RuntimeException;

class AssertTest extends \PHPUnit_Framework_TestCase
{
    public function testItWillAllowNullOr()
    {
        Assert::nullOrIsEmail(null);
        $this->assertTrue(true);
    }

    public function testItWillAllowNullOrFailsIfDataIsInvalid()
    {
        $this->setExpectedException(\Exception::class);
        Assert::nullOrIsEmail('not-a-mail');
    }

    public function testItWillThrowRuntimeExceptionWhenNonExistentMethodIsCalled()
    {
        $this->setExpectedException(RuntimeException::class);
        Assert::hola();
    }
}
