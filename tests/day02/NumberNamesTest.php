<?php
/**
 * Created by PhpStorm.
 *
 * PHP version 5.6, 7
 *
 * @package Zeravcic\TddByJohnCleary\Test\Day02
 * @author  Nikola Zeravcic <niks986@gmail.com>
 * @license <http://opensource.org/licenses/gpl-license.php GPL
 * @link    http://nikolazeravcic.iz.rs Personal site
 */

namespace Zeravcic\TddByJohnCleary\Tests\day02;

use Zeravcic\TddByJohnCleary\day02\NumberNames;

// require_once __DIR__ . "/../../src/day02/NumberNames.php";



/**
 * Class NumberNamesTest
 *
 * @package Zeravcic\TddByJohnCleary\Test\Day02
 * @author  Nikola Zeravcic <niks986@gmail.com>
 * @license <http://opensource.org/licenses/gpl-license.php GPL
 * @link    http://nikolazeravcic.iz.rs Personal site
 * @see     Zeravcic\TddByJohnCleary\Day02\NumberNames::class
 */
class NumberNamesTest extends \PHPUnit_Framework_TestCase
{
    /**
     * NumberNames object
     * @var NumberNames
     */
    protected $nn;

    /**
     * Set up testing
     *
     * return void
     */
    public function setUp()
    {
        $this->nn = new NumberNames();
    }

    /**
     * Test for 1-9
     *
     * return void
     */
    public function testFromZeroToNine()
    {
        $this->assertEquals('nine', $this->nn->say(9));
        $this->assertEquals('', $this->nn->say(0));
        $this->assertEquals('eight', $this->nn->say('8'));
        $this->assertEquals('three', $this->nn->say('03'));
        $this->assertEquals('two', $this->nn->say(2));
        $this->assertEquals('seven', $this->nn->say(7));
    }
    /**
     * Test for 10-99
     *
     * return void
     */
    public function testFromTenToNinetyNine()
    {
        $this->assertEquals('ninety nine', $this->nn->say(99));
        $this->assertEquals('ten', $this->nn->say(10));
        $this->assertEquals('seventy nine', $this->nn->say(79));
        $this->assertEquals('twelve', $this->nn->say(12));
        $this->assertEquals('twenty five', $this->nn->say(25));
        $this->assertEquals('twenty three', $this->nn->say(23));
        $this->assertEquals('thirty six', $this->nn->say(36));
    }
    /**
     * Test for big numbers
     *
     * return void
     */
    public function testFromNinetyNineToLargeNum()
    {
        $this->assertEquals('one hundred', $this->nn->say(100));
        $this->assertEquals('three hundred', $this->nn->say(300));
        $this->assertEquals('three hundred and ten', $this->nn->say(310));
        $this->assertEquals('one thousand, five hundred and one', $this->nn->say(1501));
        $this->assertEquals('twelve thousand, six hundred and nine', $this->nn->say(12609));
        $this->assertEquals('five hundred and twelve thousand, six hundred and seven', $this->nn->say(512607));
        $this->assertEquals('forty three million, one hundred and twelve thousand, six hundred and three', $this->nn->say(43112603));
    }
}
