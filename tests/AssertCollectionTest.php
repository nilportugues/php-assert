<?php

/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 1/02/16
 * Time: 0:36.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace NilPortugues\Tests\Assert;

use Exception;
use NilPortugues\Assert\Assert;
use NilPortugues\Assert\Assertions\CollectionAssertions;

class AssertCollectionTest extends \PHPUnit_Framework_TestCase
{
    public function testIsArray()
    {
        Assert::isArray([]);
    }

    public function testIsArrayThrowsException()
    {
        $this->setExpectedException(Exception::class);
        CollectionAssertions::isArray('a');
    }

    public function testIsEach()
    {
        $array = ['some-value'];

        $valueAssert = function () {};
        $keyAssert = function () {};
        Assert::each($array, $valueAssert, $keyAssert);
    }

    public function testIsEachThrowsException()
    {
        $array = ['some-value'];

        $valueAssert = function () {};
        $keyAssert = function ($key) {
            Assert::isUUID($key, false);
        };

        $this->setExpectedException(Exception::class);
        Assert::each($array, $valueAssert, $keyAssert);
    }

    public function testHasKeyFormat()
    {
        $array = ['some-value'];
        $keyAssert = function () {};
        Assert::hasKeyFormat($array, $keyAssert);
    }

    public function testHasKeyFormatWithArrayObject()
    {
        $array = new \ArrayObject();
        $array[] = 'some-value';

        $keyAssert = function () {};
        Assert::hasKeyFormat($array, $keyAssert);
    }

    public function testHasKeyFormatWithSplFixedArray()
    {
        $array = new \SplFixedArray(1);
        $array[0] = 'some-value';

        $keyAssert = function () {};
        Assert::hasKeyFormat($array, $keyAssert);
    }

    public function testHasKeyFormatThrowsException()
    {
        $array = ['some-value'];
        $keyAssert = function ($key) {
            Assert::isUUID($key, false);
        };

        $this->setExpectedException(Exception::class);
        Assert::hasKeyFormat($array, $keyAssert);
    }

    public function testItEndsWithStrict()
    {
        $array = new \SplFixedArray(2);
        $array[0] = 'some-value';
        $array[1] = 'last-value';

        Assert::endsWith($array, 'last-value', true);
    }
    public function testItEndsWithNotStrict()
    {
        $array = new \SplFixedArray(2);
        $array[0] = 'some-value';
        $array[1] = 1337;

        Assert::endsWith($array, '1337');
    }

    public function testItEndsWithStrictThrowsException()
    {
        $array = new \SplFixedArray(2);
        $array[0] = 'some-value';
        $array[1] = 'last-value';

        $this->setExpectedException(Exception::class);
        Assert::endsWith($array, 'not-there', true);
    }

    public function testItEndsWithNotStrictThrowsException()
    {
        $array = new \SplFixedArray(2);
        $array[0] = 'some-value';
        $array[1] = 1337;

        $this->setExpectedException(Exception::class);
        Assert::endsWith($array, '1338');
    }

    public function testItContainsStrictArrayObject()
    {
        $array = new \ArrayObject();
        $array[0] = 'some-value';
        $array[1] = 'last-value';

        Assert::contains($array, 'last-value', true);
    }

    public function testItContainsStrictSplFixedArray()
    {
        $array = new \SplFixedArray(2);
        $array[0] = 'some-value';
        $array[1] = 'last-value';

        Assert::contains($array, 'last-value', true);
    }

    public function testItContainsNotStrict()
    {
        $array = new \SplFixedArray(2);
        $array[0] = 'some-value';
        $array[1] = 1337;

        Assert::contains($array, '1337');
    }

    public function testItContainsStrictThrowsException()
    {
        $array = new \SplFixedArray(2);
        $array[0] = 'some-value';
        $array[1] = 'last-value';

        $this->setExpectedException(Exception::class);
        Assert::contains($array, 'not-there', true);
    }

    public function testItContainsNotStrictThrowsException()
    {
        $array = new \SplFixedArray(2);
        $array[0] = 'some-value';
        $array[1] = 1337;

        $this->setExpectedException(Exception::class);
        Assert::contains($array, '1338');
    }

    public function testItHasKey()
    {
        $array = new \SplFixedArray(2);
        $array[0] = 'some-value';
        $array[1] = 'last-value';

        Assert::hasKey($array, 1);
    }

    public function testItHasKeyThrowsException()
    {
        $array = new \SplFixedArray(2);
        $array[0] = 'some-value';
        $array[1] = 'last-value';

        $this->setExpectedException(Exception::class);
        Assert::hasKey($array, 100);
    }

    public function testItHasLength()
    {
        $array = new \SplFixedArray(2);
        $array[0] = 'some-value';
        $array[1] = 'last-value';

        Assert::hasLength($array, 2);
    }

    public function testItHasLengthThrowsException()
    {
        $array = new \SplFixedArray(2);
        $array[0] = 'some-value';
        $array[1] = 'last-value';

        $this->setExpectedException(Exception::class);
        Assert::hasLength($array, 100);
    }

    public function testIsNotEmpty()
    {
        $array = new \SplFixedArray(2);
        $array[0] = 'some-value';
        $array[1] = 'last-value';

        Assert::isNotEmpty($array);
    }

    public function testIsNotEmptyThrowsException()
    {
        $this->setExpectedException(Exception::class);
        Assert::isNotEmpty([]);
    }

    public function testItStartsWithStrict()
    {
        $array = new \SplFixedArray(2);
        $array[0] = 'some-value';
        $array[1] = 'last-value';

        Assert::startsWith($array, 'some-value', true);
    }
    public function testItStartsWithNotStrict()
    {
        $array = new \SplFixedArray(2);
        $array[0] = 'some-value';
        $array[1] = 1337;

        Assert::startsWith($array, 'some-value');
    }

    public function testItStartsWithStrictThrowsException()
    {
        $array = new \SplFixedArray(2);
        $array[0] = 'some-value';
        $array[1] = 'last-value';

        $this->setExpectedException(Exception::class);
        Assert::startsWith($array, 'not-there', true);
    }

    public function testItStartsWithNotStrictThrowsException()
    {
        $array = new \SplFixedArray(2);
        $array[0] = 'some-value';
        $array[1] = 1337;

        $this->setExpectedException(Exception::class);
        Assert::startsWith($array, '1338');
    }
}
