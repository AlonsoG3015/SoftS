<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrera_Ciclo extends Model
{
    use HasFactory;

    protected $table = 'carrera_ciclo';
    protected $primaryKey = 'id_CC';

    public $incrementing = true;

    public $timestamps = false;

    protected $softDelete = false;

    public function carrera()
    {
        return $this->belongsTo(Carrera::class,'Carrera_id');
    }


    public function semestre()
    {
        return $this->belongsTo(Semestre::class,'Semestre_id');
    }
}
