@extends('layouts.app', [
'namePage' => 'Edit owner',
'class' => 'sidebar-mini ',
'activePage' => 'my-owners',
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
                        <a href="{{ route('owners.pdfOwner', $owner->id) }}"
                            class="btn btn-danger btn-round pull-right btn-sm">{{ __('PDF') }}</a>
                        <h5 class="title">{{ __('Edit Owner') }} {{ $owner->first_name }} {{ $owner->last_name }}</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('owners.update', $owner->id) }}" autocomplete="off"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            @include('alerts.success')
                            <div class="row">
                            </div>
                            <div class="row">
                                <div class="col-md-4 pr-1">
                                    <div class="form-group">
                                        <label>{{ __(' First Name') }}</label>
                                        <input type="text" name="first_name" class="form-control" placeholder="First Name"
                                            value="{{ old('first_name', $owner->first_name) }}">
                                        @include('alerts.feedback', ['field' => 'first_name'])
                                    </div>
                                </div>
                                <div class="col-md-4 pr-1">
                                    <div class="form-group">
                                        <label>{{ __(' Last Name') }}</label>
                                        <input type="text" name="last_name" class="form-control" placeholder="Last Name"
                                            value="{{ old('last_name', $owner->last_name) }}">
                                        @include('alerts.feedback', ['field' => 'last_name'])
                                    </div>
                                </div>
                                <div class="col-md-4 pr-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">{{ __(' Email address') }}</label>
                                        <input type="email" name="email" class="form-control" placeholder="Email"
                                            value="{{ old('email', $owner->email) }}">
                                        @include('alerts.feedback', ['field' => 'email'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 pr-1">
                                    <div class="form-group">
                                        <label>{{ __('Status') }}</label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="1" {{ $owner->status == 1 ? 'selected' : '' }}>Activo</option>
                                            <option value="0" {{ $owner->status == 0 ? 'selected' : '' }}>Inactivo
                                            </option>
                                        </select>
                                        @include('alerts.feedback', ['field' => 'status'])
                                    </div>
                                </div>
                                <div class="col-md-4 pr-1">
                                    <div class="form-group">
                                        <label>{{ __('DNI') }}</label>
                                        <input type="text" name="dni" class="form-control" placeholder="DNI"
                                            value="{{ old('dni', $owner->dni) }}">
                                        @include('alerts.feedback', ['field' => 'dni'])
                                    </div>
                                </div>
                                <div class="col-md-4 pr-3">
                                    <div class="form-group">
                                        <label>{{ __('Phone') }}</label>
                                        <input type="text" name="phone" class="form-control" placeholder="Phone"
                                            value="{{ old('phone', $owner->phone) }}">
                                        @include('alerts.feedback', ['field' => 'phone'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 pr-1">
                                    <div class="form-group">
                                        <label>{{ __('Birthdate') }}</label>
                                        <input type="date" name="birthdate" class="form-control" placeholder="Birthdate"
                                            value="{{ old('birthdate', $owner->birthdate) }}">
                                        @include('alerts.feedback', ['field' => 'birthdate'])
                                    </div>
                                </div>
                                <div class="col-md-4 pr-1">
                                    <div class="form-group">
                                        <label>{{ __('Address') }}</label>
                                        <input type="text" name="address" class="form-control" placeholder="Address"
                                            value="{{ old('address', $owner->address) }}">
                                        @include('alerts.feedback', ['field' => 'address'])
                                    </div>
                                </div>
                                <div class="col-md-4 pr-3">
                                    <div class="form-group">
                                        <label>{{ __('City') }}</label>
                                        <input type="text" name="city" class="form-control" placeholder="City"
                                            value="{{ old('city', $owner->city) }}">
                                        @include('alerts.feedback', ['field' => 'city'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 pr-4">
                                    <div class="form-group">
                                        <label>{{ __('Observations') }}</label>
                                        <textarea name="observations" class="form-control"
                                            placeholder="Observations">{{ old('observations', $owner->observations) }}</textarea>
                                        @include('alerts.feedback', ['field' => 'observations'])
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ">
                                <button type="submit" class="btn btn-info btn-round btn-sm">{{ __('Update') }}</button>
                                <a href="{{ route('estates.create2', $owner->id) }}"
                                    class="btn btn-info btn-round btn-sm">{{ __('Add estate') }}</a>
                                <button id="delete" data-ownerid="{{ $owner->id }}" type="button"
                                    class="btn btn-danger btn-round pull-right btn-sm" @if (auth()->user()->role_id != 1 and auth()->user()->role_id != 2) disabled @endif>{{ __('Delete') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h5 class="title">{{ $owner->first_name }} {{ $owner->last_name }}´s {{ __('Estates') }} </h5>
            </div>
            <div class="card-body">
                <div class="toolbar">
                    <!--        Here you can write extra buttons/actions for the toolbar              -->
                </div>
                <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>{{ __('Owner') }}</th>
                            <th>{{ __('Value') }}</th>
                            <th>{{ __('Address') }}</th>
                            <th>{{ __('City') }}</th>
                            <th>{{ __('Surface') }}</th>
                            <th>{{ __('Rooms') }}</th>
                            <th>{{ __('Baths') }}</th>
                            <th class="disabled-sorting text-right">{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($owner->estates as $estate)
                            <tr>
                                <td>{{ $estate->owner->first_name }} {{ $estate->owner->last_name }}</td>
                                <td>{{ $estate->value }} €</td>
                                <td>{{ $estate->address }}</td>
                                <td>{{ $estate->city }}</td>
                                <td>{{ $estate->surface }} m<sup>2</sup></td>
                                <td>{{ $estate->rooms }}</td>
                                <td>{{ $estate->baths }}</td>
                                <td class="text-right">
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
        </div>
    </div>
    <div id="applicantDeleteModal" class="modal modal-danger fade" tabindex="-1" role="dialog"
        aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" style="width:55%;">
            <div class="modal-content">
                <form action="{{ route('owners.destroy', $owner->id) }}" method="POST" class="remove-record-model">
                    {{ method_field('delete') }}
                    {{ csrf_field() }}

                    <div class="modal-header">
                        <h5>{{ __('Owner') }} {{ $owner->first_name }} {{ $owner->last_name }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <h4>{{ __('Dou you want to delete this owner?') }}</h4>
                        <p>{{ __('Corresponding to') }} {{ $owner->user->first_name }}
                            {{ $owner->user->last_name }}</p>
                        <input type="hidden" , name="id" id="owner_id">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect btn-round btn-sm"
                            data-dismiss="modal">{{ __('Close') }}</button>
                        <button type="submit"
                            class="btn btn-danger waves-effect remove-data-from-delete-form btn-round  btn-sm">{{ __('Delete') }}</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets') }}/js/core/jquery.min.js"></script>
    <script>
        $(document).on('click', '#delete', function() {
            var ownerID = $(this).attr('data-ownerid');
            $('#owner_id').val(ownerID);
            $('#applicantDeleteModal').modal('show');
        });

    </script>
@endsection
