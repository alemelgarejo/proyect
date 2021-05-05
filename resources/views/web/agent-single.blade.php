@extends('web.layout')
@section('content')

    <!--/ Intro Single star /-->
    <section class="intro-single">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-8">
                    <div class="title-single-box">
                        <h1 class="title-single">{{ $agent->first_name }} {{ $agent->last_name }}</h1>
                        <span class="color-text-a">{{ __('Real Estate Agent') }}</span>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4">
                    <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('web.index') }}">{{ __('Home') }}</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">{{ __('Agents') }}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                {{ $agent->first_name }} {{ $agent->last_name }}
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!--/ Intro Single End /-->

    <!--/ Agent Single Star /-->
    <section class="agent-single">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="agent-avatar-box">
                                <img src="{{ $agent->photo }}" alt="{{ $agent->photo }}" class="agent-avatar img-fluid">
                            </div>
                        </div>
                        <div class="col-md-5 section-md-t3">
                            <div class="agent-info-box">
                                <div class="agent-title">
                                    <div class="title-box-d">
                                        <h3 class="title-d">{{ $agent->first_name }}
                                            <br> {{ $agent->last_name }}
                                        </h3>
                                    </div>
                                </div>
                                <div class="agent-content mb-3">
                                    <p class="content-d color-text-a">
                                        {{ $agent->description }}
                                    </p>
                                    <div class="info-agents color-a">
                                        <p>
                                            <strong>{{ __('Phone') }}: </strong>
                                            <span class="color-text-a"> +34 {{ $agent->phone }} </span>
                                        </p>
                                        <p>
                                            <strong>{{ __('Email') }}: </strong>
                                            <span class="color-text-a"> {{ $agent->email }}</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="socials-footer">
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
                                            <a href="{{ $agent->pinterest_link }}" class="link-one">
                                                <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 section-t8">
                    <div class="title-box-d">
                        <h3 class="title-d">{{ __('My Properties') }}</h3>
                    </div>
                </div>
                <div class="row property-grid grid">
                    <div class="col-sm-12">
                        <div class="grid-option">
                            {{-- <form>
                                <select class="custom-select">
                                    <option selected>All</option>
                                    <option value="1">New to Old</option>
                                    <option value="2">For Rent</option>
                                    <option value="3">For Sale</option>
                                </select>
                            </form> --}}
                        </div>
                    </div>
                    @foreach ($estates as $estate)
                        <div class="col-md-6">
                            <div class="card-box-a card-shadow">
                                <div class="img-box-a">
                                    <img src="{{ $estate->images[0]->urlWeb }}" alt="" class="img-a img-fluid">
                                </div>
                                <div class="card-overlay">
                                    <div class="card-overlay-a-content">
                                        <div class="card-header-a">
                                            <h2 class="card-title-a">
                                                <a href="{{ route('web.estate', $estate->id) }}">{{ $estate->city }}
                                                    <br /> {{ $estate->address }}</a>
                                            </h2>
                                        </div>
                                        <div class="card-body-a">
                                            <div class="price-box d-flex">
                                                <span class="price-a">{{ $estate->interest_type }} |
                                                    {{ $estate->value }} €</span>
                                            </div>
                                            <a href="{{ route('web.estate', $estate->id) }}"
                                                class="link-a">{{ __('Click here to view') }}
                                                <span class="ion-ios-arrow-forward"></span>
                                            </a>
                                        </div>
                                        <div class="card-footer-a">
                                            <ul class="card-info d-flex justify-content-around">
                                                <li>
                                                    <h4 class="card-info-title">{{ __('Surface') }}</h4>
                                                    <span>{{ $estate->surface }} m
                                                        <sup>2</sup>
                                                    </span>
                                                </li>
                                                <li>
                                                    <h4 class="card-info-title">{{ __('Rooms') }}</h4>
                                                    <span>{{ $estate->rooms }}</span>
                                                </li>
                                                <li>
                                                    <h4 class="card-info-title">{{ __('Baths') }}</h4>
                                                    <span>{{ $estate->baths }}</span>
                                                </li>
                                                <li>
                                                    <h4 class="card-info-title">{{ __('Furnished') }}</h4>
                                                    <span>{{ ucwords($estate->furnished) }}</span>
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
        </div>
    </section>
    <!--/ Agent Single End /-->

@endsection
