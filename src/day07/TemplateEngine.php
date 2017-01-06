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
 * Class TemplateEngine
 *
 * @package Zeravcic\TddByJohnCleary\day07
 * @author  Nikola Zeravcic <niks986@gmail.com>
 * @license <http://opensource.org/licenses/gpl-license.php GPL
 * @link    http://nikolazeravcic.iz.rs Personal site
 * @see     Zeravcic\TddByJohnCleary\day07\Test\TemplateEngineTest::class
 */
class TemplateEngine
{
    /**
     *
     * Render html and translate input data
     *
     * @param string $string
     * @param MapOfVariables $mapOfVariables
     * @return mixed
     */
    public function evaluate($string, MapOfVariables $mapOfVariables)
    {
        $mof = $mapOfVariables->getData();

        return str_replace(array_keys($mof), $mof, $string);
    }
}
