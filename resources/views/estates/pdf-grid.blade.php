<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<div class="container">
    <div class="row">
        <div class="col-12">
            <strong>{{ __('Estates') }}:</strong>
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
                            <strong>{{ __('Type') }}</strong>
                        </h6>
                        <span>{{ $estate->type }}</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h6>
                            <strong>{{ __('City') }}</strong>
                        </h6>
                        <span>{{ $estate->city }}</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h6>
                            <strong>{{ __('Address') }}</strong>
                        </h6>
                        <span>{{ $estate->address }}</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h6>
                            <strong>{{ __('Estate Type') }}</strong>
                        </h6>
                        <span>{{ $estate->estate_type }}</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h6>
                            <strong>{{ __('Value') }}</strong>
                        </h6>
                        <span>{{ $estate->value }} €</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h6>
                            <strong>{{ __('Surface') }}</strong>
                        </h6>
                        <span>{{ $estate->surface }} m<sup>2</sup></span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h6>
                            <strong>{{ __('Rooms') }}</strong>
                        </h6>
                        <span>{{ $estate->rooms }}</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h6>
                            <strong>{{ __('Furnished') }}</strong>
                        </h6>
                        <span>{{ ucwords($estate->furnished) }}</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h6>
                            <strong>{{ __('Garage') }}</strong>
                        </h6>
                        <span>{{ ucwords($estate->garage) }}</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h6>
                            <strong>{{ __('Situation') }}</strong>
                        </h6>
                        <span>{{ $estate->situation }}</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h6>
                            <strong>{{ __('Conservation State') }}</strong>
                        </h6>
                        <span>{{ $estate->conservation_state }}</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h6>
                            <strong>{{ __('Description') }}</strong>
                        </h6>
                        <span>{{ $estate->description }}</span>
                    </td>
                </tr>
            </tbody>
            <hr>
        @endforeach
    </table>
</div>
