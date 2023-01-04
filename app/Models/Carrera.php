<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    use HasFactory;
    
    protected $table = 'carrera';
    protected $primaryKey = 'id_Carr';

    public $incrementing = true;
    
    public $timestamps = false;

    protected $softDelete = false;

    public function facultad()
    {
        return $this->belongsTo(Facultad::class,'Facultad_id','id_Facu');
    }
}
