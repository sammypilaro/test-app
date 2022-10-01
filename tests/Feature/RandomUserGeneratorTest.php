<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Services\RandomUserServiceProvider;

class RandomUserGeneratorTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_response_ok()
    {
        $service_provider = new RandomUserServiceProvider();
        $url = 'https://randomuser.me/api/';
        $response = $service_provider->getFullNameAndEmail($url);

        $this->assertFalse(isset($response->error));
        $this->assertTrue(isset($response->firstname));
        $this->assertTrue(isset($response->lastname));
        $this->assertTrue(isset($response->email));
    }
}
