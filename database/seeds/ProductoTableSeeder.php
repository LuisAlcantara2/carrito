<?php

use Illuminate\Database\Seeder;
use App\Producto;
class ProductoTableSeeder extends Seeder
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
                'nombre'          =>  'PANTALÓN VESTIR INVIERNO',
                'precio'=>30.00,
                'stock' =>50,
                'imagen' => 'https://civ-sa.com/13-thickbox_default/pantalon-vestir-invierno.jpg',
                'descripcion' =>'Pantalón de vestir, microfibra con trincha de fliselina, 2 bolsillos delanteros inclinados, relojera, 1 bolsillo trasero cortados con ojal y botón.',
                'codcategoria' =>1
            ],
            [
                'nombre'  =>  'PANTALON VESTIR CONFORT',
                'precio'=> 35.00,
                'stock' => 20,
                'imagen' => 'https://rochasshop.com.ar/wp-content/uploads/2020/04/Pantalon01_vestir_S_%C2%B4_100_azul_rochas.jpg',
                'descripcion' =>'Pantalon de vestir colo azul.',
                'codcategoria' =>1
            ],
            [
                'nombre' =>  'Camisa Manga Corta color Gris',
                'precio'=>20.00,
                'stock' =>1,
                'imagen' => 'https://cdn1.coppel.com/images/catalog/pr/1126532-1.jpg',
                'descripcion' =>'¡Un toque de elegancia para tu look! Perfeccionada tu atuendo con esta camisa de vestir CAT, el complemento que no te puede faltar.  Es un modelo diseñado en color gris, por lo que ofrece una apariencia elegante y neutral que podrás combinar con todo. Mientras que su confección brinda la comodidad idónea para tu día a día.',
                'codcategoria' =>2
            ],
            [
                'nombre'=>'DOCKERS POLO MANGA CORTA',
                'precio'=>55.00,
                'stock' =>100,
                'imagen' => 'https://home.ripley.com.pe/Attachment/WOP_5/2005254456465/2005254456465_2.jpg',
                'descripcion' =>'Este polo cuenta con un diseño casual y versátil; se convertirá en tu perfecto aliado por su practicidad y ligereza.',
                'codcategoria' =>5
            ],
            [
                'nombre'=>'KENNETH STEVENS CAMISA MANGA L',
                'precio'=> 49.00,
                'stock' => 60,
                'imagen' => 'https://home.ripley.com.pe/Attachment/WOP_5/2067236575540/2067236575540_2.jpg',
                'descripcion' =>'La reconocida marca Kenneth Stevens te ofrece esta cómoda camisa manga larga que se convertirá en la prenda comodín de esta temporada ya que cuenta con un diseño versátil, fácil de combinar.',
                'codcategoria' =>2
            ],
            [
                'nombre'=>'INDEX CAMISA EUSE',
                'precio'=>30.00,
                'stock' =>200,
                'imagen' => 'https://home.ripley.com.pe/Attachment/WOP_5/2016252301756/2016252301756_2.jpg',
                'descripcion' =>'Consigue el mejor look urbano con esta exclusiva camisa que la marca Index te ofrece. Ideal para combinarla con todo tu vestuario y así puedas reinventar tu estilo día a día.  ¡Obtén esta versátil prenda y renueva tu estilo casual!',
                'codcategoria' =>2
            ],
            [
                'nombre'=>'INDEX CAMISA ELLIOT',
                'precio'=>28.00,
                'stock' =>110,
                'imagen' => 'https://home.ripley.com.pe/Attachment/WOP_5/2016252224390/2016252224390-3.jpg',
                'descripcion' =>'Consigue el mejor look urbano con esta exclusiva camisa que la marca Index te ofrece. Ideal para combinarla con todo tu vestuario y así puedas reinventar tu estilo día a día.  ¡Obtén esta versátil prenda y renueva tu estilo casual!',
                'codcategoria' =>2
            ],
            [
                'nombre'=>'PEPE JEANS JEAN HATCH SKINNY',
                'precio'=>102.00,
                'stock' =>190,
                'imagen' => 'https://home.ripley.com.pe/Attachment/WOP_5/2016230397474/2016230397474_2.jpg',
                'descripcion' =>'¡Experimenta con nuevos estilos! Deslumbra ante cualquier ocasión y viste las combinaciones que van marcando tendencia en el mundo de la moda.  Ripley.com te ofrece para esta temporada, novedosos diseños que te harán lucir casual y más segura de ti misma por donde vayas.  ¿Qué esperas? Adquiere de inmediato el modelo de tu preferencia y siéntete súper fresco gracias a su suave textura.',
                'codcategoria' =>1
            ],
            [
                'nombre'=>'INDEX PANTALÓN SMOKE',
                'precio'=> 55.00,
                'stock' => 90,
                'imagen' => 'https://home.ripley.com.pe/Attachment/WOP_5/2016224279724/2016224279724_2.jpg',
                'descripcion' =>'Index te trae este exclusivo pantalón que se convertirá en una pieza clave de tu vestuario ya que cuenta con un diseño versátil y cómodo.  ¡Luce todos tus looks urbanos con este comodín perfecto!',
                'codcategoria' =>1
            ],
            [
                'nombre'=>'ROBERT LEWIS POLO DOT CORE',
                'precio'=>27.00,
                'stock' =>130,
                'imagen' => 'https://home.ripley.com.pe/Attachment/WOP_5/2016247363912/2016247363912_2.jpg',
                'descripcion' =>'Déjate sorprender por la variedad de modelos que Robert Lewis trae para ti.  Estos versátiles diseños han sido fabricados con materiales de vanguardia que te aseguran comodidad, durabilidad y estilo.  No esperes más y elige el modelo que va contigo',
                'codcategoria' =>5
            ],
            [
                'nombre'=>'NAVIGATA POLO MANGA CORTA PIQ',
                'precio'=>49.00,
                'stock' =>220,
                'imagen' => 'https://home.ripley.com.pe/Attachment/WOP_5/2005234478548/2005234478548_2.jpg',
                'descripcion' =>'Este polo manga corta, que te trae la reconocida marca Navigata, cuenta con un diseño básico, versátil y cómodo. Se convertirá en la prenda imprescindible para combinarlo con todos tus pantalones, jeans, bermudas, etc.',
                'codcategoria' =>5
            ],
            [
                'nombre'=>'MARQUIS POLO PMESA',
                'precio'=>39.00,
                'stock' =>11,
                'imagen' => 'https://home.ripley.com.pe/Attachment/WOP_5/2005254084415/2005254084415_2.jpg',
                'descripcion' =>'La marca Marquis te ofrece esta moderna prenda que se convertirá en tu pieza preferida de esta temporada por su comodidad y diseño fácil de combinar.  ¡No dejes pasar la oportunidad, obtén este modelo y luce un look impecable!',
                'codcategoria' =>5
            ]);
        Producto::insert($data);
    }
}
