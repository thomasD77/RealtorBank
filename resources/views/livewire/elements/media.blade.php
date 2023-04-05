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
                        @error('media.*') <span class="text-danger">{{ $message }}</span> @enderror
                    </form>
                    <div wire:loading.block class="mb-2">
                        <i class="fa fa-clock mr-1 ml-2"></i>uploading...
                    </div>
                    @if (session()->has('process'))
                        <div class="btn btn-info flash_message">
                            {{ session('process') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="row">
                @foreach($files as $file)
                    <div class="col-md-3 mt-4">



                        <div class="img-wrapper">

                            <img src="{{ asset('assets/images/' . $folder . '/' . $file->file_original) }}" alt="test">

                            <button wire:click="deleteMedia({{ $file->id }})" class="btn btn-danger delete"><span style="font-weight: bold">x</span></button>

{{--                            <button wire:click="rotateMedia({{ $file->id }})" class="btn btn-dark rotate"><i class="fa fa-rotate-left text-white"></i></button>--}}

                            <a data-fancybox="gallery" href="{{ asset('assets/images/' . $folder . '/' . $file->file_original) }}">
                                <div class="img--cover"
                                     style="background-image: url('{{ asset('assets/images/' . $folder . '/crop' . '/' . $file->file_crop) }}');
                                     background-position: center;
                                     background-size: cover;">
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
