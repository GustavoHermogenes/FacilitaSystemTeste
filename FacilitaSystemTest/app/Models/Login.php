<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    use HasFactory;


    protected $table = 'logins';
    protected $primarykey = 'id';
    protected $fillable = ['nome','sobrenome','email','senha','tipo_usuario','status'];

}
