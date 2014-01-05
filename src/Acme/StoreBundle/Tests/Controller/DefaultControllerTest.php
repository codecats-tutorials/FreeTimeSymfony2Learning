<?php

namespace Acme\StoreBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();
        
        $clawler = $client->request('GET', '/hello/query/1');
        
        $this->assertTrue($clawler->filter('html:contains("Ball")')->count() > 0);
        
        $this->assertTrue($clawler->filter('html:contains("witaj")')->count() > 0);
        
        //$link = $clawler->filter('a:contains("witaj")')->eq(0)->link();
        
        $link = $clawler->selectLink('witaj')->link();
        
        $clawler = $client->click($link);
        
        $this->assertCount(1 ,$clawler->filter('html:contains("Hello Test Ss!!")'));
    }
}
