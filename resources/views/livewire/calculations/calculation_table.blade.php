<div class="card mt-5">
    <div class="card-header bg-primary text-white">
        <h4>{{ __('Prijsbestek') }}</h4>
    </div>
    <div class="card-body">
        @if(!empty($groupedSubCalculations))
            @foreach($groupedSubCalculations as $categoryId => $subCalculationsGroup)
                @php
                    $category = $pricingCategories->firstWhere('id', $categoryId);
                @endphp
                <h5 class="mt-4 mb-3">{{ $category->title ?? 'Onbekende Categorie' }}</h5>
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>{{ __('SubCategorie') }}</th>
                        <th>{{ __('Beschrijving') }}</th>
                        <th>{{ __('BTW (%)') }}</th>
                        <th>{{ __('Totaal (€)') }}</th>
                        <th>{{ __('Goedgekeurd') }}</th>
                        <th>{{ __('Acties') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($subCalculationsGroup as $subCalculation)
                        <tr wire:key="subCalculation-{{ $subCalculation['id'] }}">
                            <td>{{ $subCalculation['subCategory'] }}</td>
                            <td>{{ $subCalculation['description'] }}</td>
                            <td>{{ $subCalculation['tax'] }}%</td>
                            <td>{{ number_format($subCalculation['total'], 2, ',', '.') }} €</td>
                            <td class="text-center">
                                @if($subCalculation['approved'])
                                    <i class="fa fa-check text-success"></i>
                                @else
                                    <i class="fa fa-times text-danger"></i>
                                @endif
                            </td>
                            <td class="text-center">
                                <button wire:click="confirmDelete({{ $subCalculation['id'] }})" class="btn btn-sm btn-danger">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endforeach
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

