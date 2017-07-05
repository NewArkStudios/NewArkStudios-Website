@extends('layouts.masters.main')

@section('page-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">This is the moderator panel</div>
                <!-- This will change of course -->
                <!--Suggestion might use Jquery datatables-->
                <div class="panel-body">
                    Reports    
                    @foreach($reports as $report)
                        <div class="col-md-12 well">
                            <p>Number: {{$loop->iteration}}</p>
                            <p>Reason: {{$report->reason}}</p>
                            <p>Reporter: {{$report->reporter->name}}</p>
                            <p>Suspect: {{$report->suspect->name}}</p>
                            <!-- If there is a post show the post -->
                            @if(!is_null($report->post_id))
                                Post in Question:
                                    <a href="{{url('/post/' . $report->post->slug)}}">
                                        {{$report->post->title}}
                                    </a>
                            @endif
                            <!-- TODO we may need to start linking sections# later -->
                            @if(!is_null($report->reply_id))
                                Reply in Question:
                                    <a href="{{url('/post/' . $report->reply->post->slug)}}">
                                        <!--TODO Some point make js function to reduce -->
                                        {{$report->reply->body}}
                                    </a>
                            @endif
                            @if(!is_null($report->message_id))
                                Direct Message in Question:
                                    <!--TODO Some point make js function to reduce -->
                                    {{$report->message->body}}
                            @endif
                            @if(!is_null($report->messagereply_id))
                                Direct Message in Question:
                                    <!--TODO Some point make js function to reduce -->
                                    {{$report->messagereply->body}}
                            @endif
                            <br>
                            <br>
                            <form id="ban-submit" data-suspect="{{$report->suspect->name}}" style="display:inline-table;" role="form" method="POST" action="{{ route('ban_user') }}">
                                {{ csrf_field() }}
                                <input type="hidden" name="report_id" value="{{$report->id}}"></input>
                                <button type="submit" class="btn btn-danger">
                                    Permanent Ban User
                                </button>
                            </form>
                            <form style="display:inline-table;" role="form" method="POST" action="{{route('suspend_user')}}">
                                {{ csrf_field() }}
                                <input type="hidden" name="report_id" value="{{$report->id}}"></input>
                                <button type="submit" class="btn btn-danger">
                                    Temporary Ban Users
                                </button>
                            </form>
                            <form style="display:inline-table;" role="form" method="POST" action="{{ route('warn_user') }}">
                                {{ csrf_field() }}
                                <input type="hidden" name="report_id" value="{{$report->id}}"></input>
                                <button type="submit" class="btn btn-danger">
                                    Warn User
                                </button>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom-javascripts')
    <script src="{{ asset('js/app/moderator.js') }}"></script>
@endsection
