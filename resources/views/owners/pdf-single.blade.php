<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<div class="container">
    <div class="row">
        <div class="col-12">
            <strong>{{ __('Owner') }}: {{ $owner->first_name }} {{ $owner->last_name }}</strong>
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
                    <span>{{ $owner->email }}</span>
                </td>
            </tr>
            <tr>
                <td>
                    <h6>
                        <strong>{{ __('Phone') }}</strong>
                    </h6>
                    <span>{{ $owner->phone }}</span>
                </td>
            </tr>
            <tr>
                <td>
                    <h6>
                        <strong>{{ __('DNI') }}</strong>
                    </h6>
                    <span>{{ $owner->dni }}</span>
                </td>
            </tr>
            <tr>
                <td>
                    <h6>
                        <strong>{{ __('Birthdate') }}</strong>
                    </h6>
                    <span>{{ $owner->birthdate }}</span>
                </td>
            </tr>
            <tr>
                <td>
                    <h6>
                        <strong>{{ __('User') }}</strong>
                    </h6>
                    <span>{{ $owner->user->first_name }} {{ $owner->user->last_name }}</span>
                </td>
            </tr>
            <tr>
                <td>
                    <h6>
                        <strong>{{ __('Address') }}</strong>
                    </h6>
                    <span>{{ $owner->address }}</span>
                </td>
            </tr>
            <tr>
                <td>
                    <h6>
                        <strong>{{ __('City') }}</strong>
                    </h6>
                    <span>{{ $owner->city }}</span>
                </td>
            </tr>
        </tbody>
    </table>
    <hr>
    <h6>
        <strong>{{ __('Estates') }}</strong>
    </h6>
    <table class="table table-bordered table-condensed">
        <tbody>
            @foreach ($owner->estates as $estate)
                <tr>
                    <td>
                        <strong>{{ __('Type') }}: </strong><span>{{ $estate->type }}</span><br>
                        <strong>{{ __('City') }}: </strong><span>{{ $estate->city }}</span><br>
                        <strong>{{ __('Address') }}: </strong><span>{{ $estate->address }}</span><br>
                        <strong>{{ __('Value') }}: </strong><span>{{ $estate->value }} €</span><br>
                        <strong>{{ __('Surface') }}: </strong><span>{{ $estate->surface }}
                            m<sup>2</sup></span><br>
                        <strong>{{ __('Rooms') }}: </strong><span>{{ $estate->rooms }}</span><br>
                        <strong>{{ __('Baths') }}: </strong><span>{{ $estate->rooms }}</span><br>
                        <strong>{{ __('Furnished') }}: </strong><span>{{ ucwords($estate->furnished) }}</span><br>
                        <hr>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
