@if (session($key ?? 'status'))
    @if (session('status') == 'No pueden añadirse más de 10 imágenes.' or session('status') == 'Imágen eliminada con éxito.' or session('status') == 'Propiedad eliminada con éxito.' or session('status') == 'Cliente eliminado con éxito.' or session('status') == 'Órden actualizada con éxito.' or session('status') == 'Propietario eliminado con éxito.' or session('status') == 'Usuario eliminado con éxito.')
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session($key ?? 'status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @elseif(session('status') == 'Las propiedades no pueden quedarse sin imágenes.' or session('status') == 'No
        puedes eliminar un cliente que tenga ordenes en el sistema.' or session('status') == 'No puedes eliminar un
        propietario que tenga ordenes en el sistema.')
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
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
