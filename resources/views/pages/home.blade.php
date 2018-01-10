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
        'titles' => [
            "Title 1",
            "Title 2",
            "Title 3",
        ],
        'buttontext' => [
            "Learn More",
            "Learn More",
            "Learn More",
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
