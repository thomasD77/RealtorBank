<div>
    <button wire:click="makeFavourite" class="btn btn-warning text-white">
        @if($isFavourite)
            <i class="fa fa-star text-white"></i>
        @else
            <i class="far fa-star text-white"></i>
        @endif

        {{ __($area->title) }}

    </button>
</div>
