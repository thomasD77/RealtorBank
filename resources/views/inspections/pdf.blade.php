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

        @include('inspections.sections.inspection-information')

        @foreach($rooms as $room)

            @include('inspections.sections.general')

            @include('inspections.sections.basicArea')

            @include('inspections.sections.specificArea')

            @include('inspections.sections.conformArea')

        @endforeach

        @include('inspections.sections.techniques')

        @include('inspections.sections.keys')

        @include('inspections.sections.meters')

        @include('inspections.sections.documents')

</body>
</html>
