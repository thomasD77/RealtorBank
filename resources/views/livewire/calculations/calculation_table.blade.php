<div>
    <div class="card mt-5">
        <div class="card-header bg-dark">
            <h4 class="text-white">{{ __('Prijsbestek') }}</h4>
        </div>
        <div class="card-body">
            @if(!empty($groupedSubCalculations))
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr class="font-weight-bold">
                        <th style="width: 10%" class="text-center">{{ __('Acties') }}</th>
                        <th style="width: 20%">{{ __('SubCategorie') }}</th>
                        <th style="width: 30%">{{ __('Beschrijving') }}</th>
                        <th style="width: 10%" class="text-center">{{ __('Goedgekeurd') }}</th>
                        <th style="width: 10%" class="text-right">{{ __('BTW (%)') }}</th>
                        <th style="width: 10%" class="text-right">{{ __('Totaal (€)') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($groupedSubCalculations as $categoryData)
                        <tr class="bg-light font-weight-bold">
                            <td colspan="7" class="text-center py-3">{{ $categoryData['category'] }}</td>
                        </tr>
                        @foreach($categoryData['subCalculations'] as $subCalculation)
                            <tr wire:key="subCalculation-{{ $subCalculation['id'] }}">
                                <td class="text-center">
                                    <button wire:click="confirmDelete({{ $subCalculation['id'] }})" class="btn btn-sm btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                                <td>{{ $subCalculation['subCategory'] }}</td>
                                <td>{{ $subCalculation['description'] }}</td>
                                <td class="text-center">
                                    @if($subCalculation['approved'])
                                        <i class="fa fa-check text-success"></i>
                                    @else
                                        <i class="fa fa-times text-danger"></i>
                                    @endif
                                </td>
                                <td class="text-right">{{ $subCalculation['tax'] }}%</td>
                                <td class="text-right">{{ number_format($subCalculation['total'], 2, ',', '.') }} €</td>

                            </tr>
                        @endforeach
                        <!-- Total sum row for each category -->
                        <tr class="font-weight-bold">
                            <td colspan="5" class="text-right" style="font-size: 12px">{{ __('Totaal') }}:</td>
                            <td class="text-right">{{ number_format($categoryData['totalSum'], 2, ',', '.') }} €</td>
                        </tr>
                    @endforeach
                    <!-- Overall total sum row -->
                    <tr class="font-weight-bold bg-dark text-white">
                        <td colspan="5" class="text-right">{{ __('Totaal') }}:</td>
                        <td class="text-right">{{ number_format($overallTotalSum, 2, ',', '.') }} €</td>
                    </tr>
                    </tbody>
                </table>
            @else
                <p class="text-center">{{ __('Geen subcalculaties gevonden.') }}</p>
            @endif
        </div>
    </div>

    <!-- Verwijderingsbevestigingsmodal -->
    <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-dark text-white">
                    <h5 class="modal-title text-white" id="deleteConfirmationModalLabel">{{ __('Verwijder') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>{{ __('Weet u zeker dat u deze record wilt verwijderen? Dit kan niet ongedaan worden gemaakt.') }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Annuleren') }}</button>
                    <button type="button" wire:click="deleteSubCalculation" class="btn btn-danger">{{ __('Verwijder') }}</button>
                </div>
            </div>
        </div>
    </div>
</div>
