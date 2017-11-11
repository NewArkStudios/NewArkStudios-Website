<div class='col-md-6 member_section'>
       <div class="member_img">
           <img class="member_picture"></img>
           <div class="member_social">
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
