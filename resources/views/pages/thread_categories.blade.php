@extends('layouts.masters.main')

@section('custom-css')
    <link rel="stylesheet" href="{{ URL::asset('css/app/thread_categories.css') }}" />
@endsection
@section('page-content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Dashboard</div>

            <div class="panel-body">
                <table class="table-alternative">
                <!-- Visually this will be updated later -->
                @foreach($categories as $category)
                    <tr>
                    <td style="padding-bottom:2em;">
                        <img style="margin-right:1em;" class="icon-image" src="{{ URL::asset($category->image) }}"></img>
                    </td>
                    <td>
                        <a class="table-link" href="{{url('/thread_category/'. $category->slug)}}">{{$category->name}}</a>
                        <!-- Note because we move over the object we get the string instance of time -->
                        <p>{{$category->description}}</p>
                        <p> Topics: {{$category->postcount}} ,&nbsp; Last Post: 
                        <span class="timestamp-moment">{{$category->newest_post['updated_at']}}</span></p>
                        <hr>
                    </td>
                    </tr>
                @endforeach
                <table>
            </div>
        </div>
    </div>
</div>
@endsection
