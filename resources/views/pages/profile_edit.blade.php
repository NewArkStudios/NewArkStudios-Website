@extends('layouts.masters.main')

@section('page-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">My Profile</div>

                <div class="panel-body">
                    <h2>{{$user->name}}</h2>
                    
                    <!-- update route -->
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('update_profile_post') }}">
                        {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('bio') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <label for="bio" class="control-label">Bio</label>
                                <textarea id="bio" class="form-control" name="bio">{{$user->bio}}</textarea>
                                @if ($errors->has('bio'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bio') }}</strong>
                                    </span>
                                @endif
                            </div>
                            </div>
                            <div class="form-group{{ ($errors->has('birthday_day') || $errors->has('birthday_month') || $errors->has('birthday_year')  ) ? ' has-error' : '' }}">
                                <div class="col-md-12">
                                    <!-- Rows will have to work with mobile worry later --> 
                                    <label class="control-label">Birthday</label>
                                    <br>
                                    <select id="birthday_day" name="birthday_day">
                                            <option disabled>----</option>
                                        @for ($i = 1; $i < 32; $i++)
                                            @if (idate('d', strtotime($user->birthday)) == $i)
                                                <option selected value="{{$i}}">{{$i}}</option>
                                            @else
                                                <option value="{{$i}}">{{$i}}</option>
                                            @endif
                                        @endfor
                                    </select>
                                    <!-- Extra time update how we do birthday -->
                                    <select id="birthday_month" name="birthday_month">
                                        <option disabled>----</option>
                                        <option {{(idate('m', strtotime($user->birthday)) == 1) ? 'selected' : ''}} value="1">January</option>
                                        <option {{(idate('m', strtotime($user->birthday)) == 2) ? 'selected' : ''}} value="2">February</option>
                                        <option {{(idate('m', strtotime($user->birthday)) == 3) ? 'selected' : ''}} value="3">March</option>
                                        <option {{(idate('m', strtotime($user->birthday)) == 4) ? 'selected' : ''}} value="4">April</option>
                                        <option {{(idate('m', strtotime($user->birthday)) == 5) ? 'selected' : ''}} value="5">May</option>
                                        <option {{(idate('m', strtotime($user->birthday)) == 6) ? 'selected' : ''}} value="6">June</option>
                                        <option {{(idate('m', strtotime($user->birthday)) == 7) ? 'selected' : ''}} value="7">July</option>
                                        <option {{(idate('m', strtotime($user->birthday)) == 8) ? 'selected' : ''}} value="8">August</option>
                                        <option {{(idate('m', strtotime($user->birthday)) == 9) ? 'selected' : ''}} value="9">September</option>
                                        <option {{(idate('m', strtotime($user->birthday)) == 10) ? 'selected' : ''}} value="10">October</option>
                                        <option {{(idate('m', strtotime($user->birthday)) == 11) ? 'selected' : ''}} value="11">November</option>
                                        <option {{(idate('m', strtotime($user->birthday)) == 12) ? 'selected' : ''}} value="12">Decemeber</option>
                                    </select>
                                    <select id="birthday_year" name="birthday_year">
                                        <option disabled>----</option>
                                        @for ($i = 0; $i < 100; $i++)
                                            @if ((idate('Y', strtotime($user->birthday)))==(date("Y")) - $i)))
                                                <option selected value='{{(int)(date("Y")) - $i}}'>{{(int)(date("Y")) - $i}}</option>
                                            @else
                                                <option value='{{(int)(date("Y")) - $i}}'>{{(int)(date("Y")) - $i}}</option>
                                            @endif
                                        @endfor
                                    </select>
                                    @if ($errors->has('birthday_day'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('birthday_day') }}</strong>
                                        </span>
                                    @endif
                                    @if ($errors->has('birthday_month'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('birthday_month') }}</strong>
                                        </span>
                                    @endif
                                    @if ($errors->has('birthday_year'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('birthday_year') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('profile_image') ? ' has-error' : '' }}">
                                    <div class="col-md-12">
                                          <label for="profile_image" class="control-label">Profile Image</label>
                                      <div class="well">
                                      @foreach($profile_images as $image)
                                          <input type="radio" name="profile_image" value={{$image->id}}>
                                          <img src="{{ URL::asset($image->location) }}"></img>
                                      @endforeach
                                      </div>
                                    </div>
                                    @if ($errors->has('profile_image'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('profile_image') }}</strong>
                                        </span>
                                    @endif
                            </div>
                        <div class="form-group">
                            <div class="col-md-12">
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
