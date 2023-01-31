<div>
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
</div>
