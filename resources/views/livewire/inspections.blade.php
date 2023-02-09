<div>
    <div class="my-properties">
        <button wire:click="addInspection" class="btn btn-secondary mb-3"><i class="fa fa-plus"></i>{{ __('Inspectie') }}</button>
        <table class="table-responsive">
            <thead>
            <tr>
                <th class="pl-2">{{ __('Mijn inspecties') }}</th>
                <th class="p-0"></th>
                <th>{{ __('Datum opgemaakt') }}</th>
                <th>{{ __('Actie') }}</th>
            </tr>
            </thead>
            <tbody>

            @if($inspections)
                @foreach($inspections as $inspection)
                    <tr>
                        <td class="image myelist">
                            <a href="{{ route('inspection.edit', $inspection)  }}">
                                <img class="img-fluid" src="{{ $inspection->medias()->first() ? asset('assets/images/inspections/crop' . '/' . $inspection->medias()->first()->file_crop) : "https://via.placeholder.com/150x100" }}" alt="picture">
                            </a>
                        </td>
                        <td>
                            <div class="inner">
                                <a href="single-property-1.html"><h2>{{ $inspection->title }}</h2></a>
                                <figure><i class="lni-map-marker"></i>{{ $inspection->address }} @if($inspection->postBus)Bus{{ $inspection->postBus }}@endif, {{ $inspection->city }} - {{ $inspection->country }}</figure>
                                <ul class="starts text-left mb-0">
                                    <li class="mb-0"><i class="fa fa-star"></i>
                                    </li>
                                    <li class="mb-0"><i class="fa fa-star"></i>
                                    </li>
                                    <li class="mb-0"><i class="fa fa-star"></i>
                                    </li>
                                    <li class="mb-0"><i class="fa fa-star"></i>
                                    </li>
                                    <li class="mb-0"><i class="fa fa-star"></i>
                                    </li>
                                    <li class="ml-3">(6 Reviews)</li>
                                </ul>
                            </div>
                        </td>
                        <td>{{ $inspection->created_at->format('Y-m-d') }}</td>
                        <td class="actions">
                            <a href="{{ route('inspection.edit', $inspection->id) }}" class="edit"><i class="fa fa-pencil"></i></a>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
        <div class="pagination-container">
            <nav>
                <ul class="pagination">
                    <li class="page-item"><a class="btn btn-common" href="#"><i class="lni-chevron-left"></i> Previous </a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="btn btn-common" href="#">Next <i class="lni-chevron-right"></i></a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>
