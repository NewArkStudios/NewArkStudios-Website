@extends('layouts.masters.main')

@section('page-content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">New Social User</div>

            <div class="panel-body">
                <h4>Update User Information</h4>
                <form  class="form-horizontal" role="form" autocomplete="off" method="POST" action="{{ route('make_social_user') }}">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">UserName</label>

                        <div class="col-md-6">

                            @if (!empty ( $user )) 
                                <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" required autofocus>
                            @else
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                            @endif


                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-md-4 control-label">Email</label>

                        <div class="col-md-6">

                            @if (!empty ( $user )) 
                                <input id="email" type="text" class="form-control" name="email" value="{{ $user->email }}" required autofocus>
                            @else
                                <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                            @endif


                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="col-md-4 control-label">Password</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control" name="password" required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>
                    </div>



                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Submit
                        </button>
                    </div>
                </div>
            </form>
            <a>Skip for now ...</a>
            </div>
        </div>
    </div>
</div>
@endsection
