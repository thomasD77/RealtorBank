<div>

    @include('livewire.quote.css')

    <div class="single-add-property">
        <a href="{{ route('situation.edit', [$inspection->id, $situation->id]) }}"><p class="breadcrumb-title text-md-right text-dark"><strong><< {{ __('overzicht') }}</strong></p></a>
        <h3>{{ $title }}</h3>
        <div class="property-form-group">

            <form wire:submit.prevent="quoteSubmit">
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
                            <input type="date" wire:model="date" id="date" disabled>
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
        <h3>{{ __('Schade & prijzen') }}</h3>
        <div class="property-form-group row">
            @if($quoteDamages && $quoteDamages->isNotEmpty())
                @foreach($quoteDamages as $damage)
                    <div class="damage-container">
                        {{-- Header met bg-dark --}}
                        <div class="damage-header bg-dark text-white">
                            <strong>{{ __('Schade:') }}</strong> {{ $damage->damage_title ?? '-' }}
                            <span class="damage-date">{{ $damage->damage_date ? \Illuminate\Support\Carbon::parse($damage->damage_date)->format('d-m-Y') : '-' }}</span>
                        </div>

                        {{-- Schade Details --}}
                        <table class="table damage-table">
                            <thead>
                            <tr>
                                <th class="approved-column text-center">{{ __('Akkoord') }}</th>
                                <th class="location-column">{{ __('Locatie') }}</th>
                                <th class="title-column">{{ __('Titel') }}</th>
                                <th class="description-column">{{ __('Beschrijving') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="approved-column text-center">
                                    <input type="checkbox" wire:click="toggleApproval({{ $damage->id }})" {{ $damage->approved ? 'checked' : '' }}>
                                </td>
                                <td style="text-decoration: underline">
                                    @if($damage->basicArea)
                                        {{ $damage->basicArea->floor->title ?? '-' }} >>
                                        {{ $damage->basicArea->room->title ?? '-' }} >>
                                        {{ $damage->basicArea->area->title ?? '-' }}
                                    @elseif($damage->general)
                                        {{ $damage->general->room->floor->title ?? '-' }} >>
                                        {{ $damage->general->room->title ?? '-' }}
                                    @elseif($damage->specificArea)
                                        {{ $damage->specificArea->room->floor->title ?? '-' }} >>
                                        {{ $damage->specificArea->room->title ?? '-' }} >>
                                        {{ $damage->specificArea->specific->title ?? '-' }}
                                    @elseif($damage->conformArea)
                                        {{ $damage->conformArea->floor->title ?? '-' }} >>
                                        {{ $damage->conformArea->room->title ?? '-' }} >>
                                        {{ $damage->conformArea->conform->title ?? '-' }}
                                    @elseif($damage->techniqueArea)
                                        {{ $damage->techniqueArea->technique->title ?? '-' }}
                                    @elseif($damage->outdoorArea)
                                        {{ $damage->outdoorArea->room->title ?? '-' }} >>
                                        {{ $damage->outdoorArea->outdoor->title ?? '-' }}
                                    @endif
                                </td>
                                <td>{{ $damage->damage_title ?? '-' }}</td>
                                <td>{{ $damage->damage_description ?? '-' }}</td>
                            </tr>
                            </tbody>
                        </table>

                        @include('livewire.quote.calculations')

                    </div>
                @endforeach
            @else
                <p>{{ __('Geen offerte beschikbaar.') }}</p>
            @endif
        </div>
    </div>

    <div class="single-add-property">
        <h3>{{ __('Akkoord') }}</h3>
        <div class="property-form-group row">
            <div class="col-md-6 px-0">
                <div class="text-left">
                    <button wire:click="createAgreement(0)" type="button" class="btn btn-dark">
                        <i class="fa fa-rocket mx-2"></i> {{ __('Akkoord Schade') }}
                    </button>
                </div>
            </div>
            <div class="col-md-6 px-0">
                <div class="text-right">
                    <button wire:click="createAgreement(1)" type="button" class="btn btn-dark">
                        <i class="fa fa-rocket mx-2"></i> {{ __('Akkoord Schade & prijzen') }}
                    </button>
                </div>
            </div>

            @if($agreements->isNotEmpty())
                <table class="table table-striped table-bordered mt-5">
                    <thead>
                    <tr>
                        <th>{{ __('Titel') }}</th>
                        <th>{{ __('Datum') }}</th>
                        <th>{{ __('Status') }}</th>
                        <th>{{ __('PDF') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($agreements as $agreement)
                        <tr>
                            <td>{{ $agreement->title }}</td>
                            <td>{{ $agreement->created_at->format('d-m-Y') }}</td>
                            @if(!isset($agreement->pdf))
                                <td class="edit text-center">
                                    <a href="{{ route('agreement.edit',[$inspection, $situation, $quote, $agreement]) }}">
                                        <i class="fa fa-pencil-alt text-dark"></i>
                                    </a>
                                </td>
                            @else
                                <td class="text-center">
                                    <i class="fa fa-check-circle text-success p-2"></i>
                                </td>
                            @endif
                            @if(isset($agreement->pdf))
                                <td>
                                    @if($agreement->pricing)
                                        <a target="_blank" href="{{ asset('assets/agreements/pdf/' . $agreement->pdf->file_original) }}">
                                            <span class="badge badge-dark p-2">{{ __('Document: schade & prijs') }}</span>
                                        </a>
                                    @else
                                        <a target="_blank" href="{{ asset('assets/agreements/pdf/' . $agreement->pdf->file_original) }}">
                                            <span class="badge badge-dark p-2">{{ __('Document: schade') }}</span>
                                        </a>
                                    @endif
                                </td>
                            @else
                                <td style="font-style: italic">{{ __('blanco') }}</td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <div class="my-3 w-100">
                    <p class="text-center">{{ __('Geen documenten gevonden.') }}</p>
                </div>
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
                            <form wire:submit.prevent="deleteQuote">
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
