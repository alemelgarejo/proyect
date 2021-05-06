@extends('layouts.app', [
'namePage' => 'Owner Management',
'class' => 'sidebar-mini ',
'activePage' => 'owners',
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
                            href="{{ route('owners.create') }}">{{ __('Add owner') }}</a>
                        <a class="btn btn-danger btn-round text-white pull-right btn-sm"
                            href="{{ route('owners.pdfOwners') }}">{{ __('PDF') }}</a>
                        <h4 class="card-title">{{ __('Owners') }}</h4>

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
                                <tr style="font-size: smaller">
                                    <th>Name</th>
                                    <th>Surname</th>
                                    <th>Email</th>
                                    <th>DNI</th>
                                    <th>Phone</th>
                                    <th>Real Estate</th>
                                    <th class="disabled-sorting text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($owners as $owner)
                                    <tr>
                                        <td>{{ $owner->first_name }}</td>
                                        <td>{{ $owner->last_name }}</td>
                                        <td>{{ $owner->email }}</td>
                                        <td>{{ $owner->dni }}</td>
                                        <td>{{ $owner->phone }}</td>
                                        <td>{{ $owner->user->first_name }} {{ $owner->user->last_name }}</td>
                                        <td class="text-right">
                                            @if ($owner->status == 1)
                                                <span
                                                    class="badge badge-success pull-left mt-2">{{ __('Active') }}</span>
                                            @elseif($owner->status == 0)
                                                <span
                                                    class="badge badge-danger pull-left mt-2">{{ __('Inactive') }}</span>
                                            @endif
                                            <a type="button" href="{{ route('owners.pdfOwner', $owner->id) }}"
                                                rel="tooltip" class="btn btn-danger btn-icon btn-sm " data-original-title=""
                                                title="PDF">
                                                <i class="now-ui-icons files_single-copy-04"></i>
                                            </a>
                                            <a type="button" href="{{ route('estates.create2', $owner->id) }}"
                                                rel="tooltip" class="btn btn-primary btn-icon btn-sm "
                                                data-original-title="" title="Add estate">
                                                <i class="now-ui-icons shopping_shop"></i>
                                            </a>
                                            <a type="button" href="{{ route('owners.edit', $owner->id) }}" rel="tooltip"
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
                        {{ $owners->links('pagination::bootstrap-4') }}
                    </div>
                </div>
                <!--  end card  -->
            </div>
            <!-- end col-md-12 -->
        </div>
        <!-- end row -->
    </div>
@endsection
