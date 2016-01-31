<?php

/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 31/01/16
 * Time: 20:52.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace NilPortugues\Tests\Assert;

/**
 * Class Dummy.
 */
class Dummy extends \DateTime implements DummyInterface
{
    /**
     * @var string
     */
    private $userName = 'username';

    /**
     * @return string
     */
    public function getUserName()
    {
        return $this->userName;
    }
}
