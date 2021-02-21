<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table="producto";
    protected $primaryKey="codproducto";
    public $timestamps =false;
    protected $fillable = [
        'nombre', 'precio','stock','codcategoria'
    ];
    public function categoria()
    {
        return $this->hasOne('App\Categoria','codcategoria','codcategoria');
    }   
}
