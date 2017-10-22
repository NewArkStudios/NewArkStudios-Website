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
                        <form id="post-form" class="form-horizontal" role="form" method="POST" action="{{ route('make_post') }}">
                            {{ csrf_field() }}
                            
                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                <label for="title" class="col-md-2 control-label">Title</label>

                                <div class="col-md-10">
                                    <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" required autofocus>

                                    @if ($errors->has('title'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                                <label for="category" class="col-md-2 control-label">Category</label>

                                <div class="col-md-10">
                                    <!-- Change Categories later, possibly be able to add to any for now one -->
                                    <select id="category" name="category" class="form-control">
                                            <option value="{{$category_id}}">{{$category_name}}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
                                <label for="body" class="col-md-2 control-label">Body</label>

                                <div class="col-md-10">
                                    <textarea id="body" class="form-control" name="body" required></textarea>

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
</div>
@endsection
@section('custom-javascripts')
    <script src="{{ asset('js/app/app.thread.js') }}"></script>
@endsection
