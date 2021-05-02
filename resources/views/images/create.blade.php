@extends('layouts.app', [
    'namePage' => 'Add image',
    'class' => 'sidebar-mini ',
    'activePage' => 'my-estates',
    'backgroundImage' => asset('assets') . "/img/bg14.jpg",
])

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.min.css"/>
<div class="panel-header panel-header-sm">
</div>
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
            <a class="btn btn-primary btn-round text-white pull-right" style="background: #2CA8FF;" href="{{route('images.index2', $estate->id)}}">{{__('Go to Images')}}</a>
          <h5 class="title">{{__("Add Image to Estate")}} - {{$estate->address}}, {{$estate->city}}</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <form action="{{route('images.store2', $estate->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="url" class="form-control-file" id="url" accept="image/*">
                        @include('alerts.feedback', ['field' => 'url'])
                        <button type="submit" class="btn btn-info btn-round pull-right">{{_('Add')}}</button>
                    </form>
                    {{-- <form action="{{route('images.store2', $estate->id)}}" class="dropzone" id="my-awesome-dropzone" method="POST">

                    </form> --}}

                </div>
            </div>
        </div>
    </div>
  </div>
  </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js"></script>
<script>
    // "myAwesomeDropzone" is the camelized version of the HTML element's ID
    Dropzone.options.myAwesomeDropzone = {
        paramName: "url", // The name that will be used to transfer the file
        maxFilesize: 2, // MB
        headers: {
            'X-CSRF-TOKEN' : "{{csrf_token()}}",
        },
        dictDefaultMessage: "{{__('Drop one or more images')}}",
        acceptedFiles: "image/*",
        maxFiles: 4,
    };
</script>
@endsection
