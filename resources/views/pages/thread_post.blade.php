@extends('layouts.masters.main')

@section('custom-css')
    <link rel="stylesheet" href="{{ URL::asset('css/app/thread_post.css') }}" />
@endsection

@section('page-content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">THIS IS INDIVIDUAL POST</div>
            @if(Auth::user())
                @if(Auth::user()->id == $post->user->id)
                    <a href="{{url('/thread/display_edit_post/' . $post->slug)}}">Edit Post</a>
                @endif
            @endif
            <div class="panel-body">

                <!-- Content of post start -->
                <h1>{{$post->title}}</h1>
                <table class="table-alternative">
                    <tr>
                        <td>
                            <img src="{{ URL::asset($post->user->profile_image->location) }}"  class="profile-image"></img>
                        <td>
                        <td>
                            <div style="margin-left:1em;margin-top:0.5em;">
                                <p>
                                    <a href="{{url('/profile/' . $user->name)}}">
                                    {{$post->user->name}}
                                    </a>
                                </p>
                                <p>
                                    Created at: {{$post->created_at}}
                                </p>
                                <p>
                                    Updated at: {{$post->updated_at}}
                                </p>
                            </div>
                        </td>
                    <tr>
                </table>
                <p style="margin-top:1em;">{!! $post->body !!}<p>
                @if(Auth::user())
                <div class="icons-section">
                    <span class="glyphicon {{$liked_post == true ? "disabled" : "" }} glyphicon-thumbs-up post_icon post_like"></span>
                    <span class="glyphicon {{$disliked_post == true ? "disabled" : "" }} glyphicon-thumbs-down post_icon post_dislike"></span>
                </div>
                @endif
                <div class="meta_data">
                    <h6 class="view_count">Views: {{$post->views}}</h6>
                    <h6 data-count="{{$post->likes()->count()}}" class="likes_count">Likes: {{$post->likes()->count()}}</h6>
                    <h6 data-count="{{$post->dislikes()->count()}}" class="dislikes_count">Dislikes: {{$post->dislikes()->count()}}</h6>
                </div>
                <!-- Content of post end --> 

                @if($post->warned == 1)
                    <p><small style="color:red">User was suspended for post</small></p>
                @elseif($post->warned == 2)
                    <p><small style="color:red">User was banned for post</small></p>
                @elseif($post->warned == 3)
                    <p><small style="color:red">User was warned for post</small></p>
                @endif

                <!-- Code for dialog containing edited post -->
                @if($post->edited)
                <a id="post-edited">Edited,</a>
                    <div id="post-edited-dialog" title="Edited Post">
                        @foreach ($post->archive_posts as $archive_post)
                        <div class="well">
                                <h6>Title: {{$archive_post->title}}</h6>
                                <p>Post: {{$archive_post->body}}</h6>
                                <p>Edited at: {{$archive_post->created_at}}</p>
                        </div>
                        @endforeach
                    </div>
                @endif
           </div>
            @if ($moderator)
                @if(!$post->closed)
                    <form style="display:inline-table;" role="form" method="POST" action="{{ route('close_post') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="post_id" value="{{$post->id}}"></input>
                        
                        <button type="submit" class="btn btn-primary">
                        Close Post
                        </button>
                    </form>
                @endif
                @if($post->closed)
                    <form style="display:inline-table;" role="form" method="POST" action="{{ route('open_post') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="post_id" value="{{$post->id}}"></input>
                        
                        <button type="submit" class="btn btn-primary">
                        Open Post
                        </button>
                    </form>
                @endif
                @if(!($post->pinned > 0))
                <form style="display:inline-table;" role="form" method="POST" action="{{ route('pin_post') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="post_id" value="{{$post->id}}"></input>
                    
                    <button type="submit" class="btn btn-primary">
                    Pin Post
                    </button>
                </form>
                @endif
            @endif
            @if ($admin)
                <form style="display:inline-table;" role="form" method="POST" action="{{ route('delete_post') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="post_id" value="{{$post->id}}"></input>
                    
                    <button type="submit" class="btn btn-danger">
                    Delete Post
                    </button>
                </form>
            @endif

            @if(!Auth::guest())
            <form style="display:inline-table;" role="form" method="POST" action="{{ url('/display_report_user') }}">
                {{ csrf_field() }}
                <input type="hidden" name="post_id" value="{{$post->id}}"></input>
                <input type="hidden" name="suspect_id" value="{{$post->user_id}}"></input>
                
                <button type="submit" class="btn btn-danger">
                    Report User
                </button>
            </form>
            @endif
        </div>
        <!-- Note foreach is bugged for gathering replies normally -->
        <!--reply content -->
        @for ($i = 0; $i < count($replies); $i++)
        <div id="reply-section-{{$i}}">
            <!--reply content start -->
            @if(Auth::user())
                @if(Auth::user()->id == $replies[$i]->user->id)
                <br>
                <a href="{{url('thread/display_edit_reply/' . $replies[$i]->id)}}">Edit Reply</a>
                @endif
            @endif
            <table class='profile-info' style="background-color:#060606;">
                <tr>
                    <td>
                        <img src="{{ URL::asset($replies[$i]->user->profile_image->location) }}"  class="profile-image"></img>
                    </td>
                    <td>
                        <div>
                            <p>
                                <a class='reply-user' href="{{url('/profile/' . $replies[$i]->user->name)}}">
                                    {{$replies[$i]->user->name}}
                                </a>
                            </p>
                            <p>
                                Created at: {{$post->created_at}}
                            </p>
                            <p>
                                Updated at: {{$post->updated_at}}
                            </p>
                        </div>
                    </td>
                </tr>
            </table>
                <div class='reply-content'>{!! $replies[$i]->body !!} </div>
            @if($replies[$i]->warned == 1)
                <p><small style="color:red">User was suspended for reply</small></p>
            @elseif($replies[$i]->warned == 2)
                <p><small style="color:red">User was banned for reply</small></p>
            @elseif($replies[$i]->warned == 3)
                <p><small style="color:red">User was warned for reply</small></p>
            @endif
            <!--reply content end -->
            @if($replies[$i]->edited)
                <a dialog-link="reply-edit-dialog-{{$i}}" class="edited-reply-link">Edited, </a>
                <div id="reply-edit-dialog-{{$i}}" class="reply-edited-dialog" title="Edited Post">
                    @foreach ($replies[$i]->archive_replies as $archive_reply)
                    <div class="well">
                            <p>Post: {{$archive_reply->body}}</h6>
                            <p>Edited at: {{$archive_reply->created_at}}</p>
                    </div>
                    @endforeach
                </div>
            @endif
            @if(Auth::user())
                <button class='btn btn-primary reply-link'>reply</button>
            @endif
            <form style="display:inline-table;" role="form" method="POST" action="{{ url('/display_report_user') }}">
                {{ csrf_field() }}
                <input type="hidden" name="reply_id" value="{{$replies[$i]->id}}"></input>
                <input type="hidden" name="suspect_id" value="{{$replies[$i]->user_id}}"></input>
                
                <button type="submit" class="btn btn-danger">
                    Report User
                </button>
            </form>
        </div>
        <hr>
        @endfor
        <!-- pagination links -->
        {{ $replies->links() }}
        <div class="panel panel-default">
        @if(Auth::guest())
           To Reply please login 
        @elseif(Auth::user() && $post->closed)
            Post is closed sorry
        @else
            <form id='reply-editor' class="form-horizontal" role="form" method="POST" action="{{ route('make_reply') }}">
                {{ csrf_field() }}
                <input type="hidden" name="post_id" value="{{$post->id}}"></input>
                <div style="margin-top:1em;" class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
                    <label for="body" class="col-md-2 control-label">Body</label>

                    <div class="col-md-9">
                        <textarea id="body" rows="7" cols="25" class="form-control" name="body" required>Write Something</textarea>

                        @if ($errors->has('body'))
                            <span class="help-block">
                                <strong>{{ $errors->first('body') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div id="reply-section" class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="button" id="preview-button" class="btn btn-primary">
                            Preview
                        </button>
                        <button type="submit" class="btn btn-primary">
                            Reply
                        </button>

                    </div>
                </div>

                <!-- Preview section -->
                <div class="col-md-12" id="preview-content">
                </div>
            </form>
        @endif
        </div>
    </div>
</div>
@endsection
@section('custom-javascripts')
    <script src="{{ asset('js/app/app.thread_post.js') }}"></script>
@endsection
