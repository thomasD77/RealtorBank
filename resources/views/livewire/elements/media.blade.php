<div>
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
                    <div class="col-md-3">
                        <div class="img-wrapper">
                            <button wire:click="deleteMedia({{ $file->id }})" class="btn btn-danger delete">X</button>
                            <img class="img-fluid" wire:key="{{ $file->id }}" src="{{ asset('assets/images/' . $folder . '/crop' . '/' . $file->file_crop) }}" alt="picture">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
