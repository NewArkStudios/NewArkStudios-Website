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
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('edit_reply') }}">
                            {{ csrf_field() }}

                            <!-- Make sure that we check user has right to edit -->
                            <input type="hidden" name="reply_id" value="{{$reply->id}}"></input>
                            <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
                                <label for="body" class="col-md-2 control-label">Body</label>
                                <div class="col-md-10">
                                    <textarea rows="15" id="body" value="{{$reply->body}}" class="form-control" name="body" required>{{ $reply->body }}</textarea>

                                    @if ($errors->has('body'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('body') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-10 col-md-offset-2">
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
@section('custom-javascripts')
    <script src="{{ asset('js/app/app.thread_edit_reply.js') }}"></script>
@endsection
