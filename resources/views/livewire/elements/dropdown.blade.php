<div class="mb-3">
    <li class="{{ $status }}" wire:ignore.self>
        <div class="title">
            <span>{{ __($title) }}</span>
        </div>
        <div class="content">
            <div class="row m-3">
                @foreach($parameters as $i => $parameter)
                    @if($parameter != \App\Enums\DynamicKey::Dynamic->value)
                        <div class="col-md-4 col-lg-2">
                            <div class="m-2">
                                <label class="mx-2">
                                    <input type="checkbox"
                                         @if($this->dynamicArea->$element == $parameter) checked @endif
                                         wire:click="select('{{ $parameter }}')"><span class="mx-2">{{ $parameter }}</span>
                                </label>
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


