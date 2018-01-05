@extends('layouts.masters.main')

@section('page-content')
@section('custom-css')
    <link rel="stylesheet" href="{{ URL::asset('css/app/carousel.css') }}" />
@endsection
@include(
    'pages.partials.carousel',
    [
        'images' => [
            "/img/foldrum/general_russia.jpg",
            "/img/foldrum/general_russia.jpg",
            "/img/foldrum/general_russia.jpg",
        ],
        'captions' => [
            "Caption 1",
            "Caption 2",
            "Caption 3",
        ],
    ]
)
<div class="container">

</div>
@endsection

