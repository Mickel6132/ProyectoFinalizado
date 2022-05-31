<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Componentes extends Model
{
       public $timestamps=false;
    protected $table='componentes';
    protected $primaryKey='comp_id';
    protected $fillable=['cli_id','comp_nombre','comp_cantidad','comp_detalle','comp_precio',];
}
