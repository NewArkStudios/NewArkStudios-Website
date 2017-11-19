
@extends('layouts.masters.main')

@section('custom-css')
    <link rel="stylesheet" href="{{ URL::asset('css/app/games.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/app/display_foldrum.css') }}" />
@endsection

@section('page-content')
<div class="video-container">
    @include(
        'pages.partials.background_video',
                [
                    "screenshot" => "https://s3-us-west-2.amazonaws.com/s.cdpn.io/4273/polina.jpg",
                    "webm" => "http://thenewcode.com/assets/videos/polina.webm",
                    "mp4" => "http://thenewcode.com/assets/videos/polina.mp4",
                ]
    )
</div>
@include(
    'pages.partials.desc_right_img_left',
    [
        "image" => "bob",
        "title" => "Absolute Strategy",
        "description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur porta dictum turpis, eu mollis justo gravida ac. Proin non eros blandit, rutrum est a, cursus quam. Nam ultricies, velit ac suscipit vehicula, turpis eros sollicitudin lacus, at convallis mauris magna non justo. Etiam et suscipit elit. Morbi eu ornare nulla, sit amet ornare est. Sed vehicula ipsum a mattis dapibus. Etiam volutpat vel enim at auctor.
       <br> 
        Aenean pharetra convallis pellentesque. Vestibulum et metus lectus. Nunc consectetur, ipsum in viverra eleifend, erat erat ultricies felis, at ultricies mi massa eu ligula. Suspendisse in justo dapibus metus sollicitudin ultrices id sed nisl.",

        "twitter" => "https://twitter.com/foldrumgame",
        "youtube" => "https://www.youtube.com/channel/UCtBWmVYP_1AueqwYjysmGmw",
        "facebook" => "https://www.facebook.com/foldrumgame",
        "indie_db" => "http://www.indiedb.com/games/foldrum",
]
)

@endsection
@section('custom-javascripts')
<script src="{{ asset('js/app/app.display_foldrum.js') }}"></script>
<script src="{{ asset('js/app/lib.background_video.js') }}"></script>
@endsection
