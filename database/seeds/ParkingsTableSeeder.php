<?php

use Illuminate\Database\Seeder;
use App\Models\{Parkings,HourDetails,Rates};
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
        $parking->parkingDetail()->create([
            'parking_id' => $parking->id,
            'piso_det' => 1,
            'espacio_det' => '10',
            'ocupado_det' => '0',
            'total_det' => '10',
            'estado_det' => 'Actvo'
        ]);
        $parking->parkingDetail()->create([
            'parking_id' => $parking->id,
            'piso_det' => 2,
            'espacio_det' => '20',
            'ocupado_det' => '0',
            'total_det' => '20',
            'estado_det' => 'Actvo'
        ]);
        $parking->parkingDetail()->create([
            'parking_id' => $parking->id,
            'piso_det' => 3,
            'espacio_det' => '20',
            'ocupado_det' => '0',
            'total_det' => '20',
            'estado_det' => 'Actvo'
        ]);

        $rates =Rates::create([
            'precio_tar' => '300',
        ]);

        HourDetails::create([
            'rate_id' =>$rates->id,
            'parking_id' =>$parking->id,
            'fecha_apertura_hor' => '06:00',
            'fecha_cierre_hor' => '19:00',
            'dia_hor' => 'Lunes,martes,miercoles,jueves,viernes,sabado,domingo',
            'estado_hor' => 'Actvo'
        ]);
        /*dos*/ 
        $parkingd = Parkings::create([
            'nombre_par' => 'Parqueadero 80',
            'direccion_par' => 'Calle 80',
            'capacidad_par' => '10',
            'ruta_par' => 'Actvo'
        ]);
        $parkingd->parkingDetail()->create([
            'parking_id' => $parkingd->id,
            'piso_det' => 1,
            'espacio_det' => '10',
            'ocupado_det' => '0',
            'total_det' => '10',
            'estado_det' => 'Actvo'
        ]);

        $ratesd =Rates::create([
            'precio_tar' => '200',
        ]);

        HourDetails::create([
            'rate_id' =>$ratesd->id,
            'parking_id' =>$parkingd->id,
            'fecha_apertura_hor' => '06:00',
            'fecha_cierre_hor' => '19:00',
            'dia_hor' => 'Lunes,martes,miercoles,jueves,viernes,sabado,domingo',
            'estado_hor' => 'Actvo'
        ]);

    }
}
