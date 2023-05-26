<?php

namespace Database\Seeders\Import;

use App\Exceptions\NotImportableRecordException;
use App\Models\Hill;
use App\Models\User;
use App\Models\Trip;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

/**
 * Each imported trip file is expected to be one trip, for one user.
 */
class TripsFromCSVSeeder extends ImportFromCSVSeeder
{
    protected Trip|null $trip = null;
    protected User|null $user = null;

    protected string $path = "data/import/trips/";

    public function importRow(array $tripData): void
    {
        $tripData = collect($tripData)->map(function (string $value) {
            return Str::squish($value);
        });

        try {
            if (!$tripData->get('username')) {
                throw new NotImportableRecordException(
                    "The row does not has a username added, so we don't process"
                );
            }

            //Try to find an existing user to associate with
            if (!$this->user) {
                $this->user = User::where('email', $tripData->get('username'))->firstOr(function () use ($tripData) {
                    throw new NotImportableRecordException(
                        "No user found with email {$tripData->get('username')}",
                    );
                });
            }

            if (!$this->trip) {
                $this->trip = $this->user->trips()->create([
                    'title' => 'Imported Trip',
                ]);
            }

            //Find Hill
            $hill = Hill::where('name', $tripData->get('hill'))->firstOr(function () use ($tripData) {
                throw new NotImportableRecordException(
                    "No hill found with name {$tripData->get('hill')}",
                );
            });

            //Associate hill with trip, and user
            $this->trip->hills()->attach($hill, ['user_id' => $this->user->id]);
        } catch (NotImportableRecordException $ex) {
            //Continue processing
        }
    }
}
