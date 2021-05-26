@extends('web.layout')
@section('content')
    <!--/ Intro Single star /-->
    <section class="intro-single">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-8">
                    <div class="title-single-box">
                        <h1 class="title-single">{{ __('Login') }}</h1>
                        <span class="color-text-a">Aut voluptas consequatur unde sed omnis ex placeat quis eos. Aut natus
                            officia corrupti qui autem fugit consectetur quo. Et ipsum eveniet laboriosam voluptas beatae
                            possimus qui ducimus. Et voluptatem deleniti. Voluptatum voluptatibus amet. Et esse sed omnis
                            inventore hic culpa.</span>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4">
                    <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('web.index') }}">{{ __('messages.Home') }}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                {{ __('Login') }}
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!--/ Intro Single End /-->

    <!--/ Contact Star /-->
    <section class="contact">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 section-t8">
                    <div class="row">
                        <div class="col-md-7">
                            <form class="form-a contactForm" id="login-form" method="POST" action="{{ route('login') }}">
                                @csrf
                                <div id="errormessage"></div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <input
                                                class="form-control form-control-lg form-control-a {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                placeholder="{{ __('Email') }}" type="text" name="email"
                                                value="{{ old('email') }}" required autofocus data-rule="minlen:4"
                                                data-msg="Please enter at least 4 chars">
                                            <div class="validation"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <input
                                                class="form-control form-control-lg form-control-a {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                                placeholder="{{ __('messages.Password') }}" type="password"
                                                name="password" value="" required autofocus data-rule="minlen:4"
                                                data-msg="Please enter at least 4 chars">
                                            <div class="validation"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <a href="{{ route('login') }}" class="btn btn-a"
                                            onclick="event.preventDefault();
                                                                    document.getElementById('login-form').submit();">{{ __('Login') }}</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-5 section-md-t3">
                            <div class="icon-box section-b2">
                                <div class="icon-box-icon">
                                    <span class="ion-ios-paper-plane"></span>
                                </div>
                                <div class="icon-box-content table-cell">
                                    <div class="icon-box-title">
                                        <h4 class="icon-title">Say Hello</h4>
                                    </div>
                                    <div class="icon-box-content">
                                        <p class="mb-1">{{ __('Email') }}.
                                            <span class="color-a">{{ __('amelgarejocontacto@gmail.com') }}</span>
                                        </p>
                                        <p class="mb-1">{{ __('messages.Phone') }}.
                                            <span class="color-a">{{ __('655 664 782') }}</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="icon-box section-b2">
                                <div class="icon-box-icon">
                                    <span class="ion-ios-pin"></span>
                                </div>
                                <div class="icon-box-content table-cell">
                                    <div class="icon-box-title">
                                        <h4 class="icon-title">{{ __('messages.Find us in') }}</h4>
                                    </div>
                                    <div class="icon-box-content">
                                        <p class="mb-1">
                                            Calle Dr. Barraquer, 6, 35500 Arrecife, Las Palmas
                                            <br> España
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="icon-box">
                                <div class="icon-box-icon">
                                    <span class="ion-ios-redo"></span>
                                </div>
                                <div class="icon-box-content table-cell">
                                    <div class="icon-box-title">
                                        <h4 class="icon-title">{{ __('messages.Social networks') }}</h4>
                                    </div>
                                    <div class="icon-box-content">
                                        <div class="socials-footer">
                                            <ul class="list-inline">
                                                <li class="list-inline-item">
                                                    <a href="https://www.facebook.com/ale.melgarejo.3/" target="__blank">
                                                        <i class="fa fa-facebook" aria-hidden="true"></i>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="https://twitter.com/melgarejoale" target="__blank">
                                                        <i class="fa fa-twitter" aria-hidden="true"></i>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="https://www.instagram.com/alemelgarejo96/" target="__blank">
                                                        <i class="fa fa-instagram" aria-hidden="true"></i>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="{{ route('web.index') }}" target="__blank">
                                                        <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ Contact End /-->

@endsection
