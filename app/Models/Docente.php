<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    use HasFactory;

    protected $table = 'docente';
    protected $primaryKey = 'id_Docente';

    public $incrementing = true;

    public $timestamps = false;

    protected $softDelete = false;

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'Usuario_id', 'id_User');
    }

    public function carrera_ciclo()
    {
        return $this->belongsTo(Carrera_Ciclo::class, 'CC_id', 'id_CC');
    }

    public function cursos()
    {
        return $this->belongsToMany(Curso::class, 'cursoxdocente', 'Docente_id', 'Curso_id');
    }
}
