@extends('layouts.masters.main')

@section('page-content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Searching User Results</div>

                @foreach($users as $user)
                    <!-- once we have more user information we can post --> 
                    <div style="margin-top:1em;" class="col-md-12">
                        <a href="{{ url('profile/' . $user->name) }}">{{ $user->name }}</a>
                    </div>
                @endforeach                

                <div class="panel-body">
                </div>
            </div>
        </div>
    </div>
@endsection
