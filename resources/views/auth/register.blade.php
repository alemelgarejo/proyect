@extends('layouts.app', [
'namePage' => __('messages.Register page'),
'activePage' => 'register',
'route' => route('register'),
'backgroundImage' => asset('assets') . "/img/bg16.jpg",
])

@section('content')
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-5 ml-auto">
                    <div class="info-area info-horizontal mt-5">
                        <div class="icon icon-primary">
                            <i class="now-ui-icons media-2_sound-wave"></i>
                        </div>
                        <div class="description">
                            <h5 class="info-title">{{ __('messages.Lifestyle') }}</h5>
                            <p class="description">
                                {{ __('messages.Find the right property so that you have the lifestyle you want.') }}
                            </p>
                        </div>
                    </div>
                    <div class="info-area info-horizontal">
                        <div class="icon icon-primary">
                            <i class="now-ui-icons business_briefcase-24"></i>
                        </div>
                        <div class="description">
                            <h5 class="info-title">{{ __('messages.Rents') }}</h5>
                            <p class="description">
                                {{ __('messages.Rent your property to get the most out of it.') }}
                            </p>
                        </div>
                    </div>
                    <div class="info-area info-horizontal">
                        <div class="icon icon-info">
                            <i class="now-ui-icons business_bank"></i>
                        </div>
                        <div class="description">
                            <h5 class="info-title">{{ __('messages.Sell') }}</h5>
                            <p class="description">
                                {{ __('messages.Find the property that interests you, we take care of the paperwork.') }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mr-auto " style="margin-top: -7%">
                    <div class="card card-signup text-center">
                        <div class="card-header ">
                            <h4 class="card-title">{{ __('messages.Register') }}</h4>
                        </div>
                        <div class="card-body ">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <!--Begin input first_name -->
                                <div class="input-group {{ $errors->has('first_name') ? ' has-danger' : '' }}">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="now-ui-icons users_circle-08"></i>
                                        </div>
                                    </div>
                                    <input class="form-control {{ $errors->has('first_name') ? ' is-invalid' : '' }}"
                                        placeholder="{{ __('messages.First Name') }}" type="text" name="first_name"
                                        value="{{ old('first_name') }}" required autofocus>
                                    @if ($errors->has('first_name'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('first_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <!--Begin input last_name -->
                                <div class="input-group {{ $errors->has('last_name') ? ' has-danger' : '' }}">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="now-ui-icons users_circle-08"></i>
                                        </div>
                                    </div>
                                    <input class="form-control {{ $errors->has('last_name') ? ' is-invalid' : '' }}"
                                        placeholder="{{ __('messages.Last Name') }}" type="text" name="last_name"
                                        value="{{ old('last_name') }}" required autofocus>
                                    @if ($errors->has('last_name'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('last_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <!--Begin input email -->
                                <div class="input-group {{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="now-ui-icons ui-1_email-85"></i>
                                        </div>
                                    </div>
                                    <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                        placeholder="{{ __('Email') }}" type="email" name="email"
                                        value="{{ old('email') }}" required>
                                </div>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                <!--Begin input dni -->
                                <div class="input-group {{ $errors->has('dni') ? ' has-danger' : '' }}">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="now-ui-icons business_badge"></i>
                                        </div>
                                    </div>
                                    <input class="form-control {{ $errors->has('dni') ? ' is-invalid' : '' }}"
                                        placeholder="{{ __('DNI') }}" type="text" name="dni"
                                        value="{{ old('dni') }}" required autofocus>
                                    @if ($errors->has('dni'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('dni') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <!--Begin input comertial -->
                                <div class="input-group {{ $errors->has('comertial') ? ' has-danger' : '' }}">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="now-ui-icons files_single-copy-04"></i>
                                        </div>
                                    </div>
                                    <input class="form-control {{ $errors->has('comertial') ? ' is-invalid' : '' }}"
                                        placeholder="{{ __('messages.Comertial') }}" type="text" name="comertial"
                                        value="{{ old('comertial') }}" required autofocus>
                                    @if ($errors->has('comertial'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('comertial') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <!--Begin input phone -->
                                <div class="input-group {{ $errors->has('phone') ? ' has-danger' : '' }}">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="now-ui-icons tech_mobile"></i>
                                        </div>
                                    </div>
                                    <input class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}"
                                        placeholder="{{ __('messages.Phone') }}" type="text" name="phone"
                                        value="{{ old('phone') }}" required autofocus>
                                    @if ($errors->has('phone'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <!--Begin input birthdate -->
                                <div class="input-group {{ $errors->has('birthdate') ? ' has-danger' : '' }}">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="now-ui-icons ui-1_calendar-60"></i>
                                        </div>
                                    </div>
                                    <input class="form-control {{ $errors->has('birthdate') ? ' is-invalid' : '' }}"
                                        placeholder="{{ __('messages.Birthdate') }}" type="date" name="birthdate"
                                        value="{{ old('birthdate') }}" required autofocus>
                                    @if ($errors->has('birthdate'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('birthdate') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <!--Begin input user type-->

                                <!--Begin input password -->
                                <div class="input-group {{ $errors->has('password') ? ' has-danger' : '' }}">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="now-ui-icons objects_key-25"></i>
                                        </div>
                                    </div>
                                    <input class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                        placeholder="{{ __('Password') }}" type="password" name="password" required>
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <!--Begin input confirm password -->
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="now-ui-icons objects_key-25"></i></i>
                                        </div>
                                    </div>
                                    <input class="form-control" placeholder="{{ __('Confirm Password') }}"
                                        type="password" name="password_confirmation" required>
                                </div>
                                <div class="card-footer ">
                                    <button type="submit"
                                        class="btn btn-info btn-round btn-lg">{{ __('messages.Get Started') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            demo.checkFullPageBackgroundImage();
        });

    </script>
@endpush
