<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge"> 
    <title>Mostrario de Veiculos</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <header>
            <h1>Mostruario de Veiculos</h1>
        </header>
        <nav>
            <ul>
                {{-- Links para o cadastro --}}
                <li><a href="/vehicles">Início</a></li>
                <li><a href="/vehicles/create">Cadastro de Veículos</a></li>
            </ul>
        </nav>
        <div class="content">
            {{-- o conteúdo da view específica será injetado aqui! --}}
            @yield('content')
        </div>
        <footer>
            <div>
               
            </div>
        </footer>
    </div>
</body>
</html>