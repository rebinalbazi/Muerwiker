<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_Pages_are_reachable()
    {
        $response = $this->get('/');

        $response->assertStatus(200);

        $response = $this->get('/wohnen/Flensburg');
        
        $response->assertStatus(200);

        $response = $this->get('/wohnen/Niebüll/9');
        
        $response->assertStatus(200);

        $response = $this->get('/arbeiten/Flensburg');
        
        $response->assertStatus(200);

        $response = $this->get('/arbeiten/Niebüll/13');
        
        $response->assertStatus(200);

        $response = $this->get('/tagesstaette');
        
        $response->assertStatus(200);

        $response = $this->get('/tagesstaette/null/2');
        
        $response->assertStatus(200);

        $response = $this->get('/verwaltung');
        
        $response->assertStatus(200);

        $response = $this->get('/sonstige');
        
        $response->assertStatus(200);

        $response = $this->get('/admin/login');
        
        $response->assertStatus(200);


        //dieser Test schlägt fehl, da es in dieser Version die register Seite noch gibt
        $response = $this->get('/admin/register');
        
        $response->assertStatus(!200);    
    }
}
