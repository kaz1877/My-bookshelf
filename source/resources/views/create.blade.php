@extends("base")

@section("main")

@if(count($errors))
<ul>
    @foreach($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
</ul>
@endif
<div class="container">
    <form class="" action="{{route('book.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">題名</label>
            <input class="form-control w-75" type="text"
            id="title" name="title" placeholder="題名" value="{{$title}}">
        </div>
        <div class="form-group">
            <label for="author">著者</label>
            <input class="form-control w-75" type="text"
            id="author" name="author" placeholder="著者" value="{{$author}}">
        <div class="form-group">
            <label for="url">画像URL</label>
            <input class="form-control w-75" type="text"
            id="url" name="url" placeholder="URL" value="{{$url}}">
        </div>
        <div class="form-group">
            <label for="type">カテゴリー</label>
            <input class="form-control w-75" type="text" name="type"
            id="type" placeholder="カテゴリー" value="">
        </div>
        <div class="form-group">
            <label for="content">コメント</label>
            <textarea id="content" class="form-control" name="content"
            rows="4" placeholder="コメント" ></textarea>
        </div>
        <input class="btn btn-primary" type="submit" value="送信">
    </form>
</div>
@endsection
