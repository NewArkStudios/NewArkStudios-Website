<div class='col-md-6 member_section'>
       <div class="member_img">
           <img src="{{$member_img}}" class="member_picture"></img>
           <div class="member_social">
           @if(!empty($twitter))
               <a target="_blank" href="{{$twitter}}"><img class="social_twitter" src="/img/icon/twitter.png"></img></a>
           @endif
           @if(!empty($youtube))
               <a target="_blank" href="{{$youtube}}"><img class="social_youtube" src="/img/icon/youtube.png"></img></a>
           @endif
           @if(!empty($facebook))
               <a target="_blank" href="{{$facebook}}"><img class="social_facebook" src="/img/icon/facebook.png"></img></a>
           @endif
           @if(!empty($linkedin))
               <a target="_blank" href="{{$linkedin}}"><img class="social_linkedin" src="/img/icon/linkedin.png"></img></a>
           @endif
           </div>
       </div>
       <div class='member_bio'>
           <h4 class='member_title'>
               {{$member_name}}
           </h4> 
           <h5 class='member_role'>
               {{$member_role}}
           </h5> 
           <small class="member_description">
               {{$member_description}}
           </small>
       </div>
</div>
