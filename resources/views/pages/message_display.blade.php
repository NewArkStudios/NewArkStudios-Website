@extends('layouts.masters.main')

@section('page-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">THIS IS A Single Message</div>
                <h1>{{$message->subject}}</h1>
                <h4 style="float:right">{{$message->created_at}}</h4>
                <h4 style="float:right">{{$message->updated_at}}</h4>
                <div class="panel-body">
                <p>{!! $message->message !!}</p>
                <a href="{{url('/profile/' . $message->sender_id)}}">{{$message->sender_name}}</a>
                </div>
                <!-- Report user based on direct message -->
                <form style="display:inline-table;" role="form" method="POST" action="{{ url('/display_report_user') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="message_id" value="{{$message->id}}"></input>
                    <input type="hidden" name="suspect_id" value="{{$message->sender_id}}"></input>
                    
                    <button type="submit" class="btn btn-danger">
                        Report User
                    </button>
                </form>
            </div>
            <!-- Note for each is bugged for gathering replies normally -->
            @for ($i = 0; $i < count($replies); $i++)
                <p>{!! $replies[$i]->body !!} from: {{$replies[$i]->user->name}}<p>
                <form style="display:inline-table;" role="form" method="POST" action="{{ url('/display_report_user') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="messagereply_id" value="{{$replies[$i]->id}}"></input>
                    <input type="hidden" name="suspect_id" value="{{$replies[$i]->user_id}}"></input>
                    
                    <button type="submit" class="btn btn-danger">
                        Report User
                    </button>
                </form>
            @endfor
            
            <div class="panel panel-default">
                <form class="form-horizontal" role="form" method="POST" action="{{ route('reply_message') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="message_id" value="{{$message->id}}"></input>
                    <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
                        <label for="body" class="col-md-4 control-label">Body</label>

                        <div class="col-md-6">
                            <textarea id="body" class="form-control" name="body" required></textarea>

                            @if ($errors->has('body'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('body') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Reply
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
