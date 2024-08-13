<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard - @yield('title')</title>
    
    <script src="https://kit.fontawesome.com/f0c3cb5f2a.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>



<body>
<header>
    <section class="navBar">
        <div>
            <h3>Seja bem vindo(a) {{ ucfirst(session('nome')) . ' ' . ucfirst(session('sobrenome')) }}!</h3>
            <h5>{{ ucfirst(session('cargo')) }}</h5>
        </div>
        <div>
            <a href="{{ route('index') }}">Sair</a>
        </div>
    </section>
</header>
<body>
    @yield('conteudo')
</body>


</body>

</html>
