<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asistente extends Model
{
    protected $table='asistentes';
    protected $fillable = ['nombre','puesto_id','otro_puesto','telefono_oficina','telefono_celular','email','region_id','municipio_id'];
}
