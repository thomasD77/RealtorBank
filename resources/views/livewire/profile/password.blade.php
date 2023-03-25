<div>
    <form wire:submit.prevent="pasSubmit">
        <div class="row">
            <div class="col-lg-12 ">
                <div class="form-group name">
                    <label for="title">{{ __('Huidig wachtwoord') }}</label>
                    <input class="form-control" type="password" wire:model="currentPass" id="currentPass" placeholder="Vul je huidige wachtwoord hier in...">
                    @error('currentPass') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group email">
                    <label for="newPass">{{ __('Huidig wachtwoord') }}</label>
                    <input class="form-control" type="password" wire:model="newPass" id="newPass" placeholder="Vul je nieuw wachtwoord hier in...">
                    @error('newPass') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="col-lg-12 ">
                <div class="form-group subject">
                    <label for="newPass">{{ __('Bevestig nieuw wachtwoord') }}</label>
                    <input class="form-control" type="password" wire:model="confirmNewPass" id="confirmNewPass" placeholder="Vul je nieuw wachtwoord nogmaals in...">
                    @error('confirmNewPass') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="col-12">
                <div class="send-btn">
                    <button type="submit" class="btn btn-common">{{ __('save') }}</button>
                </div>
                @if (session()->has('success'))
                    <div class="btn btn-success flash_message mt-2">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session()->has('fail'))
                    <div class="btn btn-danger flash_message mt-2">
                        {{ session('fail') }}
                    </div>
                @endif
            </div>
        </div>
    </form>
</div>
