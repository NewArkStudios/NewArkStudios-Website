@extends('layouts.masters.main')

@section('custom-css')
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/app/app.profile.css')}}"/>
@endsection

@section('page-content')
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
                    <li><a data-toggle="tab" href="#activity-section">Activity</a></li>
                </ul>
                <div class="tab-content">
                    <div id="profile-section" class="tab-pane fade in active">
                        <div class="text-center col-md-4">
                            <img src="{{ URL::asset($profile_image_url) }}" class="profile" style="margin-top:2em;width:80px;height:80px">
                            </img>
                            <br>
                            <br>
                            <p>Joined : {{$joined}}</p>
                            <p>Last active : <span class="timestamp-moment">{{$last_active}}</span></p>
                        </div>
                        <div class="col-md-8">
                            <h1>{{$name}}</h1>
                            <p>Email : {{$email}}</p>
                            <div>
                                @if($bio)
                                    {{$bio}}
                                @endif

                                @if($age)
                                    {{$age}}
                                @endif
                                @if($birthday)
                                    {{$birthday}}
                                @endif
                            </div>
                            @if(Auth::user())
                                <a href="{{url('messages/display_make_message/' . $name)}}">Private Message</a>
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
                    </div>
                    <div id="posts-section" class="tab-pane fade">
                        @foreach($posts as $post)
                            <div class="well">
                                <a class="postlink" href="{{url('post/' . $post->slug)}}">{{$post->title}}</a>
                                <p>Content:</p>
                                <blockquote>{!!$post->body!!}</blockquote>
                                <p>Created at: <span class="timestamp-moment">{{$post->created_at}}</span>, Updated at: <span class="timestamp-moment">{{$post->updated_at}}</span></p>
                            </div>
                        @endforeach
                        <!-- Pagination links -->
                        {{ $posts->links() }}
                    </div>
                    <div id="activity-section" class="tab-pane fade">
                        <h5>Replies</h5>
                        @foreach($replies as $reply)
                            <div class="well">
                                <a class="replylink" href="{{url('post/' . $reply->post->slug)}}">{{$reply->post->title}}</a>
                                <p>Content:</p>
                                <blockquote>
                                    {!!$reply->body!!}
                                </blockquote>
                                <p>Created at: <span class="timestamp-moment">{{$reply->created_at}}</span>, Updated at: <span class="timestamp-moment">{{$reply->updated_at}}</span></p>
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
@endsection

@section('custom-javascripts')
    <script src="{{ asset('js/app/app.profile.js') }}"></script>
@endsection
