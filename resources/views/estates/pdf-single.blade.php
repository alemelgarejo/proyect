<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<div class="container">
    <div class="row">
        <div class="col-12">
            <strong>{{ __('messages.Estate') }}: {{ $estate->id }}, {{ $estate->owner->first_name }}
                {{ $estate->owner->last_name }}</strong>
        </div>
    </div>
    <br>
    <table class="table table-bordered table-condensed">

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
                        <strong>{{ __('messages.tatus') }}</strong>
                    </h6>
                    <span>{{ $estate->status }}</span>
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
                        <strong>{{ __('messages.Interest Type') }}</strong>
                    </h6>
                    <span>{{ $estate->interest_type }}</span>
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
                        <strong>{{ __('messages.Built Surface') }}</strong>
                    </h6>
                    <span>{{ $estate->built_surface }} m<sup>2</sup></span>
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
                        <strong>{{ __('messages.Baths') }}</strong>
                    </h6>
                    <span>{{ $estate->baths }}</span>
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
                        <strong>{{ __('messages.Wardrobe') }}</strong>
                    </h6>
                    <span>{{ ucwords($estate->wardrobe) }}</span>
                </td>
            </tr>
            <tr>
                <td>
                    <h6>
                        <strong>{{ __('messages.Lobbies') }}</strong>
                    </h6>
                    <span>{{ $estate->lobbies }}</span>
                </td>
            </tr>
            <tr>
                <td>
                    <h6>
                        <strong>{{ __('messages.Lobbies Surface') }}</strong>
                    </h6>
                    <span>{{ $estate->lobbies_surface }} m<sup>2</sup></span>
                </td>
            </tr>
            <tr>
                <td>
                    <h6>
                        <strong>{{ __('messages.S. Dining Room') }}</strong>
                    </h6>
                    <span>{{ ucwords($estate->separate_dining_room) }}</span>
                </td>
            </tr>
            <tr>
                <td>
                    <h6>
                        <strong>{{ __('messages.D. Room Surface') }}</strong>
                    </h6>
                    <span>{{ $estate->dining_room_surface }} m<sup>2</sup></span>
                </td>
            </tr>
            <tr>
                <td>
                    <h6>
                        <strong>{{ __('messages.Furnished Kitchen') }}</strong>
                    </h6>
                    <span>{{ ucwords($estate->furnished_kitchen) }}</span>
                </td>
            </tr>
            <tr>
                <td>
                    <h6>
                        <strong>{{ __('messages.Kitchen Type') }}</strong>
                    </h6>
                    <span>{{ $estate->kitchen_type }} </span>
                </td>
            </tr>
            <tr>
                <td>
                    <h6>
                        <strong>{{ __('messages.Terraces') }}</strong>
                    </h6>
                    <span>{{ $estate->terraces }}</span>
                </td>
            </tr>
            <tr>
                <td>
                    <h6>
                        <strong>{{ __('messages.Terraces Surface') }}</strong>
                    </h6>
                    <span>{{ $estate->terraces_surface }} m<sup>2</sup></span>
                </td>
            </tr>
            <tr>
                <td>
                    <h6>
                        <strong>{{ __('messages.Balcony') }}</strong>
                    </h6>
                    <span>{{ ucwords($estate->balcony) }}</span>
                </td>
            </tr>
            <tr>
                <td>
                    <h6>
                        <strong>{{ __('messages.Balcony Surface') }}</strong>
                    </h6>
                    <span>{{ $estate->balcony_surface }} m<sup>2</sup></span>
                </td>
            </tr>
            <tr>
                <td>
                    <h6>
                        <strong>{{ __('messages.Courtyard') }}</strong>
                    </h6>
                    <span>{{ ucwords($estate->courtyard) }}</span>
                </td>
            </tr>
            <tr>
                <td>
                    <h6>
                        <strong>{{ __('messages.Courtyard Surface') }}</strong>
                    </h6>
                    <span>{{ $estate->courtyard_surface }} m<sup>2</sup></span>
                </td>
            </tr>
            <tr>
                <td>
                    <h6>
                        <strong>{{ __('messages.Ceiling Height') }}</strong>
                    </h6>
                    <span>{{ $estate->ceiling_height }} m</span>
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
                        <strong>{{ __('messages.Garage Surface') }}</strong>
                    </h6>
                    <span>{{ $estate->garage_surface }} m<sup>2</sup></span>
                </td>
            </tr>
            <tr>
                <td>
                    <h6>
                        <strong>{{ __('messages.Storage Room') }}</strong>
                    </h6>
                    <span>{{ ucwords($estate->storage_room) }}</span>
                </td>
            </tr>
            <tr>
                <td>
                    <h6>
                        <strong>{{ __('messages.Storage Room Surface') }}</strong>
                    </h6>
                    <span>{{ $estate->storage_room_surface }} m<sup>2</sup></span>
                </td>
            </tr>
            <tr>
                <td>
                    <h6>
                        <strong>{{ __('messages.Basement') }}</strong>
                    </h6>
                    <span>{{ ucwords($estate->basement) }}</span>
                </td>
            </tr>
            <tr>
                <td>
                    <h6>
                        <strong>{{ __('messages.Basement Surface') }}</strong>
                    </h6>
                    <span>{{ $estate->basement_surface }} m<sup>2</sup></span>
                </td>
            </tr>
            <tr>
                <td>
                    <h6>
                        <strong>{{ __('messages.Heating') }}</strong>
                    </h6>
                    <span>{{ ucwords($estate->heating) }}</span>
                </td>
            </tr>
            <tr>
                <td>
                    <h6>
                        <strong>{{ __('messages.Heating Type') }}</strong>
                    </h6>
                    <span>{{ $estate->heating_type }} </span>
                </td>
            </tr>
            <tr>
                <td>
                    <h6>
                        <strong>{{ __('messages.Air Conditioning') }}</strong>
                    </h6>
                    <span>{{ ucwords($estate->air_conditioning) }}</span>
                </td>
            </tr>
            <tr>
                <td>
                    <h6>
                        <strong>{{ __('messages.Air Conditioning Type') }}</strong>
                    </h6>
                    <span>{{ $estate->air_conditioning_type }} </span>
                </td>
            </tr>
            <tr>
                <td>
                    <h6>
                        <strong>{{ __('messages.Building Type') }}</strong>
                    </h6>
                    <span>{{ $estate->building_type }} </span>
                </td>
            </tr>
            <tr>
                <td>
                    <h6>
                        <strong>{{ __('messages.Floors') }}</strong>
                    </h6>
                    <span>{{ $estate->floors }} </span>
                </td>
            </tr>
            <tr>
                <td>
                    <h6>
                        <strong>{{ __('messages.Floor') }}</strong>
                    </h6>
                    <span>{{ $estate->floor }} </span>
                </td>
            </tr>
            <tr>
                <td>
                    <h6>
                        <strong>{{ __('messages.Pool') }}</strong>
                    </h6>
                    <span>{{ ucwords($estate->pool) }}</span>
                </td>
            </tr>
            <tr>
                <td>
                    <h6>
                        <strong>{{ __('messages.Garden') }}</strong>
                    </h6>
                    <span>{{ ucwords($estate->garden) }}</span>
                </td>
            </tr>
            <tr>
                <td>
                    <h6>
                        <strong>{{ __('messages.Garden Surface') }}</strong>
                    </h6>
                    <span>{{ $estate->garden_surface }} m<sup>2</sup></span>
                </td>
            </tr>
            <tr>
                <td>
                    <h6>
                        <strong>{{ __('messages.Elevator') }}</strong>
                    </h6>
                    <span>{{ ucwords($estate->elevator) }}</span>
                </td>
            </tr>
            <tr>
                <td>
                    <h6>
                        <strong>{{ __('messages.Urbanization') }}</strong>
                    </h6>
                    <span>{{ ucwords($estate->urbanization) }}</span>
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
                        <strong>{{ __('messages.Building Date') }}</strong>
                    </h6>
                    <span>{{ \Carbon\Carbon::parse($estate->building_date)->format('d / m / Y') }}</span>
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
                        <strong>{{ __('messages.Latitude') }}</strong>
                    </h6>
                    <span>{{ $estate->latitude }}</span>
                </td>
            </tr>
            <tr>
                <td>
                    <h6>
                        <strong>{{ __('messages.Longitude') }}</strong>
                    </h6>
                    <span>{{ $estate->longitude }}</span>
                </td>
            </tr>
            <tr>
                <td>
                    <h6>
                        <strong>{{ __('messages.Google maps') }}</strong>
                    </h6>
                    <span>{{ $estate->google_maps }}</span>
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
    </table>
</div>
