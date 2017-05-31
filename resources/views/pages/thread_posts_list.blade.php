@extends('layouts.masters.main')

@section('page-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Dashboard
                    <a href="{{url('/create_post/' . $category_id)}}">Make a post</a>
                </div>

                <div class="panel-body">
                    <!-- Visually this will be updated later -->
                    @if (count($posts['posts']) > 0)
                        @foreach($posts['posts'] as $post)
                            <h2>{{$post->title}}</h2>
                            <p>{{$post->created_at}}</p>
                            <p>{{$post->body}}</p>
                            <br>
                        @endforeach
                    @else
                        No posts :(
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection