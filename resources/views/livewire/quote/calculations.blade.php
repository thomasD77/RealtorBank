{{-- Calculations --}}
@if($damage->quoteCalculations)
    <div class="calculation-container">
        <table class="calculation-table">
            <thead>
            <tr>
                <th class="approved-column text-center">{{ __('Akkoord') }}</th>
                <th>{{ __('SubCategorie') }}</th>
                <th>{{ __('Beschrijving') }}</th>
                <th>{{ __('Btw') }}</th>
                <th class="text-right">{{ __('Totaal') }}</th>
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
                        <td>{{ round($subCalculation->quote_tax) }}%</td>
                        <td class="text-right">{{ number_format($subCalculation->quote_total, 2, ',', '.') }} €</td>
                    </tr>
                @endforeach
                @if($loop->first)
                    {{-- Gestructureerde Samenvatting --}}
                    <tr class="calculation-summary">
                        <td colspan="4" class="text-right font-weight-bold">
                            <span class="summary-label">{{ __('Subtotaal') }}:</span>
                        </td>
                        <td class="text-right font-weight-bold">
                            <span class="summary-value">{{ number_format($calculation->quote_brutto_total, 2, ',', '.') }} €</span>
                        </td>
                    </tr>
                    <tr class="calculation-summary">
                        <td colspan="4" class="text-right font-weight-bold">
                            <span class="summary-label">{{ __('Vetustate') }}:</span>
                        </td>
                        <td class="text-right font-weight-bold">
                            <span class="summary-value">
                                {{ $calculation->quote_vetustate != 0 ? number_format($calculation->quote_vetustate_amount, 2, ',', '.') . ' €' : __('Geen') }}
                            </span>
                            <br>
                            <small>{{ number_format($calculation->quote_vetustate, 2, ',', '.') }} %</small>
                        </td>
                    </tr>
                    <tr class="calculation-summary final-total">
                        <td colspan="4" class="text-right font-weight-bold">
                            <span class="summary-label">{{ __('Totaal') }}:</span>
                        </td>
                        <td class="text-right font-weight-bold">
                            <span class="summary-value">{{ number_format($calculation->quote_final_total, 2, ',', '.') }} €</span>
                        </td>
                    </tr>
                @endif
            @endforeach
            </tbody>
        </table>
    </div>
@endif
