<div id="{{$id}}" class="container">
    <div class="left-cont text-center col-md-4">
        <img src="{{$image}}" class="description_img"></img>
    </div>
    <div class="right-cont text-center col-md-8 description_right">
        <h2 class="text-left">{{$title}}</h2>
        <p class="text-left">{!!$description!!}</p>
        <div style="padding-left: 1em;" class="text-left row">
               @if(!empty($twitter))
                   <a style="margin-right:1em;" target="_blank" href="{{$twitter}}"><img src="/img/icon/twitter.png" class="social_twitter"></img></a>
               @endif
               @if(!empty($youtube))
                       <a style="margin-right:1em;" target="_blank" href="{{$youtube}}"><img src="/img/icon/youtube.png" class="social_youtube"></img></a>
               @endif
               @if(!empty($facebook))
                   <a style="margin-right:1em;" target="_blank" href="{{$facebook}}"><img src="/img/icon/facebook.png" class="social_facebook"></img></a>
               @endif
               @if(!empty($indie_db))
                   <a style="margin-right:1em;" target="_blank" href="{{$indie_db}}"><img src="/img/icon/logoIndieDB.png" class="social_indie_db"></img></a>
               @endif
       </div>
    </div>
</div>
