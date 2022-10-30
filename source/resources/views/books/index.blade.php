@extends("layouts.base")

@section("main")
@include('layouts.nav')
<!-- <form action="{{route('book.index')}}" method="get">
    <input type="text"  name="keyword"  placeholder="検索ワード" style="width:200px;" value="{{$keyword}}">
    @csrf
    <input type="submit" value="検索"  style="width:100px">
</form> -->

<!-- <div class="dropdown">
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
</div> -->

<div class="container">
    <div class="mt-5">
        <h3>ようこそ{{$user->name}}さん！</h3>
        <div class="d-flex justify-content-sm-start justify-content-center flex-wrap  my-3">
            @forelse($books as $book)
                <div class="books border p-1 m-1" style="width:200px;">
                    <a href="{{route('book.show',$book->id)}}">
                        @if($book->url !== null)
                            <img src= "{{asset($book->url)}}" class="rounded mx-auto d-block img-fluid" style="height:150px;">
                        @else
                            <img src= "{{asset('storage/images/e_others_501.png')}}"
                            class="rounded mx-auto d-block img-fluid" style="height:150px;">
                        @endif
                        {{$book->title}}
                    </a>
                </div>
            @empty
            <p>登録はありません。本を探して登録してみましょう！</p>
            @endforelse
        </div>
    </div>
</div>
@endsection
