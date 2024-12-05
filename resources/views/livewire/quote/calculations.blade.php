{{-- Calculations --}}
@if($damage->quoteCalculations && $damage->approved)
    <div class="calculation-container">
        <table class="calculation-table">
            <thead>
            <tr>
                <th></th>
                <th class="approved-column-two text-center">{{ __('Akkoord') }}</th>
                <th class="title-column-two">{{ __('(Sub)categorie)') }}</th>
                <th class="description-column-two">{{ __('Beschrijving') }}</th>
                <th class="tax-column-two text-right">{{ __('Btw') }}</th>
                <th class="total-column-two text-right">{{ __('Totaal') }}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($damage->quoteCalculations->where('quote_id', $quote->id) as $calculation)
                @foreach($calculation->quoteSubCalculations->where('quote_id', $quote->id) as $subCalculation)
                    <tr>
                        <td></td>
                        <td class="approved-column text-center">
                            <input type="checkbox" wire:click="toggleSubCalculationApproval({{ $subCalculation->id }})" {{ $subCalculation->approved ? 'checked' : '' }}>
                        </td>
                        <td>{{ $subCalculation->subCategoryPricing->title }}</td>
                        <td>{{ $subCalculation->quote_description }}</td>
                        <td class="text-right">{{ round($subCalculation->quote_tax) }}%</td>
                        <td class="text-right" @if(!$subCalculation->approved) style="text-decoration: line-through" @endif>
                            &euro; {{ number_format($subCalculation->quote_total, 2, ',', '.') }}
                        </td>
                    </tr>
                @endforeach
                @if($loop->first)
                    {{-- Gestructureerde Samenvatting --}}
                    <tr class="calculation-summary">
                        <td colspan="5" class="text-right font-weight-bold">
                            <span class="summary-label">{{ __('Subtotaal') }}:</span>
                        </td>
                        <td class="text-right font-weight-bold">
                            <span class="summary-value">&euro; {{ number_format($calculation->quote_brutto_total, 2, ',', '.') }}</span>
                        </td>
                    </tr>
                    <tr class="calculation-summary">
                        <td colspan="5" class="text-right font-weight-bold">
                            <span class="summary-label">{{ __('Vetustate') }}:</span>
                            <br>
                            <small>{{ number_format($calculation->quote_vetustate, 2, ',', '.') }} %</small>
                        </td>
                        <td class="text-right font-weight-bold">
                            <span class="summary-value">
                                {{ $calculation->quote_vetustate != 0 ? '€ ' . number_format($calculation->quote_vetustate_amount, 2, ',', '.') : __('0') }}
                            </span>
                        </td>
                    </tr>
                    <tr class="calculation-summary final-total">
                        <td colspan="5" class="text-right font-weight-bold">
                            <span class="summary-label">{{ __('Totaal') }}:</span>
                            <br>
                            <small>{{ __('incl. btw.') }}</small>
                        </td>
                        <td class="text-right font-weight-bold">
                            <span class="summary-value">&euro; {{ number_format($calculation->quote_final_total, 2, ',', '.') }}</span>
                        </td>
                    </tr>
                @endif
            @endforeach
            </tbody>
        </table>
    </div>
@endif
