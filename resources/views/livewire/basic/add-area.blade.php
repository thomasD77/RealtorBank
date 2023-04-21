<div class="d-flex justify-content-end">
    @if (session()->has('successAdd'))
        <div class="btn mb-3 mr-2 btn-success flash_message d-flex align-items-center">
            {{ session('successAdd') }}
        </div>
    @endif
    <button wire:click="addArea" class="btn btn-common mb-3"><i class="fa fa-plus mr-2"></i>{{ __($area->title) }}</button>
</div>
