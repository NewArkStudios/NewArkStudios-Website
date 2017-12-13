@extends('layouts.masters.main')

@section('custom-css')
    <link rel="stylesheet" href="{{ URL::asset('css/app/thread_posts_list.css') }}" />
@endsection
@section('page-content')
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
                            <a class="large-link" href="{{url('/post/'.$post->slug)}}">{{$post->title}}</a>
                            @if($post->pinned > 0)
                                <span style="color:green">Pinned *</span>
                            @endif
                            <div class="post-list-content">{!! $post->body !!}</div>
                            Started by: <a href="{{url('/profile/' . $post->user->name)}}">{{$post->user->name}}</a>, Views: {{$post->views}}, Replies: {{count($post->replies)}}
                            <br>
                            Created at: <span class="timestamp-moment">{{$post->created_at}}</span>,
                            Last post: <span class="timestamp-moment">{{$post->updated_at}}</span>
                        <hr>
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
@endsection
@section('custom-javascripts')
    <script src="{{ asset('js/app/app.thread_post_list.js') }}"></script>
@endsection
