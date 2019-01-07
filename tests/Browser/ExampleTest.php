<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class ExampleTest extends DuskTestCase
{
    public function test_fails_with_retype_again()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->type('@credit-card', 'yyyyy')
                    ->click('@validate')
                    ->pause(500)
                    ->assertSee('This is error 1!')
                    ->clear('@credit-card')
                    ->type('@credit-card' ,'xxxxx')
                    ->click('@validate')
                    ->pause(500)
                    ->assertSee('This is error 2!');
        });
    }

    public function test_passes_with_type_error_1_only()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->type('@credit-card', 'yyyyy')
                ->click('@validate')
                ->pause(500)
                ->assertSee('This is error 1!');
        });
    }

    public function test_passes_with_type_error_2_only()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->type('@credit-card', 'xxxxx')
                ->click('@validate')
                ->pause(500)
                ->assertSee('This is error 2!');
        });
    }
}
