<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nivel_Rubrica extends Model
{
    use HasFactory;

    protected $table = 'nivel_rubrica';
    protected $primaryKey = 'id_NR';

    public $incrementing = true;
    
    public $timestamps = false;

    protected $softDelete = false;


    public function ciclo()
    {
        return $this->hasOne(Ciclo::class);
    }
}
