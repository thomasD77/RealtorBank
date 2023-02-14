<div>
    <li class="{{ $status }}">
        <div class="title">
            <span>{{ __($title) }}</span>
        </div>
        <div class="content">
            <div class="row my-4 mx-2">
                @foreach($parameters as $parameter)
                    <div class="col-md-3 col-lg-2">
                        <div class="checkboxes">
                            <input id="{{ $parameter }}" type="checkbox"
                                   @if($conformArea->$element == $parameter) checked @endif
                                   wire:click="select('{{ $parameter }}')">
                            <label for="{{ $parameter }}">{{ $parameter }}</label>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </li>
</div>
