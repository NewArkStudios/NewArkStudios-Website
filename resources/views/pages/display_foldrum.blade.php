
@extends('layouts.masters.main')

@section('custom-css')
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
<div class="row">
    <h1>
        This is a test
    </h1>
</div>

@endsection
@section('custom-javascripts')
    <script src="{{ asset('js/app/app.display_foldrum.js') }}"></script>
    <script src="{{ asset('js/app/lib.background_video.js') }}"></script>
@endsection
