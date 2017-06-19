@extends('layouts.masters.main')

@section('page-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <h2>Create a new direct message</h2>
                    <form role="form" method="POST" action="{{ route('make_message') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="receiver_name" value="{{$receiver_name}}"></input>
                        Send a direct message to : {{$receiver_name}}
                        <br>
                        <br>
                        <textarea class="form-control" id="message" name="message" rows="4"></textarea>
                        <br>
                        <button type="submit" class="btn btn-primary" value="Submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
