<?php

namespace Database\Seeders;

use App\Models\Apartament;
use Illuminate\Database\Seeder;

class ApartamentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Apartament::factory()->count(20)->create();
    }
}
