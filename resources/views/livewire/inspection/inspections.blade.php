<div>
    <div class="my-properties">
        <div class="text-right">
            <button wire:click="addInspection" class="btn btn-common mb-3"><i class="fa fa-plus mr-2"></i>{{ __('Inspectie') }}</button>
        </div>
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
                                <img class="img-fluid" src="{{ $inspection->media->first() ? asset('assets/images/inspections/crop' . '/' . $inspection->media->first()->file_crop) : "https://via.placeholder.com/150x100" }}" alt="picture">
                            </a>
                        </td>
                        <td>
                            <div class="inner">
                                <a href="{{ route('inspection.edit', $inspection)  }}"><h2>{{ $inspection->title }}</h2></a>
                                <figure class="mb-1"><i class="lni-map-marker"></i>{{ $inspection->address->address }} @if($inspection->address->postBus)Bus{{ $inspection->address->postBus }}@endif,</figure>
                                <figure>{{ $inspection->address->city }} - {{ $inspection->address->country }}</figure>
{{--                                <ul class="starts text-left mb-0">--}}
{{--                                    <li class="mb-0"><i class="fa fa-star"></i>--}}
{{--                                    </li>--}}
{{--                                    <li class="mb-0"><i class="fa fa-star"></i>--}}
{{--                                    </li>--}}
{{--                                    <li class="mb-0"><i class="fa fa-star"></i>--}}
{{--                                    </li>--}}
{{--                                    <li class="mb-0"><i class="fa fa-star"></i>--}}
{{--                                    </li>--}}
{{--                                    <li class="mb-0"><i class="fa fa-star"></i>--}}
{{--                                    </li>--}}
{{--                                    <li class="ml-3">(6 Reviews)</li>--}}
{{--                                </ul>--}}
                            </div>
                        </td>
                        <td>{{ $inspection->created_at->format('d-m-Y') }}</td>
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
                <ul class="pagination d-flex justify-content-center">
                    {{ $inspections->links() }}
                </ul>
            </nav>
        </div>
    </div>
</div>
