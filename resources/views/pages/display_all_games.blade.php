
@extends('layouts.masters.main')

@section('custom-css')
    <link rel="stylesheet" href="{{ URL::asset('css/app/display_all_games.css') }}" />
@endsection

@section('page-content')
<div style="margin-bottom:1em;" class="container">
    <h1 class="page_title">Games in Production</h1>
    @include(
        'pages.partials.game_profile',
            [
                "game_title" => "Foldrum",
                "game_img" => "/img/foldrum/general_russia.jpg",
                "game_description" => "Foldrum is a fast-paced turn-based tactical RPG being developed for iOS and Android. Featuring one-hit-one-kill combat, customizable equipment builds, and a variety of map types and game modes, our goal is to combine intense and engaging combat, a setting inspired by medieval Eastern Europe, and a compelling story-driven campaign. Foldrum from a story perspective draws extensively from two major factors. The first is Russian medieval history. Though the world in Foldrum is different from ours it is heavily inspired by that era of time and makes parallels to events that took place then. At the soul of Foldrum is the idea of the medieval period from the average persons perspective. Not of a lord or king but of a mercenary or a villager who's voice in history is very often overshadowed.",
                "twitter" => "https://twitter.com/foldrumgame",
                "youtube" => "https://www.youtube.com/channel/UCtBWmVYP_1AueqwYjysmGmw",
                "facebook" => "https://www.facebook.com/foldrumgame",
                "indie_db" => "http://www.indiedb.com/games/foldrum",
                "game_url" => "foldrum",
            ]
    )
    <hr>
</div>
@endsection
@section('custom-javascripts')
    <script src="{{ asset('js/app/app.display_all_games.js') }}"></script>
@endsection
