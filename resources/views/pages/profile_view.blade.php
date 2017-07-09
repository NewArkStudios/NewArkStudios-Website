@extends('layouts.masters.main')

@section('page-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">My Profile</div>

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
                                <a href="{{url('messages/display_make_message/' . $name)}}">Private Message</a>
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom-javascripts')
    <script src="{{ asset('js/app/profile.js') }}"></script>
@endsection