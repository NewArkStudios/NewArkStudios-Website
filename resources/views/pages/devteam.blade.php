@extends('layouts.masters.main')


@section('custom-css')
    <link rel="stylesheet" href="{{ URL::asset('css/app/devteam.css') }}" />
@endsection

@section('page-content')
<div class="container">
<!--row start -->
    <div class="row">
        <h1>Dev team</h1>
    </div>

    <div class="row">
        @include('pages.partials.dev_member',
            [
                'member_name' => "Mitchell",
                'member_img' => "/img/devteam/mitchell.jpg",
                'member_role' => "Creative Director",
                'member_description' => "Mitchell traditionally spends his days at New Ark trying to control the madness which is game development. His jobs in the company range from doing small art here and there to coding major portions of the game. He also assigns jobs to each employee and keeping in touch with important contacts. If there is something happening at New Ark usually you can expect Mitchell to be there helping the push.",
                "twitter" => "https://twitter.com/mitchellspec",
            ]
        )
        @include('pages.partials.dev_member',
            [
                'member_name' => "Faizan",
                'member_img' => "/img/devteam/faizan.jpg",
                'member_role' => "Software Developer",
                'member_description' => "Faizan works on many of the advanced and outlying features in any games development at the company. He always trudges head on into problems he faces in code and thrives under a deadline. He is famous for having the stamina to work at all hours of the day but we try to not make him do that here.",
            ]
        )
    </div>
    <div class="row">
        @include('pages.partials.dev_member',
            [
                'member_name' => "Andrew",
                'member_img' => "/img/devteam/andrew.jpg",
                'member_role' => "Sound Designer and House Philosopher",
                'member_description' => "Andrew is our companies resident critical thinker. Regardless of what problem you are facing and in what field it is always an advantage to have Andrew near and lending some help. His job mainly pertains to sound effects and music of games but he does have a tendency to help in other places as well.",
            ]
        )
        @include('pages.partials.dev_member',
            [
                'member_name' => "Jim",
                'member_img' => "/img/devteam/jim.jpg",
                'member_role' => "Artist",
                'member_description' => "Jim has had the most interesting transition on the team since when he joined he was totally new to game art development. He had been a traditional artist working on safety posters for coal miners most of his working life but games had never been something he worked on. He has really taken to the subject matter now though and is enjoying working with the new tools of the trade that he never had the opportunity to use during his working life before. ", 
            ]
        )
    </div>
    <div class="row">
        @include('pages.partials.dev_member',
            [
                'member_name' => "Rob",
                'member_img' => "/img/devteam/rob.jpg",
                'member_role' => "Software Developer",
                'member_description' => "Rob is a programmer with a taste for complex math driven problems. Hence in the company he is usually given some of the nastiest problems we are currently facing. He always manages to find solutions to them and to his credit has never missed his deadline.",
            ]
        )
        @include('pages.partials.dev_member',
            [
                'member_name' => "Peter",
                'member_img' => "/img/devteam/peter.jpg",
                'member_role' => "Web Designer",
                'member_description' => "The all mighty Peter blesses us with his presence for only a few fleeting days but his stunning work ethic and spectacular ability is a credit and model to us all. But seriously now, there is a lot I can tell you about Peter and his ability to do great things in web design but I think this website speaks for itself since he built it", 
            ]
        )
    </div>
</div>
@endsection
