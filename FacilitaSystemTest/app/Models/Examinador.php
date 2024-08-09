<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Examinador extends Model
{
    use HasFactory;


    protected $table = 'examinadors';
    protected $primarykey = 'id';
    protected $fillable = ['nomeUsuario','sobrenomeUsuario','emailUsuario','statusUsuario'];

    public function login()
    {
        return $this->morphOne(Login::class, 'tipo_usuario');
    }
}
