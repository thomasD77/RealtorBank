<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('Plaatsbeschrijving') }}</title>

    @include('inspections.sections.css')
</head>
<body>
<header style="margin-bottom: 3rem">
    PB: {{  $inspection->address->address }} @if($inspection->address->postBus), {{  $inspection->address->postBus }} @endif
    @if($inspection->address->zip || $inspection->address->city), {{  $inspection->address->zip }} {{  $inspection->address->city }} @endif
</header>

        @include('inspections.sections.inspection-information')

        @include('inspections.sections.intro')

            @include('inspections.rooms.basement' , ['rooms' => $basementParam ])
            @include('inspections.rooms.groundFloor' , ['rooms' => $groundFloorParam ])
            @include('inspections.rooms.upperFloorParam' , ['rooms' => $upperFloorParam ])
            @include('inspections.rooms.atticParam' , ['rooms' => $atticParam ])
            @include('inspections.rooms.garageParam' , ['rooms' => $garageParam ])
            @include('inspections.rooms.buildingParam' , ['rooms' => $buildingParam ])
            @include('inspections.rooms.driveWayParam' , ['rooms' => $driveWayParam ])
            @include('inspections.rooms.outHouseInParam' , ['rooms' => $outHouseInParam ])
            @include('inspections.rooms.outHouseExParam' , ['rooms' => $outHouseExParam ])

        @include('inspections.sections.techniques')

        @include('inspections.sections.keys')

        @include('inspections.sections.meters')

        @include('inspections.sections.documents')

        @include('inspections.sections.consensus')

<footer>
    {{ $inspection->user ? $inspection->user->firstName : "" }} {{ $inspection->user ? $inspection->user->lastName : ""  }} | {{ __('EstateMetrics') }} | &copy; {{ now()->format('Y') }}
</footer>
</body>
</html>
