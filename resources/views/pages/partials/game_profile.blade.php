
<div class="row">
    <div class="game_div col-md-5">
        <img class="game_img" src="{{$game_img}}"></img>
    </div>
    <div class="game_div col-md-7">
        <h3 class="game_title">{{$game_title}}</h3>
        <small class="game_description">
            {{$game_description}}
        </small>
       @if(!empty($twitter))
           <img data-link="{{$twitter}}" class="social_twitter"></img>
       @endif
       @if(!empty($youtube))
           <img data-link="{{$youtube}}" class="social_youtube"></img>
       @endif
       @if(!empty($facebook))
           <img data-link="{{$facebook}}" class="social_facebook"></img>
       @endif
    </div>
</div>
