<nav class="navbar navbar-expand-lg navbar-dark unique-color sticky-top">
    <a class="navbar-brand" href="{{route('book.index')}}">
        <i class="fas fa-book mr-1"></i>
        My Bookshelf
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
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
                    <form action="{{route('book.search')}}" method="GET" class="form-inline my-2 my-lg-0">
                        @csrf
                        <div class="input-group input-group-sm">
                            <input type="search" id="search" name="keyword" class="form-control border mt-1"
                            placeholder="本をさがす">
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
                <li class="nav-item">
                    <a href={{ route('logout') }}  class="nav-link" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                <form id='logout-form' action={{ route('logout')}} method="POST" style="display: none;">
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
        </div>
    </div>
</nav>
