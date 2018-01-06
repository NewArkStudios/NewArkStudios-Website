@extends('layouts.masters.main')

@section('page-content')
@section('custom-css')
    <link rel="stylesheet" href="{{ URL::asset('css/app/carousel.css') }}" />
@endsection

<!-- Note elements in carousel are one to one -->
@include(
    'pages.partials.carousel',
    [
        'images' => [
            "/img/foldrum/horses.jpg",
            "/img/foldrum/general_russia.jpg",
            "/img/foldrum/mountains.jpg",
        ],
        'captions' => [
            "Caption 1",
            "Caption 2",
            "Caption 3",
        ],
        'titles' => [
            "Title 1",
            "Title 2",
            "Title 3",
        ]
    ]
)
<div class="container">
    <h1>This is the home page</h1>
    <h1>This is the home page</h1>
    <h1>This is the home page</h1>
    <h1>This is the home page</h1>
    <h1>This is the home page</h1>
    <h1>This is the home page</h1>
    <h1>This is the home page</h1>
    <h1>This is the home page</h1>
    <h1>This is the home page</h1>
</div>
@endsection

@section('custom-javascripts')
<script src="{{ asset('js/app/carousel.js') }}"></script>
@endsection
