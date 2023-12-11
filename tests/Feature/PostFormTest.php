<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostFormTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        // Check for the POST method
        $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])->json('POST', '/create',
            [
                'name' => 'Sally',
                'email' => 'sally@test.com',
                'phone_number' => '0666666666',
                'date' => '2023-12-31T18:00',
                'message' => 'Here is a test message',
            ]
        );

        // In the controller, I am redirecting the user after creation
        $response
            ->assertStatus(302);


        // check if Sally is now displayed in the live page
        $res = $this->get('/live');
        $res->assertSee('Sally');
    }
}
