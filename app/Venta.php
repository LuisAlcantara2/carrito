<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    //
     protected $table="venta";
    protected $primaryKey="codventa";
    public $timestamps =false;
    protected $fillable = [
        'numero', 'numero_ticket','fecha','subtotal','igv','total','estado','codcliente'
    ];
    public function cliente()
    {
        return $this->hasOne('App\Cliente','codcliente','codcliente');
    }   
}