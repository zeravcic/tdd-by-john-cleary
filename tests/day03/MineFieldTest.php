<?php
/**
 * Created by PhpStorm.
 *
 * PHP version 5.6, 7
 *
 * @package Zeravcic\TddByJohnCleary\Test\Day03
 * @author  Nikola Zeravcic <niks986@gmail.com>
 * @license <http://opensource.org/licenses/gpl-license.php GPL
 * @link    http://nikolazeravcic.iz.rs Personal site
 */

namespace Zeravcic\TddByJohnCleary\Tests\day03;

use Zeravcic\TddByJohnCleary\day03\MineField;

// require_once __DIR__ . "/../../src/day03/MineField.php";



/**
 * Class MineFieldTest
 *
 * @package Zeravcic\TddByJohnCleary\Test\Day03
 * @author  Nikola Zeravcic <niks986@gmail.com>
 * @license <http://opensource.org/licenses/gpl-license.php GPL
 * @link    http://nikolazeravcic.iz.rs Personal site
 * @see     Zeravcic\TddByJohnCleary\Day03\MineField::class
 */
class MineFieldTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Table has set for game
     * @var array
     */
    protected $mineGame;

    /**
     * Set Up
     *
     * @return void
     */
    public function setUp()
    {
        $minefield = array(
            0 => array ('*', '.', '.', '.'),
            1 => array ('.', '.', '*', '.'),
            2 => array ('.', '.', '.', '.'),
        );
        $this->mineGame = new MineField($minefield);
    }

    /**
     * Test Mine Field
     *
     * @return void
     */
    public function testMineField()
    {
        $minefield = $this->mineGame->getMineField();
        $this->assertTrue(is_array($minefield));
        $this->assertTrue(is_array($minefield[0]));
        $this->assertTrue(is_array($minefield[1]));
        $this->assertTrue(is_array($minefield[2]));
        $this->assertCount(4, $minefield[0]);
        $this->assertCount(4, $minefield[1]);
        $this->assertCount(4, $minefield[2]);
    }

    /**
     * Test Is mine
     *
     * @return void
     */
    public function testIsMine()
    {
        $this->isTrue($this->mineGame->isMine(0, 0));
        $this->assertEquals(false, $this->mineGame->isMine(0, 1));
        $this->assertEquals(false, $this->mineGame->isMine(0, 2));
        $this->assertEquals(false, $this->mineGame->isMine(0, 3));
        $this->assertEquals(false, $this->mineGame->isMine(1, 0));
        $this->assertEquals(false, $this->mineGame->isMine(1, 1));
        $this->isTrue($this->mineGame->isMine(1, 2));
        $this->assertEquals(false, $this->mineGame->isMine(1, 3));
        $this->assertEquals(false, $this->mineGame->isMine(2, 0));
        $this->assertEquals(false, $this->mineGame->isMine(2, 1));
        $this->assertEquals(false, $this->mineGame->isMine(2, 2));
        $this->assertEquals(false, $this->mineGame->isMine(2, 3));
    }

    /**
     * Test Mine around
     *
     * @return void
     */
    public function testMinesAround()
    {
        $this->assertEquals(2, $this->mineGame->getMinesAround(0, 1));
        $this->assertEquals(1, $this->mineGame->getMinesAround(0, 2));
        $this->assertEquals(1, $this->mineGame->getMinesAround(0, 3));
        $this->assertEquals(1, $this->mineGame->getMinesAround(1, 0));
        $this->assertEquals(2, $this->mineGame->getMinesAround(1, 1));
        $this->assertEquals(1, $this->mineGame->getMinesAround(1, 3));
        $this->assertEquals(0, $this->mineGame->getMinesAround(2, 0));
        $this->assertEquals(1, $this->mineGame->getMinesAround(2, 1));
        $this->assertEquals(1, $this->mineGame->getMinesAround(2, 2));
        $this->assertEquals(1, $this->mineGame->getMinesAround(2, 3));
    }
}
