<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastrar</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>



<body>


    <div>
        <form action="{{ route('registro') }}" method="POST">
            @csrf
            <div>
                <label for="nome">Nome:</label>
                <input type="text" name="nome" placeholder="Nome:">
                @error('nome')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="sobrenome">Sobrenome:</label>
                <input type="text" name="sobrenome" placeholder="Sobrenome:">
                @error('sobrenome')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="email" name="email" placeholder="Email:">
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="senha">Senha:</label>
                <input type="password" name="senha" placeholder="Senha:">
                @error('senha')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <h4>Tipo de usuário</h4>
                <div>
                    <input type="radio" name="tipo_usuario" id="examinador" value="examinador">
                    <label for="examinador">Examinador:</label>
                </div>
                <div>
                    <input type="radio" name="tipo_usuario" id="usuario" value="usuario">
                    <label for="usuario">Usuário:</label>
                </div>
                @error('tipo_usuario')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <input type="submit" value="Criar">
        </form>

        <a href="{{ route('login') }}">Já possui um cadastro?</a>
    </div>




</body>

</html>
