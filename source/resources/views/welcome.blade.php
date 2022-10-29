@extends('layouts.base')


@section("main")

@include('layouts.nav')
    <div class="jumbotron jumbotron-fluid">
		<div class="container">
                <div class="">
					<div class="pt-1" style="background:rgba(255,255,255,0.6);">
						<div class="text-center">
							<h1 class="h3 text-dark pb-2">あなたの本管理します</h1>
							<a href="{{route('register')}}" class="btn mb-2" style="color:#fff; background-color:#f5b629;">いますぐはじめる！</a>
							<p class="text-dark pb-1">すでに登録済みの方は<a href="{{route('login')}}">こちら</a></p>
						</div>
					</div>
				</div>
		</div>
	</div>
	<div class="bg-light pb-3">
		<div class="container">
			<div class="text-center pt-3" >
				<h1 class="h1 pb-2">My Bookshelfとは</h1>
				<p>
					ウェブ上に本棚に作成し、自分の持っている本やお気に入りの本の<br/>
					管理を行うことができます。
				</p>
			</div>
				<div class="d-flex justify-content-center my-3">
					<div class="border border-info p-2 m-2" style="width:250px;">
						<div class="d-flex justify-content-center pb-3">
							<img src="{{asset('storage/images/search_icon.png')}}" class="img-fluid" style="height: 100px;">
						</div>
						<h3 class="h5 pb-3">1.持っている本を検索しましょう</h3>
						<p>
							持っている本、お気に入りの本を検索して登録できます。
							手動で入力して登録することもできます。
						</p>
					</div>
					<div class="border border-info p-2 m-2" style="width:250px;">
						<div class="d-flex justify-content-center pb-3">
							<img src="{{asset('storage/images/bookshelf_icon.png')}}" class="img-fluid" style="height: 100px;">
						</div>
						<h3 class="h5">2.登録した本を管理しましょう</h3>
						<p>
							本を一括で管理することができます。
							これで同じ本を購入することがなくなりますね！
						</p>
					</div>
				</div>
		</div>
	</div>
		<div class="container">
            <div class="row my-3">
                <div class="col-12 col-md-8">
                    <h3>最近追加された書籍</h3>
                    <div class="d-flex justify-content-sm-between justify-content-center flex-md-nowrap flex-wrap  my-3">
                        @forelse($books as $book)
                        <div class="books p-1">
                            @if($book->url !== null)
                                <img src= "{{asset($book->url)}}" class="rounded img-fluid">
                            @else
                                <img src= "{{asset('storage/images/e_others_501.png')}}"
                                class="rounded img-fluid">
                            @endif
                            <p>{{$book->title}}</p>
                        </div>
                        @empty
                            <p>登録はありません</p>
                        @endforelse
                    </div>
                    </div>
                <div class="col-12 col-md-4">
                    <div class="border mb-3 p-3">
                        <div class="text-center">
                            <h2 class="h3 my-3">「My Bookshelf」を使ってみましょう！</h1>
                        </div>
                        <div class="my-3">
                            <a class="btn btn-block" href="{{route('register')}}" style="color:#fff; background-color:#f5b629;">新規ユーザ登録</a>
                        </div>
                        <div class="border-bottom mx-5"></div>
                        <div class="my-3">
                            <a class="btn btn-success btn-block" href="#">ゲストログイン</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<style>
	.jumbotron{
        background:url(storage/images/bookShelf.jpg) center no-repeat;
        background-size: cover;
        margin:0;
        height:250px;
	}
	.books{
		width:100px;
	}
</style>
@include('layouts.footer')
@endsection
