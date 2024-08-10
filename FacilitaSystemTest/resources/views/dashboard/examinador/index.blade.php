@extends('dashboard.layout')


@section('title', 'Examinador')
@section('conteudo')

    <section>

        <div></div>
        
        <div>

            <h3>Atividade</h3>


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
                    <tr>
                        @foreach ($tarefas as $item)
                            @php
                                if ($item->entregaTarefa == null) {
                                    $item->statusCor = 'orange';
                                    $item->entregaTarefa = 'Ainda não foi entregue';
                                } elseif ($item->entregaTarefa > $item->vencimentoTarefa) {
                                    $item->statusCor = 'red';
                                    $item->entregaTarefa = 'Entregue com atraso';
                                } else {
                                    $item->statusCor = 'green';
                                    $item->entregaTarefa = 'Entregue no tempo correto';
                                }

                            @endphp
                            <th scope="row" style="color:{{ $item->statusCor }} ">{{ ucfirst($item->entregaTarefa) }}</th>
                            <td>{{ ucfirst($item->nomeTarefa) }}</td>
                            <td>{{ ucfirst($item->usuario->nomeUsuario) }}</td>
                            <td>{{ ucfirst($item->descricaoTarefa) }}</td>
                            <td>{{ ucfirst($item->prioridadeTarefa) }}</td>
                            <td>{{ ucfirst($item->statusTarefa) }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->vencimentoTarefa)->format('d/m/Y') }}</td>
                            <td><a href="{{ route('edit.tarefa', ['id' => $item->id]) }}">Editar</a></td>
                            <td>
                                <form action="{{ route('destroy.tarefa', ['id' => $item->id]) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button>Deletar</button>
                                </form>
                            </td>
                        @endforeach
                    </tr>
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
