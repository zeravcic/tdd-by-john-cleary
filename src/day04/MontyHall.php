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
 * Class MontyHall
 *
 * @package Zeravcic\TddByJohnCleary\day04
 * @author  Nikola Zeravcic <niks986@gmail.com>
 * @license <http://opensource.org/licenses/gpl-license.php GPL
 * @link    http://nikolazeravcic.iz.rs Personal site
 * @see     Zeravcic\TddByJohnCleary\day04\Test\MontyHallTest::class
 */
class MontyHall
{
    /**
     * Closed doors
     * @var array
     */
    protected $doors = array();

    /**
     * Door number player picked (1 - 3)
     * @var int
     */
    protected $playerPicked = null;

    /**
     * Door number host opened. Behind door is goat
     * @var int
     */
    protected $hostOpened = null;

    /**
     * Init game
     * Place car and goats behind the doors
     */
    public function __construct()
    {
        $this->randomHideCar();
    }

    /**
     * Restart game
     *
     * @return void
     */
    public function restartGame()
    {
        $this->playerPicked = null;
        $this->hostOpened = null;
        $this->doors = array();
        $this->randomHideCar();
    }

    /**
     * Return what is behind door
     *
     * @param int $doorId Door ID
     * @return mixed
     */
    public function getWhatIsBehindDoor($doorId)
    {
        return $this->doors[$doorId];
    }

    /**
     * Hide car and goats randomly
     *
     * return void
     */
    private function randomHideCar()
    {
        $carPlace = rand(1, 3);
        $this->doors[$carPlace] = 'Car';
        for ($i=1; $i<4; $i++)
        {
            ($i != $carPlace) and $this->doors[$i] = 'Goat';
        }
    }

    /**
     * Pick door randomly (1 - 3)
     *
     * @return int
     */
    public function randomlyPickDoor()
    {
        $pickDoor = rand(1, 3);
        $this->playerPicked = $pickDoor;
        return $pickDoor;
    }

    /**
     * Host open door with goat
     *
     * @throws PlayerMustPickFirstException
     * @return int
     */
    public function hostOpenDoorWithGoat()
    {
        if (is_null($this->playerPicked)) {
            throw new PlayerMustPickFirstException('Player must pick door before host open one.');
        }
        do {
            $openDoor = rand(1, 3);
        } while ($openDoor == $this->playerPicked or $this->doors[$openDoor] != 'Goat');

        $this->hostOpened = $openDoor;

        return $openDoor;
    }

    /**
     * Open the door
     *
     * @param bool $changeDoor Change the door
     * @return mixed
     */
    public function openTheDoor($changeDoor)
    {
        if (! $changeDoor)
        {
            return $this->doors[$this->playerPicked];
        }
        for ($i=1; $i<4; $i++)
        {
            if ($i != $this->playerPicked and $i != $this->hostOpened)
            {
                return $this->doors[$i];
            }
        }
    }
}
