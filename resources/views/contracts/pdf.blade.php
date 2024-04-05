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
        <div class="row p-5 the-five">

            <h1 style="text-align: center; margin-bottom: 50px">{{ __('PLAATSBESCHRIJVING ') }} <br> @if($situation->intrede) {{ __('INTREDE MANDAAT ') }} @else {{ __('UITTREDE MANDAAT ') }} @endif</h1>

            <p>Voor het pand te {{  $inspection->address->address }}, @if($inspection->address->postBus) {{  $inspection->address->postBus }}, @endif
                @if($inspection->address->zip || $inspection->address->city) {{  $inspection->address->zip }} {{  $inspection->address->city }} @endif
                , eigendom van {{ $situation->owner ? $situation->owner->name : "" }}
                en verhuurd aan {{ $situation->tenant ? $situation->tenant->name : "" }}, werd op datum van {{ $contract->date }} een gedetailleerde @if($situation->intrede) intrede @else uittrede @endif gedaan.
                <br>
                De plaatsbeschrijving is uitgevoerd door {{ $inspection->user ? $inspection->user->firstName : "" }} {{ $inspection->user ? $inspection->user->lastName : "" }} @if($inspection->user->companyName)voor {{ $inspection->user->companyName }}@endif
            </p>
            <br>

            <p>
                Ondergetekende(n) geven de opdracht aan {{ $inspection->user ? $inspection->user->firstName : "" }} {{ $inspection->user ? $inspection->user->lastName : "" }} om als onafhankelijk deskundige de plaatsbeschrijving bij @if($situation->intrede) intrede @else uittrede @endif op te nemen van het pand te
                {{  $inspection->address->address }}, @if($inspection->address->postBus) {{  $inspection->address->postBus }}, @endif
                @if($inspection->address->zip || $inspection->address->city) {{  $inspection->address->zip }} {{  $inspection->address->city }} @endif.
            </p>
            <br>

            <p>
                Tevens geven ondergetekende(n) {{ $inspection->user ? $inspection->user->firstName : "" }} {{ $inspection->user ? $inspection->user->lastName : "" }} de toestemming om de plaatsbeschrijving bij @if($situation->intrede) intrede @else uittrede @endif van het pand te
                {{  $inspection->address->address }}, @if($inspection->address->postBus) {{  $inspection->address->postBus }}, @endif
                @if($inspection->address->zip || $inspection->address->city) {{  $inspection->address->zip }} {{  $inspection->address->city }} @endif geldig te ondertekenen in hun naam.
            </p>
            <br>

            <p>
                Elke partij heeft het recht om binnen de 10 kalenderdagen na ontvangst van de plaatbeschrijving zijn of haar opmerkingen door te geven. Zo wordt de tegensprekelijkheid van de plaatsbeschrijving gegarandeerd.
                Opmerkingen dienen per aangetekend schrijven of per mail naar {{ $inspection->user ? $inspection->user->firstName : "" }} {{ $inspection->user ? $inspection->user->lastName : "" }} overgemaakt worden.
                Deze opmerkingen kunnen als bijlage bij de plaatsbeschrijving worden gevoegd.
            </p>
            <br>

            <p>
                Indien een partij geen opmerkingen geeft binnen deze termijn, gaan ze definitief akkoord met de volledige plaatsbeschrijving en met de bevindingen van de {{ $inspection->user ? $inspection->user->firstName : "" }} {{ $inspection->user ? $inspection->user->lastName : "" }}.
            </p>

        </div>
    </section>

    <!-- Signatures -->
    <section class="signature">
        <div class="row">
          @if($contract->date)
              <hr>
              <p class="date-title">{{ __('Opnamedatum') }}: {{ $contract->date }}</p>
          @endif
      </div>
        <div class="row keep">
            <div class="column-sig">
                <h3 style="margin-bottom: 10px">{{ __('HUURDERS') }}</h3><br>
                <span class="mt-0" style="font-style: italic; font-size: 10px">gelezen en goedgekeurd</span>
                <p>{{  $contract->situation->tenant ? $contract->situation->tenant->name : "" }}</p>
                @if($contract->mandate_tenant)
                    <p>Met Mandaat</p>
                    <img class="img-fluid" src="{{ asset('assets/signatures'. '/' . $inspection->user->signature) }}">
                @else
                    <img class="img-fluid" src="{{ asset('assets/signatures'. '/' . $contract->signature_tenant) }}">
                @endif
            </div>
            <div class="column-sig signature">
                <h3 style="margin-bottom: 10px">{{ __('VERHUURDERS') }}</h3><br>
                <span class="mt-0" style="font-style: italic; font-size: 10px">gelezen en goedgekeurd</span>
                <p>{{  $contract->situation->owner ? $contract->situation->owner->name : "" }}</p>
                @if($contract->mandate_owner)
                    <p>Met Mandaat</p>
                    <img class="img-fluid" src="{{ asset('assets/signatures'. '/' . $inspection->user->signature) }}">
                @else
                    <img class="img-fluid" src="{{ asset('assets/signatures'. '/' . $contract->signature_owner) }}">
                @endif
            </div>
        </div>
    </section>
</body>
</html>
