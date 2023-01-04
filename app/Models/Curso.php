<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    protected $table = 'curso';
    protected $primaryKey = 'id_Curso';

    public $incrementing = true;

    public $timestamps = false;

    protected $softDelete = false;

    public function linea()
    {
        return $this->belongsTo(Linea::class,'Linea_id');
    }
    
    public function docentes()
    {
        return $this->belongsToMany(Docente::class,'CursoxDocente','Curso_id','Docente_id');
    }
}
