<?php

namespace GradeBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CoursControllerTest extends WebTestCase
{
    public function testRead()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/read');
    }

    public function testCreate()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/create');
    }

    public function testDelete()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/delete');
    }

}
