<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use Illuminate\Http\Request;

class TarefaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.examinador.createTarefa');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $request->validate([
            'nomeTarefa' => 'required|string|max:50',
            'descricaoTarefa' => 'required|string|max:255',
            'vencimentoTarefa' => 'required',
            'prioridadeTarefa' => 'required|string|in:baixa,media,alta',
        ], [
            'nomeTarefa.required' => 'O campo de nome precisa ser preenchido obrigatoriamente.',
            'nomeTarefa.string' => 'O campo de nome deve ser uma string.',
            'nomeTarefa.max' => 'O campo de nome não pode exceder 50 caracteres.',

            'descricaoTarefa.required' => 'O campo de descrição precisa ser preenchido obrigatoriamente.',
            'descricaoTarefa.string' => 'O campo de descrição deve ser uma string.',
            'descricaoTarefa.max' => 'O campo de descrição não pode exceder 255 caracteres.',

            'vencimentoTarefa.required' => 'O campo de vencimento precisa ser preenchido obrigatoriamente.',

            'prioridadeTarefa.required' => 'O campo de prioridade precisa ser preenchido obrigatoriamente.',
            'prioridadeTarefa.string' => 'O campo de prioridade deve ser uma string.',
            'prioridadeTarefa.in' => 'O campo de prioridade deve ser uma das seguintes opções: baixa, média, alta.',
        ]);


            $tarefa = New Tarefa();
            $tarefa->nomeTarefa = $request->input('nomeTarefa');
            $tarefa->descricaoTarefa = $request->input('descricaoTarefa');
            $tarefa->entregaTarefa = null;
            $tarefa->vencimentoTarefa = $request->input('vencimentoTarefa');
            $tarefa->prioridadeTarefa = $request->input('prioridadeTarefa');
            $tarefa->statusTarefa = 'em progresso';
            $tarefa->save();
        }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function show(Tarefa $tarefa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function edit(Tarefa $tarefa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tarefa $tarefa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tarefa $tarefa)
    {
        //
    }
}
