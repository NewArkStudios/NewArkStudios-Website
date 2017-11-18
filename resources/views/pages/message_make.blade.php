@extends('layouts.masters.main')

@section('page-content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Dashboard</div>

            <div class="panel-body">
                <h2>Create a new direct message</h2>
                <div class="form-group{{ $errors->has('subject') ? ' has-error' : '' }}">
                    <form role="form" method="POST" action="{{ route('make_message') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="receiver_name" value="{{$user->name}}"></input>
                        Send a direct message to : {{$user->name}}
                        <br>
                        Subject : <input class="form-control" id="subject" name="subject" type="text" required></input>
                        @if ($errors->has('subject'))
                            <span class="help-block">
                                <strong>{{ $errors->first('subject') }}</strong>
                            </span>
                        @endif
                        <br>
                        <br>
                        Message :<textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                        @if ($errors->has('message'))
                            <span class="help-block">
                                <strong>{{ $errors->first('message') }}</strong>
                            </span>
                        @endif
                        <br>
                        <button type="submit" class="btn btn-primary" value="Submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
