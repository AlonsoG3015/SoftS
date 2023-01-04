<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciclo extends Model
{
    use HasFactory;

    protected $table = 'ciclo';
    protected $primaryKey = 'id_Ciclo';

    public $incrementing = true;

    public $timestamps = false;

    protected $softDelete = false;

    
}
