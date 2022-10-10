@extends("base")

@section('title','テストページ')

@section("main")
@include('nav')


<div id="app">
<example-component></example-component>
</div>
<script src="{{ mix('js/app.js') }}"></script>
