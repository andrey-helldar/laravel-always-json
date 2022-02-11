<?php

namespace Tests\Middlewares;

use Lmc\HttpConstants\Header;
use Tests\TestCase;

class SetHeaderMiddlewareTest extends TestCase
{
    public function testWeb(): void
    {
        $this
            ->get('web')
            ->assertSuccessful()
            ->assertHeader(Header::ACCEPT, 'application/json')
            ->assertJsonStructure(['data'])
            ->assertJson(['data' => 'Hello, Web!']);
    }

    public function testApi(): void
    {
        $this
            ->get('api')
            ->assertSuccessful()
            ->assertHeader(Header::ACCEPT, 'application/json')
            ->assertJsonStructure(['data'])
            ->assertJson(['data' => 'Hello, Api!']);
    }

    public function testCustom(): void
    {
        $this
            ->get('custom')
            ->assertSuccessful()
            ->assertHeader(Header::ACCEPT, 'application/json')
            ->assertJsonStructure(['data'])
            ->assertJson(['data' => 'Hello, Custom!']);
    }
}
