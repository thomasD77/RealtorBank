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
        }

        .img--cover {
        aspect-ratio: 3/2;
        }

        .column-pic {
            float: left;
            width: 32.775%;
            margin-right: 5px;
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
            padding-bottom: 25px;
        }
        .table {
            margin: 50px 0;
        }

        hr {
            margin: 35px 0;
        }

        section {
            page-break-inside: avoid !important;
        }
    </style>

</head>
<body>
    <section>
        <div class="row">
        <div class="column">
            <img src="{{ asset('assets/images/logo.svg') }}" width="80" alt="Logo">
        </div>

        <div class="column text-right">
            @if(Auth()->user()->company)
                <p>{{ Auth()->user()->company }}</p>
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
    </div>

        <hr>

        <div class="row">
            <h3>{{ __('Inleiding') }}</h3>
            @if($contract->situation->intrede != 2)
                <p>Met betrekking tot het pand gelegen te {{  $inspection->address->address }}, @if($inspection->address->postBus) {{  $inspection->address->postBus }} @endif,
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

        @if($contract->situation->intrede == 2)
            @if($contract->situation->general)
                <div class="row">
                    <h3>{{ __('Algemene bepalingen') }}</h3>
                    <p>{!! $contract->situation->general !!}</p>
                </div>
            @endif
        @endif

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
                            <div class="column img--cover"
                            style="background-image: url('{{ asset('assets/images/situations/crop' . '/' . $contract->situation->media[$i]->file_crop) }}');
                                    background-position: center;
                                    background-size: cover; height: 150px">
                            </div>
                        @endif
                    </div>
                @endfor
            @endif
           
        </div>

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
                <p>{{  $contract->situation->client }}</p>
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

    <section>
        <div class="row">
            @if($contract->signature_owner)
                <div class="column">
                    <h3>{{ __('Gelezen en goedgekeurd') }}</h3>
                    <p>{{ \Carbon\Carbon::parse($contract->date)->format('d-m-Y')}}</p>
                    <img src="{{ asset('assets/signatures'. '/' . $contract->signature_owner) }}">
                </div>
            @endif

            @if($contract->signature_tenant)
                <div class="column">
                    @if($contract->situation->intrede != 2)
                        <h3 class="font-weight-bold mb-4">{{ __('Gelezen en goedgekeurd') }}</h3>
                        <p>{{ \Carbon\Carbon::parse($contract->date)->format('d-m-Y')}}</p>
                        <img src="{{ asset('assets/signatures'. '/' . $contract->signature_tenant) }}">
                    @endif
                </div>
            @endif
        </div>
    </section>
   

    </section>

</body>
</html>
