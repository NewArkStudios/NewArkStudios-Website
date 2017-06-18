@extends('layouts.masters.main')

@section('page-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    Reporting a User
                    <br>
                    <form id="reportForm" style="display:inline-table;" role="form" method="POST" action="{{ route('report_user') }}">
                        {{ csrf_field() }}
                        
                        You are reporting: 
                        <input type="hidden" name="suspect_id" value="{{$suspect['id']}}"></input>{{$suspect['name']}}
                        <br>
                        @if(!is_null($post))
                            <input type="hidden" name="post_id" value="{{$post->id}}"></input>
                            This is the post in question :
                            <br>
                            <textarea disabled>{{$post->body}}</textarea>
                        @endif
                        @if(!is_null($reply))
                            <input type="hidden" name="reply_id" value="{{$reply->id}}"></input>
                            This is the Reply in question :
                                <textarea disabled>{{$reply->body}}</textarea>
                        @endif
                        <br>
                        <textarea name="reason" rows="4" cols="50">Enter reason for report here</textarea>
                        <br>
                        <button type="submit" class="btn btn-primary">
                        Send Report
                        </button>

                       
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
