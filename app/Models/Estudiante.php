<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;

    protected $table = 'curso';
    protected $primaryKey = 'id_Curso';

    public $incrementing = true;

    public $timestamps = false;

    protected $softDelete = false;

    public function persona()
    {
        return $this->belongsTo(Persona::class, 'Persona_id');
    }
}
