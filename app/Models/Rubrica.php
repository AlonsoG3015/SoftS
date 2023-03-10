<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rubrica extends Model
{
    use HasFactory;

    protected $table = 'rubrica';
    protected $primaryKey = 'id_RC';

    public $incrementing = true;

    public $timestamps = false;

    protected $softDelete = false;

    public function hb_cursos()
    {
        return $this->belongsToMany(HB_Curso::class, 'hb_cursoxrubrica', 'Rubrica_id','Id_hb_curso');
    }

    public function estudiantes()
    {
        return $this->belongsToMany(Estudiante::class, 'estudiantexrubrica', 'Rubrica_id','Estudiante_id');
    }
}
