<?php
/**
 * Created by PhpStorm.
 *
 * PHP version 5.6, 7
 *
 * @package Zeravcic\TddByJohnCleary\Test\Day01
 * @author  Nikola Zeravcic <niks986@gmail.com>
 * @license <http://opensource.org/licenses/gpl-license.php GPL
 * @link    http://nikolazeravcic.iz.rs Personal site
 */

namespace Zeravcic\TddByJohnCleary\Tests\day01;

use Zeravcic\TddByJohnCleary\day01\CalcStats;

// require_once __DIR__ . "/../../src/day01/CalcStats.php";



/**
 * Class CalcStatsTest
 *
 * @package Zeravcic\TddByJohnCleary\Test\Day01
 * @author  Nikola Zeravcic <niks986@gmail.com>
 * @license <http://opensource.org/licenses/gpl-license.php GPL
 * @link    http://nikolazeravcic.iz.rs Personal site
 * @see     Zeravcic\TddByJohnCleary\Day01\CalcStats::class
 */
class CalcStatsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Testing min value
     *
     * @return void
     */
    public function testMinValue()
    {
        $range = new CalcStats(array(17, -17, 0, 7, 777, 77));
        $this->assertEquals(-17, $range->minValue());
    }

    /**
     * Testing max value
     *
     * @return void
     */
    public function testMaxValue()
    {
        $range = new CalcStats(array(17, -17, 0, 7, 777, 77));
        $this->assertEquals(777, $range->maxValue());
    }

    /**
     * Testing count
     *
     * @return void
     */
    public function testCount()
    {
        $range = new CalcStats(array(17, -17, 0, 7, 777, 77));
        $this->assertEquals(6, $range->count($range));
    }

    /**
     * Testing average value
     *
     * @return void
     */
    public function testAverageValue()
    {
        $range = new CalcStats(array(6, 8, 9, 6, 2, 7));
        $this->assertEquals(6.33, $range->averageValue($range));
    }
}
