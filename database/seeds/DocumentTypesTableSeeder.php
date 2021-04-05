<?php

use Illuminate\Database\Seeder;
use App\Models\DocumentTypes;
class DocumentTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DocumentTypes::create([
            'nombre_doc' => 'Cedula Ciudaddana',
            'decripcion_doc' => 'CC',
            'estado_doc' => 'Actvo'
        ]);
    }
}
