@extends('layouts.app', [
'namePage' => __('messages.Edit order'),
'class' => 'sidebar-mini ',
'activePage' => 'my-customers-orders',
'route' => route('orders.edit', $order->id),
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
                        <a href="{{ route('orders.pdfOrder', $order->id) }}"
                            class="btn btn-danger btn-round pull-right btn-sm">{{ __('PDF') }}</a>
                        <h5 class="title">{{ __('messages.Edit Order') }} {{ $order->customer->first_name }}
                            {{ $order->customer->last_name }}</h5>
                    </div>
                    <div class="card-body">

                        <form method="POST" action="{{ route('orders.update', $order->id) }}" autocomplete="off"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            @include('alerts.success')
                            <div class="row">
                            </div>
                            <div class="row">
                                <div class="col-md-4 pr-1">
                                    <div class="form-group">
                                        <label>{{ __('messages.Type') }}</label>
                                        <select name="type" id="type" class="form-control">
                                            <option value="Traspaso" {{ $order->type == 'Traspaso' ? 'selected' : '' }}>
                                                {{ __('messages.Transfer') }}</option>
                                            <option value="Compra" {{ $order->type == 'Compra' ? 'selected' : '' }}>
                                                {{ __('messages.Buy') }}
                                            </option>
                                            <option value="Alquiler" {{ $order->type == 'Alquiler' ? 'selected' : '' }}>
                                                {{ __('messages.Rent') }}</option>
                                        </select>
                                        @include('alerts.feedback', ['field' => 'type'])
                                    </div>
                                </div>
                                <div class="col-md-4 pr-1">
                                    <div class="form-group">
                                        <label>{{ __('messages.City') }}</label>
                                        <input type="text" name="city" class="form-control" placeholder="City"
                                            value="{{ old('city', $order->city) }}">
                                        @include('alerts.feedback', ['field' => 'city'])
                                    </div>
                                </div>
                            </div>

                            <div class="collapse" id="collapseExample">
                                <hr class="pr-4">
                                <div class="row">
                                    <div class="col-md-2 pr-2 pl-3">
                                        <div class="form-group">
                                            <label>{{ __('messages.Min Value') }} (€)</label>
                                            <input type="text" name="min_value" class="form-control" placeholder="min_value"
                                                value="{{ old('min_value', $order->min_value) }}">
                                            @include('alerts.feedback', ['field' => 'min_value'])
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>{{ __('messages.Max Value') }} (€)</label>
                                            <input type="text" name="max_value" class="form-control" placeholder="Max Value"
                                                value="{{ old('max_value', $order->max_value) }}">
                                            @include('alerts.feedback', ['field' => 'max_value'])
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>{{ __('messages.Min Surface') }} (m<sup>2</sup>)</label>
                                            <input type="text" name="min_surface" class="form-control"
                                                placeholder="Min Surface"
                                                value="{{ old('min_surface', $order->min_surface) }}">
                                            @include('alerts.feedback', ['field' => 'min_surface'])
                                        </div>
                                    </div>
                                    <div class="col-md-2 ">
                                        <div class="form-group">
                                            <label>{{ __('messages.Max Surface') }} (m<sup>2</sup>)</label>
                                            <input type="text" name="max_surface" class="form-control"
                                                placeholder="Max Surface"
                                                value="{{ old('max_surface', $order->max_surface) }}">
                                            @include('alerts.feedback', ['field' => 'max_surface'])
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>{{ __('messages.Min Rooms') }}</label>
                                            <input type="text" name="min_rooms" class="form-control" placeholder="Min Rooms"
                                                value="{{ old('min_rooms', $order->min_rooms) }}">
                                            @include('alerts.feedback', ['field' => 'min_rooms'])
                                        </div>
                                    </div>
                                    <div class="col-md-2 ">
                                        <div class="form-group">
                                            <label>{{ __('messages.Max Rooms') }}</label>
                                            <input type="text" name="max_rooms" class="form-control" placeholder="Max Rooms"
                                                value="{{ old('max_rooms', $order->max_rooms) }}">
                                            @include('alerts.feedback', ['field' => 'max_rooms'])
                                        </div>
                                    </div>
                                </div>
                                <hr class="pr-4">
                                <div class="row">
                                    <div class="col-md-3 ">
                                        <div class="form-group">
                                            <label>{{ __('messages.Situation') }}</label>
                                            <select name="situation" id="situation" class="form-control">
                                                <option value="En la playa"
                                                    {{ $order->situation == 'En la playa' ? 'selected' : '' }}>
                                                    {{ __('messages.En la playa') }}</option>
                                                <option value="En el centro"
                                                    {{ $order->situation == 'En el centro' ? 'selected' : '' }}>
                                                    {{ __('messages.En el centro') }}</option>
                                                <option value="En las afueras"
                                                    {{ $order->situation == 'En las afueras' ? 'selected' : '' }}>
                                                    {{ __('messages.En las afueras') }}</option>
                                            </select>
                                            @include('alerts.feedback', ['field' => 'situation'])
                                        </div>
                                    </div>
                                    <div class="col-md-3 ">
                                        <div class="form-group">
                                            <label>{{ __('Conservation') }}</label>
                                            <select name="conservation_state" id="conservation_state" class="form-control">
                                                <option value="Bueno"
                                                    {{ $order->conservation_state == 'Bueno' ? 'selected' : '' }}>
                                                    {{ __('messages.Bueno') }}
                                                </option>
                                                <option value="Muy bueno"
                                                    {{ $order->conservation_state == 'Muy bueno' ? 'selected' : '' }}>
                                                    {{ __('messages.Muy bueno') }}</option>
                                                <option value="Malo"
                                                    {{ $order->conservation_state == 'Malo' ? 'selected' : '' }}>
                                                    {{ __('messages.Malo') }}
                                                </option>
                                            </select>
                                            @include('alerts.feedback', ['field' => 'conservation_state'])
                                        </div>
                                    </div>
                                    <div class="col-md-2 pl-4">
                                        <div class="form-group">
                                            <label>{{ __('messages.Furnished') }}</label>
                                            <div class="form-check">
                                                <input class="form-check-input" name="furnished" id="furnished" type="radio"
                                                    value="yes" @if ($order->furnished == 'yes') checked @else @endif>
                                                <label class="form-check-label">{{ __('messages.Yes') }}</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" name="furnished" id="furnished" type="radio"
                                                    value="no" @if ($order->furnished == 'no') checked @else @endif>
                                                <label class="form-check-label">{{ __('messages.No') }}</label>
                                            </div>

                                            @include('alerts.feedback', ['field' => 'furnished'])
                                        </div>
                                    </div>
                                    <div class="col-md-2 ">
                                        <div class="form-group">
                                            <label>{{ __('messages.Elevator') }}</label>
                                            <div class="form-check">
                                                <input class="form-check-input" name="elevator" id="elevator" type="radio"
                                                    value="yes" @if ($order->elevator == 'yes') checked @else @endif>
                                                <label class="form-check-label">{{ __('messages.Yes') }}</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" name="elevator" id="elevator" type="radio"
                                                    value="no" @if ($order->elevator == 'no') checked @else @endif>
                                                <label class="form-check-label">{{ __('messages.No') }}</label>
                                            </div>

                                            @include('alerts.feedback', ['field' => 'elevator'])
                                        </div>
                                    </div>
                                    <div class="col-md-2 ">
                                        <div class="form-group">
                                            <label>{{ __('messages.Garage') }}</label>
                                            <div class="form-check">
                                                <input class="form-check-input" name="garage" id="garage" type="radio"
                                                    value="yes" @if ($order->garage == 'yes') checked @else @endif>
                                                <label class="form-check-label">{{ __('messages.Yes') }}</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" name="garage" id="garage" type="radio"
                                                    value="no" @if ($order->garage == 'no') checked @else @endif>
                                                <label class="form-check-label">{{ __('messages.No') }}</label>
                                            </div>

                                            @include('alerts.feedback', ['field' => 'garage'])
                                        </div>
                                    </div>
                                    <div class="col-md-2 pl-4">
                                        <div class="form-group">
                                            <label>{{ __('messages.Terraces') }}</label>
                                            <div class="form-check">
                                                <input class="form-check-input" name="terraces" id="terraces" type="radio"
                                                    value="yes" @if ($order->terraces == 'yes') checked @else @endif>
                                                <label class="form-check-label">{{ __('messages.Yes') }}</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" name="terraces" id="terraces" type="radio"
                                                    value="no" @if ($order->terraces == 'no') checked @else @endif>
                                                <label class="form-check-label">{{ __('messages.No') }}</label>
                                            </div>

                                            @include('alerts.feedback', ['field' => 'terraces'])
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>{{ __('messages.Courtyard') }}</label>
                                            <div class="form-check">
                                                <input class="form-check-input" name="courtyard" id="courtyard" type="radio"
                                                    value="yes" @if ($order->courtyard == 'yes') checked @else @endif>
                                                <label class="form-check-label">{{ __('messages.Yes') }}</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" name="courtyard" id="courtyard" type="radio"
                                                    value="no" @if ($order->courtyard == 'no') checked @else @endif>
                                                <label class="form-check-label">{{ __('messages.No') }}</label>
                                            </div>

                                            @include('alerts.feedback', ['field' => 'courtyard'])
                                        </div>
                                    </div>
                                    <div class="col-md-2 pr-2">
                                        <div class="form-group">
                                            <label>{{ __('messages.Heating') }}</label>
                                            <div class="form-check">
                                                <input class="form-check-input" name="heating" id="heating" type="radio"
                                                    value="yes" @if ($order->heating == 'yes') checked @else @endif>
                                                <label class="form-check-label">{{ __('messages.Yes') }}</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" name="heating" id="heating" type="radio"
                                                    value="no" @if ($order->heating == 'no') checked @else @endif>
                                                <label class="form-check-label">{{ __('messages.No') }}</label>
                                            </div>

                                            @include('alerts.feedback', ['field' => 'heating'])
                                        </div>
                                    </div>
                                    <div class="col-md-2 pr-2 pl-4">
                                        <div class="form-group">
                                            <label>{{ __('messages.Air') }}</label>
                                            <div class="form-check">
                                                <input class="form-check-input" name="air_conditioning"
                                                    id="air_conditioning" type="radio" value="yes" @if ($order->air_conditioning == 'yes') checked @else @endif>
                                                <label class="form-check-label">{{ __('messages.Yes') }}</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" name="air_conditioning"
                                                    id="air_conditioning" type="radio" value="no" @if ($order->air_conditioning == 'no') checked @else @endif>
                                                <label class="form-check-label">{{ __('messages.No') }}</label>
                                            </div>

                                            @include('alerts.feedback', ['field' => 'air_conditioning'])
                                        </div>
                                    </div>
                                    <div class="col-md-2 pr-2">
                                        <div class="form-group">
                                            <label>{{ __('messages.Garden') }}</label>
                                            <div class="form-check">
                                                <input class="form-check-input" name="garden" id="garden" type="radio"
                                                    value="yes" @if ($order->garden == 'yes') checked @else @endif>
                                                <label class="form-check-label">{{ __('messages.Yes') }}</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" name="garden" id="garden" type="radio"
                                                    value="no" @if ($order->garden == 'no') checked @else @endif>
                                                <label class="form-check-label">{{ __('messages.No') }}</label>
                                            </div>

                                            @include('alerts.feedback', ['field' => 'garden'])
                                        </div>
                                    </div>
                                    <div class="col-md-2 pr-2">
                                        <div class="form-group">
                                            <label>{{ __('messages.Pool') }}</label>
                                            <div class="form-check">
                                                <input class="form-check-input" name="pool" id="pool" type="radio"
                                                    value="yes" @if ($order->pool == 'yes') checked @else @endif>
                                                <label class="form-check-label">{{ __('messages.Yes') }}</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" name="pool" id="pool" type="radio"
                                                    value="no" @if ($order->pool == 'no') checked @else @endif>
                                                <label class="form-check-label">{{ __('messages.No') }}</label>
                                            </div>

                                            @include('alerts.feedback', ['field' => 'pool'])
                                        </div>
                                    </div>
                                    <div class="col-md-2 pl-4">
                                        <div class="form-group">
                                            <label>{{ __('messages.Need Loan') }}</label>
                                            <div class="form-check">
                                                <input class="form-check-input" name="need_loan" id="need_loan" type="radio"
                                                    value="yes" @if ($order->need_loan == 'yes') checked @else @endif>
                                                <label class="form-check-label">{{ __('messages.Yes') }}</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" name="need_loan" id="need_loan" type="radio"
                                                    value="no" @if ($order->need_loan == 'no') checked @else @endif>
                                                <label class="form-check-label">{{ __('messages.No') }}</label>
                                            </div>

                                            @include('alerts.feedback', ['field' => 'need_loan'])
                                        </div>
                                    </div>
                                    <div class="col-md-10 pr-4">
                                        <div class="form-group">
                                            <label>{{ __('messages.Observations') }}</label>
                                            <textarea name="observations" class="form-control"
                                                placeholder="Observations">{{ old('observations', $order->observations) }}</textarea>
                                            @include('alerts.feedback', ['field' => 'observations'])
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer ">
                                <button type="submit"
                                    class="btn btn-info btn-round btn-sm">{{ __('messages.Update') }}</button>
                                {{-- <a href="{{route('orders.searchOrder', $order->id)}}" class="btn btn-primary btn-round" style="background: #2CA8FF;">{{__('Search')}}</a> --}}
                                <button id="delete" data-orderid="{{ $order->id }}" type="button"
                                    class="btn btn-danger btn-round btn-sm" @if (auth()->user()->role_id != 1 and auth()->user()->role_id != 2) disabled @endif>{{ __('messages.Delete') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
                @foreach ($estates as $estate)
                    <div class="card" style="width: 20rem;">
                        <div class="card-body">
                            <a href="{{ route('estates.edit', $estate->id) }}" style="background: #2CA8FF"
                                class="list-group-item list-group-item-action active">
                                {{ __('messages.Owner') }}: {{ $estate->owner->first_name }}
                                {{ $estate->owner->last_name }}
                            </a>
                            <p class="card-text">
                            <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span class="badge badge-info badge-pill">{{ __('messages.Type') }}</span>
                                    {{ $estate->type }}
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span class="badge badge-info badge-pill">{{ __('messages.Address') }}</span>
                                    {{ $estate->address }}
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span class="badge badge-info badge-pill">{{ __('messages.City') }}</span>
                                    {{ $estate->city }}
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span class="badge badge-info badge-pill">{{ __('messages.Value') }}</span>
                                    {{ $estate->value }} €
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span class="badge badge-info badge-pill">{{ __('messages.Surface') }}
                                        m<sup>2</sup></span>
                                    {{ $estate->surface }}
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span class="badge badge-info badge-pill">{{ __('messages.Rooms') }}</span>
                                    {{ $estate->rooms }}
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span class="badge badge-info badge-pill">{{ __('messages.Actions') }}</span>
                                    <a type="button" href="{{ route('estates.edit', $estate->id) }}" rel="tooltip"
                                        class="btn btn-success btn-icon btn-sm " data-original-title="" title="Edit">
                                        <i class="now-ui-icons ui-2_settings-90"></i>
                                    </a>
                                </li>
                            </ul>
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div id="applicantDeleteModal" class="modal modal-danger fade" tabindex="-1" role="dialog"
        aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" style="width:55%;">
            <div class="modal-content">
                <form action="{{ route('orders.destroy', $order->id) }}" method="POST" class="remove-record-model">
                    {{ method_field('delete') }}
                    {{ csrf_field() }}

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <h4>{{ __('messages.Dou you want to delete this Order?') }}</h4>
                        <p>{{ __('messages.Corresponding to') }} {{ $order->customer->first_name }}
                            {{ $order->customer->laast_name }}</p>
                        <input type="hidden" , name="id" id="order_id">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect btn-round btn-sm"
                            data-dismiss="modal"></button>
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
            var orderID = $(this).attr('data-orderid');
            $('#order_id').val(orderID);
            $('#applicantDeleteModal').modal('show');
        });

    </script>
@endsection
