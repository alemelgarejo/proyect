@extends('web.layout')
@section('content')
    <!--/ Intro Single star /-->
    <section class="intro-single">
        <div class="container">
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
                                <a href="{{ route('web.index') }}">{{ __('Home') }}</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('web.estates') }}">{{ __('Properties') }}</a>
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
                                            <h3 class="title-d">{{ __('Quick Summary') }}</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="summary-list">
                                    <ul class="list">
                                        <li class="d-flex justify-content-between">
                                            <strong>{{ __('Property ID') }}:</strong>
                                            <span>{{ $property->id }}</span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <strong>{{ __('Location') }}:</strong>
                                            <span>{{ $property->address }}, {{ $property->city }}</span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <strong>{{ __('Property Type') }}:</strong>
                                            <span>{{ $property->type }}</span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <strong>{{ __('Status') }}:</strong>
                                            <span>{{ $property->interest_type }}</span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <strong>{{ __('Surface') }}:</strong>
                                            <span>{{ $property->surface }} m
                                                <sup>2</sup>
                                            </span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <strong>{{ __('Rooms') }}:</strong>
                                            <span>{{ $property->rooms }}</span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <strong>{{ __('Baths') }}:</strong>
                                            <span>{{ $property->baths }}</span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <strong>{{ 'Furnished' }}:</strong>
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
                                        <h3 class="title-d">{{ __('Property Description') }}</h3>
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
                                        <h3 class="title-d">{{ __('Amenities') }}</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="amenities-list color-text-a">
                                <ul class="list-a no-margin">
                                    @if ($property->wardrobe == 'yes')
                                        <li>
                                            {{ __('Wardrobe') }}
                                        </li>
                                    @endif
                                    @if ($property->furnished == 'yes')
                                        <li>
                                            {{ __('Furnished') }}
                                        </li>
                                    @endif
                                    @if ($property->separate_dining_room == 'yes')
                                        <li>
                                            {{ __('Separate Dining Room') }}
                                        </li>
                                    @endif
                                    @if ($property->furnished_kitchen == 'yes')
                                        <li>
                                            {{ __('FurnishedKitchen') }}
                                        </li>
                                    @endif
                                    @if ($property->balcony == 'yes')
                                        <li>
                                            {{ __('Balcony') }}
                                        </li>
                                    @endif
                                    @if ($property->courtyard == 'yes')
                                        <li>
                                            {{ __('Courtyard') }}
                                        </li>
                                    @endif
                                    @if ($property->garage == 'yes')
                                        <li>
                                            {{ __('Garage') }}
                                        </li>
                                    @endif
                                    @if ($property->storage_room == 'yes')
                                        <li>
                                            {{ __('Storage Room') }}
                                        </li>
                                    @endif
                                    @if ($property->basement == 'yes')
                                        <li>
                                            {{ __('Basement') }}
                                        </li>
                                    @endif
                                    @if ($property->heating == 'yes')
                                        <li>
                                            {{ __('Heating') }}
                                        </li>
                                    @endif
                                    @if ($property->air_conditioning == 'yes')
                                        <li>
                                            {{ __('Air Conditioning') }}
                                        </li>
                                    @endif
                                    @if ($property->pool == 'yes')
                                        <li>
                                            {{ __('Pool') }}
                                        </li>
                                    @endif
                                    @if ($property->elevator == 'yes')
                                        <li>
                                            {{ __('Elevator') }}
                                        </li>
                                    @endif
                                    @if ($property->urbanization == 'yes')
                                        <li>
                                            {{ __('Urbanization') }}
                                        </li>
                                    @endif
                                    @if ($property->garden == 'yes')
                                        <li>
                                            {{ __('Garden') }}
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
                                <h3 class="title-d">{{ __('Contact Agent') }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-lg-4">
                            <img src="img/agent-4.jpg" alt="" class="img-fluid">
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="property-agent">
                                <h4 class="title-agent">Anabella Geller</h4>
                                <p class="color-text-a">
                                    Nulla porttitor accumsan tincidunt. Vestibulum ac diam sit amet quam vehicula elementum
                                    sed sit amet
                                    dui. Quisque velit nisi,
                                    pretium ut lacinia in, elementum id enim.
                                </p>
                                <ul class="list-unstyled">
                                    <li class="d-flex justify-content-between">
                                        <strong>Phone:</strong>
                                        <span class="color-text-a">(222) 4568932</span>
                                    </li>
                                    <li class="d-flex justify-content-between">
                                        <strong>Mobile:</strong>
                                        <span class="color-text-a">777 287 378 737</span>
                                    </li>
                                    <li class="d-flex justify-content-between">
                                        <strong>Email:</strong>
                                        <span class="color-text-a">annabella@example.com</span>
                                    </li>
                                    <li class="d-flex justify-content-between">
                                        <strong>Skype:</strong>
                                        <span class="color-text-a">Annabela.ge</span>
                                    </li>
                                </ul>
                                <div class="socials-a">
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <a href="#">
                                                <i class="fa fa-facebook" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#">
                                                <i class="fa fa-twitter" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#">
                                                <i class="fa fa-instagram" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#">
                                                <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#">
                                                <i class="fa fa-dribbble" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-4">
                            <div class="property-contact">
                                <form class="form-a">
                                    <div class="row">
                                        <div class="col-md-12 mb-1">
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-lg form-control-a"
                                                    id="inputName" placeholder="Name *" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-1">
                                            <div class="form-group">
                                                <input type="email" class="form-control form-control-lg form-control-a"
                                                    id="inputEmail1" placeholder="Email *" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-1">
                                            <div class="form-group">
                                                <textarea id="textMessage" class="form-control" placeholder="Comment *"
                                                    name="message" cols="45" rows="8" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-a">{{ __('Send Message') }}</button>
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
