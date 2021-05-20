<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<div class="container">
    <div class="row">
        <div class="col-12">
            <strong>{{ __('messages.Order') }}: {{ $order->id }}, {{ $order->customer->first_name }}
                {{ $order->customer->last_name }}</strong>
        </div>
    </div>
    <br>
    <table class="table table-bordered table-condensed">

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
                        <strong>{{ __('messages.Type') }}</strong>
                    </h6>
                    <span>{{ $order->type }}</span>
                </td>
            </tr>
            <tr>
                <td>
                    <h6>
                        <strong>{{ __('messages.City') }}</strong>
                    </h6>
                    <span>{{ $order->city }}</span>
                </td>
            </tr>
            <tr>
                <td>
                    <h6>
                        <strong>{{ __('messages.Min Value') }}</strong>
                    </h6>
                    <span>{{ $order->min_value }} €</span>
                </td>
            </tr>
            <tr>
                <td>
                    <h6>
                        <strong>{{ __('messages.Max Value') }}</strong>
                    </h6>
                    <span>{{ $order->max_value }} €</span>
                </td>
            </tr>
            <tr>
                <td>
                    <h6>
                        <strong>{{ __('messages.Min Surface') }}</strong>
                    </h6>
                    <span>{{ $order->min_surface }} m<sup>2</sup></span>
                </td>
            </tr>
            <tr>
                <td>
                    <h6>
                        <strong>{{ __('messages.Max Surface') }}</strong>
                    </h6>
                    <span>{{ $order->max_surface }} m<sup>2</sup></span>
                </td>
            </tr>
            <tr>
                <td>
                    <h6>
                        <strong>{{ __('messages.Min Rooms') }}</strong>
                    </h6>
                    <span>{{ $order->min_rooms }}</span>
                </td>
            </tr>
            <tr>
                <td>
                    <h6>
                        <strong>{{ __('messages.Max Rooms') }}</strong>
                    </h6>
                    <span>{{ $order->max_rooms }}</span>
                </td>
            </tr>
            <tr>
                <td>
                    <h6>
                        <strong>{{ __('messages.Furnished') }}</strong>
                    </h6>
                    <span>{{ ucwords($order->furnished) }}</span>
                </td>
            </tr>
            <tr>
                <td>
                    <h6>
                        <strong>{{ __('messages.Elevator') }}</strong>
                    </h6>
                    <span>{{ ucwords($order->elevator) }}</span>
                </td>
            </tr>
            <tr>
                <td>
                    <h6>
                        <strong>{{ __('messages.Garage') }}</strong>
                    </h6>
                    <span>{{ ucwords($order->garage) }}</span>
                </td>
            </tr>
            <tr>
                <td>
                    <h6>
                        <strong>{{ __('messages.Terraces') }}</strong>
                    </h6>
                    <span>{{ ucwords($order->terraces) }}</span>
                </td>
            </tr>
            <tr>
                <td>
                    <h6>
                        <strong>{{ __('messages.Courtyard') }}</strong>
                    </h6>
                    <span>{{ ucwords($order->courtyard) }}</span>
                </td>
            </tr>
            <tr>
                <td>
                    <h6>
                        <strong>{{ __('messages.Heating') }}</strong>
                    </h6>
                    <span>{{ ucwords($order->heating) }}</span>
                </td>
            </tr>
            <tr>
                <td>
                    <h6>
                        <strong>{{ __('messages.Air Conditioning') }}</strong>
                    </h6>
                    <span>{{ ucwords($order->air_conditioning) }}</span>
                </td>
            </tr>
            <tr>
                <td>
                    <h6>
                        <strong>{{ __('messages.Garden') }}</strong>
                    </h6>
                    <span>{{ ucwords($order->garden) }}</span>
                </td>
            </tr>
            <tr>
                <td>
                    <h6>
                        <strong>{{ __('messages.Pool') }}</strong>
                    </h6>
                    <span>{{ ucwords($order->pool) }}</span>
                </td>
            </tr>
            <tr>
                <td>
                    <h6>
                        <strong>{{ __('messages.Situation') }}</strong>
                    </h6>
                    <span>{{ $order->situation }}</span>
                </td>
            </tr>
            <tr>
                <td>
                    <h6>
                        <strong>{{ __('messages.Conservation') }}</strong>
                    </h6>
                    <span>{{ $order->conservation_state }}</span>
                </td>
            </tr>
            <tr>
                <td>
                    <h6>
                        <strong>{{ __('messages.Need Loan') }}</strong>
                    </h6>
                    <span>{{ ucwords($order->need_loan) }}</span>
                </td>
            </tr>
            <tr>
                <td>
                    <h6>
                        <strong>{{ __('messages.Observations') }}</strong>
                    </h6>
                    <span>{{ $order->observations }}</span>
                </td>
            </tr>
        </tbody>
    </table>
    <hr>
    <h6>
        <strong>{{ __('messages.Estates') }}</strong>
    </h6>
    <table class="table table-bordered table-condensed">
        <tbody>
            @foreach ($estates as $estate)
                <tr>
                    <td>
                        <strong>{{ __('messages.Type') }}: </strong><span>{{ $estate->type }}</span><br>
                        <strong>{{ __('messages.City') }}: </strong><span>{{ $estate->city }}</span><br>
                        <strong>{{ __('messages.Address') }}: </strong><span>{{ $estate->address }}</span><br>
                        <strong>{{ __('messages.Value') }}: </strong><span>{{ $estate->value }} €</span><br>
                        <strong>{{ __('messages.Surface') }}: </strong><span>{{ $estate->surface }}
                            m<sup>2</sup></span><br>
                        <strong>{{ __('messages.Rooms') }}: </strong><span>{{ $estate->rooms }}</span><br>
                        <strong>{{ __('messages.Baths') }}: </strong><span>{{ $estate->rooms }}</span><br>
                        <strong>{{ __('messages.Furnished') }}:
                        </strong><span>{{ ucwords($estate->furnished) }}</span><br>
                        <hr>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
