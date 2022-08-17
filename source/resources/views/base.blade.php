<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookStand</title>
    <link  href="{{asset('css/style.css')}}" rel="stylesheet">
    @yield("head")
</head>
<body>
    <a href="{{route('book.index')}}"><h1>My BookStand</h1></a>
    <div class="header">
        @yield('header')
    </div>
    <div class="container">
        @yield("main")
    </div>
    <div class="footer">
        @yield('footer')
    </div>
</body>
</html>