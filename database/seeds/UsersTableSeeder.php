<?php

use Illuminate\Database\Seeder;
use App\Models\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'document_type_id' => 1,
            'numero_doc_user' => '1013619390',
            'name' => 'pepito',
            'apellido_user' => 'perez',
            'fecha_nacimiento_user' => '02-13-1991',
            'corre_user' => 'pepito@gmail.com',
            'email' => 'pepito@gmail.com',
            'telefono_user' => '1234456',
            'password' => '1234456'
        ]);

        User::create([
            'document_type_id' => 1,
            'numero_doc_user' => '1013619380',
            'name' => 'Maria',
            'apellido_user' => 'Perez',
            'fecha_nacimiento_user' => '02-13-1992',
            'corre_user' => 'maria@gmail.com',
            'email' => 'maria@gmail.com',
            'telefono_user' => '1234456',
            'password' => '1234456'
        ]);
    }
}
