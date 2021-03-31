<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Entry;
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
        // \App\Models\User::factory(10)->create();
        User::factory(10)->create()->each(function($user) {
            $user->posts()->save(Entry::factory()->make());
        });
    }
}
