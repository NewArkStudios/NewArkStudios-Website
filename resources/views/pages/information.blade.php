@extends('layouts.masters.main')

@section('page-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if(isset($information))
                        {{$information}}
                    @elseif(session('information'))
                        {{session('information')}}
                    @else
                        Hey this is cool you linked this route
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
