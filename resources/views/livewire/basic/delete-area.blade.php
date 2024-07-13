<div class="single-add-property">
    @if($basicArea->sidebar_count != 1)
        <h3>{{ __('Verwijderen') }}</h3>
        <label for="check-e"><p style="font-size:12px; text-transform: lowercase">{{ __('*enkel gedupliceerde parameters kunnen worden verwijderd.') }}</p></label>
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
                        <p>{{ __('Ben je zeker om deze te verwijderen?') }}</p>
                        <form wire:submit.prevent="deleteArea">
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
    @endif
</div>
