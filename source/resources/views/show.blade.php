@extends('base')


@section("main")

@forelse($books as $book)
<div class="container">
    <div >
        @if($book->url !== null)
            <img src= "{{$book->url}}" class="rounded mx-auto d-block mb-4">
        @else
            <img src= "{{asset('storage/images/m_e_others_501.png')}}" class="rounded mx-auto d-block mb-4" >
        @endif
    </div>
    <table>
        <tr><th>題名</th><td>{{$book->title}}</td></tr>
        <tr><th>著者</th><td>{{$book->author}}</td></tr>
        <tr><th>カテゴリー</th><td>{{$book->type}}</td></tr>
        <tr><th>コメント</th><td>{{$book->content}}</td></tr>
    </table>
</div>
@empty
<p>登録はありません</p>
@endforelse
<a href="#" class="btn btn-primary mb-4" onclick='window.history.back(-1);'>戻る</a>
@endsection

@section("footer")
copyright 2022 tsunoda.
@endsection
