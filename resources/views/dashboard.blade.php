{{--<x-app-layout>--}}
{{--    <x-slot name="header">--}}
{{--        <h2 class="font-semibold text-xl text-gray-800 leading-tight">--}}
{{--            {{ __('Dashboard') }}--}}
{{--        </h2>--}}
{{--    </x-slot>--}}

{{--    <div class="py-12">--}}
{{--        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">--}}
{{--            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">--}}
{{--                <div class="p-6 text-gray-900">--}}
{{--                    {{ __("You're logged in!") }}--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</x-app-layout>--}}

@extends('layout')

@section('content')

    <div class="dashborad-box stat bg-white">
        <h4 class="title">{{ __('Dashboard') }}</h4>
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
                            <p class="type ml-1">{{ __('Totale aantal in/uitredes') }}</p>
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
                            <p class="type ml-1">Contracten getekend</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if($pdfs->isNotEmpty())
        <div class="dashborad-box">
        <h4 class="title">{{ __('Recente PDF') }}</h4>
            <div class="section-body listing-table">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>{{ __('Titel') }}</th>
                            <th>{{ __('File') }}</th>
                            <th>{{ __('Datum') }}</th>
                            <th>{{ __('Actie') }}</th>
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
                                <td class="edit">
                                    <form wire:submit.prevent="deletePDF({{ $pdf->id }})">
                                        <button class="btn_trash" type="submit"><i class="fa fa-trash text-danger"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif

    @if($inspections->isNotEmpty())
        <div class="my-properties">
            <table class="table-responsive">
                <thead>
                <tr>
                    <th class="pl-2">{{ __('Mijn inspecties') }}</th>
                    <th class="p-0"></th>
                    <th>{{ __('Datum') }}</th>
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
        </div>
    @endif

{{--    <div class="dashborad-box">--}}
{{--        <h4 class="title">Message</h4>--}}
{{--        <div class="section-body">--}}
{{--            <div class="messages">--}}
{{--                <div class="message">--}}
{{--                    <div class="thumb">--}}
{{--                        <img class="img-fluid" src="{{ asset('assets/images/testimonials/ts-1.jpg') }}" alt="">--}}
{{--                    </div>--}}
{{--                    <div class="body">--}}
{{--                        <h6>Mary Smith</h6>--}}
{{--                        <p class="post-time">22 Minutes ago</p>--}}
{{--                        <p class="content mb-0 mt-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore</p>--}}
{{--                        <div class="controller">--}}
{{--                            <ul>--}}
{{--                                <li><a href="#"><i class="fa fa-eye"></i></a></li>--}}
{{--                                <li><a href="#"><i class="far fa-trash-alt"></i></a></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="message">--}}
{{--                    <div class="thumb">--}}
{{--                        <img class="img-fluid" src="{{ asset('assets/images/testimonials/ts-2.jpg') }}" alt="">--}}
{{--                    </div>--}}
{{--                    <div class="body">--}}
{{--                        <h6>Karl Tyron</h6>--}}
{{--                        <p class="post-time">23 Minutes ago</p>--}}
{{--                        <p class="content mb-0 mt-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore</p>--}}
{{--                        <div class="controller">--}}
{{--                            <ul>--}}
{{--                                <li><a href="#"><i class="fa fa-eye"></i></a></li>--}}
{{--                                <li><a href="#"><i class="far fa-trash-alt"></i></a>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="message">--}}
{{--                    <div class="thumb">--}}
{{--                        <img class="img-fluid" src="{{ asset('assets/images/testimonials/ts-3.jpg') }}" alt="">--}}
{{--                    </div>--}}
{{--                    <div class="body">--}}
{{--                        <h6>Lisa Willis</h6>--}}
{{--                        <p class="post-time">53 Minutes ago</p>--}}
{{--                        <p class="content mb-0 mt-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore</p>--}}
{{--                        <div class="controller">--}}
{{--                            <ul>--}}
{{--                                <li><a href="#"><i class="fa fa-eye"></i></a></li>--}}
{{--                                <li><a href="#"><i class="far fa-trash-alt"></i></a>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="dashborad-box">--}}
{{--        <h4 class="title">Review</h4>--}}
{{--        <div class="section-body">--}}
{{--            <div class="reviews">--}}
{{--                <div class="review">--}}
{{--                    <div class="thumb">--}}
{{--                        <img class="img-fluid" src="{{ asset('assets/images/testimonials/ts-4.jpg') }}" alt="">--}}
{{--                    </div>--}}
{{--                    <div class="body">--}}
{{--                        <h5>Family House</h5>--}}
{{--                        <h6>Mary Smith</h6>--}}
{{--                        <p class="post-time">10 hours ago</p>--}}
{{--                        <p class="content mb-0 mt-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore</p>--}}
{{--                        <ul class="starts mb-0">--}}
{{--                            <li><i class="fa fa-star"></i>--}}
{{--                            </li>--}}
{{--                            <li><i class="fa fa-star"></i>--}}
{{--                            </li>--}}
{{--                            <li><i class="fa fa-star"></i>--}}
{{--                            </li>--}}
{{--                            <li><i class="fa fa-star"></i>--}}
{{--                            </li>--}}
{{--                            <li><i class="fa fa-star-o"></i>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                        <div class="controller">--}}
{{--                            <ul>--}}
{{--                                <li><a href="#"><i class="fa fa-eye"></i></a></li>--}}
{{--                                <li><a href="#"><i class="far fa-trash-alt"></i></a>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="review">--}}
{{--                    <div class="thumb">--}}
{{--                        <img class="img-fluid" src="{{ asset('assets/images/testimonials/ts-5.jpg') }}" alt="">--}}
{{--                    </div>--}}
{{--                    <div class="body">--}}
{{--                        <h5>Bay Apartment</h5>--}}
{{--                        <h6>Karl Tyron</h6>--}}
{{--                        <p class="post-time">22 hours ago</p>--}}
{{--                        <p class="content mb-0 mt-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore</p>--}}
{{--                        <ul class="starts mb-0">--}}
{{--                            <li><i class="fa fa-star"></i>--}}
{{--                            </li>--}}
{{--                            <li><i class="fa fa-star"></i>--}}
{{--                            </li>--}}
{{--                            <li><i class="fa fa-star"></i>--}}
{{--                            </li>--}}
{{--                            <li><i class="fa fa-star"></i>--}}
{{--                            </li>--}}
{{--                            <li><i class="fa fa-star-o"></i>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                        <div class="controller">--}}
{{--                            <ul>--}}
{{--                                <li><a href="#"><i class="fa fa-eye"></i></a></li>--}}
{{--                                <li><a href="#"><i class="far fa-trash-alt"></i></a>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="review">--}}
{{--                    <div class="thumb">--}}
{{--                        <img class="img-fluid" src="{{ asset('assets/images/testimonials/ts-6.jpg') }}" alt="">--}}
{{--                    </div>--}}
{{--                    <div class="body">--}}
{{--                        <h5>Family House Villa</h5>--}}
{{--                        <h6>Lisa Willis</h6>--}}
{{--                        <p class="post-time">51 hours ago</p>--}}
{{--                        <p class="content mb-0 mt-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore</p>--}}
{{--                        <ul class="starts mb-0">--}}
{{--                            <li><i class="fa fa-star"></i>--}}
{{--                            </li>--}}
{{--                            <li><i class="fa fa-star"></i>--}}
{{--                            </li>--}}
{{--                            <li><i class="fa fa-star"></i>--}}
{{--                            </li>--}}
{{--                            <li><i class="fa fa-star"></i>--}}
{{--                            </li>--}}
{{--                            <li><i class="fa fa-star-o"></i>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                        <div class="controller">--}}
{{--                            <ul>--}}
{{--                                <li><a href="#"><i class="fa fa-eye"></i></a></li>--}}
{{--                                <li><a href="#"><i class="far fa-trash-alt"></i></a>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="py-12">--}}
{{--                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">--}}
{{--                            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">--}}
{{--                                <div class="p-6 text-gray-900">--}}
{{--                                    {{ __("You're logged in!") }}--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}



{{-->--}}
@endsection

