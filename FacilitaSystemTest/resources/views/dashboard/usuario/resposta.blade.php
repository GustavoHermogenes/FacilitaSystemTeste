@extends('dashboard.layout')


@section('title', 'Usuário - Resposta atividade')
@section('conteudo')

    <section>

        <div class="d-flex justify-content-end arrow">
            <a href="{{ route('dashboard.usuario') }}"><i class="fa-sharp fa-solid fa-arrow-left"></i></a>
        </div>

        <section class="ftco-section" style="margin-top:30px;">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6 text-center mb-5">
                        <h2 class="heading-section">Responda a atividade!</h2>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-10 col-md-12">
                        <div class="wrapper">
                            <div class="row no-gutters">
                                <div class="col-md-7 d-flex align-items-stretch">
                                    <div class="contact-wrap w-100 p-md-5 p-4">
                                        <h3 class="mb-4">Preencha os campos!</h3>
                                        <form method="POST" action="{{ route('resposta.store', ['id' => $tarefa->id]) }}"
                                            id="contactForm" name="contactForm">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="nomeResposta"
                                                            id="nomeResposta" placeholder="Título">
                                                    </div>
                                                    @error('nomeResposta')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-12" style="margin: 10px 0">
                                                    <div class="form-group">
                                                        <textarea name="descricaoResposta" class="form-control" id="descricaoResposta" cols="30" rows="7"
                                                            placeholder="Resposta" style="resize: none"></textarea>
                                                    </div>

                                                    @error('descricaoResposta')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group botao-formulario">
                                                        <input type="submit" value="Responder">
                                                        <div class="submitting"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-md-5 d-flex align-items-stretch">
                                        <div class="info-wrap bg-primary w-100 p-lg-5 p-4 resposta" style="border-radius: 15px; color:white!important;">
                                            <h3 class="mb-4 mt-md-4">Informações da tarefa!</h3>
                                            <div class="dbox w-100 d-flex align-items-start">
                                                <div class="text pl-3">
                                                    <p><span>Nome: </span>{{ ucfirst($tarefa->nomeTarefa) }}</p>
                                                </div>
                                            </div>
                                            <div class="dbox w-100 d-flex align-items-center">
                                                <div class="text pl-3">
                                                    <p><span>Descrição: </span>{{ ucfirst($tarefa->descricaoTarefa) }}</p>
                                                </div>
                                            </div>
                                            <div class="dbox w-100 d-flex align-items-center">
                                                <div class="text pl-3">
                                                    <p><span>Vencimento:</span> {{ \Carbon\Carbon::parse($tarefa->vencimentoTarefa)->format('d/m/Y H:i') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    @endsection
