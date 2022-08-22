@extends("base")

@section("main")
<form action="{{route('book.index')}}" method="get">
    <label id="keyword">題名</label>
    <input type="text"  name="keyword" id="keyword" placeholder="検索ワード" sytle="width:200px;" value="{{$keyword}}">
    @csrf
    <input type="submit" value="検索"  style="width:100px">
</form>

<div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    {{$sortword}}
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <form action="{{route('book.index')}}" method="get">
            <button type="submit" class="dropdown-item" name="sort" value="1">タイトル</button>
            <button type="submit" class="dropdown-item" name="sort" value="2">著者：昇順</button>
            <button type="submit" class="dropdown-item" name="sort" value="3">著者：降順</button>
        </form>
    </div>
</div>

<a class="btn" href="/api">+ 本を追加する。</a>


<div class="container">
    <table>
        <tr>
            <th>題名</th>
            <th>著者</th>
            <th>ジャンル</th>
            <th></th>
            <th></th>
        </tr>
        @forelse($books as $book)
        <tr>
            <td><a href="{{route('book.show',$book->id)}}">{{$book->title}}</a></td>
            <td>{{$book->author}}</td>
            <td>{{$book->type}}</td>
            <td><a href="{{route('book.edit',$book->id)}}">編集</a></td>
            <td>
                <form action="{{route('book.destroy',$book->id)}}" method="post">
                    @method('DELETE')
                    @csrf
                    <button class="btn" type="submit">削除</button>
                </form>
            </td>
        </tr>
        @empty
        <p>登録はありません</p>
        @endforelse
    </table>
</div>

@endsection

@section("footer")
copyright 2022 tsunoda.
@endsection