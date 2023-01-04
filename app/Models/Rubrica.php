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

}
