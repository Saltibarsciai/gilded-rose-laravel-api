<?php

namespace Tests\Feature;

use Tests\TestCase;

class RoutesTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testIndexMethod()
    {
        $response = $this->get('/items');

        $response->assertStatus(200);
    }
    public function testShowMethod()
    {
        $response = $this->get('/items/1');

        $response->assertStatus(200);
    }
}
