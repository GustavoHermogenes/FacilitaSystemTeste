<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>



<body>

    <div>
        <form action="{{ route('autenticar') }}" method="POST">

            @csrf

            <div>
                <input type="email" name="email" placeholder="Email:">
                {{ $errors->has('email') ? $errors->first('email') : '' }}
            </div>

            <div>
                <input type="password" name="senha" placeholder="Senha:">
                {{ $errors->has('senha') ? $errors->first('senha') : '' }}
            </div>

            <input type="submit" value="Entrar">

        </form>

        <a href="{{ route('cadastrar') }}">Ainda não possui uma conta? cadastre-se</a>

    </div>




</body>

</html>
