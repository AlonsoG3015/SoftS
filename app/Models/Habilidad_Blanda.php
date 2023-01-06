<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Habilidad_Blanda extends Model
{
    use HasFactory;

    protected $table = 'habilidad_blanda';
    protected $primaryKey = 'id_HB';

    public $incrementing = true;

    public $timestamps = false;

    protected $softDelete = false;


    public function cursos()
    {
        return $this->belongsToMany(Curso::class, 'cursoxhb', 'HB_id', 'Curso_id');
    }
}
