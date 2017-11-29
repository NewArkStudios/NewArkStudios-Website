
@extends('layouts.masters.main')

@section('custom-css')
    <link rel="stylesheet" href="{{ URL::asset('css/app/display_foldrum.css') }}" />
@endsection

@section('page-content')
    <title>Unity WebGL Player | SpaceAttack</title>
    <link rel="stylesheet" href="TemplateData/style.css">
    <link rel="shortcut icon" href="TemplateData/favicon.ico" />
    <script src="TemplateData/UnityProgress.js"></script>
  <body class="template">
    <p class="header"><span>Unity WebGL Player | </span>SpaceAttack</p>
    <div class="template-wrap clear">
      <canvas class="emscripten" id="canvas" oncontextmenu="event.preventDefault()" height="600px" width="960px"></canvas>
      <br>
      <div class="logo"></div>
      <div class="fullscreen"><img src="TemplateData/fullscreen.png" width="38" height="38" alt="Fullscreen" title="Fullscreen" onclick="SetFullscreen(1);" /></div>
      <div class="title">SpaceAttack</div>
    </div>
    <p class="footer">&laquo; created with <a href="http://unity3d.com/" title="Go to unity3d.com">Unity</a> &raquo;</p>
    <script type='text/javascript'>
      var Module = {
        TOTAL_MEMORY: 268435456,
        errorhandler: null,         // arguments: err, url, line. This function must return 'true' if the error is handled, otherwise 'false'
        compatibilitycheck: null,
        dataUrl: "Release/webgl.data",
        codeUrl: "Release/webgl.js",
        memUrl: "Release/webgl.mem",
      };
    </script>
    <script src="Release/UnityLoader.js"></script>

  </body>
@endsection
@section('custom-javascripts')
@endsection
