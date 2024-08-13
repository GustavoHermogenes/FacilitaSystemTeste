@extends('dashboard.layout')


@section('title', 'Usuário - Tarefas respondidas')
@section('conteudo')


<section>

    <div class="tabelaAtv">

        <h3>Atividades respondidas</h3>

        <div class="d-flex flex-row-reverse bd-highlight botaoLateral">
            <div><a href="{{ route('dashboard.usuario') }}">Incompletos</a></div>
        </div>

        <table class="table table-hover" style="width: 80%; margin: 20px auto">
            <thead class="thead-dark">
                <tr>
                    <th>Nome:</th>
                    <th>Descrição:</th>
                    <th>Resposta:</th>
                    <th>Prioridade:</th>
                    <th>Entregue:</th>
                    <th>Vencimento:</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($respondidos as $item)
                @php
                    $tarefa = App\Models\Tarefa::where('id', $item->idTarefa)->first();
                @endphp
                    <tr>
                        <td>{{ ucfirst($item->nomeResposta) }}</td>
                        <td>{{ ucfirst($tarefa->descricaoTarefa) }}</td>
                        <td>{{ ucfirst($item->descricaoResposta) }}</td>
                        <td>{{ ucfirst($tarefa->prioridadeTarefa) }}</td>
                        <td style="color:{{ $item->statusCor }};  font-weight: bold;">
                            {{ \Carbon\Carbon::parse($item->entregaResposta)->format('H:i d/m/Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->vencimentoResposta)->format('H:i d/m/Y') }}</td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
