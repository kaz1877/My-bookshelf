@extends("base")

@section("main")

<form action="/api" method="get">
    書籍名:<input type="text" name="keyword" size="50" value="{{ $keyword }}">&nbsp;<input type="submit" value="検索">
</form>
 
@if ($items == null)
    <p style="margin-top: 40px;">書籍名を入力してください。</p>
@else (count($items) > 0)
    <p>「{{ $keyword }}」の検索結果</p>
    @foreach ($items as $item)
        <div class="listgroup">
            <div class="list_title">
                {{ $item['volumeInfo']['title']}}
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
                <div class="buttons">
                    <form action="" method="post">
                        <button type="submit">本棚に追加する。</button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endif
@endsection

@section("footer")
copyright 2022 tsunoda.
@endsection

