
@extends('layouts.masters.main')

@section('custom-css')
    <link rel="stylesheet" href="{{ URL::asset('css/app/display_all_games.css') }}" />
@endsection

@section('page-content')
    <div class="container">
        <div class="jumbotron">
            @include(
                'pages.partials.game_profile',
                    [
                        "game_title" => "Game title 1",
                        "game_img" => "",
                        "game_description" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
                        "twitter" => "bob",
                        "game_url" => "bob",
                    ]
            )
            @include(
                'pages.partials.game_profile',
                    [
                        "game_title" => "Game title 2",
                        "game_img" => "",
                        "game_description" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
                        "twitter" => "bob",
                        "youtube" => "bob",
                        "facebook" => "bob",
                        "game_url" => "bob",
                    ]
            )
        </div>
    </div>
@endsection
@section('custom-javascripts')
    <script src="{{ asset('js/app/app.display_all_games.js') }}"></script>
@endsection
