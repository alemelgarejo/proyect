<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<div class="container">
    <div class="row">
        <div class="col-12">
            <strong>{{ __('Customers') }}:</strong>
        </div>
    </div>
    <br>
    <table class="table table-bordered table-condensed">
        @foreach ($customers as $customer)
            <tbody>
                <tr>
                    <td>
                        <h5>
                            <strong>{{ $customer->first_name }}
                                {{ $customer->last_name }}</strong>
                        </h5>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h6>
                            <strong>{{ __('Email Address') }}</strong>
                        </h6>
                        <span>{{ $customer->email }}</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h6>
                            <strong>{{ __('Phone') }}</strong>
                        </h6>
                        <span>{{ $customer->phone }}</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h6>
                            <strong>{{ __('DNI') }}</strong>
                        </h6>
                        <span>{{ $customer->dni }}</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h6>
                            <strong>{{ __('Birthdate') }}</strong>
                        </h6>
                        <span>{{ $customer->birthdate }}</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h6>
                            <strong>{{ __('User') }}</strong>
                        </h6>
                        <span>{{ $customer->user->first_name }} {{ $customer->user->last_name }}</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h6>
                            <strong>{{ __('Address') }}</strong>
                        </h6>
                        <span>{{ $customer->address }}</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h6>
                            <strong>{{ __('City') }}</strong>
                        </h6>
                        <span>{{ $customer->city }}</span>
                    </td>
                </tr>
            </tbody>
            <hr>
        @endforeach
    </table>
</div>
