@extends('web.layout')

@section('content')
    <!--/ Carousel Star /-->
    <div class="intro intro-carousel">
        <div id="carousel" class="owl-carousel owl-theme">
            @foreach ($properties as $property)
                <div class="carousel-item-a intro-item bg-image"
                    style="background-image: url({{ $property->estate_image }})">
                    <div class="overlay overlay-a"></div>
                    <div class="intro-content display-table">
                        <div class="table-cell">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="intro-body">
                                            <h1 class="intro-title mb-4">
                                                <span class="color-b">{{ $property->city }} </span>
                                                <p class="intro-title-top">
                                                    {{ $property->address }}
                                                </p>
                                            </h1>
                                            <p class="intro-subtitle intro-price">
                                                <a href="{{ route('web.estate', $property->id) }}"><span
                                                        class="price-a">{{ $property->interest_type }} |
                                                        {{ $property->value }} €</span></a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!--/ Carousel end /-->

    <!--/ Services Star /-->
    <section class="section-services section-t8">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title-wrap d-flex justify-content-between">
                        <div class="title-box">
                            <h2 class="title-a">{{ __('Our Services') }}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card-box-c foo">
                        <div class="card-header-c d-flex">
                            <div class="card-box-ico">
                                <span class="fa fa-gamepad"></span>
                            </div>
                            <div class="card-title-c align-self-center">
                                <h2 class="title-c">{{ __('Lifestyle') }}</h2>
                            </div>
                        </div>
                        <div class="card-body-c">
                            <p class="content-c">
                                {{ __('Find the right property so that you have the lifestyle you want.') }}
                            </p>
                        </div>
                        <div class="card-footer-c">
                            <a href="{{ route('web.estates') }}" class="link-c link-icon">{{ __('Read more') }}
                                <span class="ion-ios-arrow-forward"></span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-box-c foo">
                        <div class="card-header-c d-flex">
                            <div class="card-box-ico">
                                <span class="fa fa-usd"></span>
                            </div>
                            <div class="card-title-c align-self-center">
                                <h2 class="title-c">{{ __('Loans') }}</h2>
                            </div>
                        </div>
                        <div class="card-body-c">
                            <p class="content-c">
                                {{ __('Rent your property to get the most out of it.') }}
                            </p>
                        </div>
                        <div class="card-footer-c">
                            <a href="{{ route('web.estates') }}" class="link-c link-icon">{{ __('Read more') }}
                                <span class="ion-ios-arrow-forward"></span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-box-c foo">
                        <div class="card-header-c d-flex">
                            <div class="card-box-ico">
                                <span class="fa fa-home"></span>
                            </div>
                            <div class="card-title-c align-self-center">
                                <h2 class="title-c">{{ __('Sell') }}</h2>
                            </div>
                        </div>
                        <div class="card-body-c">
                            <p class="content-c">
                                {{ __('Find the property that interests you, we take care of the paperwork.') }}
                            </p>
                        </div>
                        <div class="card-footer-c">
                            <a href="{{ route('web.estates') }}" class="link-c link-icon">{{ __('Read more') }}
                                <span class="ion-ios-arrow-forward"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ Services End /-->

    <!--/ Property Star /-->
    <section class="section-property section-t8">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title-wrap d-flex justify-content-between">
                        <div class="title-box">
                            <h2 class="title-a">{{ __('Latest Properties') }}</h2>
                        </div>
                        <div class="title-link">
                            <a href="{{ route('web.estates') }}">{{ __('All Property') }}
                                <span class="ion-ios-arrow-forward"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div id="property-carousel" class="owl-carousel owl-theme">
                @foreach ($properties as $property)
                    <div class="carousel-item-b">
                        <div class="card-box-a card-shadow">
                            <div class="img-box-a">
                                <img src="{{ $property->estate_image_url }}" alt="" class="img-a img-fluid">
                            </div>
                            <div class="card-overlay">
                                <div class="card-overlay-a-content">
                                    <div class="card-header-a">
                                        <h2 class="card-title-a">
                                            <a href="{{ route('web.estate', $property->id) }}"> {{ $property->city }}
                                                <br /> {{ $property->address }}</a>
                                        </h2>
                                    </div>
                                    <div class="card-body-a">
                                        <div class="price-box d-flex">
                                            <span class="price-a">{{ $property->interest_type }} |
                                                {{ $property->value }} €</span>
                                        </div>
                                        <a href="#" class="link-a">{{ __('Click here to view') }}
                                            <span class="ion-ios-arrow-forward"></span>
                                        </a>
                                    </div>
                                    <div class="card-footer-a">
                                        <ul class="card-info d-flex justify-content-around">
                                            <li>
                                                <h4 class="card-info-title">{{ __('Surface') }}</h4>
                                                <span>{{ $property->surface }} m
                                                    <sup>2</sup>
                                                </span>
                                            </li>
                                            <li>
                                                <h4 class="card-info-title">{{ __('Rooms') }}</h4>
                                                <span>{{ $property->rooms }}</span>
                                            </li>
                                            <li>
                                                <h4 class="card-info-title">{{ __('Baths') }}</h4>
                                                <span>{{ $property->baths }}</span>
                                            </li>
                                            <li>
                                                <h4 class="card-info-title">{{ __('Furnished') }}</h4>
                                                <span>{{ ucwords($property->furnished) }}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--/ Property End /-->

    <!--/ Agents Star /-->
    <section class="section-agents section-t8">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title-wrap d-flex justify-content-between">
                        <div class="title-box">
                            <h2 class="title-a">{{ __('Our Agents') }}</h2>
                        </div>
                        <div class="title-link">
                            <a href="{{ route('web.agents') }}">{{ __('All Agents') }}
                                <span class="ion-ios-arrow-forward"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($agents as $agent)
                    <div class="col-md-4">
                        <div class="card-box-d">
                            <div class="card-img-d">
                                <img src="{{ $agent->photo }}" alt="" class="img-d img-fluid">
                            </div>
                            <div class="card-overlay card-overlay-hover">
                                <div class="card-header-d">
                                    <div class="card-title-d align-self-center">
                                        <h3 class="title-d">
                                            <a href="{{ route('web.agent', $agent->id) }}"
                                                class="link-two">{{ $agent->first_name }}
                                                <br> {{ $agent->last_name }}</a>
                                        </h3>
                                    </div>
                                </div>
                                <div class="card-body-d">
                                    <p class="content-d color-text-a">
                                        {{ $agent->description }}
                                    </p>
                                    <div class="info-agents color-a">
                                        <p>
                                            <strong>{{ __('Phone') }}: </strong> +34 {{ $agent->phone }}
                                        </p>
                                        <p>
                                            <strong>{{ __('Email') }}: </strong> {{ $agent->email }}
                                        </p>
                                    </div>
                                </div>
                                <div class="card-footer-d">
                                    <div class="socials-footer d-flex justify-content-center">
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                <a href="{{ $agent->facebook_link }}" class="link-one">
                                                    <i class="fa fa-facebook" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="{{ $agent->twitter_link }}" class="link-one">
                                                    <i class="fa fa-twitter" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="{{ $agent->instagram_link }}" class="link-one">
                                                    <i class="fa fa-instagram" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="{{ $agent->pinterest }}" class="link-one">
                                                    <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--/ Agents End /-->

    <br>
    <br>
    <br>


@endsection
