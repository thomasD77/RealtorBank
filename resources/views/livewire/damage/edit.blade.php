<div>
    <div class="single-add-property">
        @if(!$dynamicArea->technique_id)
            <a href="{{ route('area.' . $urlParam, [ $inspection, $dynamicArea->room, $dynamicArea->$urlParamHelper]) }}"><p class="breadcrumb-title text-md-right text-dark"><strong><< {{ __('overzicht') }}</strong></p></a>
        @else
            <a href="{{ route('area.' . $urlParam, [ $inspection, $dynamicArea->$urlParamHelper]) }}"><p class="breadcrumb-title text-md-right text-dark"><strong><< {{ __('overzicht') }}</strong></p></a>
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
