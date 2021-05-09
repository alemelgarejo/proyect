@if ($estate->published == 'yes')
    <!-- Modal -->
    <div class="modal fade" id="modal-publish-{{ $estate->id }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ route('estates.publish', $estate->id) }}" method="post" class="ml-2">
                @csrf
                @method('PUT')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{ __('Unpublish Estate') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{ __('Do you want to unpublish this estate?') }}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary  btn-round btn-sm"
                            data-dismiss="modal">{{ __('Close') }}</button>
                        <input type="submit" value="{{ __('Unpublish') }}"
                            class="btn btn-info float-left btn-round btn-sm">
                    </div>
                </div>
            </form>
        </div>
    </div>
@elseif($estate->published == 'no')
    <!-- Modal -->
    <div class="modal fade" id="modal-publish-{{ $estate->id }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ route('estates.publish', $estate->id) }}" method="post" class="ml-2">
                @csrf
                @method('PUT')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{ __('Publish Estate') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{ __('Do you want to publish this estate?') }}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary  btn-round btn-sm"
                            data-dismiss="modal">{{ __('Close') }}</button>
                        <input type="submit" value="{{ __('Publish') }}"
                            class="btn btn-info float-left btn-round btn-sm">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endif
