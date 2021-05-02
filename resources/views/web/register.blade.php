@extends('web.layout')
@section('content')
    <!--/ Intro Single star /-->
    <section class="intro-single">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-8">
                    <div class="title-single-box">
                        <h1 class="title-single">{{ __('Register') }}</h1>
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
                                <a href="{{ route('web.index') }}">{{ __('Home') }}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                {{ __('Register') }}
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
                            <form class="form-a contactForm" method="POST" id="register-form"
                                action="{{ route('register') }}">
                                @csrf
                                <div id="errormessage">
                                    @include('alerts.feedback', ['field' => 'first_name'])
                                    @include('alerts.feedback', ['field' => 'last_name'])
                                    @include('alerts.feedback', ['field' => 'email'])
                                    @include('alerts.feedback', ['field' => 'dni'])
                                    @include('alerts.feedback', ['field' => 'phone'])
                                    @include('alerts.feedback', ['field' => 'birthdate'])
                                    @include('alerts.feedback', ['field' => 'password'])
                                    @include('alerts.feedback', ['field' => 'password_confirmation'])
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <input
                                                class="form-control form-control-lg form-control-a {{ $errors->has('first_name') ? ' is-invalid' : '' }}"
                                                placeholder="{{ __('First Name') }}" type="text" name="first_name"
                                                value="{{ old('first_name') }}" required autofocus data-rule="minlen:4"
                                                data-msg="Please enter at least 4 chars">
                                            <div class="validation"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <input
                                                class="form-control form-control-lg form-control-a {{ $errors->has('last_name') ? ' is-invalid' : '' }}"
                                                placeholder="{{ __('Last Name') }}" type="text" name="last_name"
                                                value="{{ old('last_name') }}" required autofocus data-rule="minlen:4"
                                                data-msg="Please enter at least 4 chars">
                                            <div class="validation"></div>
                                        </div>
                                    </div>
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
                                                class="form-control form-control-lg form-control-a {{ $errors->has('dni') ? ' is-invalid' : '' }}"
                                                placeholder="{{ __('DNI') }}" type="text" name="dni"
                                                value="{{ old('dni') }}" required autofocus data-rule="minlen:4"
                                                data-msg="Please enter at least 4 chars">
                                            <div class="validation"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <input
                                                class="form-control form-control-lg form-control-a {{ $errors->has('phone') ? ' is-invalid' : '' }}"
                                                placeholder="{{ __('Phone') }}" type="text" name="phone"
                                                value="{{ old('phone') }}" required autofocus data-rule="minlen:4"
                                                data-msg="Please enter at least 4 chars">
                                            <div class="validation"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <input
                                                class="form-control form-control-lg form-control-a {{ $errors->has('birthdate') ? ' is-invalid' : '' }}"
                                                placeholder="{{ __('Birthdate') }}" type="date" name="birthdate"
                                                value="{{ old('birthdate') }}" required autofocus data-rule="minlen:4"
                                                data-msg="Please enter at least 4 chars">
                                            <div class="validation"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <input
                                                class="form-control form-control-lg form-control-a {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                                placeholder="{{ __('Password') }}" type="password" name="password"
                                                value="" required autofocus data-rule="minlen:4"
                                                data-msg="Please enter at least 4 chars">
                                            <div class="validation"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <input
                                                class="form-control form-control-lg form-control-a {{ $errors->has('birthdate') ? ' is-invalid' : '' }}"
                                                placeholder="{{ __('Confirm Password') }}" type="password"
                                                name="password_confirmation" value="" required autofocus
                                                data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                                            <div class="validation"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <input
                                                class="form-control form-control-lg form-control-a {{ $errors->has('phone') ? ' is-invalid' : '' }}"
                                                placeholder="{{ __('Comertial') }}" type="text" name="comertial"
                                                value="NONE" required autofocus data-rule="minlen:4"
                                                data-msg="Please enter at least 4 chars" style="display: none">
                                            <div class="validation"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <a href="{{ route('register') }}" onclick="event.preventDefault();
                                                            document.getElementById('register-form').submit();"
                                            class="btn btn-a">{{ __('Register') }}</a>
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
                                        <p class="mb-1">{{ __('Phone') }}.
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
                                        <h4 class="icon-title">{{ __('Find us in') }}</h4>
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
                                        <h4 class="icon-title">Social networks</h4>
                                    </div>
                                    <div class="icon-box-content">
                                        <div class="socials-footer">
                                            <ul class="list-inline">
                                                <li class="list-inline-item">
                                                    <a href="#" class="link-one">
                                                        <i class="fa fa-facebook" aria-hidden="true"></i>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="#" class="link-one">
                                                        <i class="fa fa-twitter" aria-hidden="true"></i>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="#" class="link-one">
                                                        <i class="fa fa-instagram" aria-hidden="true"></i>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="#" class="link-one">
                                                        <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="#" class="link-one">
                                                        <i class="fa fa-dribbble" aria-hidden="true"></i>
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
