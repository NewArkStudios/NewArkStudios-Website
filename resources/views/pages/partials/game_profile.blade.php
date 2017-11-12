
<div class="row">
    <div class="game_div col-md-5">
        <img class="game_img" src="{{$game_img}}"></img>
    </div>
    <div class="game_div col-md-7">
        <h3 class="game_title">{{$game_title}}</h3>
        <small class="game_description">
            {{$game_description}}
        </small>
        <br>
       @if(!empty($twitter))
           <a href="{{$twitter}}"><img class="social_twitter"></img></a>
       @endif
       @if(!empty($youtube))
           <a href="{{$youtube}}"><img class="social_youtube"></img></a>
       @endif
       @if(!empty($facebook))
           <a href="{{$facebook}}"><img class="social_facebook"></img></a>
       @endif
    </div>
</div>
