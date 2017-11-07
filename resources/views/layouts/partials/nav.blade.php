<nav id="global-navbar" class="navbar navbar-inverse navbar-fixed-top">
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
          <ul class="nav navbar-nav navbar-right">
            <li><a href="{{ url('/announcements') }}">Annoucements</a></li>
            <li> <a href="{{ route('display_all_games') }}">Games</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                About us<span class="caret"></span>
                </a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="{{ url('/dev_team') }}">Dev Team</a></li>
                  <li><a href="{{ url('/display_contact') }}">Contact</a></li>
                </ul>
            </li>

            <!--Forums link subject to change -->
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                Discussion<span class="caret"></span>
                </a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="{{ route('view_categories') }}">Forums</a></li>
                  <li><a href="{{ route('display_search_user') }}">Community</a></li>
                </ul>
            </li>

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
                <li class="dropdown">
                      <a href="#" id="notification-nav-number" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Notifications</a>
                      <ul id="notification-dropdown" class="dropdown-menu notify-drop">
                        <div class="notify-drop-title">
                            <div class="row">
                                <div id="notification-drop-number" class="col-md-6 col-sm-6 col-xs-6"></div>
                                <div class="col-md-6 col-sm-6 col-xs-6 text-right"><a href="" class="rIcon allRead" data-tooltip="tooltip" data-placement="bottom" title="tümü okundu."><i class="fa fa-dot-circle-o"></i></a></div>
                            </div>
                        </div>
                        <!-- end notify title -->
                        <!-- notify content -->
                        <div class="drop-content">
                        </div>
                        <div class="notify-drop-footer text-center">
                            <a id="notification-clear">
                              <i class="fa fa-eye">
                                Clear all notifications
                              </i>
                            </a>
                        </div>
                      </ul>
                </li>
            @endif
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

