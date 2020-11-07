<?php

namespace Database\Seeders;

use App\Models\BookMark;
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
         BookMark::factory(100000)->create();


    }
}
