<div style="background-image:url({{$image}});" class="games_banner row">
    <div id="{{$id}}" class=" @if($center){{"text-center"}} @endif banner_content">
        <h1>{{$title}}</h1>
        {!! $subtitle !!}

        @foreach($buttons as $button) 
            <a href="{{$button['link']}}"><button class="btn btn-default">{{$button['text']}}</button></a>
        @endforeach
    </div>
</div>
