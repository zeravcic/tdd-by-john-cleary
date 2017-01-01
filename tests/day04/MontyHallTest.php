<?php
/**
 * Created by PhpStorm.
 *
 * PHP version 5.6, 7
 *
 * @package Zeravcic\TddByJohnCleary\Test\day04
 * @author  Nikola Zeravcic <niks986@gmail.com>
 * @license <http://opensource.org/licenses/gpl-license.php GPL
 * @link    http://nikolazeravcic.iz.rs Personal site
 */

namespace Zeravcic\TddByJohnCleary\Tests\day04;

use Zeravcic\TddByJohnCleary\day04\MontyHall;
use Zeravcic\TddByJohnCleary\day04\MontyHallStrategy;
use PHPUnit\Framework\TestCase;

// require_once __DIR__ . "/../../src/day04/MontyHall.php";
// require_once __DIR__ . "/../../src/day04/MontyHallStrategy.php";
// require_once __DIR__ . "/../../src/day04/PlayerMustPickFirstException.php";



/**
 * Class MontyHallTest
 *
 * @package Zeravcic\TddByJohnCleary\Test\day04
 * @author  Nikola Zeravcic <niks986@gmail.com>
 * @license <http://opensource.org/licenses/gpl-license.php GPL
 * @link    http://nikolazeravcic.iz.rs Personal site
 * @see     Zeravcic\TddByJohnCleary\day04\MontyHall::class
 */
class MontyHallTest extends TestCase
{
    /**
     * Test that player must pick the door first
     *
     * @expectedException Zeravcic\TddByJohnCleary\day04\PlayerMustPickFirstException
     * @return void
     */
    public function testPlayerMustPlayFirst()
    {
        $montyGame = new MontyHall();
        $montyGame->hostOpenDoorWithGoat();
    }

    /**
     * Test what is behind door which host opened
     *
     * @return void
     */
    public function testHostOpenDoorWithGoat()
    {
        $montyGame = new MontyHall();
        $montyGame->randomlyPickDoor();
        $doorId = $montyGame->hostOpenDoorWithGoat();
        $this->assertTrue(is_integer($doorId));
        $this->assertEquals('Goat', $montyGame->getWhatIsBehindDoor($doorId));
        $montyGame->restartGame();
        $montyGame->randomlyPickDoor();
        $doorId = $montyGame->hostOpenDoorWithGoat();
        $this->assertTrue(is_integer($doorId));
        $this->assertEquals('Goat', $montyGame->getWhatIsBehindDoor($doorId));
    }

    /**
     * Test strategy results
     * If we change door after host open one We have more chances to win the Car
     *
     * @return void
     */
    public function testStrategy()
    {
        $strategy = new MontyHallStrategy();
        $strategyChange = $strategy->runMontyGames(true);
        $strategyStick = $strategy->runMontyGames(false);
        $this->assertArrayHasKey('Car', $strategyChange);
        $this->assertArrayHasKey('Goat', $strategyChange);
        $this->assertArrayHasKey('Car', $strategyStick);
        $this->assertArrayHasKey('Goat', $strategyStick);
        $this->assertGreaterThan($strategyStick['Car'], $strategyChange['Car']);
    }
}
