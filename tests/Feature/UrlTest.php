<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Url;

class UrlTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test for landing on the homepage.
     *
     * @return void
     */
    public function test_homepage_loads()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * Test a valid url.
     *
     * @return void
     */
    public function test_valid_url_can_be_turned_into_short_url()
    {
        $response = $this->post('/create', [
            'long_url' => 'https://google.com/'
        ]);

        $response->assertStatus(200);
        $response->assertViewIs('success');
    }

    /**
     * Test a invalid url.
     *
     * @return void
     */
    public function test_invalid_url_returns_an_error()
    {
        $response = $this->post('/create', [
            'long_url' => 'asd'
        ]);

        $response->assertRedirect('/');
        $response->assertInvalid(['long_url']);
    }
}
