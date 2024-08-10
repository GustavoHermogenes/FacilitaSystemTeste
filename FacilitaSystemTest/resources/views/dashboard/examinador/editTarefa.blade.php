@extends('dashboard.layout')


@section('title', 'Examinador - Edit atividade')
@section('conteudo')

    <section>

        <form action="{{ route('update.tarefa', ['id' => $tarefa->id]) }}" method="POST">

            @csrf
            @method('PUT')

            <h3>Edit uma atividade</h3>

            <div>
                <label>Nome</label>
                <input type="text" name="nomeTarefa" value="{{ $tarefa->nomeTarefa }}" placeholder="Nome:">
                @error('nomeTarefa')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            
            <div>
                <label>Usuário designado</label>
                <select placeholder="Nome:" id="idUsuario" name="idUsuario">
                    @foreach ($usuarios as $usuario)
                        <option value="{{ $usuario->id }}" {{ old('idUsuario', $tarefa->idUsuario) == $usuario->id ? 'selected' : '' }}>
                            {{ $usuario->nomeUsuario }}
                        </option>
                    @endforeach
                </select>
                @error('idUsuario')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

            <div>
                <label>Descrição</label>
                <textarea name="descricaoTarefa" cols="25" rows="5" placeholder="Descrição:"" style="resize: none">{{ $tarefa->descricaoTarefa }}</textarea>
                @error('descricaoTarefa')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label>Vencimento</label>
                <input type="datetime-local" placeholder="Vencimento:" name="vencimentoTarefa" value="{{ $tarefa->vencimentoTarefa }}">
                @error('vencimentoTarefa')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <h4>Prioridade</h4>
                <div>
                    <input type="radio" name="prioridadeTarefa" value="baixa" {{ $tarefa->prioridadeTarefa == 'baixa' ? 'checked' : '' }}>
                    <label for="">baixa</label>
                </div>
                <div>
                    <input type="radio" name="prioridadeTarefa" value="média" {{ $tarefa->prioridadeTarefa == 'média' ? 'checked' : '' }}>
                    <label for="">média</label>
                </div>
                <div>
                    <input type="radio" name="prioridadeTarefa" value="alta" {{ $tarefa->prioridadeTarefa == 'alta' ? 'checked' : '' }}>
                    <label for="">alta</label>
                </div>
                @error('prioridadeTarefa')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>


            <input type="submit" value="Criar">

        </form>

    </section>

@endsection
