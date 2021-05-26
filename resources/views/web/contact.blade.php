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
                        <h1 class="title-single">{{ __('messages.Contact Us') }}</h1>
                        {{-- <span class="color-text-a">Aut voluptas consequatur unde sed omnis ex placeat quis eos. Aut natus
                            officia corrupti qui autem fugit consectetur quo. Et ipsum eveniet laboriosam voluptas beatae
                            possimus qui ducimus. Et voluptatem deleniti. Voluptatum voluptatibus amet. Et esse sed omnis
                            inventore hic culpa.</span> --}}
                    </div>
                </div>
                <div class="col-md-12 col-lg-4">
                    <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('web.index') }}">{{ __('messages.Home') }}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                {{ __('messages.Contact') }}
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!--/ Intro Single End /-->

    <!--/ Contact Star /-->
    <section class="contact" style="margin-top: -100px">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 section-t8">
                    <div class="row">
                        <div class="col-md-7">
                            <form class="form-a contactForm" id="contact-form" action="{{ route('web.storeMessage') }}"
                                method="post" role="form">
                                @csrf
                                <div id="errormessage"></div>
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <div class="form-group">
                                            <select class="form-control" name="to_user_id"
                                                placeholder="{{ __('messages.Message') }}">
                                                @foreach ($users as $user)
                                                    <option value="{{ $user->id }}">{{ $user->first_name }}
                                                        {{ $user->last_name }}</option>
                                                @endforeach
                                            </select>
                                            <div class="validation"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <div class="form-group">
                                            <textarea name="message" class="form-control" name="message" cols="45" rows="8"
                                                data-rule="required" data-msg="Please write something for us"
                                                placeholder="{{ __('messages.Message') }}"></textarea>
                                            <div class="validation"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        @auth
                                            <a onclick="event.preventDefault();
                                                                                                                                                                        document.getElementById('contact-form').submit();"
                                                class="btn btn-a" style="color: white">{{ __('messages.Send Message') }}</a>
                                        @endauth
                                        @guest
                                            <a href="{{ route('web.register') }}"
                                                class="btn btn-a">{{ __('messages.Register to send a Message') }}</a>
                                        @endguest
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
                                        <h4 class="icon-title">{{ __('messages.Say Hello') }}</h4>
                                    </div>
                                    <div class="icon-box-content">
                                        <p class="mb-1">{{ __('Email') }}.
                                            <span class="color-a">amelgarejocontacto@gmail.com</span>
                                        </p>
                                        <p class="mb-1">{{ __('messages.Phone') }}.
                                            <span class="color-a">+54 655 664 782</span>
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
                                            {{ __('Calle Dr. Barraquer, 6, 35500 Arrecife') }}
                                            <br> {{ __('Las Palmas') }}
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
