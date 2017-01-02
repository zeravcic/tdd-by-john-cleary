<?php
/**
 * Created by PhpStorm.
 *
 * PHP version 5.6, 7
 *
 * @package Zeravcic\TddByJohnCleary\Test\day05
 * @author  Nikola Zeravcic <niks986@gmail.com>
 * @license <http://opensource.org/licenses/gpl-license.php GPL
 * @link    http://nikolazeravcic.iz.rs Personal site
 */

namespace Zeravcic\TddByJohnCleary\Tests\day05;

use PHPUnit\Framework\TestCase;
use Zeravcic\TddByJohnCleary\day05\FizzBuzz;

// require_once __DIR__ . "/../../src/day05/FizzBuzz.php";



/**
 * Class FizzBuzzTest
 *
 * @package Zeravcic\TddByJohnCleary\Test\day05
 * @author  Nikola Zeravcic <niks986@gmail.com>
 * @license <http://opensource.org/licenses/gpl-license.php GPL
 * @link    http://nikolazeravcic.iz.rs Personal site
 * @see     Zeravcic\TddByJohnCleary\day05\FizzBuzz::class
 */
class FizzBuzzTest extends TestCase
{
    /**
     *
     */
    public function testGetValue()
    {
        $fizzBuzz = new FizzBuzz();
        $this->assertEquals(0, $fizzBuzz->getResponse(0));
        $this->assertEquals(1, $fizzBuzz->getResponse(1));
        $this->assertEquals(2, $fizzBuzz->getResponse(2));
        $this->assertEquals('Fizz', $fizzBuzz->getResponse(3));
        $this->assertEquals(4, $fizzBuzz->getResponse(4));
        $this->assertEquals('Buzz', $fizzBuzz->getResponse(5));
        $this->assertEquals('Fizz', $fizzBuzz->getResponse(6));
        $this->assertEquals(7, $fizzBuzz->getResponse(7));
        $this->assertEquals('FizzBuzz', $fizzBuzz->getResponse(15));
        $this->assertEquals('Fizz', $fizzBuzz->getResponse(99));
        $this->assertEquals('Buzz', $fizzBuzz->getResponse(100));
    }
}
