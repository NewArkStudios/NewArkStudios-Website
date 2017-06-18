@extends('layouts.masters.main')

@section('page-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{$category->name}}
                    <a href="{{url('/create_post/' . $category->slug)}}">Make a post</a>
                </div>

                <div class="panel-body">
                    <!-- Visually this will be updated later -->
                    @if (count($posts['posts']) > 0)
                        @foreach($posts['posts'] as $post)
                            <br>
                            <br>
                            <a href="{{url('/post/'.$post->slug)}}">{{$post->title}}</a>
                            <p>{{$post->body}}</p>
                            <p>{{$post->user}}</p>
                            <a href="{{url('/profile/' . $post->user->name)}}">View Profile</a>
                            Created at: {{$post->created_at}}, Updated at: {{$post->updated_at}}
                            <br>
                            <br>
                            @if ($moderator)
                                <form style="display:inline-table;" role="form" method="POST" action="{{ route('close_post') }}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="post_id" value="{{$post->id}}"></input>
                                    
                                    <button type="submit" class="btn btn-primary">
                                    Close Post
                                    </button>
                                </form>
                                <form style="display:inline-table;" role="form" method="POST" action="{{ route('open_post') }}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="post_id" value="{{$post->id}}"></input>
                                    
                                    <button type="submit" class="btn btn-primary">
                                    Open Post
                                    </button>
                                </form>
                            @endif
                            @if ($admin)
                                <form style="display:inline-table;" role="form" method="POST" action="{{ route('delete_post') }}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="post_id" value="{{$post->id}}"></input>
                                    
                                    <button type="submit" class="btn btn-danger">
                                    Delete Post
                                    </button>
                                </form>
                            @endif
                        @endforeach
                    @else
                        No posts :(
                    @endif
                    {{$posts['posts']->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
