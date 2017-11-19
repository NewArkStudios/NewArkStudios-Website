<div class="container">
    <div class="col-md-4">
        <img src="{{$image}}" class="description_img"></img>
    </div>
    <div class="text-center col-md-8 description_right">
        <h2>{{$title}}</h2>
        <p>{!!$description!!}</p>
        <div class="row">
                @if(!empty($twitter))
                           <a style="margin-right:1em;" target="_blank" href="{{$twitter}}"><img class="social_twitter"></img></a>
               @endif
               @if(!empty($youtube))
                       <a style="margin-right:1em;" target="_blank" href="{{$youtube}}"><img class="social_youtube"></img></a>
               @endif
               @if(!empty($facebook))
                   <a style="margin-right:1em;" target="_blank" href="{{$facebook}}"><img class="social_facebook"></img></a>
               @endif
               @if(!empty($indie_db))
                   <a style="margin-right:1em;" target="_blank" href="{{$indie_db}}"><img class="social_indie_db"></img></a>
               @endif
       </div>
    </div>
</div>
