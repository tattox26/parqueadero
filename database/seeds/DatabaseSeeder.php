<?php

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
        $this->call(DocumentTypesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(ParkingsTableSeeder::class);
        $this->call(PaymentTypesTableseeder::class);
        $this->call(EmployeesTableSeeder::class);
    }
}
