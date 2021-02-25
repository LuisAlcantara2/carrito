<?php

use Illuminate\Database\Seeder;
use App\Cliente;
class ClienteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            [
                'nombre'=>  'Steven Valderrama',
                'direccion'=>'Jr trujillo 816',
                'rucdni' =>'70259401',
                'email' => 'sv@gmail.com',
                'password' =>'123'
            ],
            [
                'nombre'=>  'Alejandro',
                'direccion'=>'jiron francisco de zela #272',
                'rucdni' =>'76364407',
                'email' => 'ahuamani@unitru.edu.pe"',
                'password' =>'123'
            ],
            [
                'nombre'=>  'Luis Fernando',
                'direccion'=>'Buenos aires #712 - trujillo',
                'rucdni' =>'76174081',
                'email' => 'lalcantara@unitru.edu.pe',
                'password' =>'123'
            ],
            [
                'nombre'=>  'Carlos Yoel',
                'direccion'=>'El porvenir',
                'rucdni' =>'76542923',
                'email' => 'cflores@unitru.edu.pe"',
                'password' =>'123'
            ],
            [
                'nombre'=>  'Jherry Alexis"',
                'direccion'=>'La esperanza #982',
                'rucdni' =>'95854766',
                'email' => 'jponce@unitru.edu.pe',
                'password' =>'123'
            ],
            [
                'nombre'=>  'Usuario Prueba',
                'direccion'=>'Direccion Prueba',
                'rucdni' =>'12345678',
                'email' => 'prueba@gmail.com',
                'password' =>'123'
            ]
            );
        Cliente::insert($data);
    }
}
