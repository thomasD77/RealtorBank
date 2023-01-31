<div>
    <h5 class="uppercase">{{ __('Basis gegevens') }}</h5>
    <h6 class="mb40">{{ $inspection->title }} | {{ $room->title }} | <strong>{{ $basicArea->area->title }}</strong></h6>

    <ul class="accordion accordion-1 one-open">
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

        <li class="{{ $statusColor }}">
            <div class="title">
                <span>{{ __('Kleuren') }}</span>
            </div>
            <div class="content">
                <div class="row mx-2">
                    @foreach($colors as $color)
                        <div class="col-md-3 col-lg-2">
                            <div class="d-flex">
                                <input type="checkbox" @if($basicArea->color == $color) checked @endif  wire:click="selectColor('{{ $color }}')"><p>{{ $color }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </li>

        <li class="{{ $statusPlinth }}">
            <div class="title">
                <span>{{ __('Plinten') }}</span>
            </div>
            <div class="content">
                <div class="row mx-2">
                    @foreach($plinths as $plinth)
                        <div class="col-md-3 col-lg-2">
                            <div class="d-flex">
                                <input type="checkbox" @if($basicArea->plinth == $plinth) checked @endif  wire:click="selectPlinth('{{ $plinth }}')"><p>{{ $plinth }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </li>

        <li class="{{ $statusAnalysis }}">
            <div class="title">
                <span>{{ __('Analyse') }}</span>
            </div>
            <div class="content">
                <div class="row mx-2">
                    @foreach($analysis as $analyse)
                        <div class="col-md-3 col-lg-2">
                            <div class="d-flex">
                                <input type="checkbox" @if($basicArea->analysis == $analyse) checked @endif  wire:click="selectAnalysis('{{ $analyse }}')"><p>{{ $analyse }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </li>

        <li class="{{ $statusMedia }}">
            <div class="title">
                <span>{{ __('Media') }}</span>
            </div>
            <div class="content">
                <div class="row mx-2">
                    <p>Hier zal je foto's kunnen uploaden...</p>
                </div>
            </div>
        </li>

        <li class="{{ $statusExtra }}" wire:click="openExtra">
            <div class="title">
                <span>{{ __('Extra') }}</span>
            </div>
            <div class="content">
                <div class="row">
                    <textarea wire:model="extra" cols="30" rows="15" class="mb-0"></textarea>
                </div>
            </div>
        </li>
    </ul>
</div>
