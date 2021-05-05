  <!-- Modal -->
  <div class="modal fade" id="modal-delete-{{ $image->id }}" tabindex="-1" role="dialog"
      aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <form action="{{ route('images.destroy', [$image->id, $estate]) }}" method="POST">
              @csrf
              @method('DELETE')
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">{{ __('Delete Image') }}</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      {{ __('Do you want to delete this image?') }}
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary  btn-round btn-sm"
                          data-dismiss="modal">{{ __('Close') }}</button>
                      <input type="submit" value="{{ __('Delete') }}"
                          class="btn btn-danger float-left btn-round btn-sm">
                  </div>
              </div>
          </form>
      </div>
  </div>
