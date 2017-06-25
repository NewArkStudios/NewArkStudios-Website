@extends('layouts.masters.main')

@section('page-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if($suspended_till != false)
                        Your account has been suspended till {{$suspended_till}}
                    @else
                        You have been banned indefinitely ...
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
