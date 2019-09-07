@extends('layout')

@section('slider')
<link rel="stylesheet" href="{{ asset('/css/style.css')}}">
<script src="{{ asset('/js/script.js') }}"></script>
{{ csrf_field() }}
<div class="slideshow-container">
@foreach ($images as $image)    
    <div class="mySlides fade">
        <div class="numbertext">{{ $image->id }} / </div>
        <img src="{{ asset('images/' . $image->image) }}" style="width: 100%;">
        <div class="text">{!! $image->title !!}</div>
    </div>
    @endforeach
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
    <div style="text-align:center">
        @foreach ($images as $image)
        <span class="dot" onclick="currentSlide({{ $image->id }})"></span>
        @endforeach
    </div>
</div>
@endsection
@section('content')
<div class="content">
    @foreach ($foot as $footer)
    <h1 class="title">{!! $footer->title !!}</h1>
    <hr>
    <div class="childFoot">
        <span>{!! $footer->text !!}</span>
    </div>
    @endforeach
</div>
@endsection