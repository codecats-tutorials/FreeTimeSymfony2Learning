<?php
namespace Ssstrz\TestBundle\Tests\Utility;

use Ssstrz\TestBundle\Utility\Calculator;
/**
 * Description of Calculator
 *
 * @author t
 */
class CalculatorTest extends \PHPUnit_Framework_TestCase
{
    public function testAdd()
    {
        $calc = new Calculator();
        
        $result = $calc->add(2, 2);
        
        $this->assertEquals(4, $result);
    }
}
