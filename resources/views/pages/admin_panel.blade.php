@extends('layouts.masters.main')
@section('custom-css')
    <link rel="stylesheet" type="text/css" href="{{URL::asset('js/DataTables/datatables.css')}}"/>
@endsection
@section('page-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#announcements">Announcements</a></li>
                        <li><a data-toggle="tab" href="#moderators">Moderators</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="announcements" class="tab-pane fade in active">
                            @if(!empty($announcement))
                            <h3>Edit Announcements</h3>
                            <p>
                                Note Editing Announcement, type in the announcement you want to make and it will appear
                                Note sanitized HTML injection is allowed, contact Peter Hoang
                                if we plan to allow any type of injection
                            </p>
                            <div class="form-group">
                                <form role="form" method="POST" action="{{ route('edit_announcement') }}">
                                    {{ csrf_field() }}
                                    <input name="id" type="hidden" value="{{$announcement->id}}"></input>
                                    <textarea rows="10" id="body" class="form-control" name="body" required>{{$announcement->body}}</textarea>
                                    <br>
                                    <button type="submit" class="btn btn-primary">
                                        Submit
                                    </button>

                                    <!-- type button to remove default submit type -->
                                    <button type="button" id="preview-button" class="btn btn-primary">
                                        Preview
                                    </button>
                                </form>
                            </div>
                            @else
                            <h3>Make Announcements</h3>
                            <p>
                                Type in the announcement you want to make and it will appear
                                Note sanitized HTML injection is allowed, contact Peter Hoang
                                if we plan to allow any type of injection
                            </p>
                            <div class="form-group">
                                <form role="form" method="POST" action="{{ route('make_announcement') }}">
                                    {{ csrf_field() }}
                                    <textarea rows="10" id="body" class="form-control" name="body" required></textarea>
                                    <br>
                                    <button type="submit" class="btn btn-primary">
                                        Submit
                                    </button>

                                    <!-- type button to remove default submit type -->
                                    <button type="button" id="preview-button" class="btn btn-primary">
                                        Preview
                                    </button>
                                </form>
                            </div>
                            @endif
                            <div id="preview-content">
                            </div>
                        </div>
                        <div id="moderators" class="tab-pane fade">
                            <h3>Moderators</h3>
                            <p>Some content in menu 1.</p>
                            <table id="moderator-table" class="display" cellspacing="0" width="100%">
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('custom-javascripts')

    <!--<script type="text/javascript" src="{{URL::asset('js/DataTables/datatables.min.js')}}"></script>-->
    <script src="{{ asset('js/app/app.admin_panel.js') }}"></script>
@endsection
