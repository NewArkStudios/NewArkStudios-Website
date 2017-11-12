<div class='col-md-6 member_section'>
       <div class="member_img">
           <img class="member_picture"></img>
           <div class="member_social">
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
