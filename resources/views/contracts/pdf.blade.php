<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('Plaatsbeschrijving') }}</title>

    <style>
        h1, h2, h3 {
            font-family: Montserrat, sans-serif;
        }
        h1, h2 {
            margin-bottom: 3px;
        }
        h3 {
            font-size: 0.7rem;
            text-transform: uppercase;
        }
        p {
            font-family: Montserrat, sans-serif;
            font-size: 14px;
            margin: 5px;
            font-weight: normal;
        }
        .column {
            float: left;
            width: 50%;
            margin-right: 5px;
            font-family: Montserrat, sans-serif;
            font-size: 14px;
            margin: 5px;
            font-weight: normal;
        }
        .column-sig {
            float: left;
            width: 47%;
        }
        .img--cover {
        aspect-ratio: 3/2;
        }
        .column-pic {
            float: left;
            width: 32.775%;
            margin-right: 5px;
        }
        section {
            page-break-inside: avoid !important;
        }
        .signature img {
            width: 85%;
        }
        .keep {
            page-break-inside: avoid !important;
        }
        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
            padding-bottom: 25px;
        }
        .table {
            font-family: Montserrat, sans-serif;
            border-collapse: collapse;
            width: 100%;
            padding-top: 15px;
            margin: 10px 0;
        }
        hr {
            margin: 35px 0;
        }
        .table td, .table th {
            border: 1px solid #ddd;
            padding: 8px;
        }
        .table tr:nth-child(even){background-color: #f2f2f2;}
        .table th {
            text-align: left;
            color: white;
            background-color:  #f2f2f2;
            font-size: 14px;
            page-break-before: always;
            font-weight: normal;
        }
        .row--head th {
            background-color: rgba(36, 50, 74, 0.7); !important;
            text-transform: uppercase;
        }
        .row--head--list tr {
            padding: 2rem;
        }
        .row--head--list th {
            background-color: rgba(36, 50, 74, 0.7); !important;
            opacity: 0.8;
            padding: 0.2rem;
            width: 100%;
        }
        .row--head--list th:first-child {
            width: 35%;
        }
        .row--text th {
            background-color: transparent;
            color: black;
            border: none;
            border-bottom: 1px solid  #f2f2f2; !important;
            font-weight: normal;
        }
        .row--text--list th {
            background-color: transparent;
            color: black;
            border: none;
            border-bottom: 1px solid  #f2f2f2; !important;
            padding: 0;
            font-weight: normal;
        }
    </style>
</head>
<body>
    <section>
        <div class="row">
            <div class="column">
                @if(Auth()->user()->companyName)
                    <strong>{{ Auth()->user()->companyName }}</strong>
                @endif
                <p>{{ Auth()->user()->firstName }} {{ Auth()->user()->lastName }}</p>
                @if(Auth()->user()->phone)
                    <p>{{ Auth()->user()->phone }}</p>
                @endif
                @if(Auth()->user()->email)
                    <p>{{ Auth()->user()->email }}</p>
                @endif
                <p>{{ \Carbon\Carbon::parse($contract->date)->format('d-m-Y')}}</p>
            </div>

            <div class="column text-right">
                @if($contract->situation->intrede === 0)
                    <strong>{{__('Uittrede')}}</strong>
                @elseif($contract->situation->intrede == 1)
                    <strong>{{__('Intrede')}}</strong>
                @elseif($contract->situation->intrede == 2)
                    <strong>{{__('Aanvang van werken')}}</strong>
                @endif <br>
                {{ $inspection->address->address }}, @if($inspection->address->postBus) {{  $inspection->address->postBus }}, @endif <br>
                @if($inspection->address->zip || $inspection->address->city) {{  $inspection->address->zip }} {{  $inspection->address->city }} @endif
            </div>
        </div>

        <hr>

        <!-- Images from the propperty  -->
        <div class="row">
            @if($inspection->media->isNotEmpty())
                @for ($i = 0; $i <= count($inspection->media); $i++ )
                    <div class="row">
                        @if(isset($inspection->media[$i]))
                            <div class="column-pic img--cover"
                                style="background-image: url('{{ asset('assets/images/inspections/crop' . '/' . $inspection->media[$i]->file_crop) }}');
                                    background-position: center;
                                    background-size: cover; height: 150px">
                            </div>
                        @endif
                        @php
                            $i += 1;
                        @endphp
                        @if(isset($inspection->media[$i]))
                            <div class="column-pic img--cover"
                                style="background-image: url('{{ asset('assets/images/inspections/crop' . '/' . $inspection->media[$i]->file_crop) }}');
                                    background-position: center;
                                    background-size: cover; height: 150px;">
                            </div>
                        @endif
                        @php
                            $i += 1;
                        @endphp
                        @if(isset($inspection->media[$i]))
                            <div class="column-pic img--cover"
                            style="background-image: url('{{ asset('assets/images/inspections/crop' . '/' . $inspection->media[$i]->file_crop) }}');
                                    background-position: center;
                                    background-size: cover; height: 150px">
                            </div>
                        @endif
                    </div>
                @endfor
            @endif
        </div>

         <!-- Credentials authorized parties -->
         <div class="row">
            <div class="column">
                <h3>{{ __('Eigenaar') }}</h3>
                <p>{{  $contract->situation->owner ? $contract->situation->owner->name : "" }}</p>
                <p>{{  $contract->situation->owner ? $contract->situation->owner->phone : "" }}</p>
                <p>{{  $contract->situation->owner ? $contract->situation->owner->email : "" }}</p>

                <p class="mb-0">
                    {{  $inspection->address->address }}
                    @if($inspection->address->postBus) {{  $inspection->address->postBus }} @endif
                    @if($inspection->address->zip || $inspection->address->city) ,{{  $inspection->address->zip }} {{  $inspection->address->city }} @endif
                </p>
                <p>
                    @if($inspection->address->country) {{  $inspection->address->country }} @endif
                </p>
            </div>

            <div class="column">
                @if($contract->situation->intrede != 2)
                    <h3>{{ __('Koper/huurder ') }}</h3>
                    <p>{{  $contract->situation->tenant ? $contract->situation->tenant->name : "" }}</p>
                    <p>{{  $contract->situation->tenant ? $contract->situation->tenant->phone : "" }}</p>
                    <p>{{  $contract->situation->tenant ? $contract->situation->tenant->email : "" }}</p>
                @else
                    <h3>{{__('Opdrachtgever')}}</h3>
                    <p>{{  $contract->situation->client }}</p>

                    <h3>{{__('Adres bouwwerken')}}</h3>
                    @if($contract->situation->address)
                        <p class="mb-0">
                            {{  $contract->situation->address->address }}
                            @if($contract->situation->address->postBus) {{  $contract->situation->address->postBus }} @endif
                            @if($contract->situation->address->zip || $contract->situation->address->city) ,{{  $contract->situation->address->zip }} {{  $contract->situation->address->city }} @endif
                        </p>
                    @endif
                @endif
            </div>
        </div>

        <!-- Inleiding -->
        <div class="row">
            <h3>{{ __('Inleiding') }}</h3>
            @if($contract->situation->intrede != 2)
                <p>Met betrekking tot het pand gelegen te {{  $inspection->address->address }}, @if($inspection->address->postBus) {{  $inspection->address->postBus }}, @endif
                @if($inspection->address->zip || $inspection->address->city) {{  $inspection->address->zip }} {{  $inspection->address->city }} @endif
                verhuurd aan {{ $contract->situation->tenant ? $contract->situation->tenant->name : "" }}, werd op datum van {{ \Carbon\Carbon::parse($contract->date)->format('d-m-Y')}} een gedetailleerde
                @if($contract->situation->intrede)
                    Intrede
                @else
                    Uittrede
                @endif opname gedaan.
                De plaatsbeschrijving is uitgevoerd door {{ Auth()->user()->firstName }} {{ Auth()->user()->lastName }} voor {{ Auth()->user()->companyName }}</p>
                @if($contract->situation->intrede)
                    <p>{!! $contract->legal_in !!}</p>
                @else
                    <p>{!! $contract->legal_uit !!}</p>
                @endif
            @else
                <p>Met betrekking tot het pand gelegen te {{  $contract->situation->address->address }}, @if($contract->situation->address->postBus) {{  $contract->situation->address->postBus }}, @endif
                @if($contract->situation->address->zip || $contract->situation->address->city) {{  $contract->situation->address->zip }} {{  $contract->situation->address->city }} @endif
                eigendom van {{ $contract->situation->owner ? $contract->situation->owner->name : "" }}, werd op datum van {{ \Carbon\Carbon::parse($contract->date)->format('d-m-Y')}} een gedetailleerde plaatsbeschrijving gedaan.
                De plaatsbeschrijving is uitgevoerd door {{ Auth()->user()->firstName }} {{ Auth()->user()->lastName }} voor {{ Auth()->user()->companyName }}</p>
                <p>{!! $contract->legal_aanvang !!}</p>
            @endif
        </div>

         <!-- Extra info contract -->
        @if($contract->situation->extra)
            <div class="row">
                <h3>{{ __('Extra info') }}</h3>
                <p>{!! $contract->situation->extra !!}</p>
            </div>
        @endif

        <!-- Aanvang van werken -->
        @if($contract->situation->intrede == 2)
            @if($contract->situation->general)
                <div class="row">
                    <h3>{{ __('Algemene bepalingen') }}</h3>
                    <p>{!! $contract->situation->general !!}</p>
                </div>
            @endif
        @endif

        <!-- Media for 'aanvang van werken' -->
        @if($contract->situation->intrede == 2)
            <div class="row">
                @if($contract->situation->media->isNotEmpty())
                    @for ($i = 0; $i <= count($contract->situation->media); $i++ )
                        <div class="row">
                            @if(isset($contract->situation->media[$i]))
                                <div class="column-pic img--cover"
                                    style="background-image: url('{{ asset('assets/images/situations/crop' . '/' . $contract->situation->media[$i]->file_crop) }}');
                                        background-position: center;
                                        background-size: cover; height: 150px">
                                </div>
                            @endif
                            @php
                                $i += 1;
                            @endphp
                            @if(isset($contract->situation->media[$i]))
                                <div class="column-pic img--cover"
                                    style="background-image: url('{{ asset('assets/images/situations/crop' . '/' . $contract->situation->media[$i]->file_crop) }}');
                                        background-position: center;
                                        background-size: cover; height: 150px;">
                                </div>
                            @endif
                            @php
                                $i += 1;
                            @endphp
                            @if(isset($contract->situation->media[$i]))
                                <div class="column-pic img--cover"
                                style="background-image: url('{{ asset('assets/images/situations/crop' . '/' . $contract->situation->media[$i]->file_crop) }}');
                                        background-position: center;
                                        background-size: cover; height: 150px">
                                </div>
                            @endif
                        </div>
                    @endfor
                @endif
            </div>
        @endif

        <!-- Damges -->
        @if($damages->isNotEmpty() )
            <section class="techniques">
                <h2>{{ __('Schade') }}</h2>
                @foreach($damages as $item)
                    <section>
                        <table class="table">
                            <tr class="row--head--list">
                                <th>{{ $item->title }}</th>
                                <th></th>
                            </tr>

                            <tr class="row--text--list">
                                <th>{{ __('Titel') }}</th>
                                <th>{{ $item->title }}</th>
                            </tr>

                            <tr class="row--text--list">
                                <th>{{ __('Datum') }}</th>
                                <th>{{ $item->date }}</th>
                            </tr>

                            <tr class="row--text--list textareaExtra">
                                <th>{{ __('Omschrijving') }}</th>
                                <th class="">{{ $item->description }}</th>
                                <th></th>
                            </tr>

                        </table>
                    </section>
                @endforeach
            </section>
        @endif

        <!-- Slot -->
        @if($contract->situation->intrede === 0)
            @if($contract->slot_uit)
                <div class="row">
                    <h3>{{ __('Slot') }}</h3>
                    <p>{!! $contract->slot_uit !!}</p>
                </div>
            @endif
        @elseif($contract->situation->intrede == 1)
            @if($contract->slot_in)
                <div class="row">
                    <h3>{{ __('Tot slot') }}</h3>
                    <p>{!! $contract->slot_in !!}</p>
                </div>
            @endif
        @elseif($contract->situation->intrede == 2)
            @if($contract->slot_aanvang)
                <div class="row">
                    <h3>{{ __('Tot slot') }}</h3>
                    <p>{!! $contract->slot_aanvang !!}</p>
                </div>
            @endif
        @endif



    </section>

      <!-- Signatures -->
      <section class="signature">
            <div class="row keep">
                @if($contract->signature_owner)
                    <div class="column-sig">
                        <h3>{{ __('Gelezen en goedgekeurd') }}</h3>
                        <p>{{  $contract->situation->owner ? $contract->situation->owner->name : "" }}</p>
                        <p>{{ \Carbon\Carbon::parse($contract->date)->format('d-m-Y')}}</p>
                        <img src="{{ asset('assets/signatures'. '/' . $contract->signature_owner) }}">
                    </div>
                @endif

                @if($contract->signature_tenant)
                    <div class="column-sig signature">
                        @if($contract->situation->intrede != 2)
                            <h3 class="font-weight-bold mb-4">{{ __('Gelezen en goedgekeurd') }}</h3>
                            <p>{{  $contract->situation->tenant ? $contract->situation->tenant->name : "" }}</p>
                            <p>{{ \Carbon\Carbon::parse($contract->date)->format('d-m-Y')}}</p>
                            <img src="{{ asset('assets/signatures'. '/' . $contract->signature_tenant) }}">
                        @endif
                    </div>
                @endif
            </div>
        </section>

</body>
</html>
