@extends('layout')

@section('content')

    <div class="dashborad-box stat ">
{{--        <h4 class="title title-uppercase">{{ __('Dashboard') }}</h4>--}}
        <div class="section-body">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-xs-12 dar pro mr-3">
                    <a href="{{ route('inspections.index') }}">
                        <div class="item">
                            <div class="icon">
                                <i class="fa fa-list" aria-hidden="true"></i>
                            </div>
                            <div class="info">
                                <h6 class="number">{{ $inspectionsCount }}</h6>
                                <p class="type ml-1">{{ __('Inspectie(s)') }}</p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-3 col-md-6 col-xs-12 dar rev mr-3">
                    <div class="item">
                        <div class="icon">
                            <i class="fa fa-file-pdf text-white"></i>
                        </div>
                        <div class="info">
                            <h6 class="number">{{ $pdfs->count() }}</h6>
                            <p class="type ml-1">{{ __('Aantal PDF\'s') }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 dar com mr-3">
                    <div class="item mb-0">
                        <div class="icon">
                            <i class="fa fa-bookmark text-white"></i>
                        </div>
                        <div class="info">
                            <h6 class="number">{{ $situations }}</h6>
                            <p class="type ml-1">{{ __('Totale aantal in/uitredes of aanvang van werken') }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 dar booked">
                    <div class="item mb-0">
                        <div class="icon">
                            <i class="fas fa-heart"></i>
                        </div>
                        <div class="info">
                            <h6 class="number">{{ $contracts }}</h6>
                            <p class="type ml-1">Mandaten getekend</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if($pdfs->isNotEmpty())
        <div class="dashborad-box rounded">
        <h4 class="title title-uppercase">{{ __('Recente PDF') }}</h4>
            <div class="section-body listing-table">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>{{ __('Titel') }}</th>
                            <th>{{ __('File') }}</th>
                            <th>{{ __('Datum') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($pdfs as $pdf)
                            <tr>
                                <td>{{ $pdf->title }} {{ $pdf->id }}</td>
                                <td>
                                    @if($pdf->status == \App\Enums\Status::Pending->value)
                                        <span class="badge badge-pill bg-warning px-3 py-2 text-white">{{ $pdf->status }}</span>
                                    @else
                                        <a class="mx-4" target="_blank" href="{{ asset('assets/inspections/pdf/' . $pdf->file_original) }}"><i class="fa fa-file-pdf text-dark"></i></a>
                                    @endif
                                </td>
                                <td>{{ $pdf->created_at->format('d-m-Y -  H:i:s') }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif

    @if($inspections->isNotEmpty())
        <div class="my-properties rounded">
            <h4 class="title title-uppercase">{{ __('Recente inspecties') }}</h4>
            <table class="table-custom">
                <thead>
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
                                    @if($inspection->address)
                                        <figure class="mb-1"><i class="lni-map-marker"></i>{{ $inspection->address->address }} @if($inspection->address->postBus)Bus {{ $inspection->address->postBus }} ,@endif</figure>
                                        @if($inspection->address->city || $inspection->address->country)
                                        <figure>{{ $inspection->address->city }} - {{ $inspection->address->country }}</figure>
                                        @endif
                                    @endif
                                </div>
                            </td>

                            <td>{{ Carbon\Carbon::parse($inspection->date)->format('d-m-Y') }}</td>
                            <td class="actions">
                                <a href="{{ route('inspection.edit', $inspection->id) }}" class="edit"><i class="fa fa-pencil-alt text-dark"></i></a>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    @endif
@endsection

