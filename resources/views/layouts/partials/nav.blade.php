<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{ url('/') }}">NewArkStudios</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"> <a href="{{ url('/game') }}">Game Name</a></li>
            <li><a href="{{ url('/world') }}">World Name</a></li>
            <li><a href="{{ url('/announcement') }}">Annoucements</a></li>
            <li><a href="{{ url('/devteam') }}">Dev Team</a></li>

            <!--Forums link subject to change -->
            <li><a href="{{ url('/forums') }}">Dev Team</a></li>
            <li><a href="{{ url('/contact') }}">Contact</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
