>>> Form parts

/*
*	Extra | textarea
*/
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

/*
*	Analyse | dropdown
*/
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
