@extends('dashboard.layout')


@section('title', 'Examinador')
@section('conteudo')


    <section>

        <div class="tabelaAtv">

            <h3>Atividades</h3>

            <div class="d-flex flex-row-reverse bd-highlight botaoLateral">
                <div><a href="{{ route('dashboard.examinador.create') }}">Adicionar</a></div>
                <div><a href="{{ route('respondidos.examinador') }}">Respondidas</a></div>
            </div>

            <table class="table table-hover" style="width: 80%; margin: 20px auto">
                <thead class="thead-dark">
                    <tr>
                        <th>Entrega</th>
                        <th>Nome</th>
                        <th>Usuário designado</th>
                        <th>Descrição</th>
                        <th>Prioridade</th>
                        <th>Vencimento</th>
                        <th>Status</th>
                        <th>Editar</th>
                        <th>Deletar</th>
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
                            <td>{{ ucfirst($item->usuario->nomeUsuario) }}</td>
                            <td>{{ ucfirst($item->descricaoTarefa) }}</td>
                            <td>{{ ucfirst($item->prioridadeTarefa) }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->vencimentoTarefa)->format('d/m/Y') }}</td>
                            <td>{{ ucfirst($item->statusTarefa) }}</td>
                            <td>
                                <form action="{{ route('edit.tarefa', ['id' => $item->id]) }}" method="GET">
                                    @csrf
                                    <button>Editar</button>
                                </form>
                            </td>
                            <td>
                                <form action="{{ route('destroy.tarefa', ['id' => $item->id]) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button>Deletar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


        <div class="tabelaAtv">

            <h3>Usuários</h3>

            <table class="table table-hover" style="width: 80%; margin: 20px auto">
                <thead class="thead-dark">
                    <tr>
                        <th>Registro</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Criado</th>
                        <th>Editar</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($usuarios as $item)
                        <tr>
                            <td>{{ ucfirst($item->id) }}</td>
                            <td>{{ ucfirst($item->nomeUsuario) . ' ' . ucfirst($item->sobrenomeUsuario) }}</td>
                            <td>{{ ucfirst($item->statusUsuario) }}</td>
                            <td>{{ $item->emailUsuario }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}</td>
                            <td>
                                <form action="{{ route('update.status', ['id' => $item->id]) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    @if ($item->statusUsuario == 'ativo')
                                        <button>Inativar</button>
                                    @else
                                        <button>Ativar</button>
                                    @endif
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>

@endsection
