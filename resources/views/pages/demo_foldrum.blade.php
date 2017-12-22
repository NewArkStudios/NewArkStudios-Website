
@extends('layouts.masters.main')

@section('custom-title')
    Foldrum Offical Demo
@endsection

@section('custom-css')
    <link rel="shortcut icon" href="TemplateData/favicon.ico">
    <link rel="stylesheet" href="TemplateData/style.css">
    <link rel="stylesheet" href="{{ URL::asset('css/app/demo_foldrum.css') }}" />
@endsection

@section('page-content')
    <script src="TemplateData/UnityProgress.js"></script>  
    <script src="Build/UnityLoader.js"></script>
    <script>
      var gameInstance = UnityLoader.instantiate("gameContainer", "Build/Desktop.json", {onProgress: UnityProgress});
    </script>
  <body>
    <div style="margin-top:10%;" class="webgl-content">
      <div id="gameContainer" style="width: 960px; height: 600px"></div>
      <div class="footer">
        <div class="webgl-logo"></div>
        <div class="fullscreen" onclick="gameInstance.SetFullscreen(1)"></div>
        <div class="title">Foldrum Offical</div>
      </div>
    </div>
  </body>
@endsection
@section('custom-javascripts')
    <script src="{{ asset('js/demo_foldrum/customscrollbar.js') }}"></script>
@endsection
