@extends("base")

@section("main")

@forelse($books as $book)
<div class="container">
    <form action="{{route('book.update',$book->id)}}" method="post">
        @method('PUT')
        @csrf
        <label for="title">題名</label>
        <input class="form-control" type="text" 
        id="title" name="title" placeholder="題名" value="{{$book->title}}"><br>
        <label for="author">著者</label>
        <input class="form-control" type="text" 
        id="author" name="author" placeholder="著者" value="{{$book->author}}"><br>
        <label for="publisher">出版社</label>
        <input class="form-control" type="text" 
        id="publisher" name="publisher" placeholder="出版社" value="{{$book->publisher}}"><br>
        <label for="type">カテゴリー</label>
        <input class="form-control" type="text" name="type" 
        id="type" placeholder="カテゴリー" value="{{$book->type}}"><br>
        <label for="content">コメント</label>
        <textarea id="content" class="form-control" name="content" 
        rows="4" placeholder="コメント" >{{$book->content}}</textarea><br>
        <input class="form-contorl" type="submit" value="送信">
    </form>

</div>
@empty
<p>登録はありません</p>
@endforelse
@endsection

@section("footer")
copyright 2022 tsunoda.
@endsection