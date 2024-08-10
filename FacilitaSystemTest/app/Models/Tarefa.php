<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    use HasFactory;

    protected $table = 'tarefas';
    protected $primarykey = 'id';
    protected $fillable = ['nomeTarefa','descricaoTarefa','entregaTarefa','vencimentoTarefa','vencimentoTarefa','prioridadeTarefa','statusTarefa'];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'idUsuario');
    }

}
