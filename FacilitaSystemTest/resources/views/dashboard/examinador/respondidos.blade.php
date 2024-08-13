@extends('dashboard.layout')


@section('title', 'Examinador')
@section('conteudo')

    <section>

        <div class="tabelaAtv">

            <h3>Atividades respondidas</h3>

            <div class="d-flex flex-row-reverse bd-highlight botaoLateral">
                <div><a href="{{ route('dashboard.examinador') }}">Outros</a></div>
            </div>

            <table class="table table-hover" style="width: 80%; margin: 20px auto">
                <thead class="thead-dark">
                    <tr>
                        <th>Nome:</th>
                        <th>Usuário designado</th>
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
                            <td>{{ ucfirst($item->usuario->nomeUsuario) . ' ' . ucfirst($item->usuario->sobrenomeUsuario) }}
                            </td>
                            <td>{{ ucfirst($item->descricaoTarefa) }}</td>
                            @php
                                $respostas = \App\Models\Resposta::where('idTarefa', $item->id)->first();

                            @endphp
                            <td>{{ ucfirst($respostas->descricaoResposta) }}</td>
                            <td>{{ ucfirst($item->prioridadeTarefa) }}</td>
                            <td style="color:{{ $item->statusCor }};  font-weight: bold;">
                                {{ \Carbon\Carbon::parse($item->entregaTarefa)->format('H:i d/m/Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->vencimentoTarefa)->format('H:i d/m/Y') }}</td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


    @endsection
