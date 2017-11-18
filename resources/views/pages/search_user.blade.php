@extends('layouts.masters.main')

@section('page-content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Search For User</div>

            <div class="panel-body">
                <form role="form" method="POST" action="{{ route('search_user') }}">
                    {{ csrf_field() }}

                    Username:
                    <input class="form-control" type="text" name="search_user"></input>
                    
                    <br>
                    <button type="submit" class="btn btn-primary">
                     Search
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
