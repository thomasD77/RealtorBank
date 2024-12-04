<div>
    <div class="block-content">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-alt push d-flex justify-content-end mb-0 mt-3">
                <li class="breadcrumb-item text-right">
                    <a href="{{ route('keys.index', $inspection) }}">
                        <i class="fa fa-arrow-left fa-long-arrow-alt-left"></i> {{ __('Terug naar... Sleutels') }}
                    </a>
                </li>
            </ol>
        </nav>
    </div>
    <div class="single-add-property">
        <h3>{{  __('Sleutel') }} -  <input class="form-control" type="text" wire:model="title" wire:change="editTitle" id="title" placeholder="Vul je titel hier in..."></h3>

        <ul class="accordion accordion-1 one-open">

            <livewire:keys.elements.types
                :dynamicArea="$key"
            />

            <livewire:keys.elements.count
                :dynamicArea="$key"
            />

            <livewire:keys.elements.extra
                :dynamicArea="$key"
            />


        </ul>
    </div>

    <div class="single-add-property">
        <ul class="accordion accordion-1 one-open">

            <livewire:keys.elements.media
                :dynamicArea="$key"
            />

        </ul>
    </div>
</div>

