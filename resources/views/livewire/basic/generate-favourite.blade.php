<div class="d-flex">
    @if (session()->has('successGen'))
        <div class="btn mr-2 btn-success flash_message d-flex align-items-center">
            {{ session('successGen') }}
        </div>
    @endif
    <button wire:click="generateFavourite" class="btn btn-info text-white">

        <i class="fa fa-file text-white"></i>

        {{ __('Generate') }}

    </button>
</div>
