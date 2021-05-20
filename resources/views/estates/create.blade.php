@extends('layouts.app', [
'namePage' => 'Create estate',
'class' => 'sidebar-mini ',
'activePage' => 'my-estates',
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
                        <h5 class="title">{{ __('messages.Create Estate') }}</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('estates.store') }}" autocomplete="off"
                            enctype="multipart/form-data">
                            @csrf
                            @include('alerts.success')
                            <div class="row">
                            </div>
                            <div class="row">
                                <div class="col-md-2 pr-1">
                                    <div class="form-group">
                                        <label>{{ __('messages.Owner') }}</label>
                                        <select name="owner_id" id="owner_id" class="form-control">
                                            @if (empty($owner->id))
                                                @foreach ($owners as $owner)
                                                    <option value="{{ $owner->id }}">{{ $owner->first_name }}
                                                        {{ $owner->last_name }}</option>
                                                @endforeach
                                            @elseif(!empty($owner->id))
                                                <option value="{{ $owner->id }}">{{ $owner->first_name }}
                                                    {{ $owner->last_name }}</option>
                                            @endif
                                        </select>
                                        @include('alerts.feedback', ['field' => 'owner_id'])
                                    </div>
                                </div>
                                <div class="col-md-2 pr-1">
                                    <div class="form-group">
                                        <label>{{ __('messages.Status') }}</label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="1">Activo</option>
                                            <option value="0">Inactivo</option>
                                        </select>
                                        @include('alerts.feedback', ['field' => 'status'])
                                    </div>
                                </div>
                                <div class="col-md-2 pr-1">
                                    <div class="form-group">
                                        <label>{{ __('messages.Type') }}</label>
                                        <select name="type" id="type" class="form-control">
                                            <option value="Traspaso">Traspaso</option>
                                            <option value="Compra">Compra</option>
                                            <option value="Alquiler">Alquiler</option>
                                        </select>
                                        @include('alerts.feedback', ['field' => 'type'])
                                    </div>
                                </div>
                                <div class="col-md-2 pr-1">
                                    <div class="form-group">
                                        <label>{{ __('messages.City') }}</label>
                                        <input type="text" name="city" class="form-control" placeholder="City"
                                            value="{{ old('city') }}">
                                        @include('alerts.feedback', ['field' => 'city'])
                                    </div>
                                </div>
                                <div class="col-md-4 pr-3">
                                    <div class="form-group">
                                        <label>{{ __('messages.Address') }}</label>
                                        <input type="text" name="address" class="form-control" placeholder="Address"
                                            value="{{ old('address') }}">
                                        @include('alerts.feedback', ['field' => 'address'])
                                    </div>
                                </div>
                            </div>
                            <hr class="pr-4">
                            <div class="row">
                                <div class="col-md-2 pr-1">
                                    <div class="form-group">
                                        <label>{{ __('messages.Interest Type') }}</label>
                                        <select name="interest_type" id="interest_type" class="form-control">
                                            <option value="Traspaso">
                                                {{ __('messages.Transfer') }}</option>
                                            <option value="Compra">
                                                {{ __('messages.Buy') }}</option>
                                            <option value="Alquiler">
                                                {{ __('messages.Rent') }}</option>
                                        </select>
                                        @include('alerts.feedback', ['field' => 'interest_type'])
                                    </div>
                                </div>
                                <div class="col-md-2 pr-2 pl-2">
                                    <div class="form-group">
                                        <label>{{ __('messages.Value') }} (€)</label>
                                        <input type="text" name="value" class="form-control" placeholder="Value"
                                            value="{{ old('value') }}">
                                        @include('alerts.feedback', ['field' => 'value'])
                                    </div>
                                </div>
                                <div class="col-md-2 pr-2">
                                    <div class="form-group">
                                        <label>{{ __('messages.Surface') }} (m<sup>2</sup>)</label>
                                        <input type="text" name="surface" class="form-control" placeholder="Surface"
                                            value="{{ old('surface') }}">
                                        @include('alerts.feedback', ['field' => 'surface'])
                                    </div>
                                </div>
                                <div class="col-md-2 pr-2">
                                    <div class="form-group">
                                        <label>{{ __('messages.Rooms') }}</label>
                                        <input type="text" name="rooms" class="form-control" placeholder="Rooms"
                                            value="{{ old('rooms') }}">
                                        @include('alerts.feedback', ['field' => 'rooms'])
                                    </div>
                                </div>
                                <div class="col-md-2 pr-2">
                                    <div class="form-group">
                                        <label>{{ __('messages.Baths') }}</label>
                                        <input type="text" name="baths" class="form-control" placeholder="Baths"
                                            value="{{ old('baths') }}">
                                        @include('alerts.feedback', ['field' => 'baths'])
                                    </div>
                                </div>
                                <div class="col-md-1 pr-3">
                                    <div class="form-group">
                                        <label>{{ __('messages.Furnished') }}</label>
                                        <div class="form-check">
                                            <input class="form-check-input" name="furnished" id="furnished" type="radio"
                                                value="yes">
                                            <label class="form-check-label">{{ __('messages.Yes') }}</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" name="furnished" id="furnished" type="radio"
                                                value="no" checked>
                                            <label class="form-check-label">{{ __('messages.No') }}</label>
                                        </div>

                                        @include('alerts.feedback', ['field' => 'furnished'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                            </div>
                            <div class="card-footer ">
                                <button type="submit"
                                    class="btn btn-info btn-round btn-sm">{{ __('messages.Save') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
