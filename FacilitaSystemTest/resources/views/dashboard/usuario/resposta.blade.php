@extends('dashboard.layout')


@section('title', 'Usuário  - Resposta atividade')
@section('conteudo')

    <section>

        <form action="{{ route('resposta.store', ['id' => $tarefa->id]) }}" method="POST">
            @csrf

            <h3>Responda a atividade</h3>

            <div>
                <label>Título</label>
                <input type="text" placeholder="Nome:" name="nomeResposta">
                @error('nomeResposta')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label>Resposta</label>
                <textarea name="descricaoResposta" cols="25" rows="5" placeholder="Sua resposta:" style="resize: none"></textarea>
                @error('descricaoResposta')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <input type="submit" value="Criar">

        </form>

    </section>

@endsection
