<?php

namespace Database\Seeders;

use App\Models\Listing;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(5)->create();
        $user = User::factory()->create([
            'name' => 'Joney Spark',
            'email' => 'joney@email.com',
        ]);

        Listing::factory(10)->create([
            'user_id' => $user->id
        ]);
    }
}
