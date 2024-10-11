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
                        <th style="width: 20%">{{ __('Categorie') }}</th>
                        <th style="width: 20%">{{ __('SubCategorie') }}</th>
                        <th style="width: 30%">{{ __('Beschrijving') }}</th>
                        <th style="width: 10%" class="text-center">{{ __('€ / goedgekeurd') }}</th>
                        <th style="width: 10%" class="text-right">{{ __('BTW (%)') }}</th>
                        <th style="width: 10%" class="text-right">{{ __('Totaal (€)') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($groupedSubCalculations as $subCalculation)
                        <tr wire:key="subCalculation-{{ $subCalculation['id'] }}">
                            <td class="text-center">
                                <button wire:click="confirmDelete({{ $subCalculation['id'] }})" class="btn btn-sm btn-danger">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                            <td>{{ $subCalculation['category'] }}</td>
                            <td>{{ $subCalculation['subCategory'] }}</td>
                            <td>{{ $subCalculation['description'] }}</td>
                            <td class="text-center">
                                @if($subCalculation['approved'])
                                    <i class="fa fa-check text-success"></i>
                                @elseif($subCalculation['approved'] === null)
                                    <i class="fa fa-question text-dark"></i>
                                @else
                                    <i class="fa fa-times text-danger"></i>
                                @endif
                            </td>
                            <td class="text-right">{{ $subCalculation['tax'] }}%</td>
                            <td class="text-right">{{ number_format($subCalculation['total'], 2, ',', '.') }} €</td>
                        </tr>
                    @endforeach

                    <!-- Totaal, Vetustate, en Eindtotaal -->
                    <tr class="font-weight-bold bg-light">
                        <td colspan="6" class="text-right">{{ __('TOTAAL') }}:</td>
                        <td class="text-right">{{ number_format($overallTotalSum, 2, ',', '.') }} €</td>
                    </tr>
                    <tr class="font-weight-bold bg-light">
                        <td colspan="1" class="text-center">
                            <button wire:click="editVetustate" class="btn btn-warning mt-3"> <i class="fa fa-percent"></i></button>
                        </td>
                        <td colspan="5" class="text-right">{{ __('Vetustate') }} ({{ $vetustatePercentage }}%):</td>
                        <td class="text-right">-{{ number_format($vetustateAmount, 2, ',', '.') }} €</td>
                    </tr>
                    <tr class="font-weight-bold bg-light">
                        <td colspan="6" class="text-right">{{ __('Totaal na Vetustate') }}:</td>
                        <td class="text-right">{{ number_format($finalTotal, 2, ',', '.') }} €</td>
                    </tr>
                    </tbody>
                </table>
            @else
                <p class="text-center">{{ __('Geen subcalculaties gevonden.') }}</p>
            @endif
        </div>
    </div>

    <!-- Edit Vetustate Modal -->
    <div class="modal fade" id="editVetustateModal" tabindex="-1" role="dialog" aria-labelledby="editVetustateModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-dark text-white">
                    <h5 class="modal-title" id="editVetustateModalLabel">{{ __('Bewerk Vetustate Percentage') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="vetustatePercentage">{{ __('Vetustate Percentage') }}</label>
                        <input type="number" wire:model="vetustatePercentage" class="form-control" id="vetustatePercentage" placeholder="Voer percentage in">
                        @error('vetustatePercentage') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Annuleren') }}</button>
                    <button type="button" wire:click="updateVetustate" class="btn btn-primary">{{ __('Opslaan') }}</button>
                </div>
            </div>
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
