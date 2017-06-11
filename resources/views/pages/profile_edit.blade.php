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
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('update_profile_post') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('bio') ? ' has-error' : '' }}">
                            <div class="row">
                                <label for="bio" class="col-md-1 control-label">Bio</label>
                                <div class="col-md-6">
                                    <textarea id="bio" class="form-control" name="bio">{{$bio}}</textarea>
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
                                                <option disabled>----</option>
                                            @for ($i = 1; $i < 32; $i++)
                                                @if (idate('d', strtotime($birthday)) == $i)
                                                    <option selected value="{{$i}}">{{$i}}</option>
                                                @else
                                                    <option value="{{$i}}">{{$i}}</option>
                                                @endif
                                            @endfor
                                        </select>

                                        <!-- Extra time update how we do birthday -->
                                        <select id="birthday_month" name="birthday_month">
                                            <option disabled>----</option>
                                            <option {{(idate('m', strtotime($birthday)) == 1) ? 'selected' : ''}} value="1">January</option>
                                            <option {{(idate('m', strtotime($birthday)) == 2) ? 'selected' : ''}} value="2">February</option>
                                            <option {{(idate('m', strtotime($birthday)) == 3) ? 'selected' : ''}} value="3">March</option>
                                            <option {{(idate('m', strtotime($birthday)) == 4) ? 'selected' : ''}} value="4">April</option>
                                            <option {{(idate('m', strtotime($birthday)) == 5) ? 'selected' : ''}} value="5">May</option>
                                            <option {{(idate('m', strtotime($birthday)) == 6) ? 'selected' : ''}} value="6">June</option>
                                            <option {{(idate('m', strtotime($birthday)) == 7) ? 'selected' : ''}} value="7">July</option>
                                            <option {{(idate('m', strtotime($birthday)) == 8) ? 'selected' : ''}} value="8">August</option>
                                            <option {{(idate('m', strtotime($birthday)) == 9) ? 'selected' : ''}} value="9">September</option>
                                            <option {{(idate('m', strtotime($birthday)) == 10) ? 'selected' : ''}} value="10">October</option>
                                            <option {{(idate('m', strtotime($birthday)) == 11) ? 'selected' : ''}} value="11">November</option>
                                            <option {{(idate('m', strtotime($birthday)) == 12) ? 'selected' : ''}} value="12">Decemeber</option>
                                        </select>
                                        <select id="birthday_year" name="birthday_year">
                                            <option disabled>----</option>
                                            @for ($i = 0; $i < 100; $i++)
                                                @if ((idate('Y', strtotime($birthday)))==(date("Y")) - $i)))
                                                    <option selected value='{{(int)(date("Y")) - $i}}'>{{(int)(date("Y")) - $i}}</option>
                                                @else
                                                    <option value='{{(int)(date("Y")) - $i}}'>{{(int)(date("Y")) - $i}}</option>
                                                @endif
                                            @endfor
                                        </select>
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