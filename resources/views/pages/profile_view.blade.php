@extends('layouts.masters.main')

@section('page-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">My Profile</div>

                <div class="panel-body">
                    <h1>{{$name}}</h1>
                    <h2>{{$email}}</h2>
                    <div>
                        @if($bio)
                            {{$info}}
                        @else
                            Hey create your bio here:
                            <br>
                        @endif

                        @if($age || $birthday)
                            {{$age}}
                            {{$birthday}}
                        @else
                            enter your birthday:
                            <br>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
