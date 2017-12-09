<div style="background-image:url({{$image}});" class="games_banner row">
    <div class=" @if($center){{"text-center"}} @endif banner_content">
        <h1>{{$title}}</h2>
        <h4>{{$subtitle}}</h4>
        @foreach($buttons as $button) 
            <a href="{{$button['link']}}"><button class="btn btn-default">{{$button['text']}}</button></a>
        @endforeach
    </div>
</div>
