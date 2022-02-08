<?php

namespace Database\Seeders;

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
        \App\Models\Member::factory(25)->create();
        \App\Models\Outlet::factory(25)->create();
        \App\Models\Paket::factory(25)->create();
    }
}
