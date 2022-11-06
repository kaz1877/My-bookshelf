@extends("layouts.base")

@section("main")

@include('layouts.nav')
<div class="container">
    <h2 class="h3 mt-3">書籍の検索</h2>
    <div class="border border-1 px-3 py-2">
        <p>検索したい書籍のフリーワードを下記に入力してください。</p>
        <p>検索後、書籍を選択すると下記の項目が自動で入力されます。</p>
        <div class="my-2 mx-auto">
            @include('layouts.search_form')
        </div>
    </div>
    <h2 class="h3 mt-3 mb-0">書籍の登録</h2>
    <div class="border border-1 mt-1 mb-4 px-4">
        <form action="{{route('book.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group row mt-2">
                <label class="col-sm-2 col-form-label align-middle">本の画像</label>
                <!-- 本のサムネイル画像 -->
                <div class="col-sm-10 mb-2">
                    @if(isset($url))
                        @if($url !== null)
                            <img src= "{{$url}}" class="rounded mx-auto d-block img-fluid" style="width: 100px;">
                        @endif
                    @else
                        <img src= "https://res.cloudinary.com/dgsnxc8gp/image/upload/v1667721513/m_e_others_501_rzqxyy.png"
                        class="rounded mx-auto d-block img-fluid" style="width: 100px;" >
                    @endif
                    <p class="mt-3 mb-0">
                        現在表示されている画像から変更する場合は、画像を選択してください。<br/>
                        ファイルを直接ドロップすることもできます。
                    </p>
                    <div class="custom-file mt-1">
                        <input type="file" class="custom-file-input" id="inputFile" name="image">
                        <label class="custom-file-label" for="inputFile" data-browse="参照">ファイルを選択</label>
                    </div>
                    @error('image')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                    <input type="hidden" name="url" value="{{$url ?? old('url')}}">
                </div>
            </div>
            <div class="form-group row">
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
                <label for="author" class="col-sm-2 col-form-label">著者</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text"
                    id="author" name="author" value="{{$author ?? old('author')}}">
                    @error('author')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="type" class="col-sm-2 col-form-label">カテゴリー</label>
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
@include('layouts.footer')
@endsection
