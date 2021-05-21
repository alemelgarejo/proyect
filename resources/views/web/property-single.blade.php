@extends('web.layout')
@section('content')
    <!--/ Intro Single star /-->
    <section class="intro-single">
        <div class="container">
            @if (session($key ?? 'status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session($key ?? 'status') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="row">
                <div class="col-md-12 col-lg-8">
                    <div class="title-single-box">
                        <h1 class="title-single">{{ $property->address }}</h1>
                        <span class="color-text-a">{{ $property->city }}</span>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4">
                    <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('web.index') }}">{{ __('messages.Home') }}</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('web.estates') }}">{{ __('messages.Estates') }}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                {{ $property->address }}
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!--/ Intro Single End /-->

    <!--/ Property Single Star /-->
    <section class="property-single nav-arrow-b">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="property-single-carousel" class="owl-carousel owl-arrow gallery-property">
                        @foreach ($property->images as $image)
                            <div class="carousel-item-b">
                                <img src="{{ $image->url }}" alt="">
                            </div>
                        @endforeach
                    </div>
                    <div class="row justify-content-between">
                        <div class="col-md-5 col-lg-4">
                            <div class="property-price d-flex justify-content-center foo">
                                <div class="card-header-c d-flex">
                                    <div class="card-box-ico">
                                        <span class="ion-money">€</span>
                                    </div>
                                    <div class="card-title-c align-self-center">
                                        <h5 class="title-c">{{ $property->value }}</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="property-summary">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="title-box-d section-t4">
                                            <h3 class="title-d">{{ __('messages.Quick Summary') }}</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="summary-list">
                                    <ul class="list">
                                        <li class="d-flex justify-content-between">
                                            <strong>{{ __('messages.Property ID') }}:</strong>
                                            <span>{{ $property->id }}</span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <strong>{{ __('messages.Location') }}:</strong>
                                            <span>{{ $property->city }}, <br>{{ $property->address }}</span>

                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <strong>{{ __('messages.Type') }}:</strong>
                                            <span>{{ $property->type }}</span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <strong>{{ __('messages.Status') }}:</strong>
                                            <span>{{ $property->interest_type }}</span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <strong>{{ __('messages.Surface') }}:</strong>
                                            <span>{{ $property->surface }} m
                                                <sup>2</sup>
                                            </span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <strong>{{ __('messages.Rooms') }}:</strong>
                                            <span>{{ $property->rooms }}</span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <strong>{{ __('messages.Baths') }}:</strong>
                                            <span>{{ $property->baths }}</span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <strong>{{ 'messages.Furnished' }}:</strong>
                                            <span>{{ ucwords($property->furnished) }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7 col-lg-7 section-md-t3">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="title-box-d">
                                        <h3 class="title-d">{{ __('messages.Property Description') }}</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="property-description">
                                <p class="description color-text-a no-margin">
                                    {{ $property->description }}
                                </p>
                            </div>
                            <div class="row section-t3">
                                <div class="col-sm-12">
                                    <div class="title-box-d">
                                        <h3 class="title-d">{{ __('messages.Amenities') }}</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="amenities-list color-text-a">
                                <ul class="list-a no-margin">
                                    @if ($property->wardrobe == 'yes')
                                        <li>
                                            {{ __('messages.Wardrobe') }}
                                        </li>
                                    @endif
                                    @if ($property->furnished == 'yes')
                                        <li>
                                            {{ __('messages.Furnished') }}
                                        </li>
                                    @endif
                                    @if ($property->separate_dining_room == 'yes')
                                        <li>
                                            {{ __('messages.S. Dining Room') }}
                                        </li>
                                    @endif
                                    @if ($property->furnished_kitchen == 'yes')
                                        <li>
                                            {{ __('messages.Furnished Kitchen') }}
                                        </li>
                                    @endif
                                    @if ($property->balcony == 'yes')
                                        <li>
                                            {{ __('messages.Balcony') }}
                                        </li>
                                    @endif
                                    @if ($property->courtyard == 'yes')
                                        <li>
                                            {{ __('messages.Courtyard') }}
                                        </li>
                                    @endif
                                    @if ($property->garage == 'yes')
                                        <li>
                                            {{ __('messages.Garage') }}
                                        </li>
                                    @endif
                                    @if ($property->storage_room == 'yes')
                                        <li>
                                            {{ __('messages.Storage Room') }}
                                        </li>
                                    @endif
                                    @if ($property->basement == 'yes')
                                        <li>
                                            {{ __('messages.Basement') }}
                                        </li>
                                    @endif
                                    @if ($property->heating == 'yes')
                                        <li>
                                            {{ __('messages.Heating') }}
                                        </li>
                                    @endif
                                    @if ($property->air_conditioning == 'yes')
                                        <li>
                                            {{ __('messages.Air Conditioning') }}
                                        </li>
                                    @endif
                                    @if ($property->pool == 'yes')
                                        <li>
                                            {{ __('messages.Pool') }}
                                        </li>
                                    @endif
                                    @if ($property->elevator == 'yes')
                                        <li>
                                            {{ __('messages.Elevator') }}
                                        </li>
                                    @endif
                                    @if ($property->urbanization == 'yes')
                                        <li>
                                            {{ __('messages.Urbanization') }}
                                        </li>
                                    @endif
                                    @if ($property->garden == 'yes')
                                        <li>
                                            {{ __('messages.Garden') }}
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-10 offset-md-1">
                    <ul class="nav nav-pills-a nav-pills mb-3 section-t3" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-video-tab" data-toggle="pill" href="#pills-video"
                                role="tab" aria-controls="pills-video" aria-selected="true">Video</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-map-tab" data-toggle="pill" href="#pills-map" role="tab"
                                aria-controls="pills-map" aria-selected="false">Ubication</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-video" role="tabpanel"
                            aria-labelledby="pills-video-tab">
                            <iframe src="https://player.vimeo.com/video/73221098" width="100%" height="460" frameborder="0"
                                webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                        </div>
                        <div class="tab-pane fade" id="pills-map" role="tabpanel" aria-labelledby="pills-map-tab">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13962.684303365699!2d-13.5606247!3d28.967479!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xe1c08d4252e5ad1c!2sSecondary%20School%20Zonzamas!5e0!3m2!1sen!2ses!4v1620069512617!5m2!1sen!2ses"
                                width="100%" height="460" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row section-t3">
                        <div class="col-sm-12">
                            <div class="title-box-d">
                                <h3 class="title-d">{{ __('messages.Contact Agent') }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-lg-4">
                            <img src="img/agent-4.jpg" alt="" class="img-fluid">
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="property-agent">
                                <h4 class="title-agent">{{ $owner->user->first_name }} {{ $owner->user->last_name }}
                                </h4>
                                <p class="color-text-a">
                                    {{ $owner->user->description }}
                                </p>
                                <ul class="list-unstyled">
                                    <li class="d-flex justify-content-between">
                                        <strong>{{ __('messages.Phone') }}:</strong>
                                        <span class="color-text-a">(+34) {{ $owner->user->phone }}</span>
                                    </li>
                                    <li class="d-flex justify-content-between">
                                        <strong>{{ __('Email') }}:</strong>
                                        <span class="color-text-a">{{ $owner->user->email }}</span>
                                    </li>
                                </ul>
                                <div class="socials-a">
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <a href="{{ $owner->user->facebook_link }}">
                                                <i class="fa fa-facebook" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="{{ $owner->user->twitter_link }}">
                                                <i class="fa fa-twitter" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="{{ $owner->user->instagram_link }}">
                                                <i class="fa fa-instagram" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="{{ $owner->user->printerest_link }}">
                                                <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-4">
                            <div class="property-contact">
                                <form id="contact-estate-form" class="form-a"
                                    action="{{ route('web.storeMessageEstate', $property->id) }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12 mb-1">
                                            <div class="form-group">
                                                <select class="form-control" name="to_user_id" placeholder="Message">
                                                    <option value="{{ $owner->user->id }}">
                                                        {{ $owner->user->first_name }}
                                                        {{ $owner->user->last_name }}</option>
                                                </select>
                                                <div class="validation"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-1">
                                            <div class="form-group">
                                                <textarea id="textMessage" class="form-control"
                                                    placeholder="{{ __('messages.Message') }}" name="message" cols="45"
                                                    rows="8" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <a onclick="event.preventDefault();
                                                                                                            document.getElementById('contact-estate-form').submit();"
                                                class="btn btn-a">{{ __('messages.Send Message') }}</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ Property Single End /-->
@endsection
