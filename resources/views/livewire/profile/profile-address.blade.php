<div>
    <form wire:submit.prevent="addressSubmit">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="firstName">{{ __('Adres') }}</label>
                    <input class="form-control" type="text" wire:model="address" placeholder="Vul hier de adres in" id="address">
                    @error('address') <span class="error text-danger">{{ $message }}</span> @enderror

                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="lastName">{{ __('Bus nummer') }}</label>
                    <input class="form-control" type="text" wire:model="postBus" placeholder="Vul hier de bus nummer in" id="postBus">
                    @error('postBus') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="phone">{{ __('Postcode') }}</label>
                    <input class="form-control" type="text" wire:model="zip" placeholder="Vul hier je postcode in" id="zip">
                    @error('zip') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="email">{{ __('Stad') }}</label>
                    <input class="form-control" type="text" wire:model="city" placeholder="Vul hier je stad in" id="city">
                    @error('city') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="email">{{ __('Land') }}</label>
                    <input class="form-control" type="text" wire:model="country" placeholder="Vul hier je land in" id="country">
                    @error('country') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>
        <button type="submit" class="btn-common btn">{{ __('Submit') }}</button>
        @if (session()->has('success'))
            <div class="btn btn-success flash_message">
                {{ session('success') }}
            </div>
        @endif
    </form>
</div>

