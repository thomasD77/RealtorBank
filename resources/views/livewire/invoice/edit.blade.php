<div>
    <div class="single-add-property">
        <a href="{{ route('situation.edit', [$inspection->id, $situation->id]) }}"><p class="breadcrumb-title text-md-right text-dark"><strong><< {{ __('overzicht') }}</strong></p></a>
        <h3>{{ $title }}</h3>
        <div class="property-form-group">

            <form wire:submit.prevent="invoiceSubmit">
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
                            <textarea type="text" wire:model="remarks" placeholder="Vul hier de omschrijving in" id="remarks"></textarea>
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
        <h3>{{ __('Offerte regels') }}</h3>
        <div class="property-form-group">
            @if($invoiceDamages && $invoiceDamages->isNotEmpty())
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>{{ __('Locatie') }}</th>
                        <th>{{ __('Titel') }}</th>
                        <th>{{ __('Datum') }}</th>
                        <th>{{ __('Beschrijving') }}</th>
                        <th>{{ __('Goedgekeurd') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($invoiceDamages as $damage)
                        <tr>
                            @if($damage->basicArea)
                                <td>
                                    {{ $damage->basicArea->floor->title ?? '-' }} >>
                                    {{ $damage->basicArea->room->title ?? '-' }} >>
                                    {{ $damage->basicArea->area->title ?? '-' }}
                                </td>
                            @elseif($damage->general)
                                <td>
                                    {{ $damage->general->floor->title ?? '-' }} >>
                                    {{ $damage->general->room->title ?? '-' }}
                                </td>
                            @elseif($damage->specificArea)
                                <td>
                                    {{ $damage->specificArea->floor->title ?? '-' }} >>
                                    {{ $damage->specificArea->room->title ?? '-' }} >>
                                    {{ $damage->specificArea->specific->title ?? '-' }}
                                </td>

                            @elseif($damage->conformArea)
                                <td>
                                    {{ $damage->conformArea->floor->title ?? '-' }} >>
                                    {{ $damage->conformArea->room->title ?? '-' }} >>
                                    {{ $damage->conformArea->conform->title ?? '-' }}
                                </td>
                            @elseif($damage->techniqueArea)
                                <td>
                                    {{ $damage->techniqueArea->technique->title ?? '-' }}
                                </td>

                            @elseif($damage->outdoorArea)
                                <td>
                                    {{ $damage->outdoorArea->room->title ?? '-' }} >>
                                    {{ $damage->outdoorArea->outdoor->title ?? '-' }}
                                </td>
                            @endif

                            <!-- Schade informatie -->
                            <td>{{ $damage->damage_title ?? '-' }}</td>
                            <td>{{ $damage->damage_date ? $damage->damage_date : '-' }}</td>
                            <td>{{ $damage->damage_description ?? '-' }}</td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <p>{{ __('Geen offerte beschikbaar.') }}</p>
            @endif
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
                            <p>{{ __('Ben je zeker om deze offerte te verwijderen?') }}</p>
                            <form wire:submit.prevent="deleteInvoice">
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-dark">{{ __('Verwijderen') }}</button>
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

