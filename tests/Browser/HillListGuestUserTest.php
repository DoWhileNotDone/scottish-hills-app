<?php

namespace Tests\Browser;

use Database\Seeders\Import\HillsFromCSVSeeder;
use Illuminate\Foundation\Testing\DatabaseTruncation;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class HillListGuestUserTest extends DuskTestCase
{
    use DatabaseTruncation;

    public function setUp(): void
    {
        parent::setUp();

        $this->seed(HillsFromCSVSeeder::class);
    }

    public function testSeeHillPageHeader(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Hill List');
        });
    }

    public function testSeeHillPageSearchList(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertPresent('@hill-search')
                    ->assertInputPresent('hill-search');
        });
    }

    public function testSeeHillPageInitialHillList(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                //CSS Selector
                ->waitForTextIn(
                    "#hill-list > [name='hill-card']:first-child [name='hill-card-name']",
                    "A' Bhuidheanach Beag"
                )
                ->waitForTextIn(
                    "#hill-list > [name='hill-card']:last-child [name='hill-card-name']",
                    "Tom na Gruagaich (Beinn Alligin)"
                );
        });
    }

    public function testSearchOnHills(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->waitFor('@hill-search')
                ->type('@hill-search', 'Nevis')

                //CSS Selector
                ->waitForTextIn(
                    "#hill-list > [name='hill-card']:first-child [name='hill-card-name']",
                    "Aonach Beag [Nevis region]"
                )
                ->waitForTextIn(
                    "#hill-list > [name='hill-card']:last-child [name='hill-card-name']",
                    "Ben Nevis"
                )
                ->assertDontSee("A' Bhuidheanach Beag")
                ->assertDontSee("Tom na Gruagaich (Beinn Alligin)");
        });
    }

}
