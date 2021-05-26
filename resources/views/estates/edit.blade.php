@extends('layouts.app', [
'namePage' => __('messages.Edit estate'),
'class' => 'sidebar-mini ',
'activePage' => 'my-estates',
'route' => route('estates.edit', $estate->id),
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
                        <button class="btn btn-info pull-right btn-round btn-sm" type="button" data-toggle="collapse"
                            data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                            <i class="now-ui-icons arrows-1_minimal-down"></i>
                        </button>
                        <a href="{{ route('estates.pdfEstate', $estate->id) }}"
                            class="btn btn-danger btn-round pull-right btn-sm">{{ __('PDF') }}</a>
                        <a href="{{ route('images.index2', $estate->id) }}"
                            class="btn btn-primary btn-round btn-sm pull-right">{{ __('messages.Images') }}</a>
                        @if ($estate->published == 'yes')
                            <a class="btn btn-success btn-round text-white pull-right btn-sm"
                                href="{{ route('web.estate', $estate->id) }}"
                                target="__blank">{{ __('messages.Web View') }}</a>
                        @endif
                        <h5 class="title">{{ __('messages.Edit Estate') }} | {{ __('messages.Owner') }}:
                            {{ $estate->owner->first_name }}
                            {{ $estate->owner->last_name }}</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('estates.update', $estate->id) }}" autocomplete="off"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            @include('alerts.success')
                            <div class="row">
                            </div>
                            <div class="row">
                                <div class="col-md-3 pr-1">
                                    <div class="form-group">
                                        <label>{{ __('messages.Status') }}</label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="1" {{ $estate->status == 1 ? 'selected' : '' }}>
                                                {{ __('messages.Active') }}</option>
                                            <option value="0" {{ $estate->status == 0 ? 'selected' : '' }}>
                                                {{ __('messages.Inactive') }}</option>
                                        </select>
                                        @include('alerts.feedback', ['field' => 'status'])
                                    </div>
                                </div>
                                <div class="col-md-3 pr-1">
                                    <div class="form-group">
                                        <label>{{ __('messages.Type') }}</label>
                                        <select name="type" id="type" class="form-control">
                                            <option value="Casa" {{ $estate->type == 'Casa' ? 'selected' : '' }}>
                                                {{ __('messages.Casa') }}</option>
                                            <option value="Piso" {{ $estate->type == 'Piso' ? 'selected' : '' }}>
                                                {{ __('messages.Piso') }}</option>
                                            <option value="Edificio" {{ $estate->type == 'Edificio' ? 'selected' : '' }}>
                                                {{ __('messages.Edificio') }}</option>
                                        </select>
                                        @include('alerts.feedback', ['field' => 'type'])
                                    </div>
                                </div>
                                <div class="col-md-3 ">
                                    <div class="form-group">
                                        <select name="situation" id="situation" class="form-control" hidden>
                                            <option value="En la playa"
                                                {{ $estate->situation == 'En la playa' ? 'selected' : '' }}>
                                                {{ __('messages.En la playa') }}
                                            </option>
                                            <option value="En el centro"
                                                {{ $estate->situation == 'En el centro' ? 'selected' : '' }}>
                                                {{ __('messages.En el centro') }}
                                            </option>
                                            <option value="En las afueras"
                                                {{ $estate->situation == 'En las afueras' ? 'selected' : '' }}>
                                                {{ __('messages.En las afueras') }}</option>
                                        </select>
                                        @include('alerts.feedback', ['field' => 'situation'])
                                    </div>
                                </div>
                                <div class="col-md-2 pl-5">
                                    <div class="form-group">
                                        <label>{{ __('messages.Published') }}</label>
                                        <div class="form-check">
                                            <input class="form-check-input" name="published" id="published" type="radio"
                                                value="yes" @if ($estate->published == 'yes') checked @else @endif>
                                            <label class="form-check-label">{{ __('Yes') }}</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" name="published" id="published" type="radio"
                                                value="no" @if ($estate->published == 'no') checked @else @endif>
                                            <label class="form-check-label">{{ __('No') }}</label>
                                        </div>

                                        @include('alerts.feedback', ['field' => 'furnished'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 pr-1">
                                    <div class="form-group">
                                        <label>{{ __('messages.City') }}</label>
                                        <input type="text" name="city" class="form-control" placeholder="City"
                                            value="{{ old('city', $estate->city) }}">
                                        @include('alerts.feedback', ['field' => 'city'])
                                    </div>
                                </div>
                                <div class="col-md-3 pr-1">
                                    <div class="form-group">
                                        <label>{{ __('messages.Address') }}</label>
                                        <input type="text" name="address" class="form-control" placeholder="Address"
                                            value="{{ old('address', $estate->address) }}">
                                        @include('alerts.feedback', ['field' => 'address'])
                                    </div>
                                </div>
                                <div class="col-md-3 pr-1">
                                    <div class="form-group">
                                        <label>{{ __('messages.Interest Type') }}</label>
                                        <select name="interest_type" id="interest_type" class="form-control">
                                            <option value="Traspaso"
                                                {{ $estate->interest_type == 'Traspaso' ? 'selected' : '' }}>
                                                {{ __('messages.Transfer') }}</option>
                                            <option value="Compra"
                                                {{ $estate->interest_type == 'Compra' ? 'selected' : '' }}>
                                                {{ __('messages.Buy') }}</option>
                                            <option value="Alquiler"
                                                {{ $estate->interest_type == 'Alquiler' ? 'selected' : '' }}>
                                                {{ __('messages.Rent') }}</option>
                                        </select>
                                        @include('alerts.feedback', ['field' => 'interest_type'])
                                    </div>
                                </div>
                                <div class="col-md-3 pr-3">
                                    <div class="form-group">
                                        <label>{{ __('messages.Value') }} (€)</label>
                                        <input type="text" name="value" class="form-control" placeholder="Value"
                                            value="{{ old('value', $estate->value) }}">
                                        @include('alerts.feedback', ['field' => 'value'])
                                    </div>
                                </div>
                            </div>
                            <div class="collapse" id="collapseExample">
                                <hr class="pr-4">
                                <div class="row">
                                    <div class="col-md-3 pr-2">
                                        <div class="form-group">
                                            <label>{{ __('messages.Surface') }} (m<sup>2</sup>)</label>
                                            <input type="text" name="surface" class="form-control" placeholder="Surface"
                                                value="{{ old('surface', $estate->surface) }}">
                                            @include('alerts.feedback', ['field' => 'surface'])
                                        </div>
                                    </div>
                                    <div class="col-md-3 pr-2">
                                        <div class="form-group">
                                            <label>{{ __('messages.Built Surface') }} (m<sup>2</sup>)</label>
                                            <input type="text" name="built_surface" class="form-control"
                                                placeholder="Built Surface"
                                                value="{{ old('built_surface', $estate->built_surface) }}">
                                            @include('alerts.feedback', ['field' => 'built_surface'])
                                        </div>
                                    </div>
                                    <div class="col-md-3 pr-1">
                                        <div class="form-group">
                                            <label>{{ __('messages.Rooms') }}</label>
                                            <input type="text" name="rooms" class="form-control" placeholder="Rooms"
                                                value="{{ old('rooms', $estate->rooms) }}">
                                            @include('alerts.feedback', ['field' => 'rooms'])
                                        </div>
                                    </div>
                                    <div class="col-md-3 pr-3">
                                        <div class="form-group">
                                            <label>{{ __('messages.Baths') }}</label>
                                            <input type="text" name="baths" class="form-control" placeholder="Baths"
                                                value="{{ old('baths', $estate->baths) }}">
                                            @include('alerts.feedback', ['field' => 'baths'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 pr-1">
                                        <div class="form-group">
                                            <label>{{ __('messages.Lobbies') }}</label>
                                            <input type="text" name="lobbies" class="form-control" placeholder="Lobbies"
                                                value="{{ old('lobbies', $estate->lobbies) }}">
                                            @include('alerts.feedback', ['field' => 'lobbies'])
                                        </div>
                                    </div>
                                    <div class="col-md-3 pr-1">
                                        <div class="form-group">
                                            <label>{{ __('messages.Lobbies Surface') }} m<sup>2</sup></label>
                                            <input type="text" name="lobbies_surface" class="form-control"
                                                placeholder="Lobbies Surface"
                                                value="{{ old('lobbies_surface', $estate->lobbies_surface) }}">
                                            @include('alerts.feedback', ['field' => 'lobbies_surface'])
                                        </div>
                                    </div>
                                    <div class="col-md-3 pr-1">
                                        <div class="form-group">
                                            <label>{{ __('messages.D. Room Surface') }} m<sup>2</sup></label>
                                            <input type="text" name="dining_room_surface" class="form-control"
                                                placeholder="Dining Room Surface"
                                                value="{{ old('dining_room_surface', $estate->dining_room_surface) }}">
                                            @include('alerts.feedback', ['field' => 'dining_room_surface'])
                                        </div>
                                    </div>
                                    <div class="col-md-3 pr-3">
                                        <div class="form-group">
                                            <label>{{ __('messages.Kitchen Type') }}</label>
                                            <select name="kitchen_type" id="kitchen_type" class="form-control">
                                                <option value="Lineal"
                                                    {{ $estate->kitchen_type == 'Lineal' ? 'selected' : '' }}>Lineal
                                                </option>
                                                <option value="Con isla"
                                                    {{ $estate->kitchen_type == 'Con isla' ? 'selected' : '' }}>Con isla
                                                </option>
                                            </select>
                                            @include('alerts.feedback', ['field' => 'kitchen_type'])
                                        </div>
                                    </div>
                                </div>
                                <hr class="pr-4">
                                <div class="row">
                                    <div class="col-md-2 pr-1 pl-4">
                                        <div class="form-group">
                                            <label>{{ __('messages.Wardrobe') }}</label>
                                            <div class="form-check">
                                                <input class="form-check-input" name="wardrobe" id="wardrobe" type="radio"
                                                    value="yes" @if ($estate->wardrobe == 'yes') checked @else @endif>
                                                <label class="form-check-label">{{ __('Yes') }}</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" name="wardrobe" id="wardrobe" type="radio"
                                                    value="no" @if ($estate->wardrobe == 'no') checked @else @endif>
                                                <label class="form-check-label">{{ __('No') }}</label>
                                            </div>

                                            @include('alerts.feedback', ['field' => 'wardrobe'])
                                        </div>
                                    </div>
                                    <div class="col-md-2 pr-1">
                                        <div class="form-group">
                                            <label>{{ __('messages.Furnished') }}</label>
                                            <div class="form-check">
                                                <input class="form-check-input" name="furnished" id="furnished" type="radio"
                                                    value="yes" @if ($estate->furnished == 'yes') checked @else @endif>
                                                <label class="form-check-label">{{ __('Yes') }}</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" name="furnished" id="furnished" type="radio"
                                                    value="no" @if ($estate->furnished == 'no') checked @else @endif>
                                                <label class="form-check-label">{{ __('No') }}</label>
                                            </div>

                                            @include('alerts.feedback', ['field' => 'furnished'])
                                        </div>
                                    </div>
                                    <div class="col-md-2 pr-1">
                                        <div class="form-group">
                                            <label>{{ __('messages.Separate D. Room') }}</label>
                                            <div class="form-check">
                                                <input class="form-check-input" name="separate_dining_room"
                                                    id="separate_dining_room" type="radio" value="yes" @if ($estate->separate_dining_room == 'yes') checked @else @endif>
                                                <label class="form-check-label">{{ __('Yes') }}</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" name="separate_dining_room"
                                                    id="separate_dining_room" type="radio" value="no" @if ($estate->separate_dining_room == 'no') checked @else @endif>
                                                <label class="form-check-label">{{ __('No') }}</label>
                                            </div>

                                            @include('alerts.feedback', ['field' => 'separate_dining_room'])
                                        </div>
                                    </div>
                                    <div class="col-md-2 pr-1">
                                        <div class="form-group">
                                            <label>{{ __('messages.Furnished Kitchen') }}</label>
                                            <div class="form-check">
                                                <input class="form-check-input" name="furnished_kitchen"
                                                    id="furnished_kitchen" type="radio" value="yes" @if ($estate->furnished_kitchen == 'yes') checked @else @endif>
                                                <label class="form-check-label">{{ __('Yes') }}</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" name="furnished_kitchen"
                                                    id="furnished_kitchen" type="radio" value="no" @if ($estate->furnished_kitchen == 'no') checked @else @endif>
                                                <label class="form-check-label">{{ __('No') }}</label>
                                            </div>

                                            @include('alerts.feedback', ['field' => 'furnished'])
                                        </div>
                                    </div>
                                    <div class="col-md-2 pr-1">
                                        <div class="form-group">
                                            <label>{{ __('messages.Balcony') }}</label>
                                            <div class="form-check">
                                                <input class="form-check-input" name="balcony" id="balcony" type="radio"
                                                    value="yes" @if ($estate->balcony == 'yes') checked @else @endif>
                                                <label class="form-check-label">{{ __('Yes') }}</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" name="balcony" id="balcony" type="radio"
                                                    value="no" @if ($estate->balcony == 'no') checked @else @endif>
                                                <label class="form-check-label">{{ __('No') }}</label>
                                            </div>

                                            @include('alerts.feedback', ['field' => 'balcony'])
                                        </div>
                                    </div>
                                    <div class="col-md-2 pr-1 pl-4">
                                        <div class="form-group">
                                            <label>{{ __('messages.Courtyard') }}</label>
                                            <div class="form-check">
                                                <input class="form-check-input" name="courtyard" id="courtyard" type="radio"
                                                    value="yes" @if ($estate->courtyard == 'yes') checked @else @endif>
                                                <label class="form-check-label">{{ __('Yes') }}</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" name="courtyard" id="courtyard" type="radio"
                                                    value="no" @if ($estate->courtyard == 'no') checked @else @endif>
                                                <label class="form-check-label">{{ __('No') }}</label>
                                            </div>

                                            @include('alerts.feedback', ['field' => 'courtyard'])
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3 pr-1">
                                        <div class="form-group">
                                            <label>{{ __('messages.Balcony Surface') }} m<sup>2</sup></label>
                                            <input type="text" name="balcony_surface" class="form-control"
                                                placeholder="Balcony Surface"
                                                value="{{ old('balcony_surface', $estate->balcony_surface) }}">
                                            @include('alerts.feedback', ['field' => 'balcony_surface'])
                                        </div>
                                    </div>
                                    <div class="col-md-3 pr-1">
                                        <div class="form-group">
                                            <label>{{ __('messages.Courtyard Sur.') }} m<sup>2</sup></label>
                                            <input type="text" name="courtyard_surface" class="form-control"
                                                placeholder="Courtyard Surface"
                                                value="{{ old('courtyard_surface', $estate->courtyard_surface) }}">
                                            @include('alerts.feedback', ['field' => 'courtyard_surface'])
                                        </div>
                                    </div>
                                    <div class="col-md-3 pr-1">
                                        <div class="form-group">
                                            <label>{{ __('messages.Courtyard Location') }}</label>
                                            <input type="text" name="courtyard_location" class="form-control"
                                                placeholder="Courtyard Location"
                                                value="{{ old('courtyard_location', $estate->courtyard_location) }}">
                                            @include('alerts.feedback', ['field' => 'courtyard_location'])
                                        </div>
                                    </div>

                                    <div class="col-md-3 pr-3">
                                        <div class="form-group">
                                            <label>{{ __('messages.Ceiling Height') }}</label>
                                            <select name="ceiling_height" id="ceiling_height" class="form-control">
                                                <option value="Alto"
                                                    {{ $estate->ceiling_height == 'Alto' ? 'selected' : '' }}>Alto
                                                </option>
                                                <option value="Medio"
                                                    {{ $estate->ceiling_height == 'Medio' ? 'selected' : '' }}>Medio
                                                </option>
                                                <option value="Bajo"
                                                    {{ $estate->ceiling_height == 'Bajo' ? 'selected' : '' }}>Bajo
                                                </option>
                                            </select>
                                            @include('alerts.feedback', ['field' => 'ceiling_height'])
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                </div>
                                <hr class="pr-4">
                                <div class="row">

                                    <div class="col-md-2 pr-1 pl-4">
                                        <div class="form-group">
                                            <label>{{ __('messages.Storage Room') }}</label>
                                            <div class="form-check">
                                                <input class="form-check-input" name="storage_room" id="storage_room"
                                                    type="radio" value="yes" @if ($estate->storage_room == 'yes') checked @else @endif>
                                                <label class="form-check-label">{{ __('Yes') }}</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" name="storage_room" id="storage_room"
                                                    type="radio" value="no" @if ($estate->storage_room == 'no') checked @else @endif>
                                                <label class="form-check-label">{{ __('No') }}</label>
                                            </div>

                                            @include('alerts.feedback', ['field' => 'storage_room'])
                                        </div>
                                    </div>
                                    <div class="col-md-2 pr-1">
                                        <div class="form-group">
                                            <label>{{ __('messages.Basement') }}</label>
                                            <div class="form-check">
                                                <input class="form-check-input" name="basement" id="basement" type="radio"
                                                    value="yes" @if ($estate->basement == 'yes') checked @else @endif>
                                                <label class="form-check-label">{{ __('Yes') }}</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" name="basement" id="basement" type="radio"
                                                    value="no" @if ($estate->basement == 'no') checked @else @endif>
                                                <label class="form-check-label">{{ __('No') }}</label>
                                            </div>

                                            @include('alerts.feedback', ['field' => 'basement'])
                                        </div>
                                    </div>
                                    <div class="col-md-2 pr-1">
                                        <div class="form-group">
                                            <label>{{ __('messages.Heating') }}</label>
                                            <div class="form-check">
                                                <input class="form-check-input" name="heating" id="heating" type="radio"
                                                    value="yes" @if ($estate->heating == 'yes') checked @else @endif>
                                                <label class="form-check-label">{{ __('Yes') }}</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" name="heating" id="heating" type="radio"
                                                    value="no" @if ($estate->heating == 'no') checked @else @endif>
                                                <label class="form-check-label">{{ __('No') }}</label>
                                            </div>

                                            @include('alerts.feedback', ['field' => 'heating'])
                                        </div>
                                    </div>
                                    <div class="col-md-2 pr-1">
                                        <div class="form-group">
                                            <label>{{ __('messages.Garage') }}</label>
                                            <div class="form-check">
                                                <input class="form-check-input" name="garage" id="garage" type="radio"
                                                    value="yes" @if ($estate->garage == 'yes') checked @else @endif>
                                                <label class="form-check-label">{{ __('Yes') }}</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" name="garage" id="garage" type="radio"
                                                    value="no" @if ($estate->garage == 'no') checked @else @endif>
                                                <label class="form-check-label">{{ __('No') }}</label>
                                            </div>

                                            @include('alerts.feedback', ['field' => 'garage'])
                                        </div>
                                    </div>
                                    <div class="col-md-2 pr-1">
                                        <div class="form-group">
                                            <label>{{ __('messages.Air Conditioning') }}</label>
                                            <div class="form-check">
                                                <input class="form-check-input" name="air_conditioning"
                                                    id="air_conditioning" type="radio" value="yes" @if ($estate->air_conditioning == 'yes') checked @else @endif>
                                                <label class="form-check-label">{{ __('Yes') }}</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" name="air_conditioning"
                                                    id="air_conditioning" type="radio" value="no" @if ($estate->air_conditioning == 'no') checked @else @endif>
                                                <label class="form-check-label">{{ __('No') }}</label>
                                            </div>

                                            @include('alerts.feedback', ['field' => 'air_conditioning'])
                                        </div>
                                    </div>
                                    <div class="col-md-2 pr-3">
                                        <div class="form-group">
                                            <label>{{ __('messages.Garden') }}</label>
                                            <div class="form-check">
                                                <input class="form-check-input" name="garden" id="garden" type="radio"
                                                    value="yes" @if ($estate->garden == 'yes') checked @else @endif>
                                                <label class="form-check-label">{{ __('Yes') }}</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" name="garden" id="garden" type="radio"
                                                    value="no" @if ($estate->garden == 'no') checked @else @endif>
                                                <label class="form-check-label">{{ __('No') }}</label>
                                            </div>

                                            @include('alerts.feedback', ['field' => 'garden'])
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-3 pr-1">
                                        <div class="form-group">
                                            <label>{{ __('messages.Storage R. Sur.') }} m<sup>2</sup></label>
                                            <input type="text" name="storage_room_surface" class="form-control"
                                                placeholder="Storage Room Surface"
                                                value="{{ old('storage_room_surface', $estate->storage_room_surface) }}">
                                            @include('alerts.feedback', ['field' => 'storage_room_surface'])
                                        </div>
                                    </div>
                                    <div class="col-md-3 pr-1">
                                        <div class="form-group">
                                            <label>{{ __('messages.Basement Sur.') }} m<sup>2</sup></label>
                                            <input type="text" name="basement_surface" class="form-control"
                                                placeholder="Basement Surface"
                                                value="{{ old('basement_surface', $estate->basement_surface) }}">
                                            @include('alerts.feedback', ['field' => 'basement_surface'])
                                        </div>
                                    </div>
                                    <div class="col-md-3 pr-1">
                                        <div class="form-group">
                                            <label>{{ __('messages.Heating Type') }} m<sup>2</sup></label>
                                            <input type="text" name="heating_type" class="form-control"
                                                placeholder="Heating Type"
                                                value="{{ old('heating_type', $estate->heating_type) }}">
                                            @include('alerts.feedback', ['field' => 'heating_type'])
                                        </div>
                                    </div>
                                    <div class="col-md-3 pr-3">
                                        <div class="form-group">
                                            <label>{{ __('messages.Terraces') }}</label>
                                            <input type="text" name="terraces" class="form-control" placeholder="Terraces"
                                                value="{{ old('terraces', $estate->terraces) }}">
                                            @include('alerts.feedback', ['field' => 'terraces'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-md-3 pr-1">
                                        <div class="form-group">
                                            <label>{{ __('messages.Terraces Surface') }} m<sup>2</sup></label>
                                            <input type="text" name="terraces_surface" class="form-control"
                                                placeholder="Terraces Surface"
                                                value="{{ old('terraces_surface', $estate->terraces_surface) }}">
                                            @include('alerts.feedback', ['field' => 'terraces_surface'])
                                        </div>
                                    </div>
                                    <div class="col-md-3 pr-1">
                                        <div class="form-group">
                                            <label>{{ __('messages.Garage Sur.') }} m<sup>2</sup></label>
                                            <input type="text" name="garage_surface" class="form-control"
                                                placeholder="Garage Surface"
                                                value="{{ old('garage_surface', $estate->garage_surface) }}">
                                            @include('alerts.feedback', ['field' => 'garage_surface'])
                                        </div>
                                    </div>
                                    <div class="col-md-3 pr-1">
                                        <div class="form-group">
                                            <label>{{ __('messages.Air Conditioning Type') }} </label>
                                            <input type="text" name="air_conditioning_type" class="form-control"
                                                placeholder="Air Conditioning Type"
                                                value="{{ old('air_conditioning_type', $estate->air_conditioning_type) }}">
                                            @include('alerts.feedback', ['field' => 'air_conditioning_type'])
                                        </div>
                                    </div>
                                    <div class="col-md-2 pr-3">
                                        <div class="form-group">
                                            <label>{{ __('messages.Garden Sur.') }} m<sup>2</sup></label>
                                            <input type="text" name="garden_surface" class="form-control"
                                                placeholder="Garden Surface"
                                                value="{{ old('garden_surface', $estate->garden_surface) }}">
                                            @include('alerts.feedback', ['field' => 'garden_surface'])
                                        </div>
                                    </div>
                                </div>
                                <hr class="pr-4">
                                <div class="row">
                                    <div class="col-md-3 pr-1">
                                        <div class="form-group">
                                            <label>{{ __('messages.Floors') }}</label>
                                            <input type="text" name="floors" class="form-control" placeholder="Floors"
                                                value="{{ old('floors', $estate->floors) }}">
                                            @include('alerts.feedback', ['field' => 'floors'])
                                        </div>
                                    </div>

                                    <div class="col-md-3 pr-1">
                                        <div class="form-group">
                                            <label>{{ __('messages.Floor') }}</label>
                                            <input type="text" name="floor" class="form-control" placeholder="Floor"
                                                value="{{ old('floor', $estate->floor) }}">
                                            @include('alerts.feedback', ['field' => 'floor'])
                                        </div>
                                    </div>
                                    <div class="col-md-2 pr-1 pl-4">
                                        <div class="form-group">
                                            <label>{{ __('messages.Pool') }}</label>
                                            <div class="form-check">
                                                <input class="form-check-input" name="pool" id="pool" type="radio"
                                                    value="yes" @if ($estate->pool == 'yes') checked @else @endif>
                                                <label class="form-check-label">{{ __('Yes') }}</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" name="pool" id="pool" type="radio"
                                                    value="no" @if ($estate->pool == 'no') checked @else @endif>
                                                <label class="form-check-label">{{ __('No') }}</label>
                                            </div>

                                            @include('alerts.feedback', ['field' => 'pool'])
                                        </div>
                                    </div>
                                    <div class="col-md-2 pr-1">
                                        <div class="form-group">
                                            <label>{{ __('messages.Elevator') }}</label>
                                            <div class="form-check">
                                                <input class="form-check-input" name="elevator" id="elevator" type="radio"
                                                    value="yes" @if ($estate->elevator == 'yes') checked @else @endif>
                                                <label class="form-check-label">{{ __('Yes') }}</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" name="elevator" id="elevator" type="radio"
                                                    value="no" @if ($estate->elevator == 'no') checked @else @endif>
                                                <label class="form-check-label">{{ __('No') }}</label>
                                            </div>

                                            @include('alerts.feedback', ['field' => 'elevator'])
                                        </div>
                                    </div>
                                    <div class="col-md-2 pr-1">
                                        <div class="form-group">
                                            <label>{{ __('messages.Urbanization') }}</label>
                                            <div class="form-check">
                                                <input class="form-check-input" name="urbanization" id="urbanization"
                                                    type="radio" value="yes" @if ($estate->urbanization == 'yes') checked @else @endif>
                                                <label class="form-check-label">{{ __('Yes') }}</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" name="urbanization" id="urbanization"
                                                    type="radio" value="no" @if ($estate->urbanization == 'no') checked @else @endif>
                                                <label class="form-check-label">{{ __('No') }}</label>
                                            </div>

                                            @include('alerts.feedback', ['field' => 'urbanization'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 pr-1">
                                        <div class="form-group">
                                            <label>{{ __('messages.Building Type') }}</label>
                                            <input type="text" name="air_conditioning_type" class="form-control"
                                                placeholder="Building Type"
                                                value="{{ old('air_conditioning_type', $estate->air_conditioning_type) }}">
                                            @include('alerts.feedback', ['field' => 'air_conditioning_type'])
                                        </div>
                                    </div>
                                    <div class="col-md-3 pr-1">
                                        <div class="form-group">
                                            <label>{{ __('messages.Building Date') }}</label>
                                            <input type="date" name="building_date" class="form-control"
                                                placeholder="Garden Surface"
                                                value="{{ old('building_date', $estate->building_date) }}">
                                            @include('alerts.feedback', ['field' => 'building_date'])
                                        </div>
                                    </div>
                                    <div class="col-md-4 pr-3">
                                        <div class="form-group">
                                            <label>{{ __('messages.Conservation') }}</label>
                                            <select name="conservation_state" id="conservation_state" class="form-control">
                                                <option value="Bueno"
                                                    {{ $estate->conservation_state == 'Bueno' ? 'selected' : '' }}>Bueno
                                                </option>
                                                <option value="Muy bueno"
                                                    {{ $estate->conservation_state == 'Muy bueno' ? 'selected' : '' }}>
                                                    Muy bueno</option>
                                                <option value="Malo"
                                                    {{ $estate->conservation_state == 'Malo' ? 'selected' : '' }}>Malo
                                                </option>
                                            </select>
                                            @include('alerts.feedback', ['field' => 'conservation_state'])
                                        </div>
                                    </div>
                                </div>
                                <hr class="pr-4">
                                <div class="row">

                                    <div class="col-md-3 pr-1">
                                        <div class="form-group">
                                            <label>{{ __('messages.Latitude') }}</label>
                                            <input type="text" name="latitude" class="form-control" placeholder="Latitude"
                                                value="{{ old('latitude', $estate->latitude) }}">
                                            @include('alerts.feedback', ['field' => 'latitude'])
                                        </div>
                                    </div>
                                    <div class="col-md-3 pr-1">
                                        <div class="form-group">
                                            <label>{{ __('messages.Longitude') }}</label>
                                            <input type="text" name="longitude" class="form-control" placeholder="Longitude"
                                                value="{{ old('longitude', $estate->longitude) }}">
                                            @include('alerts.feedback', ['field' => 'longitude'])
                                        </div>
                                    </div>
                                    <div class="col-md-6 pr-3">
                                        <div class="form-group">
                                            <label>{{ __('messages.Google Maps') }}</label>
                                            <input type="text" name="google_maps" class="form-control"
                                                placeholder="Google Maps"
                                                value="{{ old('google_maps', $estate->google_maps) }}">
                                            @include('alerts.feedback', ['field' => 'google_maps'])
                                        </div>
                                    </div>
                                </div>
                                <hr class="pr-4">
                                <div class="row">
                                    <div class="col-md-12 pr-4">
                                        <div class="form-group">
                                            <label>{{ __('messages.Description') }}</label>
                                            <textarea name="description" class="form-control" id="description"
                                                value="">{{ old('description', $estate->description) }}</textarea>
                                            @include('alerts.feedback', ['field' => 'description'])
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ">
                                <button type="submit"
                                    class="btn btn-info btn-round btn-sm">{{ __('messages.Update') }}</button>
                                <button id="delete" data-estateid="{{ $estate->id }}" type="button"
                                    class="btn btn-danger btn-round btn-sm" @if (auth()->user()->role_id != 1 and auth()->user()->role_id != 2) disabled @endif>{{ __('messages.Delete') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="applicantDeleteModal" class="modal modal-danger fade" tabindex="-1" role="dialog"
        aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" style="width:55%;">
            <div class="modal-content">
                <form action="{{ route('estates.destroy', $estate->id) }}" method="POST" class="remove-record-model">
                    {{ method_field('delete') }}
                    {{ csrf_field() }}

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <h4>{{ __('messages.Dou you want to delete this Estate?') }}</h4>
                        <p>{{ __('messages.Address') }}: {{ $estate->address }} </p>
                        <p>{{ __('messages.Owner') }}: {{ $estate->owner->first_name }}
                            {{ $estate->owner->last_name }}
                        </p>
                        <input type="hidden" , name="id" id="estate_id">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect btn-round btn-sm"
                            data-dismiss="modal">{{ __('messages.Close') }}</button>
                        <button type="submit"
                            class="btn btn-danger waves-effect remove-data-from-delete-form btn-round btn-sm">{{ __('messages.Delete') }}</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets') }}/js/core/jquery.min.js"></script>
    <script>
        $(document).on('click', '#delete', function() {
            var estateID = $(this).attr('data-estateid');
            $('#estate_id').val(estateID);
            $('#applicantDeleteModal').modal('show');
        });

    </script>
@endsection
