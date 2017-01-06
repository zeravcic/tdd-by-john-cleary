<?php

/**
 * Created by PhpStorm.
 *
 * PHP version 5.6, 7
 *
 * @package Zeravcic\TddByJohnCleary\Test\day07
 * @author  Nikola Zeravcic <niks986@gmail.com>
 * @license <http://opensource.org/licenses/gpl-license.php GPL
 * @link    http://nikolazeravcic.iz.rs Personal site
 */

namespace Zeravcic\TddByJohnCleary\Tests\day07;

use PHPUnit\Framework\TestCase;
use Zeravcic\TddByJohnCleary\day07\MapOfVariables;
use Zeravcic\TddByJohnCleary\day07\TemplateEngine;

/**
 * Class TemplateEngineTest
 *
 * @package Zeravcic\TddByJohnCleary\Test\day07
 * @author  Nikola Zeravcic <niks986@gmail.com>
 * @license <http://opensource.org/licenses/gpl-license.php GPL
 * @link    http://nikolazeravcic.iz.rs Personal site
 * @see     Zeravcic\TddByJohnCleary\day07\TemplateEngine::class
 */
class TemplateEngineTest extends TestCase
{

    protected $templateEngine;
    protected $mapOfVariables;
    /**
     * Set up
     */
    public function setUp()
    {
        $this->templateEngine = new TemplateEngine();
        $this->mapOfVariables = new MapOfVariables();
    }
    /**
     * Testing Evaluate
     */
    public function testEvaluate()
    {
        $this->mapOfVariables->put("firstName", "Cenk");
        $this->mapOfVariables->put("lastName", "Civici");

        $this->assertEquals("Hello Cenk", $this->templateEngine->evaluate("Hello {firstName}", $this->mapOfVariables));
        $this->assertEquals("Hello Cenk Civici", $this->templateEngine->evaluate("Hello {firstName} {lastName}", $this->mapOfVariables));
        $this->assertEquals("Hello {notExist}", $this->templateEngine->evaluate("Hello {notExist}", $this->mapOfVariables));
    }

    /**
     * Testing complex content
     */
    public function testEvaluateComplex()
    {
        $this->mapOfVariables->put("firstName", "Cenk");

        $this->assertEquals('Hello ${Cenk}', $this->templateEngine->evaluate('Hello ${{firstName}}', $this->mapOfVariables));
    }

    /**
     * Exception test
     *
     * @expectedException \Zeravcic\TddByJohnCleary\day07\InvalidValueException
     */
    public function testEvaluateMapVariableNotExistException()
    {
        $this->templateEngine->evaluate("Hello {firstName}", $this->mapOfVariables);
    }
}
