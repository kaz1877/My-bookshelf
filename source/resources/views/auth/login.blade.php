@extends('layouts.base')

@section('title','ログイン')

@section('main')
    <div class="container">
        <div class="row">
            <div class="mx-auto col col-12 col-sm-11 col-md-9 col-lg-7 col-xl-6 mt-3">
                <h1 class="text-center"><a class="text-dark" href="/">My Bookshelf</a></h1>
                <div class="card mt-3">
                    <div class="card-body text-center">
                        <h2 class="h3 card-title text-center mt-2">ログイン</h2>
                        @include('error_list')
                        <div class="card-text">
                            <form action="{{route('login')}}" method="POST">
                                @csrf
                                <div class="md-form">
                                    <label for="email">メールアドレス</label>
                                    <input class="form-control" type="text" id="email" name="email" required value="{{old('email')}}">
                                </div>
                                <div class="md-form">
                                    <label for="password">パスワード</label>
                                    <input class="form-control" type="password" id="password" name="password" required value="{{old('password')}}">
                                </div>
                                <input type="hidden" name="remember" id="remember" value="on">
                                <button class="btn btn-block blue-gradient mt-2 mb-2" type="submit">ログイン</button>
                            <div class="mt-0">
                                <a href="{{route('register')}}" class="card-text">ユーザ登録はこちら</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
