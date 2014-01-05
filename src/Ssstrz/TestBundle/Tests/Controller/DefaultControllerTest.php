<?php

namespace Ssstrz\TestBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/hello/query/1');

        $this->assertTrue($crawler->filter('html:contains("Ball")')->count() > 0);
        $this->assertTrue($crawler->filter('html:contains("Saw")')->count() > 0);
    }
}
