<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    public $timestamps=false;
    protected $table='categoria';
    protected $primaryKey='cat_id';
    protected $fillable=['cat_nombre',];
}
