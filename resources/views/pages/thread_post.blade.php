@extends('layouts.masters.main')

@section('page-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">THIS IS INDIVIDUAL POST</div>
                @if(Auth::user())
                    @if(Auth::user()->id == $post->user->id)
                        <a href="{{url('/thread/display_edit_post/' . $post->slug)}}">Edit Post</a>
                    @endif
                @endif
                <h1>{{$post->title}}</h1>
                <h4 style="float:right">{{$post->created_at}}</h4>
                <h4 style="float:right">{{$post->updated_at}}</h4>
                <div class="panel-body">
                <p>{!! $post->body !!}</p>
                @if($post->warned == 1)
                    <p><small style="color:red">User was suspended for post</small></p>
                @elseif($post->warned == 2)
                    <p><small style="color:red">User was banned for post</small></p>
                @elseif($post->warned == 3)
                    <p><small style="color:red">User was warned for post</small></p>
                @endif
                <a href="{{url('/profile/' . $user->name)}}">View Profile</a>
                </div>
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
            @for ($i = 0; $i < count($replies); $i++)
            <div id="reply-section-{{$i}}">
                @if(Auth::user())
                    @if(Auth::user()->id == $replies[$i]->user->id)
                    <br>
                    <a href="{{url('thread/display_edit_reply/' . $replies[$i]->id)}}">Edit Reply</a>
                    @endif
                @endif
                <p>{!! $replies[$i]->body !!} from: {{$replies[$i]->user->name}}<p>
                @if($replies[$i]->warned == 1)
                    <p><small style="color:red">User was suspended for reply</small></p>
                @elseif($replies[$i]->warned == 2)
                    <p><small style="color:red">User was banned for reply</small></p>
                @elseif($replies[$i]->warned == 3)
                    <p><small style="color:red">User was warned for reply</small></p>
                @endif
                @if(Auth::user())
                    <a href="#reply-section">reply</a>
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
            @endfor
            
            <div class="panel panel-default">
            @if(Auth::guest())
               To Reply please login 
            @elseif(Auth::user() && $post->closed)
                Post is closed sorry
            @else
                <form class="form-horizontal" role="form" method="POST" action="{{ route('make_reply') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="post_id" value="{{$post->id}}"></input>
                    <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
                        <label for="body" class="col-md-4 control-label">Body</label>

                        <div class="col-md-6">
                            <textarea id="body" class="form-control" name="body" required></textarea>

                            @if ($errors->has('body'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('body') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div id="reply-section" class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Reply
                            </button>
                        </div>
                    </div>
                </form>
            @endif
            </div>
        </div>
    </div>
</div>
@endsection
