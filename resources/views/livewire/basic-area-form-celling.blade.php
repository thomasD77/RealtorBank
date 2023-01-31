<div>
    <h5 class="uppercase">{{ __('Basis gegevens') }}</h5>
    <h6 class="mb40">{{ $inspection->title }} > {{ $room->title }} > <strong>{{ $basicArea->area->title }}</strong></h6>

    <ul class="accordion accordion-1 one-open">

        <li class="{{ $statusType }}">
            <div class="title">
                <span>{{ __('Type') }}</span>
            </div>
            <div class="content">
                <div class="row mx-2">
                    @foreach($types as $type)
                        <div class="col-md-3 col-lg-2">
                            <div class="d-flex">
                                <input type="checkbox" @if($basicArea->type == $type) checked @endif  wire:click="selectType('{{ $type }}')"><p>{{ $type }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </li>

        <li class="{{ $statusMaterial }}">
            <div class="title">
                <span>{{ __('Materialen') }}</span>
            </div>
            <div class="content">
                <div class="row mx-2">
                    @foreach($materials as $material)
                        <div class="col-md-3 col-lg-2">
                            <div class="d-flex">
                                <input type="checkbox" @if($basicArea->material == $material) checked @endif  wire:click="selectMaterial('{{ $material }}')"><p>{{ $material }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </li>

        <livewire:basic.colors
            :BasicArea="$basicArea"
        />

        <livewire:basic.analysis
            :BasicArea="$basicArea"
        />

        <livewire:basic.media
            :BasicArea="$basicArea"
        />

        <livewire:basic.extra
            :BasicArea="$basicArea"
        />

    </ul>
</div>
