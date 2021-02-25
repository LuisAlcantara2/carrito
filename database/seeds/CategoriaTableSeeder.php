<?php

use Illuminate\Database\Seeder;
use App\Categoria;
class CategoriaTableSeeder extends Seeder
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
                'descripcion'          =>  'PANTALON',
            ],
            [
                'descripcion'          =>  'CAMISA',
            ],
            [
                'descripcion'          =>  'ZAPATO',
            ],
            [
                'descripcion'          =>  'CASACA',
            ],
            [
                'descripcion'          =>  'POLOS',
            ],
            [
                'descripcion'          =>  'SHORTS',
            ]

        );
        Categoria::insert($data);
    }
}
