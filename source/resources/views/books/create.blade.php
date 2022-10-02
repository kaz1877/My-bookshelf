@extends("base")

@section("main")

<div class="container">
    <form class="" action="{{route('book.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="">
            @if(isset($url))
                @if($url !== null)
                    <img src= "{{$url}}" >
                @endif
            @else
                <img src= "{{asset('storage/images/e_others_501.png')}}" >
            @endif
        </div>
        <div class="form-group">
            <a href="{{route('book.search')}}">本を検索する。</a>
        </div>
        <div class="form-group">
            <label>本のサムネイル画像を変更する。</label>
            <input id="image" type="file" name="image">
            @error('image')
                <p class="text-danger">{{$message}}</p>
            @enderror
            <input type="hidden" name="url" value="{{$url ?? old('url')}}">
        </div>
        <div class="form-group">
            <label for="title">題名【必須】</label>
            <input class="form-control w-75" type="text"
            id="title" name="title" value="{{$title ?? old('title')}}">
            @error('title')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="author">著者【必須】</label>
            <input class="form-control w-75" type="text"
            id="author" name="author" value="{{$author ?? old('author')}}">
            @error('author')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <!-- <div class="form-group">
            <label for="url">画像URL</label>
            <input class="form-control w-75" type="text"
            id="url" name="url" placeholder="URL" value="{{isset($url) ? $url : ''}}">
        </div> -->
        <div class="form-group">
            <label for="type">カテゴリー【必須】</label>
            <input class="form-control w-75" type="text" name="type"
            id="type" value="{{old('type')}}">
            @error('type')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="content">コメント</label>
            <textarea id="content" class="form-control" name="content"
            rows="4" placeholder="コメント" >{{old('content')}}</textarea>
            @error('content')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <input class="btn btn-primary" type="submit" value="送信">
    </form>
</div>
@endsection
