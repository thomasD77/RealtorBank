<div>
    <div class="single-add-property">
        <h3>{{ __('Document') }}</h3>
        <div class="property-form-group">
            <form wire:submit.prevent="documentSubmit">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <p>
                            <label for="name">{{ __('Titel') }}</label>
                            <input type="text" wire:model="title" placeholder="Vul hier de titel in" id="title">
                        </p>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <p>
                            <label for="email">{{ __('Referentie') }}</label>
                            <input type="text" wire:model="reference" placeholder="Vul hier de referentie in" id="reference">
                        </p>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <p>
                            <label for="phone">{{ __('Datum') }}</label>
                            <input type="date" wire:model="date" id="date">
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mt-5">
                        <button type="submit" class="btn btn-dark">save</button>
                        @if (session()->has('success'))
                            <div class="btn btn-success flash_message">
                                {{ session('success') }}
                            </div>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>


    <div class="single-add-property">
            <h3>{{ __('Media') }}</h3>
            <div class="property-form-group">
                <div class="row">
                    <div class="col-md-12">
                        <form wire:submit.prevent="saveMedia">
                            <div class="dropzone--custom">
                                <input class="py-5 w-100 file--button" type="file" wire:model="media" multiple>
                                <p class="mx-5">Klik hier om bestanden toe te voegen.</p>
                            </div>
                            <button class="btn btn-dark my-4" type="submit">Save Photo</button>
                            @if($media)
                                <div class="btn  btn-success text-white">media ready!</div>
                            @endif
                        </form>
                    </div>
                </div>
                <div class="row">
                    @foreach($files as $file)
                        <div class="col-md-3 mt-4">
                            <div class="img-wrapper">
                                <button wire:click="deleteMedia({{ $file->id }})" class="btn btn-danger delete">X</button>
                                <a data-fancybox="gallery" href="{{ asset('assets/images/' . $folder . '/' . $file->file_original) }}">
                                    <img class="img-fluid" wire:key="{{ $file->id }}" src="{{ asset('assets/images/' . $folder . '/crop' . '/' . $file->file_crop) }}" alt="picture">
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
</div>
