@extends('layouts.masters.main')

@section('page-content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Contact NewArkStudios</div>

            <div class="panel-body">

                @if(!empty($message))
                    <h6 class="text-center">{{$message}}</h6>
                @endif
                <form class="form-horizontal" role="form" method="POST" action="{{route('send_contact_mail')}}">
                    {{ csrf_field() }}

                    <!-- Used to prevent bots from coming in and spamming forms-->
                    <!-- There are composer packages for this, however is the general form -->
                    <!-- https://www.thryv.com/blog/honeypot-technique/ -->
                    <div class='honey_pot' style="display:none;">
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                        <input id="name" type="text" class="form-control" name="name">
                    </div>

                    <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-2 control-label">First Name</label>

                        <div class="col-md-10">
                            <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" required autofocus>

                            @if ($errors->has('first_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('first_name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                        <label for="last_name" class="col-md-2 control-label">Last Name</label>

                        <div class="col-md-10">
                            <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" required autofocus>

                            @if ($errors->has('last_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('last_name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-md-2 control-label">E-Mail Address</label>

                        <div class="col-md-10">
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('subject') ? ' has-error' : '' }}">
                        <label for="subject" class="col-md-2 control-label">Subject</label>

                        <div class="col-md-10">
                            <input id="subject" type="subject" class="form-control" name="subject" value="{{ old('subject') }}" required>

                            @if ($errors->has('subject'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('subject') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
                        <label for="message" class="col-md-2 control-label">Message</label>
                        <div class="col-md-10">
                        <textarea id="message" rows="14" class="form-control" name="message" required>
                            {{ old('message') }}
                        </textarea>

                        @if ($errors->has('message'))
                            <span class="help-block">
                                <strong>{{ $errors->first('message') }}</strong>
                            </span>
                        @endif
                        </div>
                    </div>

                    <button id="send-button" type="submit" class="btn btn-primary">
                        Send
                    </button>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('custom-javascripts')
    <script src="{{ asset('js/app/app.contact.js') }}"></script>
@endsection
