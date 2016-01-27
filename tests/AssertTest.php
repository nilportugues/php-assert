<?php

namespace NilPortugues\Tests\Assert;

use NilPortugues\Assert\Assert;
use RuntimeException;

class AssertTest extends \PHPUnit_Framework_TestCase
{
    public function testItWillThrowRuntimeExceptionWhenNonExistentMethodIsCalled()
    {
        $this->setExpectedException(RuntimeException::class);
        Assert::hola();
    }
}
