@extends('layouts.masters.main')

@section('page-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <table class="table-alternative">
                    <!-- Visually this will be updated later -->
                    @foreach($categories as $category)
                        <tr>
                        <td>
                            <img style="margin-right:1em; margin-bottom:1em;" class="icon-image" src="{{ URL::asset($category->image) }}"></img>
                        </td>
                        <td>
                            <a class="table-link" href="{{url('/thread_category/'. $category->slug)}}">{{$category->name}}</a>
                            <p>{{$category->description}}</p>
                        </td>
                        </tr>
                    @endforeach
                    <table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
