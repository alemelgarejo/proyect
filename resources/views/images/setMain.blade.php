  <!-- Modal -->
  <div class="modal fade" id="modal-setMain-{{ $image->id }}-{{ $estate->id }}" tabindex="-1" role="dialog"
      aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">

          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">{{ __('Set Main Image') }}</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  {{ __('Do you want to set this image as the main image?') }} <br><br>
                  <img src="{{ $image->url }}" alt="{{ $image->id }}">
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary  btn-round btn-sm"
                      data-dismiss="modal">{{ __('Close') }}</button>
                  <a href="{{ route('images.setMainImage', [$image->id, $estate->id]) }}"
                      class="btn btn-success float-left btn-round btn-sm">{{ __('Set Main') }}</a>
              </div>
          </div>
      </div>
  </div>
