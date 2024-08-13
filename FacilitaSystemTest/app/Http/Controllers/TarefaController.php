<?php

namespace App\Http\Controllers;

use App\Models\Resposta;
use App\Models\Tarefa;
use App\Models\Usuario;
use Carbon\Carbon;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

        $usuarios = Usuario::where('statusUsuario', 'ativo')->get();

        return view('dashboard.examinador.createTarefa', compact('usuarios'));
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
            'idUsuario' => 'required',
            'descricaoTarefa' => 'required|string|max:255',
            'vencimentoTarefa' => 'required',
            'prioridadeTarefa' => 'required|string|in:baixa,média,alta',
        ], [
            'nomeTarefa.required' => 'O campo de nome precisa ser preenchido obrigatoriamente.',
            'nomeTarefa.string' => 'O campo de nome deve ser uma string.',
            'nomeTarefa.max' => 'O campo de nome não pode exceder 50 caracteres.',

            'idUsuario.required' => 'O campo de nome do usuário precisa ser preenchido obrigatoriamente.',

            'descricaoTarefa.required' => 'O campo de descrição precisa ser preenchido obrigatoriamente.',
            'descricaoTarefa.string' => 'O campo de descrição deve ser uma string.',
            'descricaoTarefa.max' => 'O campo de descrição não pode exceder 255 caracteres.',

            'vencimentoTarefa.required' => 'O campo de vencimento precisa ser preenchido obrigatoriamente.',

            'prioridadeTarefa.required' => 'O campo de prioridade precisa ser preenchido obrigatoriamente.',
            'prioridadeTarefa.string' => 'O campo de prioridade deve ser uma string.',
            'prioridadeTarefa.in' => 'O campo de prioridade deve ser uma das seguintes opções: baixa, média, alta.',
        ]);


        $tarefa = new Tarefa();
        $tarefa->nomeTarefa = $request->input('nomeTarefa');
        $tarefa->idUsuario = $request->input('idUsuario');
        $tarefa->descricaoTarefa = $request->input('descricaoTarefa');
        $tarefa->entregaTarefa = null;
        $tarefa->vencimentoTarefa = $request->input('vencimentoTarefa');
        $tarefa->prioridadeTarefa = $request->input('prioridadeTarefa');
        $tarefa->statusTarefa = 'em progresso';
        $tarefa->save();

        return redirect()->route('dashboard.examinador');
    }

    public function respondidosExaminador(){

        $respondidos = Tarefa::where('statusTarefa', 'concluída')->get();

        // dd($respondidos)

        foreach ($respondidos as $item) {
            $hoje = Carbon::now();
            $vencimento = Carbon::parse($item->vencimentoTarefa);

            if ($vencimento->diffInDays($hoje, false) > 0) {
                $item->statusCor = 'red';
            } elseif ($vencimento->diffInDays($hoje, false) >= -3) {
                $item->statusCor = 'orange';
            } else {
                $item->statusCor = 'green';
            }
        }
        return view('dashboard.examinador.respondidos', compact('respondidos'));
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
    public function edit(Tarefa $tarefa, $id)
    {
        $tarefa = Tarefa::find($id);

        if (!$tarefa) {
            abort('404', 'A tarefa não foi encontrada');
        }
        // dd($tarefa);

        $usuarios = Usuario::where('statusUsuario', 'ativo')->get();

        return view('dashboard.examinador.editTarefa', compact('tarefa', 'usuarios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tarefa $tarefa, $id)
    {
        $tarefa = $tarefa::find($id);
        if (!$tarefa) {
            abort('404', 'A tarefa não existe');
        }

        // dd($tarefa);

        $request->validate([
            'nomeTarefa' => 'required|string|max:50',
            'idUsuario' => 'required',
            'descricaoTarefa' => 'required|string|max:255',
            'vencimentoTarefa' => 'required',
            'prioridadeTarefa' => 'required|string|in:baixa,média,alta',
        ], [
            'nomeTarefa.required' => 'O campo de nome precisa ser preenchido obrigatoriamente.',
            'nomeTarefa.string' => 'O campo de nome deve ser uma string.',
            'nomeTarefa.max' => 'O campo de nome não pode exceder 50 caracteres.',

            'idUsuario.required' => 'O campo de nome do usuário precisa ser preenchido obrigatoriamente.',

            'descricaoTarefa.required' => 'O campo de descrição precisa ser preenchido obrigatoriamente.',
            'descricaoTarefa.string' => 'O campo de descrição deve ser uma string.',
            'descricaoTarefa.max' => 'O campo de descrição não pode exceder 255 caracteres.',

            'vencimentoTarefa.required' => 'O campo de vencimento precisa ser preenchido obrigatoriamente.',

            'prioridadeTarefa.required' => 'O campo de prioridade precisa ser preenchido obrigatoriamente.',
            'prioridadeTarefa.string' => 'O campo de prioridade deve ser uma string.',
            'prioridadeTarefa.in' => 'O campo de prioridade deve ser uma das seguintes opções: baixa, média, alta.',
        ]);

        $tarefa->update([
            $tarefa->nomeTarefa = $request->input('nomeTarefa'),
            $tarefa->idUsuario = $request->input('idUsuario'),
            $tarefa->descricaoTarefa = $request->input('descricaoTarefa'),
            $tarefa->entregaTarefa = null,
            $tarefa->vencimentoTarefa = $request->input('vencimentoTarefa'),
            $tarefa->prioridadeTarefa = $request->input('prioridadeTarefa'),
            $tarefa->statusTarefa = 'em progresso',
        ]);

        // dd($tarefa);

        return redirect()->route('dashboard.examinador');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tarefa $tarefa, $id)
    {
        $tarefa = $tarefa::find($id);

        if (!$tarefa) {
            abort('404', 'Impossível prosseguir o usuários não existe');
        }

        $tarefa->delete();

        return redirect()->route('dashboard.examinador');
    }


    public function resposta($id){
        $tarefa = Tarefa::find($id);

        return view('dashboard.usuario.resposta', compact('tarefa'));
    }

    public function respostaStore(Request $request, $id)
    {

        $idUsuario = session('id');
        $tarefa = Tarefa::find($id);

        $request->validate([
            'nomeResposta' => 'required|string|max:100',
            'descricaoResposta' => 'required|string|max:255'
        ], [
            'nomeResposta.required' => 'O campo de título precisa ser preenchido obrigatoriamente.',
            'nomeResposta.string' => 'O campo de título deve ser uma string.',
            'nomeResposta.max' => 'O campo de título não pode exceder 100 caracteres.',

            'descricaoResposta.required' => 'O campo de resposta precisa ser preenchido obrigatoriamente.',
            'descricaoResposta.string' => 'o campo de resposta deve ser uma string.',
            'descricaoResposta.max' => 'o campo de resposta não pode exceder 255 caracteres.'
        ]);

        $resposta = new Resposta();
        $resposta->nomeResposta = $request->input('nomeResposta');
        $resposta->descricaoResposta = $request->input('descricaoResposta');
        $resposta->idUsuario = $idUsuario;
        $resposta->idTarefa = $id;
        $resposta->entregaResposta = now();
        $resposta->save();

        $tarefa->update([
            $tarefa->entregaTarefa = now(),
            $tarefa->statusTarefa = 'concluída'
        ]);

        return redirect()->route('dashboard.usuario');
    }

    public function respondidos(){

        $respondidos = Resposta::all();

        // dd($respondidos);
        foreach ($respondidos as $item) {
            $hoje = Carbon::now();
            $vencimento = Carbon::parse($item->vencimentoTarefa);

            if ($vencimento->diffInDays($hoje, false) > 0) {
                $item->statusCor = 'red';
            } elseif ($vencimento->diffInDays($hoje, false) >= -3) {
                $item->statusCor = 'orange';
            } else {
                $item->statusCor = 'green';
            }
        }


        // dd($respostas);

        return view('dashboard.usuario.respondidos', compact('respondidos'));
    }
}
