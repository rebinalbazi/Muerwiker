<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class DuskSearchTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://127.0.0.1:8000')
            ->pause(3000)
            ->screenshot('shotSearch')
            ->type('suche','neugebauer')
            ->click('@suche-button')
            ->pause(3000)
            ->screenshot('shotSearch2')
            ->assertSee('Neugebauer');
        });
    }
}
