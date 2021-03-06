@extends('layouts.app', [
'namePage' => __('messages.Images Management'),
'class' => 'sidebar-mini ',
'activePage' => 'my-estates',
'backgroundImage' => asset('assets') . "/img/bg14.jpg",
])

@section('content')

    <style>
        .btn:focus,
        .btn:active,
        button:focus,
        button:active {
            outline: none !important;
            box-shadow: none !important;
        }

        #image-gallery .modal-footer {
            display: block;
        }

        .thumb {
            margin-top: 15px;
            margin-bottom: 15px;
        }

    </style>

    <div class="panel-header">
    </div>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a class="btn btn-info btn-round text-white pull-right  btn-sm"
                            href="{{ route('images.create2', $estate->id) }}">{{ __('messages.Add image') }}</a>
                        <h4 class="title">{{ $estate->address }}, {{ $estate->city }} - {{ __('messages.Images') }}
                        </h4>

                        @include('alerts.success')
                        <div class="col-12 mt-2">
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="toolbar">
                            <!--        Here you can write extra buttons/actions for the toolbar              -->
                        </div>
                        <div class="photo-gallery">
                            <div class="container">
                                <div class="container">
                                    <h4 class="title">
                                        {{ __('messages.Main Image') }}</h4>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 col-xs-6 thumb" style="width: 400px !important;">
                                            <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title=""
                                                data-image="{{ asset($estate->estate_image) }}"
                                                data-target="#image-gallery">
                                                <img class="img-thumbnail" src="{{ asset($estate->estate_image) }}"
                                                    alt="Image-{{ $estate->id }}">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="container">
                                    <h4 class="title">
                                        {{ __('messages.All Images') }}</h4>
                                    <div class="row">
                                        @foreach ($images as $image)
                                            <div class="col-lg-3 col-md-4 col-xs-6 thumb" style="width: 400px !important;">
                                                <a class="thumbnail" href="#" data-image-id="" data-toggle="modal"
                                                    data-title="" data-image="{{ asset($image->url) }}"
                                                    data-target="#image-gallery">
                                                    <img class="img-thumbnail" src="{{ asset($image->url) }}"
                                                        alt="Image-{{ $image->id }}">
                                                </a>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-success btn-round btn-sm"
                                                    data-toggle="modal"
                                                    data-target="#modal-setMain-{{ $image->id }}-{{ $estate->id }}">
                                                    {{ __('messages.Set Main') }}
                                                </button>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-danger btn-round btn-sm pull-right"
                                                    data-toggle="modal" data-target="#modal-delete-{{ $image->id }}">
                                                    {{ __('messages.Delete') }}
                                                </button>
                                            </div>
                                            @include('images.setMain')
                                            @include('images.delete')
                                        @endforeach
                                        <div class="modal fade" id="image-gallery" tabindex="-1" role="dialog"
                                            aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" {{-- id="image-gallery-title" --}}>
                                                            {{ $estate->address }}, {{ $estate->city }} -
                                                            {{ __('messages.Image') }}</h4>
                                                        <button type="button" class="close" data-dismiss="modal"><span
                                                                aria-hidden="true">??</span><span
                                                                class="sr-only">{{ __('messages.Close') }}</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <img id="image-gallery-image" class="img-responsive col-md-12"
                                                            src="">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button"
                                                            class="btn btn-secondary float-left btn-round btn-sm"
                                                            id="show-previous-image"><i class="fa fa-arrow-left"></i>
                                                        </button>
                                                        <button type="button" id="show-next-image"
                                                            class="btn btn-secondary float-right btn-round btn-sm"><i
                                                                class="fa fa-arrow-right"></i>
                                                        </button>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end content-->
                        {{-- <div class="ml-3">
                {{$images->links("pagination::bootstrap-4")}}
            </div> --}}
                    </div>
                    <!--  end card  -->
                </div>
                <!-- end col-md-12 -->
            </div>
            <!-- end row -->
        </div>



        <script src="{{ asset('assets') }}/js/core/jquery.min.js"></script>
        <script>
            let modalId = $('#image-gallery');

            $(document)
                .ready(function() {

                    loadGallery(true, 'a.thumbnail');

                    //This function disables buttons when needed
                    function disableButtons(counter_max, counter_current) {
                        $('#show-previous-image, #show-next-image')
                            .show();
                        if (counter_max === counter_current) {
                            $('#show-next-image')
                                .hide();
                        } else if (counter_current === 1) {
                            $('#show-previous-image')
                                .hide();
                        }
                    }

                    /**
                     *
                     * @param setIDs        Sets IDs when DOM is loaded. If using a PHP counter, set to false.
                     * @param setClickAttr  Sets the attribute for the click handler.
                     */

                    function loadGallery(setIDs, setClickAttr) {
                        let current_image,
                            selector,
                            counter = 0;

                        $('#show-next-image, #show-previous-image')
                            .click(function() {
                                if ($(this)
                                    .attr('id') === 'show-previous-image') {
                                    current_image--;
                                } else {
                                    current_image++;
                                }

                                selector = $('[data-image-id="' + current_image + '"]');
                                updateGallery(selector);
                            });

                        function updateGallery(selector) {
                            let $sel = selector;
                            current_image = $sel.data('image-id');
                            $('#image-gallery-title')
                                .text($sel.data('title'));
                            $('#image-gallery-image')
                                .attr('src', $sel.data('image'));
                            disableButtons(counter, $sel.data('image-id'));
                        }

                        if (setIDs == true) {
                            $('[data-image-id]')
                                .each(function() {
                                    counter++;
                                    $(this)
                                        .attr('data-image-id', counter);
                                });
                        }
                        $(setClickAttr)
                            .on('click', function() {
                                updateGallery($(this));
                            });
                    }
                });

            // build key actions
            $(document)
                .keydown(function(e) {
                    switch (e.which) {
                        case 37: // left
                            if ((modalId.data('bs.modal') || {})._isShown && $('#show-previous-image').is(":visible")) {
                                $('#show-previous-image')
                                    .click();
                            }
                            break;

                        case 39: // right
                            if ((modalId.data('bs.modal') || {})._isShown && $('#show-next-image').is(":visible")) {
                                $('#show-next-image')
                                    .click();
                            }
                            break;

                        default:
                            return; // exit this handler for other keys
                    }
                    e.preventDefault(); // prevent the default action (scroll / move caret)
                });

        </script>
    @endsection
