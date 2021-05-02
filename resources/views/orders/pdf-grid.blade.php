<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<div class="container">
    <div class="row">
        <div class="col-12">
            <strong>{{ __('Orders') }}:</strong>
        </div>
    </div>
    <br>
    <table class="table table-bordered table-condensed">
        @foreach ($orders as $order)
            <tbody>
                <tr>
                    <td>
                        <h5>
                            <strong>{{ $order->customer->first_name }}
                                {{ $order->customer->last_name }}</strong>
                        </h5>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h6>
                            <strong>{{ __('Type') }}</strong>
                        </h6>
                        <span>{{ $order->type }}</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h6>
                            <strong>{{ __('City') }}</strong>
                        </h6>
                        <span>{{ $order->city }}</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h6>
                            <strong>{{ __('Estate Type') }}</strong>
                        </h6>
                        <span>{{ $order->estate_type }}</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h6>
                            <strong>{{ __('Max Value') }}</strong>
                        </h6>
                        <span>{{ $order->max_value }} €</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h6>
                            <strong>{{ __('Min Surface') }}</strong>
                        </h6>
                        <span>{{ $order->min_surface }} m<sup>2</sup></span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h6>
                            <strong>{{ __('Min Rooms') }}</strong>
                        </h6>
                        <span>{{ $order->min_rooms }}</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h6>
                            <strong>{{ __('Furnished') }}</strong>
                        </h6>
                        <span>{{ ucwords($order->furnished) }}</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h6>
                            <strong>{{ __('Garage') }}</strong>
                        </h6>
                        <span>{{ ucwords($order->garage) }}</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h6>
                            <strong>{{ __('Situation') }}</strong>
                        </h6>
                        <span>{{ $order->situation }}</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h6>
                            <strong>{{ __('Conservation State') }}</strong>
                        </h6>
                        <span>{{ $order->conservation_state }}</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h6>
                            <strong>{{ __('Observations') }}</strong>
                        </h6>
                        <span>{{ $order->observations }}</span>
                    </td>
                </tr>
            </tbody>
            <hr>
        @endforeach
    </table>
</div>
