<?php
/**
 * Created by PhpStorm.
 *
 * PHP version 5.6, 7
 *
 * @package Zeravcic\TddByJohnCleary\Test\day06
 * @author  Nikola Zeravcic <niks986@gmail.com>
 * @license <http://opensource.org/licenses/gpl-license.php GPL
 * @link    http://nikolazeravcic.iz.rs Personal site
 */

namespace Zeravcic\TddByJohnCleary\Tests\day06;

use PHPUnit\Framework\TestCase;
use Zeravcic\TddByJohnCleary\day06\RecentlyUsedList;

// require_once __DIR__ . "/../../src/day06/RecentlyUsedList.php";

/**
 * Class RecentlyUsedListTest
 *
 * @package Zeravcic\TddByJohnCleary\Test\day06
 * @author  Nikola Zeravcic <niks986@gmail.com>
 * @license <http://opensource.org/licenses/gpl-license.php GPL
 * @link    http://nikolazeravcic.iz.rs Personal site
 * @see     Zeravcic\TddByJohnCleary\day06\RecentlyUsedList::class
 */
class RecentlyUsedListTest extends TestCase
{
    /**
     * Test is iterator empty at start
     */
    public function testIterator()
    {
        $list = new RecentlyUsedList(5);
        $this->assertTrue($list->isEmpty());
    }

    /**
     * We test is ReadList act as LIFO list
     */
    public function testLifo()
    {
        $list = new RecentlyUsedList(5);
        $this->assertTrue($list->isEmpty());
        $list->add('First');
        $list->add('Second');
        $list->add('Third');
        $this->assertFalse($list->isEmpty());
        $this->assertEquals('Third', $list->read());
        $this->assertEquals('Second', $list->read());
        $this->assertEquals('First', $list->read());
        $this->assertTrue($list->isEmpty());
    }

    /**
     * We test can we add empty item in Read list
     * @expectedException \Zeravcic\TddByJohnCleary\day06\EmptyItemException
     */
    public function testEmtyItem()
    {
        $list = new RecentlyUsedList(5);
        $list->add('');
        $list->add(null);
    }

    /**
     *  @expectedException \Zeravcic\TddByJohnCleary\day06\DuplicateItemException
     */
    public function testDoubleItem()
    {
        $list = new RecentlyUsedList(5);
        $list->add('one');
        // Double one expected Exception
        $list->add('one');
    }

    /**
     * We test getByIndex method
     */
    public function testGetByIndex()
    {
        $list = new RecentlyUsedList(5);
        $this->assertFalse($list->getByIndex(1));
        $list->add('one');
        $list->add('two');
        $list->add('three');
        $list->add('4');
        $this->assertFalse($list->getByIndex(9));
        $this->assertEquals('two', $list->getByIndex(1));
        $this->assertEquals('4', $list->getByIndex(3));
        $this->assertEquals('one', $list->getByIndex(0));
        $this->assertEquals('three', $list->getByIndex(2));
        $this->assertTrue($list->isEmpty());
    }
}
