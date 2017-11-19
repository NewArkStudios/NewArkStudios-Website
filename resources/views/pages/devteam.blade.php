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
                'member_name' => "Mitchell Spector",
                'member_role' => "Project lead and Director",
                'member_description' => "is simply dummy text of the printing and typesetti 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
                "facebook" => "bob",
            ]
        )
        @include('pages.partials.dev_member',
            [
                'member_name' => "Andrew Mitchell",
                'member_role' => "Writer and World Designer",
                'member_description' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
                "youtube" => "bob",
                "twitter" => "bob",
                "facebook" => "bob",
            ]
        )
    </div>
    <div class="row">
        @include('pages.partials.dev_member',
            [
                'member_name' => "Rudy Andrews",
                'member_role' => "Social Media and Development",
                'member_description' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
                "youtube" => "bob",
                "twitter" => "bob",
                "facebook" => "bob",
            ]
        )
        @include('pages.partials.dev_member',
            [
                'member_name' => "Kason Roberts",
                'member_role' => "Programmer",
                'member_description' => "is simply dummy text of the printing and typesetti 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
                "youtube" => "bob",
                "twitter" => "bob",
            ]
        )
    </div>
</div>
@endsection
