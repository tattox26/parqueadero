<?php

use Illuminate\Database\Seeder;
use App\Models\{PaymentTypes};
class PaymentTypesTableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PaymentTypes::create([
            'nombre_pago' => 'Efectivo',
            'descripcion_pago' => 'pago en efectivo '
        ]);

        PaymentTypes::create([
            'nombre_pago' => 'Tarjeta de credito',
            'descripcion_pago' => 'solo tarjeta'
        ]);
    }
}
