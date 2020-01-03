<?php

use Illuminate\Database\Seeder;
use App\Models\Type;

class TypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create([
            'name' => 'Automóvil',
            'description' => 'Vehículo destinado al transporte de no más de 5 pasajeros.',
        ]);

        Type::create([
            'name' => 'Campero',
            'description' => 'este vehículo tiene tracción en todas sus ruedas, permite transportar hasta 9 pasajeros.',
        ]);
    }
}
