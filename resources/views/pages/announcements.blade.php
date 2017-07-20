@extends('layouts.masters.main')

@section('page-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @foreach($announcements as $announcement)
                    <hr>
                        {!! $announcement->body !!}
                    <p>
                        Posted on: {{ $announcement->created_at }}
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
</div>
@endsection
