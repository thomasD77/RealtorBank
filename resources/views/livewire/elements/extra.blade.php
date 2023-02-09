<div class="mt-5">
    <div class="title">
        <span>{{ __('Extra') }}</span>
    </div>
    <form wire:submit.prevent="submit">
        <textarea wire:model.defer="extra" cols="30" rows="15" class="mb-0"></textarea>
        <button class="btn btn-dark" type="submit">save</button>
        @if (session()->has('success'))
            <div class="btn btn-success flash_message">
                {{ session('success') }}
            </div>
        @endif
    </form>
</div>

