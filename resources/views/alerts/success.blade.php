@if (session($key ?? 'status'))
    @if(session('status') == 'No pueden añadirse más de 10 imágenes.')
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="background-color: #FF3636 !important">
            {{ session($key ?? 'status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @else
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session($key ?? 'status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
@endif
