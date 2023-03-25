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
        <h3>{{ __('Beschrijving') }}</h3>
        <p>{!! $contract->legal !!}</p>
    </div>

        <div class="row">
        <div class="column">
            <h3>{{ __('Verkoper/verhuurder') }}</h3>
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
            <h3>{{ __('Koper/huurder ') }}</h3>
            <p>{{  $contract->situation->tenant ? $contract->situation->tenant->name : "" }}</p>
            <p>{{  $contract->situation->tenant ? $contract->situation->tenant->phone : "" }}</p>
            <p>{{  $contract->situation->tenant ? $contract->situation->tenant->email : "" }}</p>
        </div>
    </div>

        <div class="row">
        <div class="column">
            <h3>{{ __('Gelezen en goedgekeurd') }}</h3>
            <p>{{ \Carbon\Carbon::parse($contract->date)->format('d-m-Y')}}</p>
            <img src="{{ asset('assets/signatures'. '/' . $contract->signature_owner) }}">
        </div>

        <div class="column">
            <h3 class="font-weight-bold mb-4">{{ __('Gelezen en goedgekeurd') }}</h3>
            <p>{{ \Carbon\Carbon::parse($contract->date)->format('d-m-Y')}}</p>
            <img src="{{ asset('assets/signatures'. '/' . $contract->signature_tenant) }}">
        </div>
    </div>

    </section>

</body>
</html>
