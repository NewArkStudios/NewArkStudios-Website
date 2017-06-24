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
            <li><a href="{{ route('view_categories') }}">Forums</a></li>
            <li><a href="{{ url('/contact') }}">Contact</a></li>

            @if (Auth::guest())
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}">Register</a></li>
            @else
                <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                {{ Auth::user()->name }} <span class="caret"></span>
                </a>
                <ul class="dropdown-menu" role="menu">
                <li>
                <a href="{{url('profile/' . Auth::user()->name)}}">Profile</a>
                <a href="{{route('inbox')}}">Inbox</a>
                <a href="{{route('update_profile')}}">Update Profile</a>
                <a href="{{route('account_settings')}}">Update Account</a>
                @if(Auth::user()->hasRole('admin'))
                <a href="{{route('display_admin_panel')}}">Admin Panel</a>
                @endif
                @if(Auth::user()->hasRole('moderator'))
                  <a href="{{route('display_moderator_panel')}}">Mod Panel</a>
                @endif
                <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
                </form>
                </li>
                </ul>
                </li>
            @endif

          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

