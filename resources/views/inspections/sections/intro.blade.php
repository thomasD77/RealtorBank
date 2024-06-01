<section class="">
    <h3>{{ __('Inleiding') }}</h3>
    @if($situation->intrede != 2)
        <p>Voor het pand te @if($inspection->address->address){{  $inspection->address->address }}, @else <span class="marker">...</span> @endif
            @if($inspection->address->postBus) {{  $inspection->address->postBus }}, @endif
            @if($inspection->address->zip || $inspection->address->city) {{  $inspection->address->zip }} {{  $inspection->address->city }} @endif
            , eigendom van @if($situation->owner->name){{ $situation->owner->name }} @else <span class="marker">...</span> @endif
            en verhuurd aan @if($situation->tenant->name){{ $situation->tenant->name }} @else <span class="marker">...</span> @endif
            , werd op datum van @if($situation->date){{ $situation->date }} @else <span class="marker">...</span> @endif
            een gedetailleerde
            @if($situation->intrede)
                intrede
            @else
                uittrede
            @endif opname gedaan. <br>
            De plaatsbeschrijving is uitgevoerd door {{ $inspection->user ? $inspection->user->firstName : "" }} {{ $inspection->user ? $inspection->user->lastName : "" }} @if($inspection->user->companyName)voor {{ $inspection->user->companyName }}@endif</p>

        @if($situation->intrede)
            <br>
            <p>{!! Config('contract.legal_in') !!}</p>
        @else
            <br>
            <p>{!! Config('contract.legal_uit') !!}</p>
        @endif
    @else
        @if($situation->address)
        <p>Met betrekking tot het pand gelegen te @if($inspection->address->address){{  $inspection->address->address }}, @else <span class="marker">...</span> @endif
            @if($inspection->address->postBus) {{  $inspection->address->postBus }}, @endif
            @if($inspection->address->zip || $inspection->address->city) {{  $inspection->address->zip }} {{  $inspection->address->city }} @endif
            eigendom van {{ $situation->owner ? $situation->owner->name : "" }}, werd op datum van {{ \Carbon\Carbon::parse($situation->date)->format('d-m-Y')}} een gedetailleerde plaatsbeschrijving gedaan.
            De plaatsbeschrijving is uitgevoerd door {{ $inspection->user ? $inspection->user->firstName : "" }} {{ $inspection->user ? $inspection->user->lastName : "" }} @if($inspection->user->companyName)voor {{ $inspection->user->companyName }}@endif</p>
        <br>
        @endif
        <p>{!! Config('contract.legal_aanvang') !!}</p>
    @endif

    <br>

    @if($inspection->extra)
        <div class="inspection-description">
            <h3>{{ __('Beschrijving') }}</h3>
            <p>{{ $inspection->extra }}</p>
        </div>
    @endif

    @if($insp_damages)
        <div class="inspection-description">
            <h3>{{ __('Algemene Schade Opmetingen') }}</h3>
            @foreach($insp_damages as $damage)
                @if($damage->print_pdf)
                    <table class="table">
                        <tr class="damages">
                            <th>{{ __('Schade') }}</th>
                            <th>{{ $damage->title }}</th>
                        </tr>

                        <tr class="row--text--list">
                            <th>{{ __('Datum') }}</th>
                            <th>{{ $damage->date }}</th>
                        </tr>
                        <tr class="row--text--list">
                            <th>{{ __('Beschrijving') }}</th>
                            <th>{{ $damage->description }}</th>
                        </tr>
                    </table>

                    @include('inspections.sections.media' , [ 'folder' => 'damages' , 'item' => $damage ])

                @endif
            @endforeach
        </div>
    @endif

</section>
