
<link rel="stylesheet" href="{{ URL::asset('css/app/partials/background_video.css') }}" />
<!-- screenshot if video fails -->
<video poster="{{$screenshot}}" id="bgvid" playsinline autoplay muted loop>
<!-- WCAG general accessibility recommendation is that media such as background video play through only once. Loop turned on for the purposes of illustration; if removed, the end of the video will fade in the same way created by pressing the "Pause" button  -->
<source src="{{$webm}}" type="video/webm">
<source src="{{$mp4}}" type="video/mp4">
</video>
<div id="polina">
    <h1>{{$title}}</h1>
    <p>{{$subtitle}}</p>
    <button>Pause</button>
</div>
