<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use App\Models\Usuario;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{




    public function usuario()
    {
        $id = session('id');
        $usuario = Usuario::where('id', $id)->first();
        $tarefas = Tarefa::where('idUsuario', $id)->get();

        foreach ($tarefas as $item) {
            $hoje = Carbon::now();
            $vencimento = Carbon::parse($item->vencimentoTarefa);
    
            if ($vencimento->diffInDays($hoje, false) > 0) {
                $item->statusCor = 'red';
                $item->entregaTarefa = 'Atraso';
            } elseif ($vencimento->diffInDays($hoje, false) >= -3) {
                $item->statusCor = 'orange';
                $item->entregaTarefa = 'Três dias ou menos para conclusão';
            } else {
                $item->statusCor = 'green';
                $item->entregaTarefa = 'No prazo';
            }
        }

        // dd($tarefas);

        return view('dashboard.usuario.index', compact('tarefas'));
    }


    public function updateStatus($id){

        $usuario = Usuario::find($id);

        if($usuario->statusUsuario === 'ativo'){
            $usuario->update([
                $usuario->statusUsuario = 'inativo'
            ]);
        } else{
            $usuario->update([
                $usuario->statusUsuario = 'ativo'
            ]);
        }

        return redirect()->route('dashboard.examinador');

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function examinador()
    {

        $tarefas = Tarefa::where('statusTarefa', 'em progresso')->get();
        $usuarios = Usuario::all();

        return view('dashboard.examinador.index', compact('tarefas', 'usuarios'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario $usuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
        //
    }
}
