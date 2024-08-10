<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>



<body>

    <div class="main">
        <input type="checkbox" id="chk" aria-hidden="true">

        <div class="signup">
            <form action="{{ route('registro') }}" method="POST">
                @csrf
                <label for="chk" aria-hidden="true">Cadastrar-se</label>
                <input type="text" name="nome" placeholder="Nome:">
                <input type="text" name="sobrenome" placeholder="Sobrenome:">
                <input type="email" name="email" placeholder="Email:">
                <input type="password" name="senha" placeholder="Senha:">
                <div class="radio">
                    <div>
                        <h5 for="examinador">Examinador:</h5>
                        <input type="radio" name="tipo_usuario" id="examinador" value="examinador">
                    </div>
                    <div>
                        <h5 for="usuario">Usuário:</h5>
                        <input type="radio" name="tipo_usuario" id="usuario" value="usuario">
                    </div>
                </div>
                @error('tipo_usuario')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <button>Criar</button>
            </form>
        </div>

        <div class="login">
            <form action="{{ route('autenticar') }}" method="POST">
                @csrf
                <label for="chk" aria-hidden="true">Login</label>
                <input type="email" name="email" placeholder="Email:">
                <input type="password" name="senha" placeholder="Senha:">
                <button type="submit">Entrar</button>
            </form>
        </div>
    </div>

</body>

</html>
