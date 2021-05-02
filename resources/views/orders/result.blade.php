@extends('layouts.app', [
    'namePage' => 'Orders Management',
    'class' => 'sidebar-mini ',
    'activePage' => 'my-customers-orders',
    'backgroundImage' => asset('assets') . "/img/bg14.jpg",
])

@section('content')

  <div class="panel-header">
    </div>
    <div class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
                <a class="btn btn-primary btn-round text-white pull-right" style="background: #2CA8FF;" href="{{route('orders.index2')}}">{{__('Got to Orders')}}</a>
              <h4 class="card-title">{{__('My Order Result')}}</h4>

                 @include('alerts.success')
              <div class="col-12 mt-2">
                </div>
            </div>
            <div class="card-body">
              <div class="toolbar">
                <!--        Here you can write extra buttons/actions for the toolbar              -->
              </div>
              <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>{{__('Owner')}}</th>
                    <th>{{__('Type')}}</th>
                    <th>{{__('Address')}}</th>
                    <th>{{__('City')}}</th>
                    <th>{{__('Value')}}</th>
                    <th>{{__('Surface')}}</th>
                    <th>{{__('Rooms')}}</th>
                    <th>{{__('Furnished')}}</th>
                    <th>{{__('Wardrobe')}}</th>
                    <th class="disabled-sorting text-right">{{__('Actions')}}</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($estates as $estate)
                        <tr>
                            <td>{{$estate->owner->first_name}} {{$estate->owner->last_name}}</td>
                            <td>{{$estate->type}}</td>
                            <td>{{$estate->address}}</td>
                            <td>{{$estate->city}}</td>
                            <td>{{$estate->value}} €</td>
                            <td>{{$estate->surface}} m<sup>2</sup></td>
                            <td>{{$estate->rooms}}</td>
                            <td>@if($estate->furnished == 'no') {{__('No')}} @elseif($estate->furnished == 'yes') {{__('Yes')}} @endif</td>
                            <td>{{$estate->wardrobe}}</td>
                            <td class="text-right">
                                <a type="button" href="{{route('estates.edit', $estate->id)}}" rel="tooltip" class="btn btn-success btn-icon btn-sm " data-original-title="" title="Edit">
                                    <i class="now-ui-icons ui-2_settings-90"></i>
                                </a>{{--
                                <a type="button" href="{{route('actions.edit', $action->id)}}" rel="tooltip" class="btn btn-success btn-icon btn-sm " data-original-title="" title="Edit">
                                    <i class="now-ui-icons ui-2_settings-90"></i>
                                </a> --}}
                            </td>
                        </tr>
                    @endforeach

                </tbody>
              </table>
            </div>
            <!-- end content-->
            <div class="ml-3">
                {{$estates->links("pagination::bootstrap-4")}}
            </div>
          </div>
          <!--  end card  -->
        </div>
        <!-- end col-md-12 -->
      </div>
      <!-- end row -->
    </div>
@endsection
