@extends('layouts.app', [
'namePage' => 'Customer Management',
'class' => 'sidebar-mini ',
'activePage' => 'customers',
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
                            href="{{ route('customers.create') }}">{{ __('messages.Add customer') }}</a>
                        <a class="btn btn-danger btn-round text-white pull-right btn-sm"
                            href="{{ route('customers.pdfCustomers') }}">{{ __('PDF') }}</a>
                        <h4 class="card-title">{{ __('messages.Customers') }}</h4>

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
                                    <th>{{ __('messages.Name') }}</th>
                                    <th>{{ __('messages.Surname') }}</th>
                                    <th>{{ __('messages.Email') }}</th>
                                    <th>{{ __('messages.DNI') }}</th>
                                    <th>{{ __('messages.Phone') }}</th>
                                    <th>{{ __('messages.Real Estate') }}</th>
                                    <th class="disabled-sorting text-right">{{ __('messages.Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customers as $customer)
                                    <tr>
                                        <td>{{ $customer->first_name }}</td>
                                        <td>{{ $customer->last_name }}</td>
                                        <td>{{ $customer->email }}</td>
                                        <td>{{ $customer->dni }}</td>
                                        <td>{{ $customer->phone }}</td>
                                        <td>{{ $customer->user->first_name }} {{ $customer->user->last_name }}</td>
                                        <td class="text-right">
                                            @if ($customer->status == 1)
                                                <span
                                                    class="badge badge-success pull-left mt-2">{{ __('messages.Active') }}</span>
                                            @elseif($customer->status == 0)
                                                <span
                                                    class="badge badge-danger pull-left mt-2">{{ __('messages.Inactive') }}</span>
                                            @endif
                                            <a type="button" href="{{ route('customers.pdfCustomer', $customer->id) }}"
                                                rel="tooltip" class="btn btn-danger btn-icon btn-sm " data-original-title=""
                                                title="PDF">
                                                <i class="now-ui-icons files_single-copy-04"></i>
                                            </a>
                                            <a type="button" href="{{ route('customers.edit', $customer->id) }}"
                                                rel="tooltip" class="btn btn-success btn-icon btn-sm "
                                                data-original-title="" title="Edit">
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
                        {{ $customers->links('pagination::bootstrap-4') }}
                    </div>
                </div>
                <!--  end card  -->
            </div>
            <!-- end col-md-12 -->
        </div>
        <!-- end row -->
    </div>
@endsection
