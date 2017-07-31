@extends('layouts.masters.main')

@section('page-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{$category->name}}
                </div>

                <div class="panel-body">
                    <div class="col-md-4">
                        <a href="{{url('/create_post/' . $category->slug)}}">Make a post</a>
                    </div>
                    <div class="col-md-4 col-md-offset-4">
                        Search for discussion post
                        <form role="form" method="POST" action="{{ route('search_post') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="search_category" value="{{$category->slug}}"></input>
                        <input style="width:55%;" type="text" name="search_title"></input>
                        <!-- aDD DROPDOWN -->
                        
                        <button type="submit" class="btn btn-primary">
                         Search
                        </button>
                    </form>
                    </div>
                    <br>
                    <!-- Visually this will be updated later -->
                    @if (count($posts) > 0)
                        @foreach($posts as $post)
                            <div style="margin-top:1em;"class="col-md-12 {{($post->pinned > 0) ? 'well' : ''}}">
                                <a href="{{url('/post/'.$post->slug)}}">{{$post->title}}</a>
                                @if($post->pinned > 0)
                                    <span style="color:green">Pinned *</span>
                                @endif
                                <p>{{$post->body}}</p>
                                Posted by: <a href="{{url('/profile/' . $post->user->name)}}">{{$post->user->name}}</a>
                                <br>
                                Created at: {{$post->created_at}}, Updated at: {{$post->updated_at}}
                            </div>
                        @endforeach
                    @else
                        No posts :(
                    @endif
                </div>
                <!-- pagination links -->
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
