
@extends('layouts.masters.main')

@section('custom-css')
    <link rel="stylesheet" href="{{ URL::asset('css/app/games.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/app/display_foldrum.css') }}" />
@endsection

@section('page-content')
{{-- <div class="video-container">
    @include(
        'pages.partials.background_video',
                [
                    "title" => "Foldrum",
                    "subtitle" => "a game by newarkstudios",
                    "screenshot" => "https://s3-us-west-2.amazonaws.com/s.cdpn.io/4273/polina.jpg",
                    "webm" => "http://thenewcode.com/assets/videos/polina.webm",
                    "mp4" => "http://thenewcode.com/assets/videos/polina.mp4",
                ]
    )
</div>--}}
@include(
    'pages.partials.banner',
    [
       "id" => "top-banner",
       'image' => '/img/foldrum/compressed_group_banner.jpg',
       'title' => 'Foldrum',
       'subtitle' => "<h4>a game by newarkstudios</h4><img class='icon' src='/img/foldrum/foldrum_icon.png'/>",
       'buttons' =>[],
       'center' => true,
    ]
)
<hr>
@include(
    'pages.partials.desc_right_img_left',
    [
        "id" => "main-description",
        "image" => "/img/foldrum/spearman_alpha.png",
        "title" => "Forward to Foldrum!",
        "description" => "
        Life is hard in the once republic of Madev. The war has brought devastation to the region and with victory ending on the side of the Principality of Kos, people of that region thought that things would begin to be normal again even if there home country was no more. However many of the Kosian commanders who fought so cunningly and ferociously to win the territory of Madev realized something while their soldiers were out drinking and celebrating their victory.
        <br>
        The resources required to win this war had all but depleted their most important resource, food. So as the winter approaches, the great leaders of Kos retreat inwards to their castles and keeps and let the people of both nations fend for themselves.
        <br>
        In this desperate time a Mercenary by the name of Berslav is sent to steal an artifact from Kos with the promise that he will be awarded a noble position and his own house. Considering the circumstances, what person could refuse such an offer? So Berslav sets out on the most terrifying journey of his life, for he will soon realize just how dangerous the Foldrum really is.
        <br>" ,

        "twitter" => "https://twitter.com/foldrumgame",
        "youtube" => "https://www.youtube.com/channel/UCtBWmVYP_1AueqwYjysmGmw",
        "facebook" => "https://www.facebook.com/foldrumgame",
        "indie_db" => "http://www.indiedb.com/games/foldrum",
]
)
<hr>
<div id="mechanics-title" class="text-center">
    <h1>Mechanics</h1>
</div>
<div id="mechanics-section" class="container">
    @include(
            'pages.partials.features_smallsection',
                    [
                        "image" => "bob",
                        "title" => "Terrain Tiles",
                        "description" => "Tiles are the ground below your feet. In many tactics games the terrain might slow you down or speed you up, but in Foldrum most tiles are like a Faustian bargain; they come with their own pros and cons. You would do well to watch what is below your feet.",
                    ]
    )
    @include(
            'pages.partials.features_smallsection',
                    [
                        "image" => "bob",
                        "title" => "Weapons",
                        "description" => "Weapons are the staple of combat in Foldrum. They are your main source of offense and come with their own varied ranges and abilities. Much of each weapons usefulness depends on your play style. If you desire to finish your fights up close and personal the bardiche, sword and axe are your friend, but if you want to handle things at range then the bow and spear might be more to your liking.",
                    ]
    )
    @include(
            'pages.partials.features_smallsection',
                    [
                        "image" => "bob",
                        "title" => "Items",
                        "description" => "Items can be the difference between victory and defeat in a battle. They tend to buff your relations with the two previously mentioned elements. Either they will make you better at dealing with tiles or they will add some additional punch to your weaponry, or even act like a weapon themselves.",
                    ]
    )
</div>
<hr>
<div class="text-center">
    <h1>Media</h1>
</div>
<div id="gallery-section" class="container">
    @include(
        'pages.partials.gallery_image',
        [
           'image' => '/img/foldrum/screen2.jpg',
        ]
    )
    @include(
        'pages.partials.gallery_image',
        [
           'image' => '/img/foldrum/tutorial.jpg',        ]
    )
    @include(
        'pages.partials.gallery_image',
        [
           'image' => '/img/foldrum/screen1.jpg',
        ]
    )
    @include(
        'pages.partials.gallery_image',
        [
           'image' => '/img/foldrum/randomMap.jpg',
        ]
    )
    @include(
        'pages.partials.gallery_image',
        [
           'image' => '/img/foldrum/Capture_ROADS_1.jpg',
        ]
    )
    @include(
        'pages.partials.gallery_image',
        [
           'image' => '/img/foldrum/006.jpg',
        ]
    )
</div>
<hr>
@include(
    'pages.partials.banner',
    [
       "id" => "bottom-banner",
       'image' => '/img/foldrum/compressed_horses_banner.jpg',
       'title' => 'Up for the challenge?',
       'subtitle' => '<h4>Begin you adventure here.</h4>',
       'buttons' => [
            ['text'=>'Try out the demo', 'link'=>'/demo_foldrum']
        ],
        'center' => false
    ]
)
@endsection
@section('custom-javascripts')
<script src="{{ asset('js/app/app.display_foldrum.js') }}"></script>
<script src="{{ asset('js/app/lib.background_video.js') }}"></script>
@endsection
