@extends('layouts.masters.main')

@section('custom-css')
    <link rel="stylesheet" href="{{ URL::asset('css/app/announcements.css') }}" />
@endsection
@section('page-content')
<div class="container">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">Announcements</div>

            <div class="panel-body">
                @foreach($announcements as $announcement)
                <hr>
                    <div class="col-md-2">
                        @if( is_null($announcement->thumbnail ))
                            <div data-url='/announcement/{{$announcement->id}}' class='announcement-thumbnail' style='background-image:url("/public/img/general/newark_full.png")'></div>
                        @else
                            <img data-url="/announcement/{{$announcement->id}}" class="announcement-thumbnail" src="{{$announcement->title}}" style='background-image:url("public/img/uploads/{{$announcement->thumbnail}}")'/>
                        @endif
                    </div>
                    <div class="col-md-10">
                        @if( is_null($announcement->title ))
                            <a href="/announcement/{{$announcement->id}}"><h2>No title available</h2></a>
                        @else
                            <a href="/announcement/{{$announcement->id}}"><h2>{{ $announcement->title }}</h2></a>
                        @endif
                        {!! $announcement->body !!}
                        <p>
                            Posted on: <span class="timestamp-moment">{{ $announcement->created_at }}</span>
                        </p>
                        @if(Auth::user())
                            @if(Auth::user()->hasRole("admin"))
                                <a href="{{url('admin/display_edit_announcement/' . $announcement->id)}}">Edit Announcement</a>
                            @endif
                        @endif
                    </div>

                @endforeach
            </div>
            {{$announcements->links()}}
        </div>
    </div>
</div>
@endsection
@section('custom-javascripts')
    <script src="{{ asset('js/app/app.announcements.js') }}"></script>
@endsection
