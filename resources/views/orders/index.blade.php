@extends('layouts.app', [
'namePage' => 'Orders Management',
'class' => 'sidebar-mini ',
'activePage' => 'orders',
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
                        <a class="btn btn-info btn-round text-white pull-right btn-sm"
                            href="{{ route('orders.create') }}">{{ __('messages.Add order') }}</a>
                        <a class="btn btn-danger btn-round text-white pull-right btn-sm"
                            href="{{ route('orders.pdfOrders') }}">{{ __('PDF') }}</a>
                        <h4 class="card-title">{{ __('messages.Orders') }}</h4>

                        @include('alerts.success')
                        <div class="col-12 mt-2">
                        </div>
                    </div>
                    <div class="card-body table-responsive">
                        <div class="toolbar">
                            <!--        Here you can write extra buttons/actions for the toolbar              -->
                        </div>
                        <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr style="font-size: smaller">
                                    <th>{{ __('messages.Customer') }}</th>
                                    <th>{{ __('messages.Type') }}</th>
                                    <th>{{ __('messages.City') }}</th>
                                    <th>{{ __('messages.Max Value') }}</th>
                                    <th>{{ __('messages.Min Surface') }}</th>
                                    <th>{{ __('messages.Min Rooms') }}</th>
                                    <th>{{ __('messages.Furnished') }}</th>
                                    <th class="disabled-sorting text-right">{{ __('messages.Actions') }}</th>
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
                                            {{ __('messages.No') }} @elseif($order->furnished == 'yes')
                                                {{ __('messages.Yes') }} @endif
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
