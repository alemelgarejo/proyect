@extends('layouts.app', [
    'namePage' => 'Create user',
    'class' => 'sidebar-mini ',
    'activePage' => 'users',
    'backgroundImage' => asset('assets') . "/img/bg14.jpg",
])

@section('content')
<div class="panel-header panel-header-sm">
</div>
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h5 class="title">{{__("Create User")}}</h5>
        </div>
        <div class="card-body">
          <form method="POST" action="{{ route('user.store') }}" autocomplete="off"
          enctype="multipart/form-data">
            @csrf
            @include('alerts.success')
            <div class="row">
            </div>
              <div class="row">
                  <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>{{__(" First Name")}}</label>
                        <input type="text" name="first_name" class="form-control" placeholder="First Name" value="{{ old('first_name') }}">
                        @include('alerts.feedback', ['field' => 'first_name'])
                      </div>
                  </div>
                  <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>{{__(" Last Name")}}</label>
                        <input type="text" name="last_name" class="form-control" placeholder="Last Name" value="{{ old('last_name') }}">
                        @include('alerts.feedback', ['field' => 'last_name'])
                      </div>
                  </div>
                  <div class="col-md-4 pr-1">
                    <div class="form-group">
                      <label for="exampleInputEmail1">{{__(" Email address")}}</label>
                      <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                      @include('alerts.feedback', ['field' => 'email'])
                    </div>
                  </div>
              </div>
              <div class="row">
                <div class="col-md-4 pr-1">
                  <div class="form-group">
                    <label >{{__("Role")}}</label>
                    <select name="role_id" id="role_id"  class="form-control" >
                        <option value="1">{{__('Super Admin')}}</option>
                        <option value="2">{{__('Admin')}}</option>
                        <option value="3">{{__('Normal')}}</option>
                        <option value="4">{{__('Visitante')}}</option>
                    </select>
                    @include('alerts.feedback', ['field' => 'role_id'])
                  </div>
                </div>
                <div class="col-md-4 pr-1">
                    <div class="form-group">
                      <label>{{__("DNI")}}</label>
                      <input type="text" name="dni" class="form-control" placeholder="DNI" value="{{ old('dni') }}">
                      @include('alerts.feedback', ['field' => 'dni'])
                    </div>
                  </div>
                  <div class="col-md-4 pr-1">
                    <div class="form-group">
                      <label>{{__("Comertial")}}</label>
                      <input type="text" name="comertial" class="form-control" placeholder="Comertial" value="{{ old('comertial') }}">
                      @include('alerts.feedback', ['field' => 'comertial'])
                    </div>
                  </div>
              </div>
              <div class="row">
                <div class="col-md-6 pr-1">
                    <div class="form-group">
                      <label>{{__("Phone")}}</label>
                      <input type="text" name="phone" class="form-control" placeholder="Phone" value="{{ old('phone') }}">
                      @include('alerts.feedback', ['field' => 'phone'])
                    </div>
                </div>
                <div class="col-md-6 pr-1">
                    <div class="form-group">
                      <label>{{__("Birthdate")}}</label>
                      <input type="date" name="birthdate" class="form-control" placeholder="Birthdate" value="{{ old('birthdate') }}">
                      @include('alerts.feedback', ['field' => 'birthdate'])
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 pr-1">
                    <div class="form-group {{ $errors->has('password') ? ' has-danger' : '' }}">
                      <label>{{__(" New password")}}</label>
                      <input class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('New Password') }}" type="password" name="password" required>
                      @include('alerts.feedback', ['field' => 'password'])
                    </div>
                  </div>
                  <div class="col-md-6 pr-1">
                    <div class="form-group {{ $errors->has('password') ? ' has-danger' : '' }}">
                      <label>{{__(" Confirm New Password")}}</label>
                      <input class="form-control" placeholder="{{ __('Confirm New Password') }}" type="password" name="password_confirmation" required>
                    </div>
                  </div>
            </div>
            <div class="card-footer ">
              <button type="submit" class="btn btn-primary btn-round" style="background: #2CA8FF;">{{__('Save')}}</button>
            </div>
          </form>
        </div>
    </div>
  </div>
  </div>
</div>
@endsection
