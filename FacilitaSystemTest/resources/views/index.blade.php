<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>



<body>


    <div class="d-flex justify-content-center align-items-center vh-100">

        <div class="index">

            <h1 class="teste">Olá, seja bem vindo!</h1>

            <div>
                <a href="{{ route('cadastrar') }}">Cadastrar-se</a>
                <a href="{{ route('login') }}">Login</a>
            </div>

        </div>
    </div>




</body>

</html>
