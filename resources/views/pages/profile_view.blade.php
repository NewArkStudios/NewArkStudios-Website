@extends('layouts.masters.main')

@section('page-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Profile</div>
                @if(!empty($error))
                    <h3 class='text-center'>{{$error}}</h3>
                @else
                <div class="panel-body">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#profile-section">Profile</a></li>
                        <li><a data-toggle="tab" href="#posts-section">Posts</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="profile-section" class="tab-pane fade in active">
                            <h1>{{$name}}</h1>
                            <h2>{{$email}}</h2>
                            <div>
                                @if($bio)
                                    {{$bio}}
                                @endif

                                @if($age || $birthday)
                                    {{$age}}
                                    {{$birthday}}
                                @endif

                            </div>
                            @if(Auth::user())
                            <div style="margin-bottom:1em;" class="col-md-12">
                                <a href="{{url('messages/display_make_message/' . $name)}}">Private Message</a>
                            </div>
                                @if(Auth::user()->hasRole('admin'))

                                    <!-- Check if the user is and moderator -->
                                    @if(!$moderator)
                                        <div class="col-md-6">
                                            <form style="display:inline-table;" role="form" method="POST" action="{{ route('make_moderator') }}">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="user_id" value="{{$id}}"></input>
                                                <button type="submit" class="btn btn-primary">Make Moderator</button>
                                            </form>
                                        </div>
                                    @endif
                                @endif
                            @endif
                            
                        </div>
                        <div id="posts-section" class="tab-pane fade">
                            @foreach($posts as $post)
                                <div class="well">
                                    <a href="{{url('post/' . $post->slug)}}">{{$post->title}}</a>
                                    <p>Content: {{$post->body}}</p>
                                    <p>Created at: {{$post->created_at}}</p>
                                    <p>Updated at: {{$post->updated_at}}</p>
                                </div>
                            @endforeach
                            <!-- Pagination links -->
                            {{ $posts->links() }}
                        </div>
                    </div>
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom-javascripts')
    <script src="{{ asset('js/app/app.profile.js') }}"></script>
@endsection
