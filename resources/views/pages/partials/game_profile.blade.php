
<div class="row">
    <div class="game_div col-md-5">
        <a href="{{$game_url}}">
            <img class="game_img" src="{{$game_img}}"></img>
        </a>
    </div>
    <div style="padding-top:2em;" class="game_div col-md-7">
        <h3 class="game_title"><a href="{{$game_url}}">{{$game_title}}</a></h3>
        <p class="game_description">
            {{$game_description}}
        </p>
       @if(!empty($twitter))
           <a target="_blank" href="{{$twitter}}"><img src="/img/icon/twitter.png" class="social_twitter"></img></a>
       @endif
       @if(!empty($youtube))
           <a target="_blank" href="{{$youtube}}"><img src="/img/icon/youtube.png" class="social_youtube"></img></a>
       @endif
       @if(!empty($facebook))
           <a target="_blank" href="{{$facebook}}"><img src="/img/icon/facebook.png" class="social_facebook"></img></a>
       @endif
       @if(!empty($indie_db))
           <a target="_blank" href="{{$indie_db}}"><img src="/img/icon/logoIndieDB.png" class="social_indie_db"></img></a>
       @endif
    </div>
</div>
