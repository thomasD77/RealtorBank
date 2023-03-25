<div>
    <form wire:submit.prevent="addressSubmit">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="addressInput">{{ __('Adres') }}</label>
                    <input class="form-control" type="text" wire:model="addressInput" placeholder="Vul hier de adres in" id="addressInput">
                    @error('addressInput') <span class="error text-danger">{{ $message }}</span> @enderror

                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="postBus">{{ __('Bus nummer') }}</label>
                    <input class="form-control" type="text" wire:model="postBus" placeholder="Vul hier de bus nummer in" id="postBus">
                    @error('postBus') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="zip">{{ __('Postcode') }}</label>
                    <input class="form-control" type="text" wire:model="zip" placeholder="Vul hier je postcode in" id="zip">
                    @error('zip') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="city">{{ __('Stad') }}</label>
                    <input class="form-control" type="text" wire:model="city" placeholder="Vul hier je stad in" id="city">
                    @error('city') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="country">{{ __('Land') }}</label>
                    <input class="form-control" type="text" wire:model="country" placeholder="Vul hier je land in" id="country">
                    @error('country') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>
        <button type="submit" class="btn-common btn">{{ __('save') }}</button>
        @if (session()->has('successAddress'))
            <div class="btn btn-success flash_message p-3">
                {{ session('successAddress') }}
            </div>
        @endif
    </form>
</div>

