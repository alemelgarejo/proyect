<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<div class="container">
    <div class="row">
        <div class="col-12">
            <strong>{{ __('messages.Estates') }}:</strong>
        </div>
    </div>
    <br>
    <table class="table table-bordered table-condensed">
        @foreach ($estates as $estate)
            <tbody>
                <tr>
                    <td>
                        <h5>
                            <strong>{{ $estate->owner->first_name }}
                                {{ $estate->owner->last_name }}</strong>
                        </h5>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h6>
                            <strong>{{ __('messages.Type') }}</strong>
                        </h6>
                        <span>{{ $estate->type }}</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h6>
                            <strong>{{ __('messages.City') }}</strong>
                        </h6>
                        <span>{{ $estate->city }}</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h6>
                            <strong>{{ __('messages.Address') }}</strong>
                        </h6>
                        <span>{{ $estate->address }}</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h6>
                            <strong>{{ __('messages.Interest Type') }}</strong>
                        </h6>
                        <span>{{ $estate->interest_type }}</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h6>
                            <strong>{{ __('messages.Value') }}</strong>
                        </h6>
                        <span>{{ $estate->value }} €</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h6>
                            <strong>{{ __('messages.Surface') }}</strong>
                        </h6>
                        <span>{{ $estate->surface }} m<sup>2</sup></span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h6>
                            <strong>{{ __('messages.Rooms') }}</strong>
                        </h6>
                        <span>{{ $estate->rooms }}</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h6>
                            <strong>{{ __('messages.Furnished') }}</strong>
                        </h6>
                        <span>{{ ucwords($estate->furnished) }}</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h6>
                            <strong>{{ __('messages.Garage') }}</strong>
                        </h6>
                        <span>{{ ucwords($estate->garage) }}</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h6>
                            <strong>{{ __('messages.Situation') }}</strong>
                        </h6>
                        <span>{{ $estate->situation }}</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h6>
                            <strong>{{ __('messages.Conservation State') }}</strong>
                        </h6>
                        <span>{{ $estate->conservation_state }}</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h6>
                            <strong>{{ __('messages.Description') }}</strong>
                        </h6>
                        <span>{{ $estate->description }}</span>
                    </td>
                </tr>
            </tbody>
            <hr>
        @endforeach
    </table>
</div>
