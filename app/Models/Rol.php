<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;

    protected $table = 'role';
    protected $primaryKey = 'id_Role';

    public $incrementing = true;
    
    public $timestamps = false;

    protected $softDelete = false;

    public function usuario()
    {
        return $this->hasOne(Usuario::class, 'Role_id','id_Role');
    }
}
