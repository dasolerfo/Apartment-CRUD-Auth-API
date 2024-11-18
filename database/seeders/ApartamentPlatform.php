<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Platform;
use App\Models\Apartament;
use Illuminate\Support\Facades\DB;
use Faker\Generator;
use Illuminate\Container\Container;

class ApartamentPlatform extends Seeder
{

    protected $facker;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $this->facker = $this->withFaker();
        for ($i = 0; $i < 50; $i++) {
            DB::table('platform_apartament')->insert([
                'premium' => $this->facker->boolean(50),
                'register_date' => $this->facker->date,
                'platform_id' => Platform::all()->random()->id,
                'apartament_id' => Apartament::all()->random()->id
            ]);
        }
    }

    protected function withFaker()
    {
        return Container::getInstance()->make(Generator::class);
    }
}
