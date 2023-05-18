<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('Huurschade') }}</title>

    @include('inspections.sections.css')
</head>
<body>
<header style="margin-bottom: 3rem">
    PB: {{  $inspection->address->address }} @if($inspection->address->postBus), {{  $inspection->address->postBus }} @endif
    @if($inspection->address->zip || $inspection->address->city), {{  $inspection->address->zip }} {{  $inspection->address->city }} @endif
</header>

@include('inspections.sections.inspection-information')

@include('inspections.sections.intro')

<div class="slot">

    <div style="text-align: center; margin-top: 20px">
        <h2>{{ __('PLAATSBESCHRIJVING ') }} <br> {{ __('HUURSCHADE ') }}</h2>
    </div>

    @if($damages->isNotEmpty())
        @foreach($damages as $damage)
            <div class="row" style="margin-bottom: 35px">
                <div class="column-half" style="margin: 5px; padding: 0">
                    <h5>{{ $damage->title }}</h5>
                </div>
                <div class="column-half" style="margin: 5px; padding: 0">
                    <h5>{{ $damage->date }}</h5>
                </div>
                <div class="col-12" style="margin: 0; padding: 0">
                    {{ $damage->description }}
                </div>
            </div>

            <hr>
        @endforeach
    @else
        <p>{{ __('Er zijn is geen schade gevonden of actief gemarkeerd om in dit contract te printen.') }}</p>
    @endif

</div>

@include('inspections.sections.consensus')

<footer>
    {{ $inspection->user ? $inspection->user->firstName : "" }} {{ $inspection->user ? $inspection->user->lastName : ""  }} | {{ __('EstateMetrics') }} | &copy; {{ now()->format('Y') }}
</footer>
</body>
</html>
