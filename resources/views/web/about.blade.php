@extends('web.layout')

@section('content')
    <!--/ Intro Single star /-->
    <section class="intro-single">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-8">
                    <div class="title-single-box">
                        <h1 class="title-single">{{ __('messages.We Manage your Properties for the better.') }}</h1>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4">
                    <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('web.index') }}">{{ __('messages.Home') }}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                {{ __('messages.About') }}
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!--/ Intro Single End /-->

    <!--/ About Star /-->
    <section class="section-about">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="about-img-box">
                        <img src="img/slide-about-1.jpg" alt="" class="img-fluid">
                    </div>
                    <div class="sinse-box">
                        <h3 class="sinse-title">{{ __('Inmodata') }}
                            <span></span>
                            <br> {{ __('messages.Since 2021') }}
                        </h3>
                        <p>{{ __('messages.Real Estate Management') }}</p>
                    </div>
                </div>
                <div class="col-md-12 section-t8">
                    <div class="row">
                        <div class="col-md-6 col-lg-5">
                            <img src="img/about-2.jpg" alt="" class="img-fluid">
                        </div>
                        <div class="col-lg-2  d-none d-lg-block">
                            <div class="title-vertical d-flex justify-content-start">
                                <span>{{ __('Inmodata') }} <br>{{ __('Exclusive Property') }}</span>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-5 section-md-t3">
                            <div class="title-box-d">
                                <h3 class="title-d">{{ __('messages.About') }}
                                    <span class="color-d">{{ __('messages.Us') }}</span>.
                                </h3>
                            </div>
                            <p class="color-text-a">
                                {{ __('messages.Hey we are Inmodata, a real estate management company here at Calle Dr. Barraquer, 6, 35500 Arrecife, Las Palmas.') }}
                            </p>
                            <p class="color-text-a">

                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ About End /-->

    <!--/ Team Star /-->
    <section class="section-agents section-t8">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title-wrap d-flex justify-content-between">
                        <div class="title-box">
                            <h2 class="title-a">{{ __('messages.Meet Our Team') }}</h2>
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
                                            <a href="agent-single.html" class="link-two">{{ $agent->first_name }}
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
                                            <strong>{{ __('messages.Phone') }}: </strong> +34 {{ $agent->phone }}
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
                @endforeach

            </div>
        </div>
    </section>
    <br><br>
    <!--/ Team End /-->
@endsection
