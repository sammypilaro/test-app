<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class RandomUserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_json_structure()
    {
        $response = $this->getJson('/api/random_user');
        $response->assertJson(fn (AssertableJson $json) =>
            $json->hasAll([
                'firstname', 
                'lastname', 
                'email'
            ])
        );
    }
}
