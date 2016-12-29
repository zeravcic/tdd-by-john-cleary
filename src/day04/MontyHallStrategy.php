<?php
/**
 * Created by PhpStorm.
 *
 * PHP version 5.6, 7
 *
 * @package Zeravcic\TddByJohnCleary\day04
 * @author  Nikola Zeravcic <niks986@gmail.com>
 * @license <http://opensource.org/licenses/gpl-license.php GPL
 * @link    http://nikolazeravcic.iz.rs Personal site
 */


namespace Zeravcic\TddByJohnCleary\day04;


/**
 * Class Strategy
 *
 * @package Zeravcic\TddByJohnCleary\day04
 * @author  Nikola Zeravcic <niks986@gmail.com>
 * @license <http://opensource.org/licenses/gpl-license.php GPL
 * @link    http://nikolazeravcic.iz.rs Personal site
 * @see     Zeravcic\TddByJohnCleary\day04\MontyHall::class
 */
class MontyHallStrategy
{
    /**
     * Run 1000 Monty Games
     * Pick strategy to change doors after host pick one,
     * or to stick with the first choice
     *
     * @param $changeDoor
     * @return array
     */
    public function runMontyGames($changeDoor)
    {
        $gameMemory = array(
            'Car' => 0,
            'Goat' => 0,
        );

        $montyGame = new MontyHall();

        for ($i=1; $i <=1000; $i++)
        {
            $montyGame->randomlyPickDoor();
            $montyGame->hostOpenDoorWithGoat();
            $result = $montyGame->openTheDoor($changeDoor);
            $gameMemory[$result] ++;
        }

        return $gameMemory;
    }
}
