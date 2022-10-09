@extends("base")

@section("main")
@include('nav')
<form action="{{route('book.index')}}" method="get">
    <input type="text"  name="keyword"  placeholder="検索ワード" style="width:200px;" value="{{$keyword}}">
    @csrf
    <input type="submit" value="検索"  style="width:100px">
</form>

<div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    {{$sortWord}}
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <form action="{{route('book.index')}}" method="get">
            <button type="submit" class="dropdown-item" name="sort" value="1">タイトル</button>
            <button type="submit" class="dropdown-item" name="sort" value="2">著者：昇順</button>
            <button type="submit" class="dropdown-item" name="sort" value="3">著者：降順</button>
        </form>
    </div>
</div>



<div class="container">
        @forelse($books as $book)
            <div class="">
            @if($book->url !== null)
                <img src= "{{$book->url}}" >
            @else
                <img src= "{{asset('storage/images/e_others_501.png')}}" >
            @endif
            </div>
            <div class="">
                <a href="{{route('book.show',$book->id)}}">{{$book->title}}</a>
            </div>
        @empty
        <p>登録はありません</p>
        @endforelse
</div>

@endsection
