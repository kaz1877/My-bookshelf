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
        <input class="form-control" type="text" name="title" placeholder="題名"><br>
        <input class="form-control" type="text" name="author" placeholder="著者"><br>
        <input class="form-control" type="text" name="url" placeholder="画像url"><br>
        <input class="form-control" type="text" name="type" placeholder="カテゴリー"><br>
        <textarea id="" class="form-control" name="content" rows="4" placeholder="コメント"></textarea><br>
        <input class="form-contorl" type="submit" value="送信">
    </form>
</div>
@endsection