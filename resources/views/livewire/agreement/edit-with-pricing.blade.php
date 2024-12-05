<div>

    @include('livewire.agreement.css-with-pricing')

    {{--Header with title--}}
    <div class="single-add-property">
        <a class="breadcrumb-link" href="{{ route('quote.edit', [$inspection, $agreement->situation->id, $quote]) }}"><p class="breadcrumb-title text-md-right text-dark"><strong><< {{ __('Offerte') }}</strong></p></a>

        <h3>{{ __('Akkoord schade & prijzen') }}</h3>

        @if (session()->has('successTenant'))
            <div class="btn btn-success flash_message">
                {{ session('successTenant') }}
            </div>
        @endif
        @if (session()->has('success'))
            <div class="btn btn-success flash_message">
                {{ session('success') }}
            </div>
        @endif
    </div>

    {{--Signatures--}}
    <div class="p-5 the-five" style="background-color: #1d293e;">
        <div class="row">
            <div class="col-md-6 bg-white px-0">
                <form method="POST" action="{{ route('create.signature.agreement') }}">
                    <input type="hidden" name="tenant" value="1">
                    <input type="hidden" name="agreement" value="{{ $agreement->id }}">
                    @csrf
                    <div class="col-md-11">
                        <label class="py-3" for="">{{ __('Handtekening') }} {{ $situation->tenant->name }}</label>
                        <br/>
                        <div id="sig_tenant"></div>
                        <br/>
                        <div class="text-right">
                            <button id="clear65" class="btn btn-danger btn-sm">{{ __('wissen') }}</button>
                        </div>
                        <textarea id="signature65" name="signed" style="display: none"></textarea>
                    </div>
                    <br/>
                    <button class="btn btn-dark m-3">{{ __('Submit') }}</button>
                </form>
            </div>
            <div class="col-md-6 bg-white px-0">
                <form method="POST" action="{{ route('create.signature.agreement') }}">
                    <input type="hidden" name="tenant" value="0">
                    <input type="hidden" name="agreement" value="{{ $agreement->id }}">
                    @csrf
                    <div class="col-md-11">
                        <label class="py-3" for="">{{ __('Handtekening') }} {{ $agreement->situation->owner ? $agreement->situation->owner->name : "" }} </label>
                        <br/>
                        <div id="sig" style="touch-action: none;"></div>
                        <br/>
                        <div class="text-right">
                            <button id="clear" class="btn btn-danger btn-sm">{{ __('wissen') }}</button>
                        </div>
                        <textarea id="signature64" name="signed" style="display: none"></textarea>
                    </div>
                    <br/>
                    <button class="btn btn-dark m-3">{{ __('Submit') }}</button>
                </form>
            </div>
        </div>
    </div>

    {{--Contract--}}
    <div class="invoice mb-0">
        <div class="card border-0">
            <div class="card-body p-0">
                <div class="row p-5 the-five">
                    <div class="col-md-6">
                        <!-- <img src="{{ asset('assets/images/logo.svg') }}" width="80" alt="Logo"> -->
                    </div>

                    <div class="col-md-6 text-right">
                        <p class="font-weight-bold mb-1">{{ __('Contract opgemaakt op') }}</p>
                        <p>{{ today()->format('d-m-Y')}}</p>
                    </div>
                </div>

                <hr>

                <!-- Credentials authorized parties -->
                <div class="row p-5 the-five">

                    <div class="text-center w-100 my-4">
                        <h3>{{ __('Akkoord schade & prijzen') }}</h3>
                    </div>

                    <div class="w-100">
                        @if($damages && $damages->isNotEmpty())
                            @foreach($damages as $damage)
                                <div class="damage-container mb-5">
                                    <!-- Header -->
                                    <div class="damage-header">
                                        <span>{{ __('Schade') }}: {{ $damage->damage_title ?? '-' }}</span>
                                        <span class="damage-date">{{ $damage->damage_date ? \Illuminate\Support\Carbon::parse($damage->damage_date)->format('d-m-Y') : '-' }}</span>
                                    </div>

                                    <!-- Damage Details -->
                                    <table class="table damage-table">
                                        <thead>
                                        <tr>
                                            <th class="location-column">{{ __('Locatie') }}</th>
                                            <th class="title-column">{{ __('Titel') }}</th>
                                            <th class="description-column">{{ __('Beschrijving') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                @if($damage->basicArea)
                                                    {{ $damage->basicArea->floor->title ?? '-' }} >>
                                                    {{ $damage->basicArea->room->title ?? '-' }} >>
                                                    {{ $damage->basicArea->area->title ?? '-' }}
                                                @elseif($damage->general)
                                                    {{ $damage->general->room->floor->title ?? '-' }} >>
                                                    {{ $damage->general->room->title ?? '-' }}
                                                @endif
                                            </td>
                                            <td>{{ $damage->damage_title ?? '-' }}</td>
                                            <td>{{ $damage->damage_description ?? '-' }}</td>
                                        </tr>
                                        </tbody>
                                    </table>

                                    <!-- Calculations -->
                                    @if($damage->quoteCalculations)
                                        <div class="damage-header" style="background-color: #9d9d9d">
                                            <span>{{ __('Calculatie :') }} {{ $damage->damage_title ?? '-' }}</span>
                                            <span class="damage-date">{{ $damage->damage_date ? \Illuminate\Support\Carbon::parse($damage->damage_date)->format('d-m-Y') : '-' }}</span>
                                        </div>
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th class="title-column">{{ __('Categorie') }}</th>
                                                <th class="description-column">{{ __('Beschrijving') }}</th>
                                                <th class="tax-column text-right">{{ __('BTW') }}</th>
                                                <th class="total-column text-right">{{ __('Totaal') }}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($damage->quoteCalculations->where('quote_id', $quote->id) as $calculation)
                                                @foreach($calculation->quoteSubCalculations->where('quote_id', $quote->id)->where('approved', 1) as $subCalculation)
                                                    <tr>
                                                        <td>{{ $subCalculation->subCategoryPricing->title }}</td>
                                                        <td>{{ $subCalculation->quote_description }}</td>
                                                        <td class="text-right">{{ round($subCalculation->quote_tax) }} %</td>
                                                        <td class="text-right">&euro; {{ number_format($subCalculation->quote_total, 2, ',', '.') }}</td>
                                                    </tr>
                                                @endforeach
                                                @if($loop->first)
                                                    <!-- Summary -->
                                                    <tr>
                                                        <td></td>
                                                    </tr>
                                                    <tr class="calculation-summary">
                                                        <td colspan="3">{{ __('Subtotaal') }}</td>
                                                        <td class="text-right">&euro; {{ number_format($calculation->quote_brutto_total, 2, ',', '.') }}</td>
                                                    </tr>
                                                    <tr class="calculation-summary">
                                                        <td colspan="3">{{ __('Vetustate') }} <br>
                                                            <small>{{ number_format($calculation->quote_vetustate, 2, ',', '.') }} %</small>
                                                        </td>
                                                        <td class="text-right">
                                                            {{ $calculation->quote_vetustate != 0 ? '€ ' . number_format($calculation->quote_vetustate_amount, 2, ',', '.') : '0' }}
                                                        </td>
                                                    </tr>
                                                    <tr class="calculation-summary">
                                                        <td colspan="3">{{ __('Totaal') }}
                                                            <br>
                                                            <small>{{ __('incl. btw.') }}</small>
                                                        </td>
                                                        <td class="text-right">&euro; {{ number_format($calculation->quote_final_total, 2, ',', '.') }}</td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                            </tbody>
                                        </table>
                                    @endif
                                </div>
                            @endforeach
                        @else
                            <p>{{ __('Geen schades geselecteerd.') }}</p>
                        @endif
                    </div>

                    <div class="w-100">
                        <strong class="mb-1 mt-3">{{ __('Notities') }}:</strong>
                        <textarea
                            wire:change="changeRemarks"
                            wire:model.defer="remarks"
                            placeholder="{{ $remarks ?? 'Opmerkingen over deze berekeningen schrijf je hier...' }}"
                            class="remarks-field"
                        ></textarea>
                    </div>

                    <table class="summary-table mt-0">
                        <tfoot>
                        <div class="damage-header bg-dark w-100">
                            <span>{{ __('Totaal Offerte') }}</span>
                        </div>
                            <tr class="summary-row">
                                <td colspan="3" class="label-cell">{{ __('Subtotaal') }}:</td>
                                <td class="value-cell">
                                    &euro; {{ number_format($subsTotal, 2, ',', '.') }}<br>
                                    <small>*{{ __('incl. btw') }}</small>
                                </td>
                            </tr>
                            <tr class="summary-row">
                                <td colspan="3" class="label-cell">{{ __('Correctie bedrag (€)') }}:</td>
                                <td class="value-cell">
                                    <input
                                        type="number"
                                        step="0.01"
                                        wire:change="updateAdjustedTotal"
                                        wire:model.defer="adjustedTotal"
                                        placeholder="{{ $adjustedTotal ?? 'Voer bedrag in...' }}"
                                        class="highlighted-input"
                                    />
                                </td>
                            </tr>
                            <tr class="summary-row">
                                <td colspan="3" class="label-cell">{{ __('Totaal') }}:</td>
                                <td class="value-cell">
                                    &euro; {{ number_format($total, 2, ',', '.') }}<br>
                                    <small>*{{ __('incl. btw') }}</small>
                                </td>
                            </tr>
                        </tfoot>
                    </table>

                    <p class="mt-5">Voor het pand te {{  $inspection->address->address }}, @if($inspection->address->postBus) {{  $inspection->address->postBus }}, @endif
                        @if($inspection->address->zip || $inspection->address->city) {{  $inspection->address->zip }} {{  $inspection->address->city }} @endif
                        , eigendom van {{ $situation->owner ? $situation->owner->name : "" }}
                        en verhuurd aan {{ $situation->tenant ? $situation->tenant->name : "" }}, werd een schade opmeting gedaan
                        door {{ $inspection->user ? $inspection->user->firstName : "" }} {{ $inspection->user ? $inspection->user->lastName : "" }} @if($inspection->user->companyName)voor {{ $inspection->user->companyName }}@endif
                    </p>

                    <p class="w-100 mt-4">{{ __('Datum opgemaakt') }}: {{ today()->format('d-m-Y')}}</p>

                    <!-- Signatures -->
                    <div class="signature row w-100">
                        <div class="col-md-6 ">
                            <strong>{{ __('HUURDERS') }}</strong><br>
                            <span class="mt-0" style="font-style: italic; font-size: 10px">gelezen en goedgekeurd</span>
                            <p>{{  $agreement->situation->tenant ? $agreement->situation->tenant->name : "" }}</p>
                            @if($agreement->signature_tenant)
                                <img class="img-fluid" src="{{ asset('assets/signatures'. '/' . $agreement->signature_tenant) }}">
                            @endif
                        </div>

                        <div class="col-md-6 text-right">
                            <strong>{{ __('VERHUURDERS') }}</strong><br>
                            <span class="mt-0" style="font-style: italic; font-size: 10px">gelezen en goedgekeurd</span>
                            <p>{{  $agreement->situation->owner ? $agreement->situation->owner->name : "" }}</p>
                            @if($agreement->signature_owner)
                                <img class="img-fluid" src="{{ asset('assets/signatures'. '/' . $agreement->signature_owner) }}">
                            @endif
                        </div>
                    </div>

                </div>

                <div class="single-add-property">
                    <h3>{{ __('Akkoord printen') }}</h3>
                    <a href="{{ route('print.agreementWithPricing', [$inspection, $situation, $quote, $agreement]) }}" class="btn btn-dark">{{ __('Printen') }}</a>
                </div>

            </div>
        </div>
    </div>
</div>
