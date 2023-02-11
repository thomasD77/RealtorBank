<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('Plaatsbeschrijving') }}</title>
</head>
<body>
    <style>
        .img-fluid {
            max-width: 100%;
            height: auto;
        }
        .column {
            float: left;
            width: 50%;
            margin-right: 10px;
        }

        .row:after {
            padding: 0;
            margin: 0;
            display: table;
            clear: both;
        }

        p {
            margin: 5px;
        }
        strong {
            margin-bottom: 0;
            padding-right: 8px;
        }
        h1, h2 {
            font-family: Arial, Helvetica, sans-serif;
        }
        .table {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        .table td, .table th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        .table tr:nth-child(even){background-color: #f2f2f2;}

        .table th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            color: white;
            background-color:  #f2f2f2;
            font-size: 14px;
        }
        .row--head th {
            background-color: #31c77f !important;
        }
        .row--text th {
            background-color: transparent;
            color: black;
            border: none;
            border-bottom: 1px solid  #f2f2f2; !important;
        }
        .icon {
            margin-right: 250px;
        }
        .date-title {
            font-size: 13px;
            margin-bottom: 5px;
            font-style: italic;
        }

    </style>

    <h1>{{ $inspection->title ?? 'DRAFT' }}</h1>
    <p class="date-title">{{ __('Datum opgemaakt') }} | {{ $inspection->created_at }}</p>
    @if($inspection->extra)
        <p>{{ $inspection->extra }}</p>
    @endif

    <br>
    <br>

    <hr>

    <br>
    <br>

    <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate quo repudiandae similique sunt voluptates.
        Consectetur debitis, id iusto minima mollitia omnis quasi sed. Animi dolore, eveniet facilis iusto officia
        sit.
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate quo repudiandae similique sunt voluptates.
        Consectetur debitis, id iusto minima mollitia omnis quasi sed. Animi dolore, eveniet facilis iusto officia
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate quo repudiandae similique sunt voluptates.
        Consectetur debitis, id iusto minima mollitia omnis quasi sed. Animi dolore, eveniet facilis iusto officia
        sit.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate quo repudiandae similique sunt voluptates.
        Consectetur debitis, id iusto minima mollitia omnis quasi sed. Animi dolore, eveniet facilis iusto officia
        sit.
    </p>

    <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate quo repudiandae similique sunt voluptates.
        Consectetur debitis, id iusto minima mollitia omnis quasi sed. Animi dolore, eveniet facilis iusto officia
        sit.
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate quo repudiandae similique sunt voluptates.
        Consectetur debitis, id iusto minima mollitia omnis quasi sed. Animi dolore, eveniet facilis iusto officia
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate quo repudiandae similique sunt voluptates.
        Consectetur debitis, id iusto minima mollitia omnis quasi sed. Animi dolore, eveniet facilis iusto officia
        sit.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate quo repudiandae similique sunt voluptates.
        Consectetur debitis, id iusto minima mollitia omnis quasi sed. Animi dolore, eveniet facilis iusto officia
        sit.
    </p>

    <br>
    <br>

    <hr>

    <br>
    <br>

    <h2>{{ __('Persoon van afname plaatsbeschrijving') }}</h2>
    <table class="table">
        <tr class="row--head">
            <th>{{ __('Naam') }}</th>
            <th>{{ __('E-mail') }}</th>
        </tr>
        <tr>
            <td>{{ $inspection->user->name ?? "" }}</td>
            <td>{{ $inspection->user->email ?? "" }}</td>
        </tr>
    </table>

    <br>
    <br>
    <br>

    @if($inspection->owner)
        <h2>{{ __('Eigenaar van het eigendom') }}</h2>

        <table class="table">

            @if($inspection->owner->name)
                <tr class="row--text">
                    <th>{{ __('Naam') }}</th>
                    <th>{{ $inspection->owner->name }}</th>
                </tr>
            @endif
            @if($inspection->owner->email)
                <tr class="row--text">
                    <th>{{ __('E-mail') }}</th>
                    <th>{{ $inspection->owner->email }}</th>
                </tr>
            @endif
            @if($inspection->owner->phone)
                <tr class="row--text">
                    <th>{{ __('Telefoon') }}</th>
                    <th>{{ $inspection->owner->phone }}</th>
                </tr>
            @endif
            @if($inspection->owner->address)
                <tr class="row--text">
                    <th>{{ __('Adres') }}</th>
                    <th>{{ $inspection->owner->address }} @if($inspection->owner->postBus)bus {{ $inspection->owner->postBus }} @endif</th>
                </tr>
            @endif
            @if($inspection->owner->zip)
                <tr class="row--text">
                    <th>{{ __('Postcode') }}</th>
                    <th>{{ $inspection->owner->zip }}</th>
                </tr>
            @endif
            @if($inspection->owner->city)
                <tr class="row--text">
                    <th>{{ __('Stad') }}</th>
                    <th>{{ $inspection->owner->city }}</th>
                </tr>
            @endif
            @if($inspection->owner->country)
                <tr class="row--text">
                    <th>{{ __('Land') }}</th>
                    <th>{{ $inspection->owner->country }}</th>
                </tr>
            @endif
        </table>
    @endif

    <br>
    <br>

    <h2>{{ __('Extra informatie') }}</h2>
    <table class="table">

        @if($inspection->owner_present)
            <tr class="row--text">
                <th>{{ __('Eigenaar aanwezig') }}</th>
                <th><img alt="icon" class="img-fluid" src="{{ asset('assets/images/icons/checkbox.png') }}"></th>
            </tr>
        @endif

        @if($inspection->tenant_present)
            <tr class="row--text">
                <th>{{ __('Eigenaar aanwezig') }}</th>
                <th><img alt="icon" class="img-fluid icon" src="{{ asset('assets/images/icons/checkbox.png') }}"></th>
            </tr>
        @endif

        @if($inspection->new_building)
            <tr class="row--text">
                <th>{{ __('Nieuwbouw') }}</th>
                <th><img alt="icon" class="img-fluid icon" src="{{ asset('assets/images/icons/checkbox.png') }}"></th>
            </tr>
        @endif

        @if($inspection->inhabited)
            <tr class="row--text">
                <th>{{ __('Bewoond') }}</th>
                <th><img alt="icon" class="img-fluid icon" src="{{ asset('assets/images/icons/checkbox.png') }}"></th>
            </tr>
        @endif

        @if($inspection->furnished)
            <tr class="row--text">
                <th>{{ __('Bemeubeld') }}</th>
                <th><img alt="icon" class="img-fluid icon" src="{{ asset('assets/images/icons/checkbox.png') }}"></th>
            </tr>
        @endif

        @if($inspection->first_resident)
            <tr class="row--text">
                <th>{{ __('Bemeubeld') }}</th>
                <th><img alt="icon" class="img-fluid icon" src="{{ asset('assets/images/icons/checkbox.png') }}"></th>
            </tr>
        @endif

    </table>

    <br>
    <br>

    @if($files)
        <h2>{{ __('Media') }}</h2>
        <div class="row">
            @foreach($files as $file)
                <div class="column">
                    <img class="img-fluid" src="{{ asset('assets/images/inspections/crop' . '/' . $file->file_crop) }}" alt="picture">
                </div>
            @endforeach
        </div>
    @endif

</body>
</html>
