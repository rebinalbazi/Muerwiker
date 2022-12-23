<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class DuskLoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://127.0.0.1:8000/admin/login')
            ->pause(3000)
            ->screenshot('shotDaten')
            ->type('password','1234567890')
            ->type('email','admin@admin.de')
            ->screenshot('shotDaten2')
            ->click('@login-button')
            ->pause(3000)
            ->screenshot('shotDaten3')
            ->assertSee("Admin");
        });
//bei diesem Test muss die Email und das Passwort je nachdem welchen User man testen nöchste geändert werden.

/////////////////////////////////////////////////////////////////////

        /**public function test_AddDataset()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://127.0.0.1:8000/admin/login')
            ->pause(3000)
            ->screenshot('shotDaten')
            ->type('password','1234567890')
            ->type('email','admin@admin.de')
            ->screenshot('shotDaten2')
            ->click('@login-button')
            ->pause(3000)
            ->screenshot('shotDaten3')
            ->assertSee("Admin")
            ->click('@add-button')
            ->pause(3000)
            ->screenshot('shotAdd')
            ->assertSee("hinzufügen")
            ->type('Name','test')
            ->type('@input-telefon','123456')
            ->type('@input-email','test@test.de')
            ->pause(3000)
            ->screenshot('shotAdd2')
            ->click('@save-button')
            ->pause(1000)
            ->assertSee("wurde erstellt");
        });
    } */

    }

    
}
