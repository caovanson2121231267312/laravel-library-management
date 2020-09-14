<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegisterTest extends DuskTestCase
{
    public function test_register_function()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(env('APP_URL'))
                ->assertSee('Register')
                ->clickLink('Register')
                ->whenAvailable('#myModal2', function ($modal) {
                    $modal->type('name', 'test')
                        ->type('email', 'tsutaya@example.com')
                        ->type('phone_number', '123456789')
                        ->type('password', '123456')
                        ->type('password_confirmation', '123456')
                        ->press('.register-submit')
                        ->assertPathIs('/');
                });
        });
    }
}
