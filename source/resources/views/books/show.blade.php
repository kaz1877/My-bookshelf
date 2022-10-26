@extends('layouts.base')


@section("main")

@include('layouts.nav')

@forelse($books as $book)
<div class="container">
    <div class="justify-content-md-center mt-5">
        <div>
            @if($book->url !== null)
                <img src= "{{$book->url}}" class="rounded mx-auto d-block mb-4">
            @else
                <img src= "{{asset('storage/images/m_e_others_501.png')}}" class="rounded mx-auto d-block mb-4" >
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
        <a href="{{route('book.edit',$book->id)}}">test edit</a>
        <form action="{{ route('book.destroy', $book->id)}}" method="POST">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger" onclick='return confirm("削除しますか？");'>削除</button>
        </form>
    </div>
</div>
@empty
<p>登録はありません</p>

@endforelse
<!-- <a href="#" class="btn btn-primary mb-4" onclick='window.history.back(-1);'>戻る</a> -->
@endsection
