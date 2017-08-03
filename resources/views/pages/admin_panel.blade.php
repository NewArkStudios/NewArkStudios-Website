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
                            <table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </tfoot>
        <tbody>
            <tr>
                <td>Jennifer Acosta</td>
                <td>Junior Javascript Developer</td>
                <td>Edinburgh</td>
                <td>43</td>
                <td>2013/02/01</td>
                <td>$75,650</td>
            </tr>
            <tr>
                <td>Cara Stevens</td>
                <td>Sales Assistant</td>
                <td>New York</td>
                <td>46</td>
                <td>2011/12/06</td>
                <td>$145,600</td>
            </tr>
            <tr>
                <td>Hermione Butler</td>
                <td>Regional Director</td>
                <td>London</td>
                <td>47</td>
                <td>2011/03/21</td>
                <td>$356,250</td>
            </tr>
            <tr>
                <td>Lael Greer</td>
                <td>Systems Administrator</td>
                <td>London</td>
                <td>21</td>
                <td>2009/02/27</td>
                <td>$103,500</td>
            </tr>
            <tr>
                <td>Jonas Alexander</td>
                <td>Developer</td>
                <td>San Francisco</td>
                <td>30</td>
                <td>2010/07/14</td>
                <td>$86,500</td>
            </tr>
            <tr>
                <td>Shad Decker</td>
                <td>Regional Director</td>
                <td>Edinburgh</td>
                <td>51</td>
                <td>2008/11/13</td>
                <td>$183,000</td>
            </tr>
            <tr>
                <td>Michael Bruce</td>
                <td>Javascript Developer</td>
                <td>Singapore</td>
                <td>29</td>
                <td>2011/06/27</td>
                <td>$183,000</td>
            </tr>
            <tr>
                <td>Donna Snider</td>
                <td>Customer Support</td>
                <td>New York</td>
                <td>27</td>
                <td>2011/01/25</td>
                <td>$112,000</td>
            </tr>
        </tbody>
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

    <script type="text/javascript" src="{{URL::asset('js/DataTables/datatables.min.js')}}"></script>
    <script src="{{ asset('js/app/admin_panel.js') }}"></script>
@endsection