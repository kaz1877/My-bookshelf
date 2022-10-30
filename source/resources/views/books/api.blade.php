@extends("layouts.base")

@section("main")

@include('layouts.nav')

<div class="container">
    <div class="mx-auto my-3" style="max-width: 700px;">
        @if ($items == null)
            <h3 class="mx-auto mb-0">書籍名を入力してください。</h3>
            @include('layouts.form')
        @else (count($items) > 0)
            <h3 class="mx-auto mb-0">「{{ $keyword }}」の検索結果</h3>
            @include('layouts.form')
    </div>
        @foreach ($items as $item)
            <div class="card mx-auto mb-3" style="max-width: 700px;">
                <form action="{{route('book.create')}}" method="GET">
                @csrf
                    <div>
                        <div class="row">
                            <div class="col-sm-4 my-auto">
                                @if (array_key_exists('imageLinks', $item['volumeInfo']))
                                    <img src="{{ $item['volumeInfo']['imageLinks']['smallThumbnail']}}" class="rounded mx-auto d-block img-fluid" style="width: 100px;">
                                    <input type="hidden" name="url" value="{{ $item['volumeInfo']['imageLinks']['smallThumbnail']}}">
                                @endif
                            </div>
                            <div class="col-sm-8">
                                <div class="card-body">
                                    <div class="card-title">
                                        <h2 class="h4 mb-2 mt-2 pd-4">{{ $item['volumeInfo']['title']}}</h2>
                                        <input type="hidden" name="title" value="{{ $item['volumeInfo']['title']}}">
                                    </div>
                                    <div class="list_contents">
                                        <div class="list_details">
                                            @if (array_key_exists('authors', $item['volumeInfo']))
                                                <p>著者：{{ $item['volumeInfo']['authors'][0]}}</p>
                                                <input type="hidden" name="author" value="{{ $item['volumeInfo']['authors'][0]}}">
                                            @endif
                                            @if (array_key_exists('publishedDate', $item['volumeInfo']))
                                                <p>発売年月：{{ $item['volumeInfo']['publishedDate']}}</p>
                                            @endif
                                        </div>
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-primary">本棚に追加する。</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        @endforeach
    @endif
</div>
@endsection
