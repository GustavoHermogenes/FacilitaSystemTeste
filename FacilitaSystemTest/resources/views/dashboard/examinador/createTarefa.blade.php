@extends('dashboard.layout')


@section('title', 'Examinador - Criar atividade')
@section('conteudo')

    <section>

        <form action="{{ route('dashboard.examinador.store') }}" method="POST">

            @csrf

            <h3>crie uma atividade</h3>

            <div>
                <label>Nome</label>
                <input type="text" placeholder="Nome:" name="nomeTarefa">
                @error('nomeTarefa')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label>Descrição</label>
                <input type="text" placeholder="Descrição:" name="descricaoTarefa">
                @error('descricaoTarefa')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label>Vencimento</label>
                <input type="datetime-local" placeholder="Vencimento:" name="vencimentoTarefa">
                @error('vencimentoTarefa')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <h4>Prioridade</h4>
                <div>
                    <input type="radio" name="prioridadeTarefa" value="baixa">
                    <label for="">baixa</label>
                </div>
                <div>
                    <input type="radio" name="prioridadeTarefa" value="média">
                    <label for="">média</label>
                </div>
                <div>
                    <input type="radio" name="prioridadeTarefa" value="alta">
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
