@extends('layouts.app', [
'class' => 'sidebar-mini ',
'namePage' => __('messages.User Profile'),
'activePage' => 'profile',
'route' => route('profile.edit'),
'activeNav' => '',
])

@section('content')
    <div class="panel-header panel-header-sm">
    </div>
    <div class="content">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="title">{{ __('messages.Edit Profile') }}</h5>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('profile.update') }}" autocomplete="off"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            @include('alerts.success')
                            <div class="row">
                            </div>
                            <div class="row">
                                <div class="col-md-3 pr-1">
                                    <div class="form-group">
                                        <label>{{ __('messages.First Name') }}</label>
                                        <input type="text" name="first_name" class="form-control"
                                            value="{{ old('first_name', auth()->user()->first_name) }}">
                                        @include('alerts.feedback', ['field' => 'first_name'])
                                    </div>
                                </div>
                                <div class="col-md-4 pr-1">
                                    <div class="form-group">
                                        <label>{{ __('messages.Last Name') }}</label>
                                        <input type="text" name="last_name" class="form-control"
                                            value="{{ old('last_name', auth()->user()->last_name) }}">
                                        @include('alerts.feedback', ['field' => 'last_name'])
                                    </div>
                                </div>
                                <div class="col-md-2 pr-1">
                                    <div class="form-group">
                                        <label>{{ __(' DNI') }}</label>
                                        <input type="text" name="dni" class="form-control"
                                            value="{{ old('dni', auth()->user()->dni) }}">
                                        @include('alerts.feedback', ['field' => 'dni'])
                                    </div>
                                </div>
                                <div class="col-md-2 pr-1">
                                    <div class="form-group">
                                        <label>{{ __('messages.Phone') }}</label>
                                        <input type="text" name="phone" class="form-control"
                                            value="{{ old('phone', auth()->user()->phone) }}">
                                        @include('alerts.feedback', ['field' => 'phone'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 pr-1">
                                    <div class="form-group">
                                        <label>{{ __('messages.Birthdate') }}</label>
                                        <input type="text" name="birthdate" class="form-control"
                                            value="{{ old('birthdate', auth()->user()->birthdate) }}">
                                        @include('alerts.feedback', ['field' => 'birthdate'])
                                    </div>
                                </div>
                                <div class="col-md-4 pr-1">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">{{ __('messages.Email address') }}</label>
                                        <input type="email" name="email" class="form-control" placeholder="Email"
                                            value="{{ old('email', auth()->user()->email) }}">
                                        @include('alerts.feedback', ['field' => 'email'])
                                    </div>
                                </div>
                                <div class="col-md-4 pr-1">
                                    <div class="form-group">
                                        <label>{{ __('messages.Comertial') }}</label>
                                        <input type="text" name="comertial" class="form-control"
                                            value="{{ old('comertial', auth()->user()->comertial) }}">
                                        @include('alerts.feedback', ['field' => 'comertial'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 pr-4">
                                    <div class="form-group">
                                        <label>{{ __('messages.Description') }}</label>
                                        <textarea type="text" name="description" class="form-control"
                                            value="">{{ old('description', auth()->user()->description) }}</textarea>
                                        @include('alerts.feedback', ['field' => 'description'])
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ">
                                <button type="submit"
                                    class="btn btn-info btn-round btn-sm">{{ __('messages.Save') }}</button>
                            </div>
                            <hr class="half-rule" />
                        </form>
                    </div>
                    <div class="card-header">
                        <h5 class="title">{{ __('messages.Profile Image') }}</h5>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('profile.updateProfileImage') }}" autocomplete="off"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row" style="margin: 0 auto">
                                <div class="col-md-12">
                                    <div class="form-control-file">
                                        <input type="file" name="photo" class="form-control-file" id="photo"
                                            accept="image/*" required>
                                        @include('alerts.feedback', ['field' => 'photo'])
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="card-footer ">
                                <button type="submit"
                                    class="btn btn-info btn-round btn-sm">{{ __('messages.Save') }}</button>
                            </div>
                            <hr class="half-rule" />
                        </form>
                        <br>
                    </div>
                    <div class="card-header">
                        <h5 class="title">{{ __('Password') }}</h5>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('profile.password') }}" autocomplete="off">
                            @csrf
                            @method('put')
                            @include('alerts.success', ['key' => 'password_status'])
                            <div class="row">
                                <div class="col-md-7 pr-1">
                                    <div class="form-group {{ $errors->has('password') ? ' has-danger' : '' }}">
                                        <label>{{ __('messages.Current Password') }}</label>
                                        <input class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                            name="old_password" placeholder="{{ __('messages.Current Password') }}"
                                            type="password" required>
                                        @include('alerts.feedback', ['field' => 'old_password'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-7 pr-1">
                                    <div class="form-group {{ $errors->has('password') ? ' has-danger' : '' }}">
                                        <label>{{ __('messages.New password') }}</label>
                                        <input class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                            placeholder="{{ __('messages.New password') }}" type="password"
                                            name="password" required>
                                        @include('alerts.feedback', ['field' => 'password'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-7 pr-1">
                                    <div class="form-group {{ $errors->has('password') ? ' has-danger' : '' }}">
                                        <label>{{ __('messages.Confirm New Password') }}</label>
                                        <input class="form-control"
                                            placeholder="{{ __('messages.Confirm New Password') }}" type="password"
                                            name="password_confirmation" required>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ">
                                <button type="submit"
                                    class="btn btn-info btn-round btn-sm ">{{ __('messages.Change Password') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class=" col-md-4">
                <div class="card card-user">
                    <div class="image">
                        <img src="{{ asset('assets') }}/img/bg5.jpg" alt="...">
                    </div>
                    <div class="card-body">
                        <div class="author">
                            <a href="{{ route('profile.edit') }}">
                                <img class="avatar" src="{{ asset(auth()->user()->photo) }}" alt="...">
                                <h5 class="title">{{ auth()->user()->name }}</h5>
                            </a>
                            <p class="description">
                                {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}
                            </p>
                            <p class="description">
                                {{ auth()->user()->email }}
                            </p>
                            <p class="description">
                                {{ auth()->user()->phone }}
                            </p>
                            <p class="description">
                                {{ auth()->user()->dni }}
                            </p>
                            <p class="description">
                                {{ auth()->user()->comertial }}
                            </p>
                        </div>
                    </div>{{-- <hr>
          <div class="button-container">
            <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
              <i class="fab fa-facebook-square"></i>
            </button>
            <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
              <i class="fab fa-twitter"></i>
            </button>
            <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
              <i class="fab fa-google-plus-square"></i>
            </button>
          </div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
