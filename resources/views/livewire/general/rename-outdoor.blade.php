<div class="single-add-property">

    <h3 class="d-flex justify-content-between" data-toggle="collapse" href="#collapseName" role="button" aria-expanded="false" aria-controls="collapseExample">
        {{ __('Personaliseer') }}
        <i class="fa fa-arrow-down"></i>
    </h3>

    <div class="collapse" id="collapseName" wire:ignore.self >

        <form wire:submit.prevent="submitTitle">
            <div class="row px-5 pt-0 the five">
                <strong class="w-100 mb-2">{{ __('Geef je eigen benaming:') }}</strong>
                <input type="text" wire:model="title">
                <button type="submit" class="btn-common btn mx-2">{{ __('save') }}</button>
                @if (session()->has('successRename'))
                    <div class="btn btn-success flash_message p-3">
                        {{ session('successRename') }}
                    </div>
                @endif
            </div>
        </form>
    </div>
</div>
