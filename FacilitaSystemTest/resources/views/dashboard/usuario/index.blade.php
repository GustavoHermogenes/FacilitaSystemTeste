@extends('dashboard.layout')


@section('title', 'Usuário')
@section('conteudo')

    <section>

        <div class="tabelaAtv">

            <h3>Atividades</h3>

            <div class="d-flex flex-row-reverse bd-highlight botaoLateral">
                <div><a href="{{ route('respondidos.usuario') }}">Respondidas</a></div>
            </div>

            <table class="table table-hover" style="width: 80%; margin: 20px auto">
                <thead class="thead-dark">
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
                        <tr>
                            @php
                                if ($item->entregaTarefa == null) {
                                    $item->statusCor = 'orange';
                                    $item->entregaTarefa = 'Pendente';
                                } elseif ($item->entregaTarefa > $item->vencimentoTarefa) {
                                    $item->statusCor = 'red';
                                    $item->entregaTarefa = 'Entregue com atraso';
                                } else {
                                    $item->statusCor = 'green';
                                    $item->entregaTarefa = 'Entregue no tempo correto';
                                }
                            @endphp

                            <td class="entrega status-{{ $item->statusCor }}">{{ ucfirst($item->entregaTarefa) }}</td>
                            <td>{{ ucfirst($item->nomeTarefa) }}</td>
                            <td>{{ ucfirst($item->descricaoTarefa) }}</td>
                            <td>{{ ucfirst($item->prioridadeTarefa) }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->vencimentoTarefa)->format('d/m/Y H:i') }}</td>
                            <td>{{ ucfirst($item->statusTarefa) }}</td>
                            <td>
                                <form action="{{ route('resposta.tarefa', ['id' => $item->id]) }}" method="GET">
                                    @csrf
                                    <button>Editar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


        @foreach ($tarefas as $item)
            <tr>
            </tr>
            <tr>
            </tr>
            <tr>
            </tr>
            <tr>
            </tr>
            <tr>
            </tr>
            <tr>
            </tr>
            <tr>
            </tr>
        @endforeach
        </tbody>
        </table>
        </div>

    @endsection
