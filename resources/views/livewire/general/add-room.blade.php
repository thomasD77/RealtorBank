<div class="d-flex justify-content-end">
    @if($room->floor_id == 1 || $room->floor_id == 2 || $room->floor_id == 3 || $room->floor_id == 4 || $room->floor_id == 5)
        @if (session()->has('successAdd'))
            <div class="btn mb-3 mr-2 btn-success flash_message d-flex align-items-center">
                {{ session('successAdd') }}
            </div>
        @endif
        <button wire:click="addRoom" class="btn btn-common mb-3"><i class="fa fa-plus mr-1"></i>{{ __($room->title) }}</button>
    @endif
</div>
