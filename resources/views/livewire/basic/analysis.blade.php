<div>
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
</div>
