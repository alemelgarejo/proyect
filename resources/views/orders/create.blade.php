@extends('layouts.app', [
    'namePage' => 'Create order',
    'class' => 'sidebar-mini ',
    'activePage' => 'my-customers-orders',
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
          <h5 class="title">{{__("Create Order")}}</h5>
        </div>
        <div class="card-body">
          <form method="POST" action="{{ route('orders.store') }}" autocomplete="off"
          enctype="multipart/form-data">
            @csrf
            @include('alerts.success')
            <div class="row">
            </div>
              <div class="row">
                <div class="col-md-3 pr-1">
                  <div class="form-group">
                    <label >{{__("Customer")}}</label>
                    <select name="customer_id" id="customer_id"  class="form-control" >
                        @if(empty($customer->id))
                            @foreach ($customers as $customer)
                                <option value="{{$customer->id}}">{{$customer->first_name}} {{$customer->last_name}}</option>
                            @endforeach
                        @elseif(!empty($customer->id))
                            <option value="{{$customer->id}}">{{$customer->first_name}} {{$customer->last_name}}</option>
                        @endif
                    </select>
                    @include('alerts.feedback', ['field' => 'customer_id'])
                  </div>
                </div>
                <div class="col-md-3 pr-1">
                    <div class="form-group">
                      <label >{{__("Type")}}</label>
                      <select name="type" id="type"  class="form-control" >
                        <option value="Traspaso" >Traspaso</option>
                        <option value="Compra">Compra</option>
                        <option value="Alquiler">Alquiler</option>
                      </select>
                      @include('alerts.feedback', ['field' => 'type'])
                    </div>
                  </div>
                  <div class="col-md-3 pr-1">
                    <div class="form-group">
                      <label >{{__(" City")}}</label>
                      <input type="text" name="city" class="form-control" placeholder="City" value="{{ old('city') }}">
                      @include('alerts.feedback', ['field' => 'city'])
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label >{{__("Estate Type")}}</label>
                      <select name="estate_type" id="estate_type"  class="form-control" >
                        <option value="Moderno" >Moderno</option>
                        <option value="Antigüo">Antigüo</option>
                      </select>
                      @include('alerts.feedback', ['field' => 'estate_type'])
                    </div>
                  </div>
              </div>
              <hr class="pr-4">
              <div class="row">
                <div class="col-md-2 pr-2 pl-3">
                    <div class="form-group">
                      <label>{{__("Min Value")}} (€)</label>
                      <input type="text" name="min_value" class="form-control" placeholder="min_value" value="{{ old('min_value') }}">
                      @include('alerts.feedback', ['field' => 'min_value'])
                    </div>
                  </div>
                  <div class="col-md-2 pr-2">
                    <div class="form-group">
                      <label>{{__("Max Value")}} (€)</label>
                      <input type="text" name="max_value" class="form-control" placeholder="Max Value" value="{{ old('max_value') }}">
                      @include('alerts.feedback', ['field' => 'max_value'])
                    </div>
                  </div>
                  <div class="col-md-2 pr-2">
                    <div class="form-group">
                      <label>{{__("Min Surface")}} (m<sup>2</sup>)</label>
                      <input type="text" name="min_surface" class="form-control" placeholder="Min Surface" value="{{ old('min_surface') }}">
                      @include('alerts.feedback', ['field' => 'min_surface'])
                    </div>
                  </div>
                  <div class="col-md-2 pr-2">
                    <div class="form-group">
                      <label>{{__("Max Surface")}} (m<sup>2</sup>)</label>
                      <input type="text" name="max_surface" class="form-control" placeholder="Max Surface" value="{{ old('max_surface') }}">
                      @include('alerts.feedback', ['field' => 'max_surface'])
                    </div>
                  </div>
                  <div class="col-md-2 pr-2">
                    <div class="form-group">
                      <label>{{__("Min Rooms")}}</label>
                      <input type="text" name="min_rooms" class="form-control" placeholder="Min Rooms" value="{{ old('min_rooms') }}">
                      @include('alerts.feedback', ['field' => 'min_rooms'])
                    </div>
                  </div>
                  <div class="col-md-2 ">
                    <div class="form-group">
                      <label>{{__("Max Rooms")}}</label>
                      <input type="text" name="max_rooms" class="form-control" placeholder="Max Rooms" value="{{ old('max_rooms') }}">
                      @include('alerts.feedback', ['field' => 'max_rooms'])
                    </div>
                  </div>
              </div>
              <hr class="pr-4">
              <div class="row">
                <div class="col-md-3 pr-2">
                    <div class="form-group">
                      <label >{{__("Situation")}}</label>
                      <select name="situation" id="situation"  class="form-control" >
                        <option value="En la playa" >En la playa</option>
                        <option value="En el centro">En el centro</option>
                        <option value="En las afueras">En las afueras</option>
                      </select>
                      @include('alerts.feedback', ['field' => 'situation'])
                    </div>
                  </div>
                  <div class="col-md-3 pr-2">
                    <div class="form-group">
                      <label >{{__("Conservation")}}</label>
                      <select name="conservation_state" id="conservation_state"  class="form-control" >
                        <option value="Bueno" >Bueno</option>
                        <option value="Muy bueno">Muy bueno</option>
                        <option value="Malo" >Malo</option>
                      </select>
                      @include('alerts.feedback', ['field' => 'conservation_state'])
                    </div>
                  </div>
                  <div class="col-md-1 pr-2">
                    <div class="form-group">
                      <label >{{__("Furnished")}}</label>
                      <div class="form-check">
                        <input class="form-check-input" name="furnished" id="furnished" type="radio" value="yes">
                        <label class="form-check-label">{{__('Yes')}}</label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" name="furnished" id="furnished" type="radio" value="no" checked>
                        <label class="form-check-label">{{__('No')}}</label>
                      </div>

                      @include('alerts.feedback', ['field' => 'furnished'])
                    </div>
                  </div>
                  <div class="col-md-1 pr-2">
                    <div class="form-group">
                      <label >{{__("Elevator")}}</label>
                      <div class="form-check">
                        <input class="form-check-input" name="elevator" id="elevator" type="radio" value="yes">
                        <label class="form-check-label">{{__('Yes')}}</label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" name="elevator" id="elevator" type="radio" value="no" checked>
                        <label class="form-check-label">{{__('No')}}</label>
                      </div>

                      @include('alerts.feedback', ['field' => 'elevator'])
                    </div>
                  </div>
                  <div class="col-md-1 pr-2">
                    <div class="form-group">
                      <label >{{__("Garage")}}</label>
                      <div class="form-check">
                        <input class="form-check-input" name="garage" id="garage" type="radio" value="yes">
                        <label class="form-check-label">{{__('Yes')}}</label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" name="garage" id="garage" type="radio" value="no" checked>
                        <label class="form-check-label">{{__('No')}}</label>
                      </div>

                      @include('alerts.feedback', ['field' => 'garage'])
                    </div>
                  </div>
                  <div class="col-md-1 pr-2">
                    <div class="form-group">
                      <label >{{__("Terraces")}}</label>
                      <div class="form-check">
                        <input class="form-check-input" name="terraces" id="terraces" type="radio" value="yes">
                        <label class="form-check-label">{{__('Yes')}}</label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" name="terraces" id="terraces" type="radio" value="no" checked>
                        <label class="form-check-label">{{__('No')}}</label>
                      </div>

                      @include('alerts.feedback', ['field' => 'terraces'])
                    </div>
                  </div>
                  <div class="col-md-1 pr-2">
                    <div class="form-group">
                      <label >{{__("Courtyard")}}</label>
                      <div class="form-check">
                        <input class="form-check-input" name="courtyard" id="courtyard" type="radio" value="yes">
                        <label class="form-check-label">{{__('Yes')}}</label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" name="courtyard" id="courtyard" type="radio" value="no" checked>
                        <label class="form-check-label">{{__('No')}}</label>
                      </div>

                      @include('alerts.feedback', ['field' => 'courtyard'])
                    </div>
                  </div>
                  <div class="col-md-1 pr-2">
                    <div class="form-group">
                      <label >{{__("Heating")}}</label>
                      <div class="form-check">
                        <input class="form-check-input" name="heating" id="heating" type="radio" value="yes">
                        <label class="form-check-label">{{__('Yes')}}</label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" name="heating" id="heating" type="radio" value="no" checked>
                        <label class="form-check-label">{{__('No')}}</label>
                      </div>

                      @include('alerts.feedback', ['field' => 'heating'])
                    </div>
                  </div>
                  <div class="col-md-1 pr-2 pl-4">
                    <div class="form-group">
                      <label >{{__("Air Conditioning")}}</label>
                      <div class="form-check">
                        <input class="form-check-input" name="air_conditioning" id="air_conditioning" type="radio" value="yes">
                        <label class="form-check-label">{{__('Yes')}}</label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" name="air_conditioning" id="air_conditioning" type="radio" value="no" checked>
                        <label class="form-check-label">{{__('No')}}</label>
                      </div>

                      @include('alerts.feedback', ['field' => 'air_conditioning'])
                    </div>
                  </div>
                  <div class="col-md-1 pr-2">
                    <div class="form-group">
                      <label >{{__("Garden")}}</label>
                      <div class="form-check">
                        <input class="form-check-input" name="garden" id="garden" type="radio" value="yes">
                        <label class="form-check-label">{{__('Yes')}}</label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" name="garden" id="garden" type="radio" value="no" checked>
                        <label class="form-check-label">{{__('No')}}</label>
                      </div>

                      @include('alerts.feedback', ['field' => 'garden'])
                    </div>
                  </div>
                  <div class="col-md-1 pr-2">
                    <div class="form-group">
                      <label >{{__("Pool")}}</label>
                      <div class="form-check">
                        <input class="form-check-input" name="pool" id="pool" type="radio" value="yes">
                        <label class="form-check-label">{{__('Yes')}}</label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" name="pool" id="pool" type="radio" value="no" checked>
                        <label class="form-check-label">{{__('No')}}</label>
                      </div>

                      @include('alerts.feedback', ['field' => 'pool'])
                    </div>
                  </div>
                  <div class="col-md-1 pr-2">
                    <div class="form-group">
                      <label >{{__("Need Loan")}}</label>
                      <div class="form-check">
                        <input class="form-check-input" name="need_loan" id="need_loan" type="radio" value="yes">
                        <label class="form-check-label">{{__('Yes')}}</label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" name="need_loan" id="need_loan" type="radio" value="no" checked>
                        <label class="form-check-label">{{__('No')}}</label>
                      </div>

                      @include('alerts.feedback', ['field' => 'need_loan'])
                    </div>
                  </div>
                  <div class="col-md-8 pr-4">
                    <div class="form-group">
                      <label>{{__("Observations")}}</label>
                      <textarea name="observations" class="form-control" placeholder="Observations">{{ old('observations') }}</textarea>
                      @include('alerts.feedback', ['field' => 'observations'])
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
