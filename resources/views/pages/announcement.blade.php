@extends('layouts.masters.main')

@section('custom-css')
    <link rel="stylesheet" href="{{ URL::asset('css/app/announcement.css') }}" />
@endsection
@section('page-content')
<br>
<div class='container'>
    <div class="announcement-container col-md-8" >
        @if( is_null($announcement->title ))
            <h2 class="announcement-title"> No title available</h2> 
        @else
            <h2 class="announcement-title"> {{$announcement->title}}</h2> 
        @endif
            <!-- We trust that  -->
            {!! $announcement->body !!}
        <p>
            Posted on:
            <span class="timestamp-moment">
                {{ $announcement->created_at }}
            </span>
        </p>
        @if(Auth::user())
            @if(Auth::user()->hasRole("admin"))
                <a href="{{url('admin/display_edit_announcement/' . $announcement->id)}}">Edit Announcement</a>
            @endif
        @endif
    </div>
    <div class="recent-articles col-md-4" >
        <h4 class='recent-articles-header'>Recent Articles</h4>
        @foreach ($recent as $recentAnnounce)
            <div class="row">
                <div class="col-md-5">
                    @if( is_null($recentAnnounce->title ))
                        <div data-url='/announcement/{{$recentAnnounce->id}}' class='recent-thumbnail' style='background-image:url("/public/img/general/newark_full.png")'></div>
                    @else
                        <img data-url="/announcement/{{$recentAnnounce->id}}" class="recent-thumbnail" src="{{$recentAnnounce->title}}" style='background-image:url("/public/img/uploads/{{$announcement->thumbnail}}")'/>
                    @endif
                </div> 
                <div class="col-md-7">
                    <h3>
                        @if( is_null($announcement->title ))
                            No title available
                        @else
                            {{$recentAnnounce->title}}
                        @endif
                    </h3>
                    <p>{{$announcement->created_at}}</p>
                </div> 
            </div>
            <hr>
        @endforeach
        <div class="text-center">
            <button class="load-more-button btn btn-primary">
                Load More
            </button>
        </div>
    </div>
</div>
@endsection
