@extends('layouts.app', [
'namePage' => 'Create owner',
'class' => 'sidebar-mini ',
'activePage' => 'my-owners',
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
                        <h5 class="title">{{ __('Create Owner') }}</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('owners.store') }}" autocomplete="off"
                            enctype="multipart/form-data">
                            @csrf
                            @include('alerts.success')
                            <div class="row">
                            </div>
                            <div class="row">
                                <div class="col-md-4 pr-1">
                                    <div class="form-group">
                                        <label>{{ __(' First Name') }}</label>
                                        <input type="text" name="first_name" class="form-control" placeholder="First Name"
                                            value="{{ old('first_name') }}">
                                        @include('alerts.feedback', ['field' => 'first_name'])
                                    </div>
                                </div>
                                <div class="col-md-4 pr-1">
                                    <div class="form-group">
                                        <label>{{ __(' Last Name') }}</label>
                                        <input type="text" name="last_name" class="form-control" placeholder="Last Name"
                                            value="{{ old('last_name') }}">
                                        @include('alerts.feedback', ['field' => 'last_name'])
                                    </div>
                                </div>
                                <div class="col-md-4 pr-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">{{ __(' Email address') }}</label>
                                        <input type="email" name="email" class="form-control" placeholder="Email"
                                            value="{{ old('email') }}">
                                        @include('alerts.feedback', ['field' => 'email'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 pr-1">
                                    <div class="form-group">
                                        <label>{{ __('Status') }}</label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="1">Activo</option>
                                            <option value="0">Inactivo</option>
                                        </select>
                                        @include('alerts.feedback', ['field' => 'status'])
                                    </div>
                                </div>
                                <div class="col-md-4 pr-1">
                                    <div class="form-group">
                                        <label>{{ __('DNI') }}</label>
                                        <input type="text" name="dni" class="form-control" placeholder="DNI"
                                            value="{{ old('dni') }}">
                                        @include('alerts.feedback', ['field' => 'dni'])
                                    </div>
                                </div>
                                <div class="col-md-4 pr-3">
                                    <div class="form-group">
                                        <label>{{ __('Phone') }}</label>
                                        <input type="text" name="phone" class="form-control" placeholder="Phone"
                                            value="{{ old('phone') }}">
                                        @include('alerts.feedback', ['field' => 'phone'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 pr-1">
                                    <div class="form-group">
                                        <label>{{ __('Birthdate') }}</label>
                                        <input type="date" name="birthdate" class="form-control" placeholder="Birthdate"
                                            value="{{ old('birthdate') }}">
                                        @include('alerts.feedback', ['field' => 'birthdate'])
                                    </div>
                                </div>
                                <div class="col-md-4 pr-1">
                                    <div class="form-group">
                                        <label>{{ __('Address') }}</label>
                                        <input type="text" name="address" class="form-control" placeholder="Address"
                                            value="{{ old('address') }}">
                                        @include('alerts.feedback', ['field' => 'address'])
                                    </div>
                                </div>
                                <div class="col-md-4 pr-3">
                                    <div class="form-group">
                                        <label>{{ __('City') }}</label>
                                        <input type="text" name="city" class="form-control" placeholder="City"
                                            value="{{ old('city') }}">
                                        @include('alerts.feedback', ['field' => 'city'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 pr-4">
                                    <div class="form-group">
                                        <label>{{ __('Observations') }}</label>
                                        <textarea name="observations" class="form-control"
                                            placeholder="Observations">{{ old('observations') }}</textarea>
                                        @include('alerts.feedback', ['field' => 'observations'])
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ">
                                <button type="submit" class="btn btn-info btn-round btn-sm">{{ __('Save') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
