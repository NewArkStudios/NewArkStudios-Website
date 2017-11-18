@extends('layouts.masters.main')

@section('page-content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Create Thread</div>
            <div class="panel-body">
                @if (Auth::guest())
                    You are NOT LOGGED IN
                @else
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('edit_post') }}">
                        {{ csrf_field() }}

                        <!-- Make sure that we check user has right to edit -->
                        <input type="hidden" name="post_slug" value="{{$post->slug}}"></input>
                        <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
                            <label for="body" class="col-md-2 control-label">Title</label>
                            <div class="col-md-10">
                                <input id="title" type="text" class="form-control" name="title" value="{{ $post->title }}" required autofocus/>

                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <label for="body" class="col-md-2 control-label">Body</label>
                            <div class="col-md-10">
                                
                                <textarea id="body" rows="15" value="{{$post->body}}" class="form-control" name="body" required>{{$post->body}}</textarea>

                                @if ($errors->has('body'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('body') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-2">
                                <button id="post-button" type="submit" class="btn btn-primary">
                                    Post
                                </button>
                                <button id="preview-button" type="button" class="btn btn-primary">
                                    Preview
                                </button>
                            </div>
                        </div>
                    </form>
                    <div id="preview-container" class="col-md-12">
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
@section('custom-javascripts')
    <script src="{{ asset('js/app/app.thread_edit_post.js') }}"></script>
@endsection
