@if($damage->quoteCalculations)
    <style>
        /* Zet de achtergrondkleur voor de hele tabel */
        .table-custom {
            background-color: #beb8b8; /* Kies een gewenste kleur */
            margin-bottom: 25px;
            margin-top: 50px;
            font-size: 14px;
        }
    </style>

    <table class="table table-bordered table-custom">
        <thead>
            <tr>
                <th colspan="4" class="text-center font-weight-bold">{{ __('Prijzen') }}</th>
            </tr>
            <tr>
                <th class="approved-column text-center" style="font-size: 12px">{{ __('Akkoord') }}</th>
                <th>{{ __('SubCategorie') }}</th>
                <th>{{ __('Beschrijving') }}</th>
                <th>{{ __('Tax') }}</th>
                <th>{{ __('Totaal') }}</th>
            </tr>
        </thead>
        <tbody>
        @foreach($damage->quoteCalculations->where('quote_id', $quote->id) as $calculation)
            @foreach($calculation->quoteSubCalculations->where('quote_id', $quote->id) as $subCalculation)
                <tr>
                    <td class="approved-column text-center">
                        <input type="checkbox" wire:click="toggleSubCalculationApproval({{ $subCalculation->id }})" {{ $subCalculation->approved ? 'checked' : '' }}>
                    </td>
                    <td>{{ $subCalculation->subCategoryPricing->title }}</td>
                    <td>{{ $subCalculation->quote_description }}</td>
                    <td>{{ $subCalculation->quote_tax }}%</td>
                    <td>{{ number_format($subCalculation->quote_total, 2, ',', '.') }} €</td>
                </tr>
            @endforeach
            @if($loop->first)
                <tfoot>
                    <tr>
                        <td colspan="4" class="text-right font-weight-bold">{{ __('Totaal') }}:</td>
                        <td class="font-weight-bold">{{ number_format($calculation->quote_brutto_total, 2, ',', '.') }} €</td>
                    </tr>
                    <tr>
                        <td colspan="4" class="text-right font-weight-bold">{{ __('Vetustate') }}
                            @if($calculation->quote_vetustate != 0)
                            <small>{{ number_format($calculation->quote_vetustate, 2, ',', '.') }} %</small>
                            @endif
                            :</td>
                        <td class="font-weight-bold">
                            {{ number_format($calculation->quote_vetustate_amount, 2, ',', '.') }} €
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4" class="text-right font-weight-bold">{{ __('Eindtotaal') }}:</td>
                        <td class="font-weight-bold">{{ number_format($calculation->quote_final_total, 2, ',', '.') }} €</td>
                    </tr>
                </tfoot>
            @endif

        @endforeach
    </table>
@endif
