<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> {{ $title }} </title>
        <link rel="stylesheet" type="text/css" href="{{ url('css/main.css') }}" />

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

        <script src="https://kit.fontawesome.com/cfad50e8c1.js" crossorigin="anonymous"></script>
    </head>

    <body>
        <div class="row">
            <div class="col-md-2">
                <div class="side-bar fixed-top">
                    <a href="/" class="logo">
                        <h2>Todo Todo</h2>
                    </a>
                    @include('components.todo-menu')
                </div>
            </div>
            <div class="col-md-10">
                @if (session()->has('success'))
                <p class="text-success mt-5" style="margin-left: 10vw">
                    {{ session('success') }}
                </p>
                @else
                @endif
                <div class="content-todo">
                    @yield('content')
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
        </script>
    </body>

</html>
