<div>
    <form wire:submit.prevent="userSubmit">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="firstName">{{ __('Voornaam') }}</label>
                    <input class="form-control" type="text" wire:model="firstName" placeholder="Vul hier de voornaam in" id="firstName">
                    @error('firstName') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="lastName">{{ __('Achternaam') }}</label>
                    <input class="form-control" type="text" wire:model="lastName" placeholder="Vul hier de achternaam in" id="lastName">
                    @error('lastName') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="phone">{{ __('Phone') }}</label>
                    <input class="form-control" type="text" wire:model="phone" placeholder="Vul hier de telefoon in" id="phone">
                    @error('phone') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="email">{{ __('E-mail') }}</label>
                    <input class="form-control" type="text" wire:model="email" placeholder="Vul hier de e-mail in" id="email" disabled required>
                    @error('email') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="companyName">{{ __('Bedrijfsnaam') }}</label>
                    <input class="form-control" type="text" wire:model="companyName" placeholder="Vul hier je bedrijfsnaam in" id="companyName">
                    @error('companyName') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                    <label for="about">{{ __('Over mij') }}</label>
                    <textarea rows="10" wire:model="about" class="form-control" placeholder="Schrijf je tekst hier."></textarea>
                    @error('about') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
            </div>

        </div>
        <button type="submit" class="btn-common btn">{{ __('save') }}</button>
        @if (session()->has('successGeneral'))
            <div class="btn btn-success flash_message p-3">
                {{ session('successGeneral') }}
            </div>
        @endif
    </form>
</div>
