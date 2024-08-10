@extends('dashboard.layout')


@section('title', 'Usuário - Tarefas respondidas')
@section('conteudo')

    <section>

        <a href="{{ route('dashboard.usuario') }}">Em progresso</a>

        <div>

            <h3>Atividades Respondidas</h3>

            <table>
                <thead>
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
                        <tr>
                            <td>{{ ucfirst($item->nomeTarefa) }}</td>
                        </tr>
                        <tr>
                            <td>{{ ucfirst($item->descricaoTarefa) }}</td>
                        </tr>

                        @foreach ($respostas as $resposta)
                            <tr>
                                <td>{{ ucfirst($resposta->descricaoResposta) }}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td>{{ ucfirst($item->prioridadeTarefa) }}</td>
                        </tr>
                        <tr style="color:{{ $item->statusCor }}">
                            <td>{{ \Carbon\Carbon::parse($item->entregaTarefa)->format('d/m/Y') }}</td>
                        </tr>
                        </tr>
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($item->vencimentoTarefa)->format('d/m/Y') }}</td>
                    @endforeach
                </tbody>
            </table>
        </div>
