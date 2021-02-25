<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalleventa extends Model
{
    protected $table="detalleventa";
    protected $primaryKey="coddetalle";
    public $timestamps =false;
    protected $fillable = [
        'precio', 'cantidad','codventa','codproducto'
    ];
    public function Venta()
    {
        return $this->hasOne('App\Venta','codventa','codventa');
    } 
    public function Producto()
    {
        return $this->hasOne('App\Producto','codproducto','codproducto');
    } 
}
