<div style="background-image:url({{$image}});" class="games_banner row">
    <div class="banner_content">
        <h2>{{$title}}</h2>
        <h1>{{$subtitle}}</h1>
        @foreach($buttons as $button) 
            <a href="{{$button['link']}}"><button>{{$button['text']}}</button></a>
        @endforeach
    </div>
</div>
