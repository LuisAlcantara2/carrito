<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table="cliente";
    protected $primaryKey="codcliente";
    public $timestamps =false;
    protected $fillable = [
        'nombre','direccion','rucdni','email'
    ];
}
