@foreach($rooms as $room)

    @include('inspections.sections.general')

    @include('inspections.sections.basicArea')

    @include('inspections.sections.specificArea')

    @include('inspections.sections.conformArea')

@endforeach
