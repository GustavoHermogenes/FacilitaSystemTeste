<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    use HasFactory;




    protected $table = 'logins';
    protected $primarykey = 'id';
    protected $fillable = ['nomeTarefa','descricaoTarefa','entregaTarefa','vencimentoTarefa','vencimentoTarefa','prioridadeTarefa','statusTarefa'];



}
