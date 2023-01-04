<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Director extends Model
{
    use HasFactory;

    protected $table = 'director';
    protected $primaryKey = 'id_Dir';

    public $incrementing = true;

    public $timestamps = false;

    protected $softDelete = false;

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'Usuario_id');
    }

    public function carrera_ciclo()
    {
        return $this->hasOne(Carrera_Ciclo::class, 'CC_id','id_CC');
    }
}
