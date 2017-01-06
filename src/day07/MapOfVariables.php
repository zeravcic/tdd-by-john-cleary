<?php
/**
 * Created by PhpStorm.
 *
 * PHP version 5.6, 7
 *
 * @package Zeravcic\TddByJohnCleary\day07
 * @author  Nikola Zeravcic <niks986@gmail.com>
 * @license <http://opensource.org/licenses/gpl-license.php GPL
 * @link    http://nikolazeravcic.iz.rs Personal site
 */

namespace Zeravcic\TddByJohnCleary\day07;

/**
 * Class MapOfVariables
 *
 * @package Zeravcic\TddByJohnCleary\day07
 * @author  Nikola Zeravcic <niks986@gmail.com>
 * @license <http://opensource.org/licenses/gpl-license.php GPL
 * @link    http://nikolazeravcic.iz.rs Personal site
 * @see     Zeravcic\TddByJohnCleary\day07\Test\MapOfVariablesTest::class
 */
class MapOfVariables
{
    /**
     * @var array Array of variables
     */
    private $data;

    /**
     * Prepare input data
     *
     * @param $key
     * @param $value
     * @throws InvalidValueException
     * @return void
     */
    public function put($key, $value = '')
    {
        if(! is_string($key) && ! is_numeric($key)) {
            throw new InvalidValueException('Variable name is invalid');
        }

         $this->data['{' . (string) $key . '}'] = $value;
    }

    /**
     * @return array Array of variables
     * @throws InvalidValueException
     */
    public function getData()
    {
        if (empty((array) $this->data)) {
            throw new InvalidValueException('Variable does not exist in the map');
        }
        return (array) $this->data;
    }
}