@extends("layouts.base")

@section("main")
@include('layouts.nav')

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
@include('layouts.footer')
@endsection
