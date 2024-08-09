<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;


    protected $table = 'usuarios';
    protected $primarykey = 'id';
    protected $fillable = ['nomeUsuario','sobrenomeUsuario','emailUsuario','statusUsuario'];


    public function login()
    {
        return $this->morphOne(Login::class, 'tipo_usuario');
    }
}
