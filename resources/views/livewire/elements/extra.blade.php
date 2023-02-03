<div>
    <li class="{{ $status }}" wire:click="openExtra">
        <div class="title">
            <span>{{ __('Extra') }}</span>
        </div>
        <div class="content">
            <div class="row">
                <textarea wire:model="extra" cols="30" rows="15" class="mb-0"></textarea>
            </div>
        </div>
    </li>
</div>
