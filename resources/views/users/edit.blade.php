@extends('layouts.app', [
'namePage' => 'Create user',
'class' => 'sidebar-mini ',
'activePage' => 'users',
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
                        <a class="btn btn-danger btn-round text-white pull-right btn-sm"
                            href="{{ route('user.pdfUser', $user->id) }}">{{ __('PDF') }}</a>
                        @if ($user->role_id == 2 or $user->role_id == 3)
                            <a class="btn btn-success btn-round text-white pull-right btn-sm"
                                href="{{ route('web.agent', $user->id) }}" target="__blank">{{ __('Web View') }}</a>
                        @endif
                        <h5 class="title">{{ __('Edit User') }} {{ $user->first_name }} {{ $user->last_name }}</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('user.update', $user->id) }}" autocomplete="off"
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
                                            value="{{ old('first_name', $user->first_name) }}">
                                        @include('alerts.feedback', ['field' => 'first_name'])
                                    </div>
                                </div>
                                <div class="col-md-4 pr-1">
                                    <div class="form-group">
                                        <label>{{ __(' Last Name') }}</label>
                                        <input type="text" name="last_name" class="form-control" placeholder="Last Name"
                                            value="{{ old('last_name', $user->last_name) }}">
                                        @include('alerts.feedback', ['field' => 'last_name'])
                                    </div>
                                </div>
                                <div class="col-md-4 pr-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">{{ __(' Email address') }}</label>
                                        <input type="email" name="email" class="form-control" placeholder="Email"
                                            value="{{ old('email', $user->email) }}">
                                        @include('alerts.feedback', ['field' => 'email'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 pr-1">
                                    <div class="form-group">
                                        <label>{{ __('Role') }}</label>
                                        <select name="role_id" id="role_id" class="form-control">
                                            <option value="1" {{ $user->role_id == 1 ? 'selected' : '' }}>Super Admin
                                            </option>
                                            <option value="2" {{ $user->role_id == 2 ? 'selected' : '' }}>Admin</option>
                                            <option value="3" {{ $user->role_id == 3 ? 'selected' : '' }}>Normal</option>
                                            <option value="4" {{ $user->role_id == 4 ? 'selected' : '' }}>Visitante
                                            </option>
                                        </select>
                                        @include('alerts.feedback', ['field' => 'role_id'])
                                    </div>
                                </div>
                                <div class="col-md-4 pr-1">
                                    <div class="form-group">
                                        <label>{{ __('DNI') }}</label>
                                        <input type="text" name="dni" class="form-control" placeholder="DNI"
                                            value="{{ old('dni', $user->dni) }}">
                                        @include('alerts.feedback', ['field' => 'dni'])
                                    </div>
                                </div>
                                <div class="col-md-4 pr-4">
                                    <div class="form-group">
                                        <label>{{ __('Comertial') }}</label>
                                        <input type="text" name="comertial" class="form-control" placeholder="Comertial"
                                            value="{{ old('comertial', $user->comertial) }}">
                                        @include('alerts.feedback', ['field' => 'comertial'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 pr-1">
                                    <div class="form-group">
                                        <label>{{ __('Phone') }}</label>
                                        <input type="text" name="phone" class="form-control" placeholder="Phone"
                                            value="{{ old('phone', $user->phone) }}">
                                        @include('alerts.feedback', ['field' => 'phone'])
                                    </div>
                                </div>
                                <div class="col-md-6 pr-4">
                                    <div class="form-group">
                                        <label>{{ __('Birthdate') }}</label>
                                        <input type="date" name="birthdate" class="form-control" placeholder="Birthdate"
                                            value="{{ old('birthdate', $user->birthdate) }}">
                                        @include('alerts.feedback', ['field' => 'birthdate'])
                                    </div>
                                </div>
                            </div>
                            <hr class="pr-4">
                            <div class="row">
                                <div class="col-md-12 pr-4">
                                    <div class="form-group">
                                        <label>{{ __('Description') }}</label>
                                        <textarea name="description" id="description" class="form-control"
                                            value="">{{ old('description', $user->description) }}</textarea>
                                        @include('alerts.feedback', ['field' => 'description'])
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-info pull-right btn-round btn-sm" type="button" data-toggle="collapse"
                                data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                <i class="now-ui-icons arrows-1_minimal-down"></i>
                            </button>
                            <div class="collapse" id="collapseExample">
                                <div class="row">
                                    <div class="col-md-4 pr-1">
                                        <div class="form-group">
                                            <label>{{ __('Facebook Link') }}</label>
                                            <input type="text" name="facebook_link" class="form-control"
                                                placeholder="Facebook Link"
                                                value="{{ old('facebook_link', $user->facebook_link) }}">
                                            @include('alerts.feedback', ['field' => 'facebook_link'])
                                        </div>
                                    </div>
                                    <div class="col-md-4 pr-1">
                                        <div class="form-group">
                                            <label>{{ __('Twitter Link') }}</label>
                                            <input type="text" name="twitter_link" class="form-control"
                                                placeholder="Twitter Link"
                                                value="{{ old('twitter_link', $user->twitter_link) }}">
                                            @include('alerts.feedback', ['field' => 'twitter_link'])
                                        </div>
                                    </div>
                                    <div class="col-md-4 pr-1">
                                        <div class="form-group">
                                            <label>{{ __('Instagram Link') }}</label>
                                            <input type="text" name="instagram_link" class="form-control"
                                                placeholder="Instagram Link"
                                                value="{{ old('instagram_link', $user->instagram_link) }}">
                                            @include('alerts.feedback', ['field' => 'instagram_link'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 pr-1">
                                        <div class="form-group">
                                            <label>{{ __('Pinterest Link') }}</label>
                                            <input type="text" name="pinterest_link" class="form-control"
                                                placeholder="Pinterest Link"
                                                value="{{ old('pinterest_link', $user->pinterest_link) }}">
                                            @include('alerts.feedback', ['field' => 'pinterest_link'])
                                        </div>
                                    </div>
                                    <div class="col-md-6 pr-4">
                                        <div class="form-group">
                                            <label>{{ __('Dribble Link') }}</label>
                                            <input type="text" name="dribble_link" class="form-control"
                                                placeholder="Dribble Link"
                                                value="{{ old('dribble_link', $user->facebook_link) }}">
                                            @include('alerts.feedback', ['field' => 'dribble_link'])
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ">
                                <button type="submit" class="btn btn-info btn-round btn-sm">{{ __('Update') }}</button>
                                <button id="delete" data-userid="{{ $user->id }}" type="button"
                                    class="btn btn-danger btn-round pull-right mr-4  btn-sm" @if (auth()->user()->role_id != 1 and auth()->user()->role_id != 2) disabled @endif>{{ __('Delete') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="title">{{ $user->first_name }} {{ $user->last_name }}´s {{ __('Customers') }}
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="toolbar">
                            <!--        Here you can write extra buttons/actions for the toolbar              -->
                        </div>
                        <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Surname</th>
                                    <th>Email</th>
                                    <th>DNI</th>
                                    <th>Phone</th>
                                    <th class="disabled-sorting text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user->customers as $customer)
                                    <tr>
                                        <td>{{ $customer->first_name }}</td>
                                        <td>{{ $customer->last_name }}</td>
                                        <td>{{ $customer->email }}</td>
                                        <td>{{ $customer->dni }}</td>
                                        <td>{{ $customer->phone }}</td>
                                        <td class="text-right">
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
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="title">{{ $user->first_name }} {{ $user->last_name }}´s {{ __('Owners') }} </h5>
                    </div>
                    <div class="card-body table-responsive">
                        <div class="toolbar">
                            <!--        Here you can write extra buttons/actions for the toolbar              -->
                        </div>
                        <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Surname</th>
                                    <th>Email</th>
                                    <th>DNI</th>
                                    <th>Phone</th>
                                    <th class="disabled-sorting text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user->owners as $owner)
                                    <tr>
                                        <td>{{ $owner->first_name }}</td>
                                        <td>{{ $owner->last_name }}</td>
                                        <td>{{ $owner->email }}</td>
                                        <td>{{ $owner->dni }}</td>
                                        <td>{{ $owner->phone }}</td>
                                        <td class="text-right">
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
                </div>
            </div>
        </div>
    </div>
    <div id="applicantDeleteModal" class="modal modal-danger fade" tabindex="-1" role="dialog"
        aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" style="width:55%;">
            <div class="modal-content">
                <form action="{{ route('user.destroy', $user->id) }}" method="POST" class="remove-record-model">
                    {{ method_field('delete') }}
                    {{ csrf_field() }}

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <h4>{{ __('Dou you want to delete this User?') }}</h4>
                        <input type="hidden" , name="id" id="user_id">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect btn-round btn-sm"
                            data-dismiss="modal">Close</button>
                        <button type="submit"
                            class="btn btn-danger waves-effect remove-data-from-delete-form btn-round btn-sm">Delete</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets') }}/js/core/jquery.min.js"></script>
    <script>
        $(document).on('click', '#delete', function() {
            var userID = $(this).attr('data-userid');
            $('#user_id').val(userID);
            $('#applicantDeleteModal').modal('show');
        });

    </script>

@endsection
