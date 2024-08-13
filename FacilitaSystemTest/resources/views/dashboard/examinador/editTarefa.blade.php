@extends('dashboard.layout')

@section('title', 'Examinador - Edit atividade')
@section('conteudo')


<div class="d-flex justify-content-end arrow">
    <a href="{{ route('dashboard.examinador') }}"><i class="fa-sharp fa-solid fa-arrow-left"></i></a>
</div>

<div class="container formulario">
    <div class="row justify-content-center">
        <div class="col-md-6 text-center mb-5">
            <h2 class="heading-section">Crie uma atividade</h2>
        </div>
    </div>

    <div class="w-75" style="margin: 0 auto">

        <div>
            <form action="{{ route('update.tarefa', ['id' => $tarefa->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div>
                    <div class="form-group">
                        <label for="nomeTarefa">Título:</label>
                        <input type="text" class="form-control" name="nomeTarefa" id="nomeTarefa" placeholder="Título" value="{{ $tarefa->nomeTarefa }}">
                    </div>
                    @error('nomeTarefa')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-12" style="margin: 10px 0">
                    <label for="descricaoTarefa">Descrição</label>

                    <div class="form-group">
                        <textarea name="descricaoTarefa" class="form-control" id="descricaoTarefa" cols="30" rows="7"
                            placeholder="Descrição" style="resize: none">{{ $tarefa->descricaoTarefa}}</textarea>
                    </div>
                    @error('descricaoTarefa')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row justify-content-between">
                    <div class="input-selecionar col-md-6">
                        <label for="idUsuario">Usuário designado</label>
                        <select placeholder="Nome:" id="idUsuario" name="idUsuario">
                            <option value="">Selecione um usuário</option>
                            @foreach ($usuarios as $usuario)
                                <option value="{{ $usuario->id }}"
                                    {{ old('idUsuario', $tarefa->idUsuario ?? '') == $usuario->id ? 'selected' : '' }}>
                                    {{ $usuario->nomeUsuario }}
                                </option>
                            @endforeach
                        </select>
                        @error('idUsuario')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 input-vencimento">
                        <label for="vencimentoTarefa">Vencimento</label>
                        <input type="datetime-local" placeholder="Vencimento:" name="vencimentoTarefa"
                            value="{{ $tarefa->vencimentoTarefa ?? '' }}">
                        @error('vencimentoTarefa')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="w-25" style="margin: 10px 0">
                    <h5>Prioridade</h5>
                    <div class="d-flex justify-content-between">
                        <div>
                            <input type="radio" name="prioridadeTarefa" value="baixa"
                                {{ $tarefa->prioridadeTarefa == 'baixa' ? 'checked' : '' }}>
                            <label for="">baixa</label>
                        </div>
                        <div>
                            <input type="radio" name="prioridadeTarefa" value="média"
                                {{ $tarefa->prioridadeTarefa == 'média' ? 'checked' : '' }}>
                            <label for="">média</label>
                        </div>
                        <div>
                            <input type="radio" name="prioridadeTarefa" value="alta"
                                {{ $tarefa->prioridadeTarefa == 'alta' ? 'checked' : '' }}>
                            <label for="">alta</label>
                        </div>
                    </div>
                    @error('prioridadeTarefa')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex flex-row-reverse bd-highlight botao-formulario">
                    <button type="submit">Enviar</button>
                </div>
            </form>
        </div>

    </div>
</div>

@endsection
