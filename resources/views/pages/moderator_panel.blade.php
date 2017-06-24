@extends('layouts.masters.main')

@section('page-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">This is the moderator panel</div>
                <div class="panel-body">
                        @foreach($reports as $report)
                        <div class='col-md-12'>
                            {{$report->reason}}
                        <div>
                        @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
