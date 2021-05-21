@extends('layouts.app', [
'namePage' => __('messages.Edit customer'),
'class' => 'sidebar-mini ',
'activePage' => 'my-customers',
'route' => route('customers.edit', $customer->id),
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
                        <a type="submit" class="btn btn-danger btn-round pull-right "
                            href="{{ route('customers.pdfCustomer', $customer->id) }}">{{ __('PDF') }}</a>
                        <h5 class="title">{{ __('messages.Edit Customer') }} {{ $customer->first_name }}
                            {{ $customer->last_name }}
                        </h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('customers.update', $customer->id) }}" autocomplete="off"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            @include('alerts.success')
                            <div class="row">
                            </div>
                            <div class="row">
                                <div class="col-md-4 pr-1">
                                    <div class="form-group">
                                        <label>{{ __('messages.First Name') }}</label>
                                        <input type="text" name="first_name" class="form-control" placeholder="First Name"
                                            value="{{ old('first_name', $customer->first_name) }}">
                                        @include('alerts.feedback', ['field' => 'first_name'])
                                    </div>
                                </div>
                                <div class="col-md-4 pr-1">
                                    <div class="form-group">
                                        <label>{{ __('messages.Last Name') }}</label>
                                        <input type="text" name="last_name" class="form-control" placeholder="Last Name"
                                            value="{{ old('last_name', $customer->last_name) }}">
                                        @include('alerts.feedback', ['field' => 'last_name'])
                                    </div>
                                </div>
                                <div class="col-md-4 pr-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">{{ __('messages.Email address') }}</label>
                                        <input type="email" name="email" class="form-control" placeholder="Email"
                                            value="{{ old('email', $customer->email) }}">
                                        @include('alerts.feedback', ['field' => 'email'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 pr-1">
                                    <div class="form-group">
                                        <label>{{ __('Status') }}</label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="1" {{ $customer->status == 1 ? 'selected' : '' }}>
                                                {{ __('Active') }}</option>
                                            <option value="0" {{ $customer->status == 0 ? 'selected' : '' }}>
                                                {{ __('Inactive') }}</option>
                                        </select>
                                        @include('alerts.feedback', ['field' => 'status'])
                                    </div>
                                </div>
                                <div class="col-md-4 pr-1">
                                    <div class="form-group">
                                        <label>{{ __('DNI') }}</label>
                                        <input type="text" name="dni" class="form-control" placeholder="DNI"
                                            value="{{ old('dni', $customer->dni) }}">
                                        @include('alerts.feedback', ['field' => 'dni'])
                                    </div>
                                </div>
                                <div class="col-md-4 pr-3">
                                    <div class="form-group">
                                        <label>{{ __('messages.Phone') }}</label>
                                        <input type="text" name="phone" class="form-control" placeholder="Phone"
                                            value="{{ old('phone', $customer->phone) }}">
                                        @include('alerts.feedback', ['field' => 'phone'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 pr-1">
                                    <div class="form-group">
                                        <label>{{ __('messages.Birthdate') }}</label>
                                        <input type="date" name="birthdate" class="form-control" placeholder="Birthdate"
                                            value="{{ old('birthdate', $customer->birthdate) }}">
                                        @include('alerts.feedback', ['field' => 'birthdate'])
                                    </div>
                                </div>
                                <div class="col-md-4 pr-1">
                                    <div class="form-group">
                                        <label>{{ __('messages.Address') }}</label>
                                        <input type="text" name="address" class="form-control" placeholder="Address"
                                            value="{{ old('address', $customer->address) }}">
                                        @include('alerts.feedback', ['field' => 'address'])
                                    </div>
                                </div>
                                <div class="col-md-4 pr-3">
                                    <div class="form-group">
                                        <label>{{ __('messages.City') }}</label>
                                        <input type="text" name="city" class="form-control" placeholder="City"
                                            value="{{ old('city', $customer->city) }}">
                                        @include('alerts.feedback', ['field' => 'city'])
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ">
                                <button type="submit" class="btn btn-info btn-round">{{ __('messages.Update') }}</button>
                                <a type="submit" class="btn btn-info btn-round"
                                    href="{{ route('orders.create2', $customer->id) }}">{{ __('messages.Make Order') }}</a>
                                <button id="delete" data-customerid="{{ $customer->id }}" type="button"
                                    class="btn btn-danger btn-round pull-right" @if (auth()->user()->role_id != 1 and auth()->user()->role_id != 2) disabled @endif>{{ __('messages.Delete') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h5 class="title">{{ $customer->first_name }} {{ $customer->last_name }}´s
                    {{ __('messages.Orders') }} </h5>
            </div>
            <div class="card-body table-responsive">
                <div class="toolbar">
                    <!--        Here you can write extra buttons/actions for the toolbar              -->
                </div>
                <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
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
                        @foreach ($customer->orders as $order)
                            <tr>
                                <td>{{ $order->customer->first_name }} {{ $order->customer->last_name }}</td>
                                <td>{{ $order->type }}</td>
                                <td>{{ $order->city }}</td>
                                <td>{{ $order->max_value }}</td>
                                <td>{{ $order->min_surface }}</td>
                                <td>{{ $order->min_rooms }}</td>
                                <td>
                                    @if ($order->furnished == 'no')
                                        {{ __('messages.No') }}
                                    @elseif($order->furnished == 'yes') {{ __('messages.Yes') }} @endif
                                </td>
                                <td class="text-right">
                                    <a type="button" href="{{ route('orders.edit', $order->id) }}" rel="tooltip"
                                        class="btn btn-success btn-icon btn-sm " data-original-title="" title="Edit">
                                        <i class="now-ui-icons ui-2_settings-90"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <div id="applicantDeleteModal" class="modal modal-danger fade" tabindex="-1" role="dialog"
        aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" style="width:55%;">
            <div class="modal-content">
                <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" class="remove-record-model">
                    {{ method_field('delete') }}
                    {{ csrf_field() }}

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <h4>{{ __('messages.Dou you want to delete this Customer?') }}</h4>
                        <input type="hidden" , name="id" id="customer_id">
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
            var customerID = $(this).attr('data-customerid');
            $('#customer_id').val(customerID);
            $('#applicantDeleteModal').modal('show');
        });

    </script>
@endsection
