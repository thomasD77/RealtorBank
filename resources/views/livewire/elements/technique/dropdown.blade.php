<div>
    <li class="{{ $status }}">
        <div class="title">
            <span>{{ __($title) }}</span>
        </div>
        <div class="content">
            <div class="row mx-2">
                @foreach($parameters as $parameter)
                    <div class="col-md-3 col-lg-2">
                        <div class="d-flex">
                            <input type="checkbox"
                                   @if($techniqueArea->$element == $parameter) checked @endif
                                   wire:click="select('{{ $parameter }}')">
                            <p>{{ $parameter }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </li>
</div>
