<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    public $timestamps=false;
    protected $table='clientes';
    protected $primaryKey='cli_id';
    protected $fillable=['cli_nombre','cli_apellido','cli_direccion','cli_telefono','cli_cedula',];

}
