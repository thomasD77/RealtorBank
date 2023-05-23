<section class="break">
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
        <p>Met betrekking tot het pand gelegen te @if($situation->address){{  $situation->address->address }}, @endif @if($situation->address->postBus) {{  $situation->address->postBus }}, @endif
            @if($situation->address->zip || $situation->address->city) {{  $situation->address->zip }} {{  $situation->address->city }} @endif
            eigendom van {{ $situation->owner ? $situation->owner->name : "" }}, werd op datum van {{ \Carbon\Carbon::parse($situation->date)->format('d-m-Y')}} een gedetailleerde plaatsbeschrijving gedaan.
            De plaatsbeschrijving is uitgevoerd door {{ $inspection->user ? $inspection->user->firstName : "" }} {{ $inspection->user ? $inspection->user->lastName : "" }} @if($inspection->user->companyName)voor {{ $inspection->user->companyName }}@endif</p>
        <br>
        @endif
        <p>{!! Config('contract.legal_aanvang') !!}</p>
    @endif
</section>
