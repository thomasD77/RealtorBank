<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('Akkoord schade') }}</title>

    @include('agreement.css-with-pricing')

</head>
<body>
    <header style="margin-bottom: 3rem">
        PB: {{  $inspection->address->address }} @if($inspection->address->postBus), {{  $inspection->address->postBus }} @endif
        @if($inspection->address->zip || $inspection->address->city), {{  $inspection->address->zip }} {{  $inspection->address->city }} @endif
    </header>

    <div style="text-align: center; margin-top: 25px; margin-bottom: 0">
        <h2 style="margin-bottom: 0; padding-bottom: 0">{{ __('AKKOORD ') }} {{ __('SCHADE & PRIJZEN') }}</h2>
    </div>

    <div class="row p-5 the-five">
        <div class="w-100">
            @if($damages && $damages->isNotEmpty())
                @foreach($damages as $damage)
                    <div class="damage-container mb-5">
                        <!-- Damage Details -->
                        <table class="table damage-table">
                            <thead>
                            <tr>
                                <th colspan="3" style="color: white; text-align: left; background-color: #343a40; padding: 10px;">
                                    <span style="font-weight: bold;">{{ __('Schade') }}: {{ $damage->damage_title ?? '-' }}</span>
                                    <span style="float: right; font-weight: normal;">{{ $damage->damage_date ? \Illuminate\Support\Carbon::parse($damage->damage_date)->format('d-m-Y') : '-' }}</span>
                                </th>
                            </tr>
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
                            <table class="table">
                                <thead>
                                <tr>
                                    <th colspan="4" style="color: white; text-align: left; background-color: #9d9d9d; padding: 10px;">
                                        <span>{{ __('Calculatie :') }} {{ $damage->damage_title ?? '-' }}</span>
                                        <span class="damage-date">{{ $damage->damage_date ? \Illuminate\Support\Carbon::parse($damage->damage_date)->format('d-m-Y') : '-' }}</span>
                                    </th>
                                </tr>
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
                                            <td style="text-align: right" class="text-right">{{ round($subCalculation->quote_tax) }} %</td>
                                            <td style="text-align: right">&euro; {{ number_format($subCalculation->quote_total, 2, ',', '.') }}</td>
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
                                            <td colspan="3">{{ __('Totaal') }}</td>
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
            <p>{{ $agreement->remarks }}</p>
        </div>

        <table class="summary-table mt-0">
            <tfoot>
            <tr>
                <th colspan="4" style="color: white; text-align: left; background-color: #343a40; padding: 10px;">
                    <span>{{ __('Totaal Offerte') }}</span>
                </th>
            </tr>
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
                    {{ $agreement->adjusted_total }}
                </td>
            </tr>
            <tr class="summary-row">
                <td colspan="3" class="label-cell">{{ __('Totaal') }}:</td>
                <td class="value-cell">
                    &euro; {{ number_format($agreement->total, 2, ',', '.') }}<br>
                    <small>*{{ __('incl. btw') }}</small>
                </td>
            </tr>
            </tfoot>
        </table>
    </div>

<!-- Signatures -->
    <section class="signature" style="margin-top: 25px; margin-bottom: 8px;">

    <div class="row" style="margin-top: 20px">
        <p>Voor het pand te {{  $inspection->address->address }}, @if($inspection->address->postBus) {{  $inspection->address->postBus }}, @endif
            @if($inspection->address->zip || $inspection->address->city) {{  $inspection->address->zip }} {{  $inspection->address->city }} @endif
            , eigendom van {{ $situation->owner ? $situation->owner->name : "" }}
            en verhuurd aan {{ $situation->tenant ? $situation->tenant->name : "" }}, werd een schade opmeting gedaan
            door {{ $inspection->user ? $inspection->user->firstName : "" }} {{ $inspection->user ? $inspection->user->lastName : "" }} @if($inspection->user->companyName)voor {{ $inspection->user->companyName }}@endif
        </p>
    </div>

    <div class="row" style="margin-top: 10px">
        <div class="column">
            <strong>{{ __('HUURDERS') }}</strong><br>
            <span class="mt-0" style="font-style: italic; font-size: 10px">gelezen en goedgekeurd</span>
            <p>{{  $agreement->situation->tenant ? $agreement->situation->tenant->name : "" }}</p>
            @if($agreement->signature_tenant)
                <img class="img-fluid" src="{{ asset('assets/signatures'. '/' . $agreement->signature_tenant) }}">
            @endif
        </div>

        <div class="column-half text-right">
            <strong>{{ __('VERHUURDERS') }}</strong><br>
            <span class="mt-0" style="font-style: italic; font-size: 10px">gelezen en goedgekeurd</span>
            <p>{{  $agreement->situation->owner ? $agreement->situation->owner->name : "" }}</p>
            @if($agreement->signature_owner)
                <img class="img-fluid" src="{{ asset('assets/signatures'. '/' . $agreement->signature_owner) }}">
            @endif
        </div>
    </div>
</section>

    <footer>
        {{ $inspection->user ? $inspection->user->firstName : "" }} {{ $inspection->user ? $inspection->user->lastName : ""  }} | {{ __('EstateMetrics') }} | &copy; {{ now()->format('Y') }}
    </footer>
</body>
</html>
