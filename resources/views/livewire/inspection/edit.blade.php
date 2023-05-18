<div>
    <div class="single-add-property">
        <a href="{{ route('inspections.index', $inspection) }}"><p class="breadcrumb-title text-md-right text-dark"><strong><< {{ __('overzicht') }}</strong></p></a>
        <h3>{{ __('Algemene gegevens')  }}</h3>
        <div class="property-form-group">
            <form wire:submit.prevent="submitGeneral">
                <div class="row">
                    <div class="col-md-8">
                        <p>
                            <label for="title">{{ __('Titel') }}</label>
                            <input class="form-control" type="text" wire:model="title" id="title" placeholder="Vul je titel hier in...">
                        </p>
                    </div>
                    <div class="col-md-4">
                        <p>
                            <label for="date">{{ __('Datum') }}</label>
                            <input type="date" wire:model="date" id="date">
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p>
                            <label for="description">{{ __('Beschrijving') }}</label>
                            <textarea id="description" wire:model="description" placeholder="Vul je beschrijving hier in..."></textarea>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-dark">save</button>
                        @if (session()->has('successGeneral'))
                            <div class="btn btn-success flash_message">
                                {{ session('successGeneral') }}
                            </div>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="single-add-property">
        <h3>{{ __('Adres gegevens') }}</h3>
        <div class="property-form-group">
            <form wire:submit.prevent="locationSubmit">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <p>
                            <label for="addressInput">{{ __('Adres') }}</label>
                            <input type="text" wire:model="addressInput" placeholder="Vul hier je adres in" id="addressInput">
                        </p>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <p>
                            <label for="city">{{ __('Bus') }}</label>
                            <input type="text" wire:model="postBus" placeholder="Vul hier je bus in" id="postBus">
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <p>
                            <label for="state">{{ __('Postcode') }}</label>
                            <input type="text" wire:model="zip" placeholder="Vul hier je postcode in" id="zip">
                        </p>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <p>
                            <label for="country">{{ __('Stad') }}</label>
                            <input type="text" wire:model="city" placeholder="Vul hier je stad in" id="city">
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <p class="no-mb first">
                            <label for="latitude">{{ __('Land') }}</label>
                            <input type="text" wire:model="country" placeholder="Vul hier je land in" id="country">
                        </p>
                    </div>

                </div>
                <div class="row">
                    <div class="col-12 mt-5">
                        <button type="submit" class="btn btn-dark">save</button>
                        @if (session()->has('successAddress'))
                            <div class="btn btn-success flash_message">
                                {{ session('successAddress') }}
                            </div>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="single-add-property">
        <h3>{{ __('Extra informatie') }}</h3>
        <div class="property-form-group">
            <div class="row">
                <div class="col-lg-4 col-md-12 dropdown faq-drop">
                    <ul>
                        <li class="fl-wrap filter-tags clearfix">
                            <div class="checkboxes float-left">
                                <div class="filter-tags-wrap">
                                    <input id="check-a" type="checkbox" wire:click="present('{{ 'tenant_present' }}')" @if($tenant_present) checked @endif>
                                    <label for="check-a">{{ __('Huurder aanwezig') }}</label>
                                </div>
                            </div>
                        </li>
                        <li class="fl-wrap filter-tags clearfix">
                            <div class="checkboxes float-left">
                                <div class="filter-tags-wrap">
                                    <input id="check-b" type="checkbox" wire:click="present('{{ 'owner_present' }}')" @if($owner_present) checked @endif>
                                    <label for="check-b">{{ __('Eigenaar aanwezig') }}</label>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-12 dropdown faq-drop">
                    <ul>
                        <li class="fl-wrap filter-tags clearfix">
                            <div class="checkboxes float-left">
                                <div class="filter-tags-wrap">
                                    <input id="check-c" type="checkbox" wire:click="present('{{ 'new_building' }}')" @if($new_building) checked @endif>
                                    <label for="check-c">{{ __('Nieubouw') }}</label>
                                </div>
                            </div>
                        </li>
                        <li class="fl-wrap filter-tags clearfix">
                            <div class="checkboxes float-left">
                                <div class="filter-tags-wrap">
                                    <input id="check-d" type="checkbox" wire:click="present('{{ 'inhabited' }}')" @if($inhabited) checked @endif>
                                    <label for="check-d">{{ __('Bewoond') }}</label>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-12 dropdown faq-drop">
                    <ul>
                        <li class="fl-wrap filter-tags clearfix">
                            <div class="checkboxes float-left">
                                <div class="filter-tags-wrap">
                                    <input id="check-e" type="checkbox" wire:click="present('{{ 'furnished' }}')" @if($furnished) checked @endif>
                                    <label for="check-e">{{ __('Bemeubeld') }}</label>
                                </div>
                            </div>
                        </li>
                        <li class="fl-wrap filter-tags clearfix">
                            <div class="checkboxes float-left">
                                <div class="filter-tags-wrap">
                                    <input id="check-f" type="checkbox" wire:click="present('{{ 'first_resident' }}')" @if($first_resident) checked @endif>
                                    <label for="check-f">{{ __('Eerste bewoner') }}</label>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
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

        <h3 class="d-flex justify-content-between" data-toggle="collapse" href="#collapseName" role="button" aria-expanded="false" aria-controls="collapseExample">
            {{ __('Sortering') }}
            <i class="fa fa-arrow-down"></i>
        </h3>

        <div class="collapse" id="collapseName" wire:ignore.self >
            <div class="row">

                <livewire:general.ground-floor-sorting
                    :inspection="$inspection"
                />

                <livewire:general.upper-floor-sorting
                    :inspection="$inspection"
                />

            </div>

        </div>
    </div>

    <div class="single-add-property">
        <h3>{{ __('Verwijderen') }}</h3>
        <div class="property-form-group">

            <div class="text-right">
                <!-- Button trigger modal -->
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
                            <p>{{ __('Ben je zeker om deze plaatsbeschrijving wil verwijderen?') }}</p>
                            <form wire:submit.prevent="deleteInspection">
                                <div class="row">
                                    <div class="col-md-12 text-right">
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
