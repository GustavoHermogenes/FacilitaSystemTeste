@extends('dashboard.layout')


@section('title', 'Usuário')
@section('conteudo')

    <section>

        <a href="{{ route('dashboard.examinador.create') }}">Adicionar</a>

        <div>

            <h3>Atividades</h3>

            <table>
                <thead>
                    <tr>
                        <th>Entregue:</th>
                        <th>Nome:</th>
                        <th>Descrição:</th>
                        <th>Prioridade:</th>
                        <th>Vencimento:</th>
                        <th>Status:</th>
                        <th>Editar:</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($tarefas as $item)
                        <tr style="color:{{ $item->statusCor }}">
                            <td >{{ $item->entregaTarefa }}</td>
                        </tr>
                        <tr>
                            <td>{{ ucfirst($item->nomeTarefa) }}</td>
                        </tr>
                        <tr>
                            <td>{{ ucfirst($item->descricaoTarefa) }}</td>
                        </tr>
                        <tr>
                            <td>{{ ucfirst($item->prioridadeTarefa) }}</td>
                        </tr>
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($item->vencimentoTarefa)->format('d/m/Y') }}</td>
                        </tr>
                        <tr>
                            <td>{{ ucfirst($item->statusTarefa) }}</td>
                        </tr>
                        <tr>
                            <a href="{{ route('resposta.tarefa', ['id' => $item->id]) }}">Responder</a>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
