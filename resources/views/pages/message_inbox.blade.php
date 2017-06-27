@extends('layouts.masters.main')

@section('page-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <h2>Inbox</h2>
                    @foreach($sent_messages as $message)
                        <div class="col-md-12">
                        @if (Auth::user()->id == $message->sender_id)
                            <!-- Remember to check user direct message if they belong -->
                            <a href="{{url('/messages/message/'.$message->id)}}">{{$message->receiver->name}}</a>
                        @elseif (Auth::user()->id == $message->receiver_id)
                            <a href="{{url('/messages/message/'.$message->id)}}">{{$message->receiver->name}}</a>
                        @else
                            {{$message->sender->name}}
                        @endif
                        {{$message->subject}} 
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
