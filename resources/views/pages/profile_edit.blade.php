@extends('layouts.masters.main')

@section('page-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">My Profile</div>

                <div class="panel-body">
                    <h2>{{$name}}</h2>
                    
                    <!-- update route -->
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('make_reply') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('bio') ? ' has-error' : '' }}">
                            <div class="row">
                                <label for="bio" class="col-md-1 control-label">Bio</label>
                                <div class="col-md-6">
                                    <textarea id="bio" class="form-control" name="bio" required>{{$bio}}</textarea>
                                    @if ($errors->has('bio'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('bio') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <!-- Rows will have to work with mobile worry later --> 
                                <label class="col-md-1 control-label">Birthday</label>
                                <div class="col-md-6">
                                        <select id="birthday_day" name="birthday_day">
                                                <option selected disabled>----</option>
                                            @for ($i = 1; $i < 32; $i++)
                                                <option value="{{$i}}">{{$i}}</option>
                                            @endfor
                                        </select>
                                        <select id="birthday_month" name="birthday_month">
                                            <option selected disabled>----</option>
                                            <option value="1">January</option>
                                            <option value="2">February</option>
                                            <option value="3">March</option>
                                            <option value="4">April</option>
                                            <option value="5">May</option>
                                            <option value="6">June</option>
                                            <option value="7">July</option>
                                            <option value="8">August</option>
                                            <option value="9">September</option>
                                            <option value="10">October</option>
                                            <option value="11">November</option>
                                            <option value="12">Decemeber</option>
                                        </select>
                                        <select id="birthday_year" name="birthday_year">
                                            <option selected disabled>----</option>
                                            @for ($i = 0; $i < 100; $i++)
                                                <option value='{{(int)(date("Y")) - $i}}'>{{(int)(date("Y")) - $i}}</option>
                                            @endfor
                                        </select>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-1 control-label">email</label>
                                <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-1">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection