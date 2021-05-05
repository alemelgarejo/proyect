@extends('layouts.app', [
'namePage' => 'My Estates Management',
'class' => 'sidebar-mini ',
'activePage' => 'my-estates',
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
                            href="{{ route('estates.create') }}">{{ __('Add estate') }}</a>
                        <a class="btn btn-danger btn-round text-white pull-right"
                            href="{{ route('estates.pdfMyEstates') }}">{{ __('PDF') }}</a>
                        <h4 class="card-title">{{ __('My Estates') }}</h4>

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
                                    <th>{{ __('Owner') }}</th>
                                    <th>{{ __('Value') }}</th>
                                    <th>{{ __('Address') }}</th>
                                    <th>{{ __('City') }}</th>
                                    <th>{{ __('Surface') }}</th>
                                    <th>{{ __('Rooms') }}</th>
                                    <th>{{ __('Baths') }}</th>
                                    <th>{{ __('Published') }}</th>
                                    <th class="disabled-sorting text-right">{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($estates as $estate)
                                    <tr>
                                        <td>{{ $estate->owner->first_name }} {{ $estate->owner->last_name }}</td>
                                        <td>{{ $estate->value }} €</td>
                                        <td>{{ $estate->address }}</td>
                                        <td>{{ $estate->city }}</td>
                                        <td>{{ $estate->surface }} m<sup>2</sup></td>
                                        <td>{{ $estate->rooms }}</td>
                                        <td>{{ $estate->baths }}</td>
                                        <td>
                                            <div style="display:flex">
                                                @if ($estate->published == 'yes')
                                                    <span class="badge badge-success text-center">
                                                        <div class="mt-2">{{ __('Yes') }}</div>
                                                    </span>
                                                @elseif($estate->published == 'no')
                                                    <span class="badge badge-danger text-center">
                                                        <div class="mt-2">{{ __('No') }}</div>
                                                    </span>
                                                @endif
                                                <form action="{{ route('estates.publish', $estate->id) }}" method="post"
                                                    class="ml-2">
                                                    @csrf
                                                    @method('PUT')
                                                    <button class="btn btn-info btn-icon btn-sm" type="submit" rel="tooltip"
                                                        title="Publish/Unpublish"><i
                                                            class="now-ui-icons arrows-1_share-66"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            @if ($estate->status == 1)
                                                <span
                                                    class="badge badge-success pull-left mt-2">{{ __('Active') }}</span>
                                            @elseif($estate->status == 0)
                                                <span
                                                    class="badge badge-danger pull-left mt-2">{{ __('Inactive') }}</span>
                                            @endif
                                            <a type="button" href="{{ route('estates.pdfEstate', $estate->id) }}"
                                                rel="tooltip" class="btn btn-danger btn-icon btn-sm " data-original-title=""
                                            title="PDF" @if (auth()->user()->role_id == 1 or auth()->user()->role_id == 2) @elseif(auth()->user()->role_id != 1 and auth()->user()->role_id != 2)






                                                                    @if (auth()->user()->id !=$estate->owner->user_id)
                                                disabled @endif
                                @endif>
                                <i class="now-ui-icons files_single-copy-04"></i>
                                </a>
                                <a type="button" href="{{ route('images.index2', $estate->id) }}" rel="tooltip"
                                class="btn btn-primary btn-icon btn-sm " data-original-title="" title="Images" @if (auth()->user()->role_id == 1 or auth()->user()->role_id == 2) @elseif(auth()->user()->role_id != 1 and auth()->user()->role_id != 2)



                                                                            @if (auth()->user()->id !=$estate->owner->user_id)
                                    disabled @endif
                                    @endif>
                                    <i class="now-ui-icons design_image"></i>
                                </a>
                                <a type="button" href="{{ route('estates.edit', $estate->id) }}" rel="tooltip"
                                    class="btn btn-success btn-icon btn-sm " data-original-title="" title="Edit">
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
                        {{ $estates->links('pagination::bootstrap-4') }}
                    </div>
                </div>
                <!--  end card  -->
            </div>
            <!-- end col-md-12 -->
        </div>
        <!-- end row -->
    </div>
@endsection
