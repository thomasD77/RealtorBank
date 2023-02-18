<div class="mb-3">
    <li class="{{ $status }}" wire:ignore.self>
        <div class="title">
            <span>{{ __($title) }}</span>
        </div>
        <div class="content">
            <div class="row m-3">
                @foreach($parameters as $parameter)
                    @if($parameter != \App\Enums\DynamicKey::Dynamic->value)
                        <div class="col-md-3 col-lg-2">
                            <div class="checkboxes my-2">
                                <input id="{{ $parameter }}"
                                       type="checkbox"
                                       @if($this->dynamicArea->$element == $parameter) checked @endif
                                       wire:click="select('{{ $parameter }}', '{{ $parameter  }}')"
                                >
                                <label for="{{ $parameter }}">{{ $parameter }}</label>
                            </div>
                        </div>
                    @else
                        <div class="col-md-4">
                            <input type="text"
                                   class="my-2"
                                   placeholder="andere..."
                                   wire:change="submitDynamic"
                                   wire:model="dynamic"
                            >
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </li>
</div>


