@extends('layouts.app', [
'namePage' => 'Owner Management',
'class' => 'sidebar-mini ',
'activePage' => 'my-owners',
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
                        <a class="btn btn-info btn-round text-white pull-right"
                            href="{{ route('owners.create') }}">{{ __('Add owner') }}</a>
                        <a class="btn btn-danger btn-round text-white pull-right"
                            href="{{ route('owners.pdfMyOwners') }}">{{ __('PDF') }}</a>
                        <h4 class="card-title">{{ __('My Owners') }}</h4>

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
                                    <th>{{ __('Name') }}</th>
                                    <th>{{ __('Surname') }}</th>
                                    <th>{{ __('Email') }}</th>
                                    <th>{{ __('DNI') }}</th>
                                    <th>{{ __('Phone') }}</th>
                                    <th class="disabled-sorting text-right">{{ __('Actions') }}</th>
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
                                        <td class="text-right">
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