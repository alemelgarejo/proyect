@extends('web.layout')
@section('content')

    <!--/ Intro Single star /-->
    <section class="intro-single">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-8">
                    <div class="title-single-box">
                        <h1 class="title-single">{{ __('messages.Our Amazing Estates') }}</h1>
                        <span class="color-text-a">{{ __('Properties') }}</span>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4">
                    <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('web.index') }}">{{ __('messages.Home') }}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                {{ __('messages.Estates') }}
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!--/ Intro Single End /-->

    <!--/ Property Grid Star /-->
    <section class="property-grid grid">
        <div class="container">
            <div class="row">
                @if ($properties->count() == 0)
                    <div class="col-md-4">
                        <div class="card-box-a card-shadow">
                            <p>Sin coincidencias.</p>
                        </div>
                    </div>
                @elseif($properties->count() >= 1)
                    @foreach ($properties as $property)
                        <div class="col-md-4">
                            <div class="card-box-a card-shadow">
                                <div class="img-box-a">
                                    <img src="{{ $property->estate_image_url }}" alt="" class="img-a img-fluid">
                                </div>
                                <div class="card-overlay">
                                    <div class="card-overlay-a-content">
                                        <div class="card-header-a">
                                            <h2 class="card-title-a">
                                                <a href="{{ route('web.estate', $property->id) }}">{{ $property->address }}
                                                    <br /> {{ $property->city }}</a>
                                            </h2>
                                        </div>
                                        <div class="card-body-a">
                                            <div class="price-box d-flex">
                                                <span class="price-a">{{ $property->interest_type }} |
                                                    {{ $property->value }}
                                                    €</span>
                                            </div>
                                            <a href="{{ route('web.estate', $property->id) }}"
                                                class="link-a">{{ __('messages.Click here to view') }}
                                                <span class="ion-ios-arrow-forward"></span>
                                            </a>
                                        </div>
                                        <div class="card-footer-a">
                                            <ul class="card-info d-flex justify-content-around">
                                                <li>
                                                    <h4 class="card-info-title">{{ __('messages.Surface') }}</h4>
                                                    <span>{{ $property->surface }} m
                                                        <sup>2</sup>
                                                    </span>
                                                </li>
                                                <li>
                                                    <h4 class="card-info-title">{{ __('messages.Rooms') }}</h4>
                                                    <span>{{ $property->rooms }}</span>
                                                </li>
                                                <li>
                                                    <h4 class="card-info-title">{{ __('messages.Baths') }}</h4>
                                                    <span>{{ $property->baths }}</span>
                                                </li>
                                                <li>
                                                    <h4 class="card-info-title">{{ __('messages.Furnished') }}</h4>
                                                    <span>{{ ucwords($property->furnished) }}</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="row">
                <div class="ml-3 ">
                    {{ $properties->links('pagination::bootstrap-4') }}
                </div>
            </div>
    </section>
    <!--/ Property Grid End /-->
@endsection
