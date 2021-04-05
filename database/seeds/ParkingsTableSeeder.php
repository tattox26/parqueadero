<?php

use Illuminate\Database\Seeder;
use App\Models\{Parkings,ParkingDetails};
class ParkingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $parking = Parkings::create([
            'nombre_par' => 'Parqueadero salitre',
            'direccion_par' => 'Calle 68',
            'capacidad_par' => '50',
            'ruta_par' => 'Actvo'
        ]);
        $parking->parkingDetails()->create([
            'parking_id' => 1,
            'piso_det' => 1,
            'espacio_det' => '10',
            'ocupado_det' => '0',
            'total_det' => '10',
            'estado_det' => 'Actvo'
        ]);
        $parking->hourDetails()->create([
            'parking_id' => 1,
            'fecha_apertura_hor' => '06:00',
            'fecha_cierre_hor' => '19:00',
            'dia_hor' => 'Lunes,martes,miercoles,jueves,viernes,sabado,domingo',
            'estado_hor' => 'Actvo'
        ]);

        $parking->rates()->create([
            'parking_id' => 1,
            'fecha_apertura_hor' => '06:00',
            'fecha_cierre_hor' => '19:00',
            'dia_hor' => 'Lunes,martes,miercoles,jueves,viernes,sabado,domingo',
            'estado_hor' => 'Actvo'
        ]);

        $parking = Parkings::create([
            'nombre_par' => 'Parqueadero 80',
            'direccion_par' => 'Calle 80',
            'capacidad_par' => '200 carros',
            'ruta_par' => 'Actvo'
        ]);
        $parking->parkingDetails()->create([
            'parking_id' => 2,
            'piso_det' => '1',
            'espacio_det' => '3000x4000',
            'estado_det' => 'Actvo'
        ]);

    }
}
