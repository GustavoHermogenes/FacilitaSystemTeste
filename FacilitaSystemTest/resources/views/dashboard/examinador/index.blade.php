@extends('dashboard.layout')


@section('title', 'Examinador')
@section('conteudo')

    <section>

        <a href="{{ route('dashboard.examinador.create') }}">Adicionar</a>

        <div>

            <h3>Atividade</h3>

            <table>
                <thead>
                    <tr>

                        <th>Entrega:</th>
                        <th>Nome:</th>
                        <th>Usuário designado:</th>
                        <th>Descrição:</th>
                        <th>Prioridade:</th>
                        <th>Vencimento:</th>
                        <th>Status:</th>
                        <th>Editar:</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($tarefas as $item)
                        @php
                            if ($item->entregaTarefa == null) {
                                $item->entregaTarefa = 'Ainda não foi entregue';
                            } elseif ($item->entregaTarefa > $item->vencimentoTarefa) {
                                $item->entregaTarefa= 'Entregue com atraso';
                            }else{
                                $item->entregaTarefa = 'Entregue no tempo correto';
                            }

                        @endphp

                        <tr>
                            <td>{{ ucfirst($item->entregaTarefa) }}</td>
                        </tr>
                        <tr>
                            <td>{{ ucfirst($item->nomeTarefa) }}</td>
                        </tr>
                        <tr>
                            <td>{{ ucfirst($item->usuario->nomeUsuario) }}</td>
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
                            <a href="{{ route('edit.tarefa', ['id' => $item->id]) }}">Editar</a>
                        </tr>
                        <form action="{{ route('destroy.tarefa', ['id' => $item->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <tr>
                                <button>Deletar</button>
                            </tr>
                        </form>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div>

            <h3>Usuários</h3>

            <table>
                <thead>
                    <tr>
                        <th>Registro:</th>
                        <th>Nome:</th>
                        <th>Email:</th>
                        <th>Status:</th>
                        <th>Alterar</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($usuarios as $item)
                        <tr>
                            <td>{{ ucfirst($item->id) }}</td>
                        </tr>
                        <tr>
                            <td>{{ ucfirst($item->nomeUsuario) . ' ' . ucfirst($item->sobrenomeUsuario) }}</td>
                        </tr>
                        <tr>
                            <td>{{ ucfirst($item->statusUsuario) }}</td>
                        </tr>
                        <tr>
                            <form action="{{ route('update.status', ['id' => $item->id]) }}" method="POST">
                                @csrf
                                @method('PUT')
                                @if ($item->statusUsuario == 'ativo')
                                    <button>Inativar</button>
                                @else
                                    <button>Ativar</button>
                                @endif
                            </form>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </section>

@endsection
