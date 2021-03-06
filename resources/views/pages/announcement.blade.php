@extends('layouts.masters.main')

@section('custom-css')
    <link rel="stylesheet" href="{{ URL::asset('css/app/announcement.css') }}" />
@endsection
@section('page-content')
<br>
<div class='container'>
    <div class="announcement-container col-md-8" announcement-id="{{$announcement->id}}"  >
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
        <div class='recent-article-container'>
        @forelse ($recent as $recentAnnounce)
            <div id="recent-article-{{$recentAnnounce->id}}" announcement-id="{{$announcement->id}}" class="row recent-article-element">
                <div class="col-md-5">
                    @if( is_null($recentAnnounce->thumbnail ))
                        <div data-url='/announcement/{{$recentAnnounce->id}}' class='recent-thumbnail' style='background-image:url("/public/img/general/newark_full.png")'></div>
                    @else
                        <img data-url="/announcement/{{$recentAnnounce->id}}" class="recent-thumbnail" src="{{$recentAnnounce->title}}" style='background-image:url("/public/img/uploads/{{$recentAnnounce->thumbnail}}")'/>
                    @endif
                </div> 
                <div class="col-md-7">
                    <h3>
                        @if( is_null($recentAnnounce->title ))
                            No title available
                        @else
                            {{$recentAnnounce->title}}
                        @endif
                    </h3>
                    <p>{{$recentAnnounce->created_at}}</p>
                </div> 
            </div>
            <hr>
        @empty
            No Additional Announcements
        @endforelse
        </div>
        <div class="text-center">
            <button id="loadmoreButton" class="load-more-button btn btn-primary">
                Load More
            </button>
            <span id="csrf_token">{{ csrf_token() }}</span>
        </div>
    </div>
</div>
@endsection
@section('custom-javascripts')
    <script src="{{ asset('js/app/app.announcement.js') }}"></script>
@endsection
