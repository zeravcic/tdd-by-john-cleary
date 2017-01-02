<?php
/**
 * Created by PhpStorm.
 *
 * PHP version 5.6, 7
 *
 * @package Zeravcic\TddByJohnCleary\day06
 * @author  Nikola Zeravcic <niks986@gmail.com>
 * @license <http://opensource.org/licenses/gpl-license.php GPL
 * @link    http://nikolazeravcic.iz.rs Personal site
 */


namespace Zeravcic\TddByJohnCleary\day06;


/**
 * Class RecentlyUsedList
 *
 * @package Zeravcic\TddByJohnCleary\day06
 * @author  Nikola Zeravcic <niks986@gmail.com>
 * @license <http://opensource.org/licenses/gpl-license.php GPL
 * @link    http://nikolazeravcic.iz.rs Personal site
 * @see     Zeravcic\TddByJohnCleary\day06\Test\RecentlyUsedListTest::class
 */
class RecentlyUsedList
{
    /**
     * List with read stuff LIFO type
     * @var array
     */
    private $readList = array();

    /**
     * List capacity
     * @var
     */
    private $capacity;

    /**
     * Position
     * @var
     */
    private $position;

    /**
     * Construct ReadLust with capacity
     * @param $capacity
     */
    public function __construct($capacity = false)
    {
        $this->capacity = $capacity;
        $this->position = 0;
    }

    /**
     * Is ReadList empty
     * @return bool
     */
    public function isEmpty()
    {
        return empty($this->readList);
    }

    /**
     * Add item into ReadList
     * @param $item
     * @throws \Zeravcic\TddByJohnCleary\day06\DuplicateItemException
     * @throws \Zeravcic\TddByJohnCleary\day06\EmptyItemException
     */
    public function add($item)
    {
        if (empty($item))
        {
            throw new EmptyItemException('Item can\'t be empty.');
        }
        if (in_array($item, $this->readList))
        {
            throw new DuplicateItemException('Can\'t have duplicate items in list');
        }
        $this->readList[] = $item;
    }
    /**
     * Read and remove item from list
     * LIFO
     * @return string
     */

    public function read()
    {
        if (($position = count($this->readList)) == 0)
        {
            return '';
        }
        $read = $this->readList[$position - 1];
        unset($this->readList[$position - 1]);
        return $read;
    }

    /**
     * Read and remove item from list
     * @param $index
     * @return bool
     */
    public function getByIndex($index)
    {
        if (array_key_exists($index, $this->readList))
        {
            $read = $this->readList[$index];
            unset($this->readList[$index]);
            return $read;
        }
        return false;
    }
}
