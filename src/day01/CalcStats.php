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


namespace Zeravcic\TddByJohnCleary\Day01;


/**
 * Class CalcStats
 *
 * @package Zeravcic\TddByJohnCleary\Day01
 * @author  Nikola Zeravcic <niks986@gmail.com>
 * @license <http://opensource.org/licenses/gpl-license.php GPL
 * @link    http://nikolazeravcic.iz.rs Personal site
 * @see     Zeravcic\TddByJohnCleary\Day01\Test\CalcStats::class
 */
class CalcStats
{
    /**
     * Array of numbers
     *
     * @var array
     */
    public $values = array();

    /**
     * CalcStats constructor.
     *
     * @param array $values Array of numbers
     */
    public function __construct($values) 
    {
        $this->values = $values;
    }

    /**
     * Min value from array
     *
     * @return mixed
     */
    public function minValue() 
    {
        return min($this->values);
    }

    /**
     * Max value from array
     *
     * @return mixed
     */
    public function maxValue() 
    {
        return max($this->values);
    }

    /**
     * Number of array elements
     *
     * @return int
     */
    public function count() 
    {
        return count($this->values);
    }

    /**
     * Average value
     *
     * @return float
     */
    public function averageValue() 
    {
        return round(array_sum($this->values) / count($this->values), 2);
    }

}
