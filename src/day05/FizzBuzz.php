<?php
/**
 * Created by PhpStorm.
 *
 * PHP version 5.6, 7
 *
 * @package Zeravcic\TddByJohnCleary\day05
 * @author  Nikola Zeravcic <niks986@gmail.com>
 * @license <http://opensource.org/licenses/gpl-license.php GPL
 * @link    http://nikolazeravcic.iz.rs Personal site
 */


namespace Zeravcic\TddByJohnCleary\day05;


/**
 * Class FizzBuzz
 *
 * @package Zeravcic\TddByJohnCleary\day05
 * @author  Nikola Zeravcic <niks986@gmail.com>
 * @license <http://opensource.org/licenses/gpl-license.php GPL
 * @link    http://nikolazeravcic.iz.rs Personal site
 * @see     Zeravcic\TddByJohnCleary\day05\Test\FizzBuzzTest::class
 */
class FizzBuzz
{
    public function getResponse($number)
    {
        $number = (int) $number;

        switch ($number) {
            case 0 :
                return $number;
            case $number % 3 === 0 && $number % 5 === 0 :
                return 'FizzBuzz';
            case $number % 3 === 0 :
                return 'Fizz';
            case $number % 5 === 0 :
                return 'Buzz';
            default :
                return $number;
        }

    }
}