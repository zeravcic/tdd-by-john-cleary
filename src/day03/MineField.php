<?php
/**
 * Created by PhpStorm.
 *
 * PHP version 5.6, 7
 *
 * @package Zeravcic\TddByJohnCleary\day03
 * @author  Nikola Zeravcic <niks986@gmail.com>
 * @license <http://opensource.org/licenses/gpl-license.php GPL
 * @link    http://nikolazeravcic.iz.rs Personal site
 */


namespace Zeravcic\TddByJohnCleary\day03;


/**
 * Class MineField
 *
 * @package Zeravcic\TddByJohnCleary\day03
 * @author  Nikola Zeravcic <niks986@gmail.com>
 * @license <http://opensource.org/licenses/gpl-license.php GPL
 * @link    http://nikolazeravcic.iz.rs Personal site
 * @see     Zeravcic\TddByJohnCleary\day03\Test\MineFieldTest::class
 */
class MineField
{
    /**
     * Field with mines
     * @var array
     */
    private $minefield = array();
    /**
     * Field height
     * @var int
     */
    private $height;
    /**
     * Field width
     * @var int
     */
    private $width;
    /**
     * Create mine
     * @param $minefield
     */
    public function __construct($minefield)
    {
        $this->minefield = $minefield;
        $this->height = count($minefield);
        $this->width = count($minefield[0]);
    }
    /**
     * Get mine as array
     * @return array
     */
    public function getMineField()
    {
        return $this->minefield;
    }
    /**
     * Is mine at the field ?
     * @param $x
     * @param $y
     * @return bool
     */
    public function isMine($x, $y)
    {
        return $this->minefield[$x][$y] === '*';
    }
    /**
     * Get start from index for move around field
     * @param $x
     * @return int
     */
    private function getMinAround($x)
    {
        return ($x - 1) < 0 ? 0 : $x - 1;
    }
    /**
     * Get end index for move around field
     * @param $x
     * @param $max
     * @return mixed
     */
    private function getMaxAround($x, $max)
    {
        return ($x + 1) > $max - 1 ? $max - 1 : $x + 1;
    }
    /**
     * Get number of mines around this field
     * @param $x
     * @param $y
     * @return int
     */
    public function getMinesAround($x, $y)
    {
        $x_min = $this->getMinAround($x);
        $x_max = $this->getMaxAround($x, $this->height);
        $y_min = $this->getMinAround($y);
        $y_max = $this->getMaxAround($y, $this->width);
        $minesCounted = 0;
        for ($i = $x_min; $i <= $x_max; $i++)
        {
            for ($j = $y_min; $j <= $y_max; $j++)
            {
                if ($i == $x and $y == $j)
                    continue;
                if ($this->isMine($i, $j))
                {
                    ++$minesCounted;
                }
            }
        }
        return $minesCounted;
    }
}
