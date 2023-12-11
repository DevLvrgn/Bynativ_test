<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FormDisplayTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIfViewIsRendered()
    {
        $response = $this->get('/');

        $response->assertViewIs('booking.index');
    }
}
