@extends('layouts.masters.main')


@section('custom-css')
    <link rel="stylesheet" href="{{ URL::asset('css/app/devteam.css') }}" />
@endsection

@section('page-content')
<div class="container">
    <div class="jumbotron">
        
        <!--row start -->
        <div class="row">
            <h1>Dev team</h1>
            <!-- member start -->
            <div class='col-md-6 member_section'>
               <div class="member_img">
                   <img class="member_picture"></img>
                   <br>
                   <img src="{{ URL::asset('img/icon/youtube.png') }}" class="social_media"></img>
                   <img src="{{ URL::asset('img/icon/twitter.png') }}" class="social_media"></img>
               </div>
               <div class='member_bio'>
                   <h4 class='member_title'>
                       Mitchell Spector
                   </h4> 
                   <h5 class='member_role'>
                       Project lead and Director
                   </h5> 
                   <small class="member_description">
                   is simply dummy text of the printing and typesetti 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                   </small>
               </div>
            </div>
            <!-- member end -->

            <!-- member start -->
            <div class='col-md-6 member_section'>
               <div class="member_img">
                   <img class="member_picture"></img>
                   <br>
                   <img src="{{ URL::asset('img/icon/twitter.png') }}" class="social_media"></img>
               </div>
               <div class='member_bio'>
                   <h4 class='member_title'>
                       Andrew Mitchell
                   </h4> 
                   <h5 class='member_role'>
                       Writer and world Builder
                   </h5> 
                   <small class="member_description">
                   is simply dummy text of the printing and typesetti popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                   </small>
               </div>
            </div>
            <!-- member end -->
        </div>
        <!--row end-->

        <!--row start -->
        <div class="row">
            <!-- member start -->
            <div class='col-md-6 member_section'>
               <div class="member_img">
                   <img class="member_picture"></img>
                   <br>
                   <img src="{{ URL::asset('img/icon/twitter.png') }}" class="social_media"></img>
               </div>
               <div class='member_bio'>
                   <h4 class='member_title'>
                      Rudy Andrews
                   </h4> 
                   <h5 class='member_role'>
                      Social Media and Business
                   </h5> 
                   <small class="member_description">
                   is simply dummy text of the printing and typesetti and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                   </small>
               </div>
            </div>
            <!-- member end -->

            <!-- member start -->
            <div class='col-md-6 member_section'>
               <div class="member_img">
                   <img class="member_picture"></img>
                   <br>
                   <img src="{{ URL::asset('img/icon/twitter.png') }}" class="social_media"></img>
               </div>
               <div class='member_bio'>
                   <h4 class='member_title'>
                       Bob BOB
                   </h4> 
                   <h5 class='member_role'>
                       Designer and Artist 
                   </h5> 
                   <small class="member_description">
                   is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                   </small>
               </div>
            </div>
            <!-- member end -->
        </div>
        <!--row end-->
    </div>
</div>
@endsection
