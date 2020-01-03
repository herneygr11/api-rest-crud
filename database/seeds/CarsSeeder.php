<?php

use Illuminate\Database\Seeder;
use App\Models\Car;

class CarsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Car::create([
            'model' => '2017',
            'color' => 'Rojo',
            'license_plate' => 'MHG-648',
            'num_doors' => '4',
            'max_speed' => '100 K/H',
            'type_id' => 1
        ]);

        Car::create([
            'model' => '2019',
            'color' => 'Negro',
            'license_plate' => 'JHF-100',
            'num_doors' => '4',
            'max_speed' => '150 K/H',
            'type_id' => 2
        ]);
    }
}
