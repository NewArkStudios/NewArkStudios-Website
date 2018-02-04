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
    <!-- newarkstudios twitter-->
    <div class="col-md-6">
        <a class="twitter-timeline" data-height="500" href="https://twitter.com/NewArkStudios?ref_src=twsrc%5Etfw">Tweets by NewArkStudios</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
    </div>
    <div class="col-md-6">
        <a class="twitter-timeline" data-height="500" href="https://twitter.com/foldrumgame?ref_src=twsrc%5Etfw">Tweets by foldrumgame</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
    </div>
</div>
@endsection

@section('custom-javascripts')
<script src="{{ asset('js/app/carousel.js') }}"></script>
@endsection
