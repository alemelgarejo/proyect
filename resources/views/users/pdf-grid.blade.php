<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<div class="container">
    <div class="row">
        <div class="col-12">
            <strong>{{ __('Users') }}:</strong>
        </div>
    </div>
    <br>
    <table class="table table-bordered table-condensed">
        @foreach ($users as $user)
            <tbody>
                <tr>
                    <td>
                        <h5>
                            <strong>{{ $user->first_name }} {{ $user->last_name }}</strong>
                        </h5>
                    </td>
                </tr>
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
            <hr>
        @endforeach

    </table>
</div>
