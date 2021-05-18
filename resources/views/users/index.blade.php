@extends('layouts.app', [
'namePage' => 'User Management',
'class' => 'sidebar-mini ',
'activePage' => 'users',
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
                            href="{{ route('user.create') }}">{{ __('Add
                            user') }}</a>
                        <a class="btn btn-danger btn-round text-white pull-right btn-sm"
                            href="{{ route('user.pdfUsers') }}">{{ __('PDF') }}</a>
                        <h4 class="card-title">{{ __('Users') }}</h4>

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
                                    <th>{{ __('Name') }}</th>
                                    <th>{{ __('Surname') }}</th>
                                    <th>{{ __('Email') }}</th>
                                    <th>{{ __('DNI') }}</th>
                                    <th>{{ __('Phone') }}</th>
                                    <th>{{ __('Role') }}</th>
                                    <th class="disabled-sorting text-right">{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->first_name }}</td>
                                        <td>{{ $user->last_name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->dni }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td>
                                            @if ($user->role->id == 1)
                                                <span class="badge badge-danger">{{ $user->role->name }}</span>
                                            @elseif ($user->role->id == 2)
                                                <span class="badge badge-primary">{{ $user->role->name }}</span>
                                            @elseif ($user->role->id == 3)
                                                <span class="badge badge-warning">{{ $user->role->name }}</span>
                                            @elseif ($user->role->id == 4)
                                                <span class="badge badge-secondary">{{ $user->role->name }}</span>
                                            @endif
                                        </td>
                                        <td class="text-right">
                                            @if (auth()->user()->role_id != 1 and $user->role->id == 1)

                                            @else
                                                <a type="button" href="{{ route('user.pdfUser', $user->id) }}"
                                                    rel="tooltip" class="btn btn-danger btn-icon btn-sm "
                                                    data-original-title="" title="PDF">
                                                    <i class="now-ui-icons files_single-copy-04"></i>
                                                </a>
                                                <a type="button" href="{{ route('user.edit', $user->id) }}" rel="tooltip"
                                                    class="btn btn-success btn-icon btn-sm " data-original-title=""
                                                    title="Edit">
                                                    <i class="now-ui-icons ui-2_settings-90"></i>
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <!-- end content-->
                    <div class="ml-3">
                        {{ $users->links('pagination::bootstrap-4') }}
                    </div>
                </div>
                <!--  end card  -->
            </div>
            <!-- end col-md-12 -->
        </div>
        <!-- end row -->
    </div>
@endsection
