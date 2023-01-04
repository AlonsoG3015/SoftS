<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Linea extends Model
{
    use HasFactory;

    protected $table = 'linea_investigacion';
    protected $primaryKey = 'id_Line';

    public $incrementing = true;
    
    public $timestamps = false;

    protected $softDelete = false;


    public function carrera_ciclo()
    {
        return $this->belongsTo(Carrera_Ciclo::class,'CC_id');
    }
}
