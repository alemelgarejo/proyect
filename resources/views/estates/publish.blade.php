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
                        <h5 class="modal-title" id="exampleModalLabel">{{ __('messages.Unpublish Estate') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{ __('messages.Do you want to unpublish this estate?') }}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary  btn-round btn-sm"
                            data-dismiss="modal">{{ __('messages.Close') }}</button>
                        <input type="submit" value="{{ __('messages.Unpublish') }}"
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
                        <h5 class="modal-title" id="exampleModalLabel">{{ __('messages.Publish Estate') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{ __('messages.Do you want to publish this estate?') }}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary  btn-round btn-sm"
                            data-dismiss="modal">{{ __('messages.Close') }}</button>
                        <input type="submit" value="{{ __('messages.Publish') }}"
                            class="btn btn-info float-left btn-round btn-sm">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endif
