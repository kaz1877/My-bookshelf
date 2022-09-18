<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookStand</title>
    <link  href="{{asset('css/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    @yield("head")
</head>
<body>
    <header class="navbar navbar-expand-lg navbar-light bg-light">
        <h1 class="h2">
            <a class="navbar-brand" href="{{route('book.index')}}">My BookStand</a>
        </h1>
    </header>
    <div class="container">
        @yield("main")
    </div>
    <footer class="footer bg-light">
        <div class="container text-center">
            <p class="text-muted">copyright 2022 tsunoda.</p>
        </div>
    </footer>
</body>
</html>
