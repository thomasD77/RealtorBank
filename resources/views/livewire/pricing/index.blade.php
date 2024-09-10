<div>
    @foreach($pricingCategories as $category)
        <div class="dashborad-box py-5 rounded">
            <div class="row">
                <div class="col-10">
                    <h3 class="">{{ $category->title }}</h3>
                    @if (isset($categorySuccessMessages[$category->id]))
                        <div class="btn btn-success flash_message mb-3">
                            {{ $categorySuccessMessages[$category->id] }}
                        </div>
                    @endif
                </div>
                <div class="col-2 text-right">
                    <button wire:click="addPricing({{$category->id}})" class="btn-sm btn-common" style="border:none"><i class="fa fa-plus"></i>{{ $category->title }}</button>
                </div>
            </div>

            <hr>
            <div class="section-inforamation">
                <style>
                    table {
                        width: 100%;
                        border-collapse: collapse;
                    }
                    th, td {
                        border: 1px solid #ddd;
                        padding: 8px;
                    }
                    th {
                        background-color: #f2f2f2;
                        text-align: left;
                    }
                    tr:nth-child(even) {
                        background-color: #f9f9f9;
                    }
                </style>
                <table>
                    <thead>
                    <tr>
                        <th>{{ __('(Sub)Categorie') }}</th>
                        <th>{{ __('Beschrijving') }}</th>
                        <th>{{ __('€ / m2') }}</th>
                        <th>{{ __('€ / uur') }}</th>
                        <th>{{ __('€ / stuk') }}</th>
                        <th>{{ __('Edit') }}</th>
                        <th>{{ __('Delete') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($category->pricings as $pricing)
                            <tr>
                                <td>{{ $pricing->subCategoryPricing->title }}</td>
                                <td>{{ $pricing->description }}</td>
                                <td>{{ $pricing->cost_square_meter }}</td>
                                <td>{{ $pricing->cost_hour }}</td>
                                <td>{{ $pricing->cost_piece }}</td>
                                <td class="edit text-center"><a href=""><i class="fa fa-pencil-alt text-dark"></i></a></td>
                                <td class="edit text-center"><a style="cursor: pointer" wire:click="delete({{$pricing->id}})"><i class="fa fa-trash text-danger"></i></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endforeach
</div>


