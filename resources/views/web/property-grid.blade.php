@extends('web.layout')
@section('content')

    <!--/ Intro Single star /-->
    <section class="intro-single">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-8">
                    <div class="title-single-box">
                        <h1 class="title-single">{{ __('messages.Our Amazing Estates') }}</h1>
                        <span class="color-text-a">{{ __('messages.Estates') }}</span>
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
                                            <span class="price-a">{{ $property->type }} | {{ $property->value }}
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
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <nav class="pagination-a">
                        <ul class="pagination justify-content-end">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">
                                    <span class="ion-ios-arrow-back"></span>
                                </a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">1</a>
                            </li>
                            <li class="page-item active">
                                <a class="page-link" href="#">2</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">3</a>
                            </li>
                            <li class="page-item next">
                                <a class="page-link" href="#">
                                    <span class="ion-ios-arrow-forward"></span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!--/ Property Grid End /-->
@endsection
