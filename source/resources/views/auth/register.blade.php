@extends('layouts.base')

@section('title', 'ユーザー登録')

@section('main')
    <div class="container">
        <div class="row">
        <div class="mx-auto col col-12 col-sm-11 col-md-9 col-lg-7 col-xl-6 mt-2">
            <h1 class="text-center"><a class="text-dark" href="/">My Bookshelf</a></h1>
            <div class="card mt-3">
                <div class="card-body text-center">
                    <h2 class="h3 card-title text-center mt-2">ユーザー登録</h2>

                    @include('layouts.error_list')

                    <div class="card-text">

                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="md-form">
                                <label for="name">ユーザー名</label>
                                <input class="form-control" type="text" id="name" name="name" required value="{{ old('name') }}">
                            </div>
                            <div class="md-form">
                                <label for="email">メールアドレス</label>
                                <input class="form-control" type="text" id="email" name="email" required value="{{ old('email') }}" >
                            </div>
                            <div class="md-form">
                                <label for="password">パスワード</label>
                                <input class="form-control" type="password" id="password" name="password" required>
                            </div>
                            <div class="md-form">
                                <label for="password_confirmation">パスワード(確認)</label>
                                <input class="form-control" type="password" id="password_confirmation" name="password_confirmation" required>
                            </div>
                            <button class="btn btn-block winter-neva-gradient mt-2 mb-2" type="submit">ユーザー登録</button>
                        </form>
                        <div class="border-bottom mt-3"></div>
                        <div class="mt-3">
                            <a href="/login/guest" class="btn btn-block juicy-peach-gradient mt-2 mb-2">ゲストログイン</a>
                        </div>
                        <div class="mt-3">
                            <a href="{{ route('login') }}" class="card-text">ログインはこちら</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
