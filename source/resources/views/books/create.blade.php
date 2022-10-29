@extends("layouts.base")

@section("main")

@include('layouts.nav')

<div class="container">
    <h2 class="mt-3">書籍の検索</h2>
    <div class="border border-1 p-3">
        <p>検索したい書籍のフリーワードを下記に入力してください。</p>
        <p>検索後、書籍を選択すると下記の項目が自動で入力されます。</p>
        <div class="my-3 mx-auto">
            <form class="mx-3" action="{{route('book.search')}}" method="GET" class="form-inline">
                @csrf
                <div class="input-group input-group-sm">
                    <input type="search" id="search" name="keyword" class="form-control border mt-1" placeholder="本をさがす">
                    <div class="input-group-append">
                        <button class="btn border bg-white text-teal1 mt-1" type="submit" id="search">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <h2 class="my-3">書籍の登録</h2>
    <div class="border border-1 mt-3 px-4">
        <form action="{{route('book.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group row mt-3">
                <label for="title" class="col-sm-2 col-form-label">題名【必須】</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text"
                    id="title" name="title" value="{{$title ?? old('title')}}">
                    @error('title')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">本の画像</label>
                <!-- 本のサムネイル画像 -->
                <div class="col-sm-4 mb-2">
                    @if(isset($url))
                        @if($url !== null)
                            <img src= "{{$url}}" class="rounded mx-auto d-block img-fluid" style="width: 100px;">
                        @endif
                    @else
                        <img src= "{{asset('storage/images/m_e_others_501.png')}}" class="rounded mx-auto d-block img-fluid" style="width: 100px;" >
                    @endif
                </div>
                <div class="col-sm-6">
                    <input class="" id="image" type="file" name="image">
                    @error('image')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                    <input type="hidden" name="url" value="{{$url ?? old('url')}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="author" class="col-sm-2 col-form-label">著者【必須】</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text"
                    id="author" name="author" value="{{$author ?? old('author')}}">
                    @error('author')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="type" class="col-sm-2 col-form-label">カテゴリー【必須】</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="type"
                    id="type" value="{{old('type')}}">
                    @error('type')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="content" class="col-sm-2 col-form-label">コメント</label>
                <div class="col-sm-10">
                    <textarea id="content" class="form-control" name="content"
                    rows="4" >{{old('content')}}</textarea>
                    @error('content')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <input class="btn btn-primary" type="submit" value="送信">
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
