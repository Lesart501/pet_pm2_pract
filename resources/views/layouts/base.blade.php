<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="bg-dark">
    <header class="p-3 bg-warning border-bottom border-dark border-3">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="{{ route('index') }}" class="nav-link px-2 text-dark fw-bold">Главная</a></li>
                    @auth<li><a href="{{ route('home') }}" class="nav-link px-2 text-dark">Личный кабинет</a></li>@endauth
                </ul>
                <div class="text-end">
                    @guest
                    <a href="{{ route('login') }}" class="btn btn-dark me-2">Войти</a>
                    <a href="{{ route('register') }}" class="btn btn-outline-dark">Регистрация</a>
                    @endguest
                    @auth
                    <form action="{{ route('logout') }}" method="POST" class="form-inline">
                        @csrf
                        <input type="submit" class="btn btn-primary" value="Выйти">
                    </form>
                    @endauth
                </div>
            </div>
        </div>
    </header>

    @yield('content')
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.2.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>