<footer class="footer mx-auto">
    <nav class="navbar-expand navbar-dark p-1">
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mx-auto">
                @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{route('book.index')}}">ホーム</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('book.create')}}">本を登録する</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">testest</a>
                </li>
                @endauth
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{route('register')}}">ユーザ登録</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('login')}}">ログイン</a>
                </li>
                @endguest
            </ul>
        </div>
    </nav>
    <p class="copyright">Copyright©Kazuki Tsunoda. All Rights Reserved.</p>
    </footer>

<style>
.footer {
    margin-top: auto;
    bottom: 0;
    width: 100%;
    height: 100px;
    background-color: #333;
}
.copyright{
    font-size:10px;
    color:#8c8c8c;
    text-align: center;
}
</style>
