@extends('layouts.masters.main')

@section('page-content')
<div class="container">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">Announcments</div>

            <div class="panel-body">
                @foreach($announcements as $announcement)
                <hr>
                    {!! $announcement->body !!}
                <p>
                    Posted on: <span class="timestamp-moment">{{ $announcement->created_at }}</span>
                </p>
                @if(Auth::user())
                    @if(Auth::user()->hasRole("admin"))
                        <a href="{{url('admin/display_edit_announcement/' . $announcement->id)}}">Edit Announcement</a>
                    @endif
                @endif
                @endforeach
            </div>
            {{$announcements->links()}}
        </div>
    </div>
</div>
@endsection
