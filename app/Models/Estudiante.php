<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;

    protected $table = 'estudiante';
    protected $primaryKey = 'id_Estudiante';

    public $incrementing = true;

    public $timestamps = false;

    protected $softDelete = false;

    public function persona()
    {
        return $this->belongsTo(Persona::class, 'Persona_id');
    }

    public function cursos()
    {
        return $this->belongsToMany(Curso::class, 'estudiantexcurso', 'Estudiante_id', 'Curso_id');
    }
}
