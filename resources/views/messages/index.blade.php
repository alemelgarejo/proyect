@extends('layouts.app', [
'namePage' => 'My Messages',
'class' => 'sidebar-mini ',
'activePage' => 'messages',
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
                        <h4 class="card-title">{{ __('Not Readed') }}</h4>

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
                                    <th>{{ __('Message') }}</th>
                                    <th>{{ __('From') }}</th>
                                    <th>{{ __('Email') }}</th>
                                    <th>{{ __('Phone') }}</th>
                                    <th>{{ __('Estate') }}</th>
                                    <th class="disabled-sorting text-right">{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($not_readed as $nr)
                                    <tr>
                                        <td style="font-size: 11px">{{ $nr->message }}</td>
                                        <td>{{ $nr->user->first_name }} {{ $nr->user->last_name }}</td>
                                        <td>{{ $nr->user->email }} </td>
                                        <td>{{ $nr->user->phone }}</td>
                                        <td style="font-size: 11px">{{ $nr->estate->address }}</td>
                                        <td class="text-right">

                                            <a type="button" href="{{ route('messages.update2', $nr->id) }}"
                                                rel="tooltip" class="btn btn-warning btn-icon btn-sm "
                                                data-original-title="" title="Mark">
                                                <i class="now-ui-icons ui-1_check"></i>
                                            </a>
                                        </td>
                                    </tr>

                                @endforeach


                            </tbody>
                        </table>
                    </div>
                    <!-- end content-->
                    <div class="ml-3">
                        {{ $not_readed->links('pagination::bootstrap-4') }}
                    </div>
                </div>
                <!--  end card  -->
            </div>
            <!-- end col-md-12 -->
        </div>
        <!-- end row -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ __('Readed') }}</h4>

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
                                    <th>{{ __('Message') }}</th>
                                    <th>{{ __('From') }}</th>
                                    <th>{{ __('Email') }}</th>
                                    <th>{{ __('Phone') }}</th>
                                    <th>{{ __('Estate') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($readed as $r)
                                    <tr>
                                        <td style="font-size: 11px">{{ $r->message }}</td>
                                        <td>{{ $r->user->first_name }} {{ $r->user->last_name }}</td>
                                        <td>{{ $r->user->email }} </td>
                                        <td>{{ $r->user->phone }}</td>
                                        <td style="font-size: 11px">{{ $r->estate->address }}</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <!-- end content-->
                    <div class="ml-3">
                        {{ $readed->links('pagination::bootstrap-4') }}
                    </div>
                </div>
                <!--  end card  -->
            </div>
            <!-- end col-md-12 -->
        </div>
    </div>
@endsection
