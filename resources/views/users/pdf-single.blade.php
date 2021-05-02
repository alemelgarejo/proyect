<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<div class="container">
    <div class="row">
        <div class="col-12">
            <strong>{{ __('User') }}: {{ $user->first_name }} {{ $user->last_name }}</strong>
        </div>
    </div>
    <br>
    <table class="table table-bordered table-condensed">
        <tbody>
            <tr>
                <td>
                    <h6>
                        <strong>{{ __('Email Address') }}</strong>
                    </h6>
                    <span>{{ $user->email }}</span>
                </td>
            </tr>
            <tr>
                <td>
                    <h6>
                        <strong>{{ __('Phone') }}</strong>
                    </h6>
                    <span>{{ $user->phone }}</span>
                </td>
            </tr>
            <tr>
                <td>
                    <h6>
                        <strong>{{ __('DNI') }}</strong>
                    </h6>
                    <span>{{ $user->dni }}</span>
                </td>
            </tr>
            <tr>
                <td>
                    <h6>
                        <strong>{{ __('Comertial') }}</strong>
                    </h6>
                    <span>{{ $user->comertial }}</span>
                </td>
            </tr>
            <tr>
                <td>
                    <h6>
                        <strong>{{ __('Birthdate') }}</strong>
                    </h6>
                    <span>{{ $user->birthdate }}</span>
                </td>
            </tr>
            <tr>
                <td>
                    <h6>
                        <strong>{{ __('Role') }}</strong>
                    </h6>
                    <span>{{ $user->role->name }}</span>
                </td>
            </tr>



        </tbody>
    </table>
    <hr>
    <h6>
        <strong>{{ __('Customers') }}</strong>
    </h6>
    <table class="table table-bordered table-condensed">
        <tbody>
            @foreach ($user->customers as $customer)
                <tr>
                    <td>
                        <strong>{{ __('Full Name') }}: </strong><span>{{ $customer->first_name }}
                            {{ $customer->last_name }}</span><br>
                        <strong>{{ __('DNI') }}: </strong><span>{{ $customer->dni }}</span><br>
                        <strong>{{ __('Email') }}: </strong><span>{{ $customer->email }}</span><br>
                        <strong>{{ __('Phone') }}: </strong><span>{{ $customer->phone }}</span><br>
                        <strong>{{ __('Birthdate') }}:
                        </strong><span>{{ \Carbon\Carbon::parse($customer->birthdate)->format('d/m/Y') }}</span>
                        <hr>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <hr>
    <h6>
        <strong>{{ __('Owners') }}</strong>
    </h6>
    <table class="table table-bordered table-condensed">
        <tbody>
            @foreach ($user->owners as $owner)
                <tr>
                    <td>
                        <strong>{{ __('Full Name') }}: </strong><span>{{ $owner->first_name }}
                            {{ $owner->last_name }}</span><br>
                        <strong>{{ __('DNI') }}: </strong><span>{{ $owner->dni }}</span><br>
                        <strong>{{ __('Email') }}: </strong><span>{{ $owner->email }}</span><br>
                        <strong>{{ __('Phone') }}: </strong><span>{{ $owner->phone }}</span><br>
                        <strong>{{ __('Birthdate') }}:
                        </strong><span>{{ \Carbon\Carbon::parse($owner->birthdate)->format('d/m/Y') }}</span>
                        <hr>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
