<?php

/**
 * Created by PhpStorm.
 *
 * PHP version 5.6, 7
 *
 * @package Zeravcic\TddByJohnCleary\Test\day07
 * @author  Nikola Zeravcic <niks986@gmail.com>
 * @license <http://opensource.org/licenses/gpl-license.php GPL
 * @link    http://nikolazeravcic.iz.rs Personal site
 */

namespace Zeravcic\TddByJohnCleary\Tests\day07;

use PHPUnit\Framework\TestCase;
use Zeravcic\TddByJohnCleary\day07\MapOfVariables;

/**
 * Class MapOfVariablesTest
 *
 * @package Zeravcic\TddByJohnCleary\Test\day07
 * @author  Nikola Zeravcic <niks986@gmail.com>
 * @license <http://opensource.org/licenses/gpl-license.php GPL
 * @link    http://nikolazeravcic.iz.rs Personal site
 * @see     Zeravcic\TddByJohnCleary\day07\MapOfVariables::class
 */
class MapOfVariablesTest extends TestCase
{
    protected $mapOfVariables;
    /**
     *
     */
    public function setUp()
    {
        $this->mapOfVariables = new MapOfVariables();
    }

    /**
     *
     */
    public function testPut()
    {
        $this->assertNotEquals($this->mapOfVariables, $this->mapOfVariables->put('1', '2'));
        $this->assertNotEquals($this->mapOfVariables, $this->mapOfVariables->put(1, 2));
        $this->assertNotEquals($this->mapOfVariables, $this->mapOfVariables->put('1'));
        $this->assertNotEquals($this->mapOfVariables, $this->mapOfVariables->put(1));
    }

    /**
     * @expectedException \Zeravcic\TddByJohnCleary\day07\InvalidValueException
     */
    public function testPutException()
    {
        $this->assertNotEquals($this->mapOfVariables, $this->mapOfVariables->put(new \stdClass(), '2'));
    }

    /**
     * Testing return data
     */
    public function testGetData()
    {
        $this->mapOfVariables->put('1', '2');
        $this->assertEquals(['{1}' => '2'], $this->mapOfVariables->getData());

        $this->mapOfVariables->put(3, '4');
        $this->assertEquals(['{1}' => '2', '{3}' => '4'], $this->mapOfVariables->getData());
    }

    /**
     * Testing return data exception
     *
     * @expectedException \Zeravcic\TddByJohnCleary\day07\InvalidValueException
     */
    public function testGetDataException()
    {
        $this->mapOfVariables->getData();
    }

}
