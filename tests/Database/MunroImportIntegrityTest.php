<?php

//phpcs:ignorefile PSR1.Methods.CamelCapsMethodName.NotCamelCaps

namespace Tests\Database;

use App\Models\Hill;
use App\Models\Group;
use Database\Seeders\MunrosFromCSVSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MunroImportIntegrityTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Run a specific seeder before each test.
     *
     * @var string
     */
    protected $seeder = MunrosFromCSVSeeder::class;

    public function test_that_a_long_hill_name_is_captured(): void
    {
        $this->assertTrue(
            Hill::where(
                'name',
                'Braigh Coire Chruinn-Bhalgain (Beinn a\' Ghlo)'
            )->exists()
        );
    }

    public function test_that_a_long_area_name_is_captured(): void
    {
        $this->assertTrue(
            Group::where(
                'name',
                'Ben Lomond and The Arrochar Alps'
            )->exists()
        );
    }

    public function test_that_all_munros_are_added(): void
    {
        $this->assertEquals(
            282,
            Hill::count()
        );
    }

    public function test_that_all_areas_are_added(): void
    {
        $this->assertEquals(
            31,
            Group::count()
        );
    }

    public function test_that_all_munros_are_added_to_a_group(): void
    {
        $group = Group::where(
            'name',
            'Ben Lomond and The Arrochar Alps'
        )->first();

        $this->assertEquals(
            6,
            $group->hills()->count()
        );

        $this->assertTrue(
            $group->hills()->pluck('name')->contains('Beinn Bhuidhe')
        );

        $this->assertTrue(
            $group->hills()->pluck('name')->contains('Beinn Ime')
        );

        $this->assertTrue(
            $group->hills()->pluck('name')->contains('Beinn Narnain')
        );

        $this->assertTrue(
            $group->hills()->pluck('name')->contains('Ben Lomond')
        );

        $this->assertTrue(
            $group->hills()->pluck('name')->contains('Ben Vane')
        );

        $this->assertTrue(
            $group->hills()->pluck('name')->contains('Ben Vorlich [Loch Lomond]')
        );
    }
}
