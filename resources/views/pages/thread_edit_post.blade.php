@extends('layouts.masters.main')

@section('page-content')
<div class="container">
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
                                <label for="body" class="col-md-4 control-label">Body</label>
                                <div class="col-md-6">
                                    <textarea id="body" value="{{$post->body}}" class="form-control" name="body" required>{{$post->body}}</textarea>

                                    @if ($errors->has('body'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('body') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Post
                                    </button>
                                </div>
                            </div>
                        </form>
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
