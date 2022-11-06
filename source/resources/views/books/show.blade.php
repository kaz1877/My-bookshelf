@extends('layouts.base')


@section("main")

@include('layouts.nav')

@forelse($books as $book)
<div class="container">
    <div class="justify-content-md-center mt-5">
        <div class="">
            @if($book->url !== null)
                <img src= "{{asset($book->url)}}" class="img-fluid rounded mx-auto d-block mb-4" style="max-height:200px;">
            @else
                <img src= "https://res.cloudinary.com/dgsnxc8gp/image/upload/v1667721513/m_e_others_501_rzqxyy.png"
                class="img-fluid rounded mx-auto d-block mb-4" >
            @endif
        </div>
        <table class="table table-bordered">
            <tr>
                <th>題名</th>
                <td>{{$book->title}}</td>
            </tr>
            <tr>
                <th>著者</th>
                <td>{{$book->author}}</td>
            </tr>
            <tr>
                <th>カテゴリー</th>
                <td>{{$book->type}}</td>
            </tr>
            <tr>
                <th>コメント</th>
                <td>{{$book->content}}</td>
            </tr>
        </table>
        <div class="d-flex">
            <a href="{{route('book.edit',$book->id)}}" class="btn btn-info">更新</a>
            <form action="{{ route('book.destroy', $book->id)}}" method="POST">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger" onclick='return confirm("削除しますか？");'>削除</button>
            </form>
        </div>
    </div>
</div>
@empty
<p>登録はありません</p>

@endforelse
@include('layouts.footer')
@endsection
