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
                        <a class="btn btn-primary btn-round text-white pull-right" style="background: #2CA8FF;"
                            href="{{ route('orders.create') }}">{{ __('Add order') }}</a>
                        <a class="btn btn-danger btn-round text-white pull-right"
                            href="{{ route('orders.pdfOrders') }}">{{ __('PDF') }}</a>
                        <h4 class="card-title">{{ __('My Orders') }}</h4>

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
                                    <th>{{ __('Customer') }}</th>
                                    <th>{{ __('Type') }}</th>
                                    <th>{{ __('City') }}</th>
                                    <th>{{ __('Max Value') }}</th>
                                    <th>{{ __('Min Surface') }}</th>
                                    <th>{{ __('Min Rooms') }}</th>
                                    <th>{{ __('Furnished') }}</th>
                                    <th class="disabled-sorting text-right">{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $order->customer->first_name }} {{ $order->customer->last_name }}</td>
                                        <td>{{ $order->type }}</td>
                                        <td>{{ $order->city }}</td>
                                        <td>{{ $order->max_value }} €</td>
                                        <td>{{ $order->min_surface }} m<sup>2</sup></td>
                                        <td>{{ $order->min_rooms }}</td>
                                        <td>
                                            @if ($order->furnished == 'no')
                                            {{ __('No') }} @elseif($order->furnished == 'yes')
                                                {{ __('Yes') }} @endif
                                        </td>
                                        <td class="text-right">
                                            <a type="button" href="{{ route('orders.pdfOrder', $order->id) }}"
                                                rel="tooltip" class="btn btn-danger btn-icon btn-sm " data-original-title=""
                                                title="PDF">
                                                <i class="now-ui-icons files_single-copy-04"></i>
                                            </a>
                                            <a type="button" href="{{ route('orders.edit', $order->id) }}" rel="tooltip"
                                                class="btn btn-success btn-icon btn-sm " data-original-title=""
                                                title="Edit">
                                                <i class="now-ui-icons ui-2_settings-90"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <!-- end content-->
                    <div class="ml-3">
                        {{ $orders->links('pagination::bootstrap-4') }}
                    </div>
                </div>
                <!--  end card  -->
            </div>
            <!-- end col-md-12 -->
        </div>
        <!-- end row -->
    </div>
@endsection
