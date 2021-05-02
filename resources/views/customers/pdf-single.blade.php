<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<div class="container">
    <div class="row">
        <div class="col-12">
            <strong>{{ __('Customer') }}: {{ $customer->first_name }} {{ $customer->last_name }}</strong>
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
    </table>
    <hr>
    <h6>
        <strong>{{ __('Orders') }}</strong>
    </h6>
    <table class="table table-bordered table-condensed">
        <tbody>
            @foreach ($customer->orders as $order)
                <tr>
                    <td>
                        <strong>{{ __('Type') }}: </strong><span>{{ $order->type }}</span><br>
                        <strong>{{ __('City') }}: </strong><span>{{ $order->city }}</span><br>
                        <strong>{{ __('Max Value') }}: </strong><span>{{ $order->max_value }} €</span><br>
                        <strong>{{ __('Min Surface') }}: </strong><span>{{ $order->min_surface }}
                            m<sup>2</sup></span><br>
                        <strong>{{ __('Min Rooms') }}: </strong><span>{{ $order->min_rooms }}</span><br>
                        <strong>{{ __('Furnished') }}: </strong><span>{{ ucwords($order->furnished) }}</span><br>
                        <hr>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
