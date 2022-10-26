<nav class="navbar navbar-expand navbar-dark unique-color ">

    <a class="navbar-brand" href="{{route('book.index')}}">
        <i class="fas fa-book mr-1"></i>
        My Bookshelf
    </a>
    @auth
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="{{route('book.index')}}">ホーム</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('book.create')}}">本を登録する</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="">testest</a>
        </li>
    </ul>
    <ul class="navbar-nav mx-auto">
        <li class="nav-item">
            <form action="{{route('book.search')}}" method="GET" class="form-inline">
                @csrf
                <div class="input-group input-group-sm">
                    <input type="search" id="search" name="keyword" class="form-control border mt-1"
                    style="width:500px" placeholder="本をさがす">
                    <div class="input-group-append">
                        <button class="btn border bg-white text-teal1 mt-1" type="submit" id="search">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <!-- Dropdown -->
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user-circle"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                <button class="dropdown-item" type="button"onclick="location.href=''">
                    マイページ
                </button>
                <div class="dropdown-divider"></div>
                <button form="logout-button" class="dropdown-item" type="submit">
                    ログアウト
                </button>
            </div>
        </li>
        <form id="logout-button" method="POST" action="{{route('logout')}}">
            @csrf
        </form>
    </ul>
    @endauth
    @guest
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="{{route('register')}}">ユーザ登録</a>
        </li>
    @endguest
    @guest
        <li class="nav-item">
            <a class="nav-link" href="{{route('login')}}">ログイン</a>
        </li>
    @endguest
    </ul>
</nav>
