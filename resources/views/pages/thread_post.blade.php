@extends('layouts.masters.main')

@section('page-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">THIS IS INDIVIDUAL POST</div>
                <h1>{{$post->title}}</h1>
                <h4 style="float:right">{{$post->created_at}}</h4>
                <h4 style="float:right">{{$post->updated_at}}</h4>
                <div class="panel-body">
                <p>{{$post->body}}</p>
                </div>
            </div>
            <!-- Note foreach is bugged for gathering replies normally -->
            @for ($i = 0; $i < count($replies); $i++)
                <p>{{$replies[$i]->body}}<p>
            @endfor
        </div>
    </div>
</div>
@endsection
