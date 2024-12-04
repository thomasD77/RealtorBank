<div>
    <div class="card mt-5" style="border-color: #343a40!important; border-width: 4px">
        <div class="card-header bg-dark">
            <h6 class="text-white mb-0">{{ __('Prijsbestek') }} : {{ $damage->title }}</h6>
        </div>
        <div class="card-body">
            @if(!empty($groupedSubCalculations))
                <table class="table table-striped table-bordered w-100">
                    <thead>
                        <tr class="font-weight-bold">
                            <th class="text-center acties" style="width: 5%">{{ __('Acties') }}</th>
                            <th class="categorie" >{{ __('Categorie') }}</th>
                            <th class="subcategorie" >{{ __('(Sub)Categorie') }}</th>
                            <th class="beschrijving" >{{ __('Beschrijving') }}</th>
                            <th class="btw text-right" >{{ __('BTW') }}</th>
                            <th class="totaal text-right">{{ __('Totaal') }} <br> <small>({{__('incl. btw')}})</small></th>
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
                            <td class="text-right">{{ round($subCalculation['tax']) }}%</td>
                            <td class="text-right">&euro; {{ number_format($subCalculation['total'], 2, ',', '.') }}</td>
                        </tr>
                    @endforeach

                    <!-- Totaal, Vetustate, en Eindtotaal -->
                    <tr class="font-weight-bold bg-light">
                        <td colspan="5" class="text-right">{{ __('Subtotaal') }} :</td>
                        <td class="text-right">&euro; {{ number_format($bruttoTotal, 2, ',', '.') }}</td>
                    </tr>
                    <tr class="font-weight-bold bg-light">
                        <td colspan="1" class="text-center">
                            <button wire:click="editVetustate" class="btn btn-warning mt-3"> <i class="fa fa-percent"></i></button>
                        </td>
                        <td colspan="4" class="text-right">
                            {{ __('Vetustate') }} :
                            <br>
                            <small>({{ $vetustatePercentage }}%) </small>
                        </td>
                        <td class="text-right">- &euro; {{ number_format($vetustateAmount, 2, ',', '.') }}</td>
                    </tr>
                    <tr class="font-weight-bold bg-light">
                        <td colspan="5" class="text-right">
                            {{ __('Totaal') }} :
                            <br>
                            <small>{{ __('(incl. Vetustate)') }}</small>
                        </td>
                        <td class="text-right">&euro; {{ number_format($finalTotal, 2, ',', '.') }}</td>
                    </tr>
                    </tbody>
                </table>
            @else
                <p class="text-center">{{ __('Geen calculaties gevonden.') }}</p>
            @endif
        </div>
    </div>

    <!-- Edit Vetustate Modal -->
    <div class="modal fade" id="editVetustateModal" tabindex="-1" role="dialog" aria-labelledby="editVetustateModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editVetustateModalLabel">{{ __('Bewerk Vetustate Percentage') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="vetustatePercentage">{{ __('Vetustate Percentage %') }}</label>
                        <input type="number" step="0.01" wire:model="vetustatePercentage" class="form-control" id="vetustatePercentage" placeholder="Voer percentage in">
                        @error('vetustatePercentage') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Annuleren') }}</button>
                    <button type="button" wire:click="updateVetustate" class="btn btn-dark">{{ __('Save') }}</button>
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
