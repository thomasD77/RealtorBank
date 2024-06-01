<div>
    <div class="single-add-property">
        @if($dynamicArea)
            @if(!$dynamicArea->technique_id)
                <a href="{{ route('area.' . $urlParam, [ $inspection, $dynamicArea->room, $dynamicArea->$urlParamHelper]) }}"><p class="breadcrumb-title text-md-right text-dark"><strong><< {{ __('overzicht') }}</strong></p></a>
            @else
                <a href="{{ route('area.' . $urlParam, [ $inspection, $dynamicArea->$urlParamHelper]) }}"><p class="breadcrumb-title text-md-right text-dark"><strong><< {{ __('overzicht') }}</strong></p></a>
            @endif
        @else
            <a href="{{ route('inspection.edit', $inspection->id) }}"><p class="breadcrumb-title text-md-right text-dark"><strong><< {{ __('overzicht') }}</strong></p></a>
        @endif

        <h3>{{ $title }}</h3>
        <div class="property-form-group">

            <form wire:submit.prevent="damageSubmit">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <p>
                            <label for="reference">{{ __('Titel') }}</label>
                            <input type="text" wire:model="title" placeholder="Vul hier de titel in" id="titel">
                        </p>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <p>
                            <label for="date">{{ __('Datum') }}</label>
                            <input type="date" wire:model="date" id="date">
                        </p>
                    </div>
                    <div class="col-12">
                        <p>
                            <label for="description">{{ __('Omschrijving') }}</label>
                            <textarea type="text" wire:model="description" placeholder="Vul hier de omschrijving in" id="description"></textarea>
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
                    <div class="col-md-4 col-lg-3 mt-4">
                        <div class="img-wrapper">
                            <button wire:click="deleteMedia({{ $file->id }})" class="btn btn-danger delete"><span style="font-weight: bold">x</span></button>

                            {{--     <button wire:click="rotateMedia({{ $file->id }})" class="btn btn-dark rotate"><i class="fa fa-rotate-left text-white"></i></button>--}}

                            <a class="d-md-none d-lg-block" data-fancybox="gallery" href="{{ asset('assets/images/' . $folder . '/' . $file->file_original) }}">
                                @if($file->orientation == 'v')
                                    <div class="img--cover"
                                         style="background-color: rgb(228,229,233); height: 100%;
                                        background-image: url('{{ asset('assets/images/' . $folder . '/crop' . '/' . $file->file_crop) }}');
                                        background-size: contain">
                                    </div>
                                @else
                                    <div class="img--cover"
                                         style="background-image: url('{{ asset('assets/images/' . $folder . '/crop' . '/' . $file->file_crop) }}');
                                        background-size: cover">
                                    </div>
                                @endif
                            </a>

                            {{--Temp fix for background images not displaying on tablets--}}
                            <a class="d-none d-md-block d-lg-none" data-fancybox="gallery" href="{{ asset('assets/images/' . $folder . '/' . $file->file_original) }}">
                                <div style=" min-height: 125px ; background-image: url('{{ asset('assets/images/' . $folder . '/crop' . '/' . $file->file_crop) }}'); background-repeat: no-repeat; background-position: center; background-size: cover">
                                </div>
                            </a>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="single-add-property">
        <h3>{{ __('Verwijderen') }}</h3>
        <div class="property-form-group">
            <!-- Button trigger modal -->
            <div class="text-right">
                <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-trash mx-2"></i> {{ __('Delete') }}
                </button>
            </div>


            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">{{ __('Verwijderen') }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>{{ __('Ben je zeker om deze schade te verwijderen?') }}</p>
                            <form wire:submit.prevent="deleteDamage">
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-dark">Verwijderen</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
