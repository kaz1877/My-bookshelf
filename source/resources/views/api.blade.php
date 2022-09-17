@extends("base")

@section("main")

<form action="/api" method="get">
    書籍名:<input type="text" name="keyword" size="50" value="{{ $keyword }}">&nbsp;
    <input type="submit" value="検索">
</form>

@if ($items == null)
    <p style="margin-top: 40px;">書籍名を入力してください。</p>
@else (count($items) > 0)
    <p>「{{ $keyword }}」の検索結果</p>
    @foreach ($items as $item)
        <div class="listgroup">
            <div class="list_title">
                <h2 class="h3 mb-2 mt-2 pd-4">{{ $item['volumeInfo']['title']}}</h2>
            </div>
            <div class="list_image">
                @if (array_key_exists('imageLinks', $item['volumeInfo']))
                    <img src="{{ $item['volumeInfo']['imageLinks']['smallThumbnail']}}">
                @endif
            </div>
            <div class="list_contents">
                <div class="list_details">
                    @if (array_key_exists('description', $item['volumeInfo']))
                        <p>著者：{{ $item['volumeInfo']['authors'][0]}}</p>
                    @endif
                    @if (array_key_exists('description', $item['volumeInfo']))
                        <p>発売年月：{{ $item['volumeInfo']['publishedDate']}}</p>
                    @endif
                    <!-- @if (array_key_exists('description', $item['volumeInfo']))
                        概要：{{ $item['volumeInfo']['description']}}<br>
                    @endif -->
                </div>
                <form action="/api" method="POST">
                        @csrf
                    <input type="hidden" name="title" value="{{ $item['volumeInfo']['title']}}">
                    <input type="hidden" name="author" value="{{ $item['volumeInfo']['authors'][0]}}">
                    <input type="hidden" name="url" value="{{ $item['volumeInfo']['imageLinks']['smallThumbnail']}}">
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">本棚に追加する。</button>
                    </div>
                </form>
            </div>
        </div>
    @endforeach
@endif
@endsection

@section("footer")
copyright 2022 tsunoda.
@endsection
