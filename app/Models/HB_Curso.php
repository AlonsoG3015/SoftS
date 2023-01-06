<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HB_Curso extends Model
{
    use HasFactory;

    protected $table = 'hb_curso';
    protected $primaryKey = 'id_hb_curso';

    public $incrementing = true;

    public $timestamps = false;

    protected $softDelete = false;

    public function habilidad_blanda()
    {
        return $this->belongsTo(Habilidad_Blanda::class, 'HB_id', 'id_HB');
    }

    public function curso()
    {
        return $this->belongsTo(Curso::class, 'Curso_id', 'id_Curso');
    }

    public function rubricas()
    {
        return $this->belongsToMany(Rubrica::class, 'hb_cursoxrubrica', 'Id_hb_curso', 'Rubrica_id');
    }
}
