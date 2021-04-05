<?php

use Illuminate\Database\Seeder;
use App\Models\Employees;
class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employees::create([
            'user_id' => 1,
            'hojadevida_emp' => 'SI',
            'eps_emp' => 'Compensar',
            'cajacompensacion_emp'=> 'Compensar',
            'cargo_emp' => 'Vigilante'
        ]);

        Employees::create([
            'user_id' => 2,
            'hojadevida_emp' => 'SI',
            'eps_emp' => 'Compensar',
            'cajacompensacion_emp'=> 'Compensar',
            'cargo_emp' => 'Vigilante'
        ]);
    }
}
