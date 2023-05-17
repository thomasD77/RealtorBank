<section>
    <h3>{{ __('Inleiding') }}</h3>
    @if($situation->intrede != 2)
        <p>Voor het pand te {{  $inspection->address->address }}, @if($inspection->address->postBus) {{  $inspection->address->postBus }}, @endif
            @if($inspection->address->zip || $inspection->address->city) {{  $inspection->address->zip }} {{  $inspection->address->city }} @endif
            , eigendom van {{ $situation->owner ? $situation->owner->name : "" }}
            en verhuurd aan {{ $situation->tenant ? $situation->tenant->name : "" }}, werd op datum van {{ $situation->date }} een gedetailleerde
            @if($situation->intrede)
                intrede
            @else
                uittrede
            @endif opname gedaan. <br>
            De plaatsbeschrijving is uitgevoerd door {{ $inspection->user ? $inspection->user->firstName : "" }} {{ $inspection->user ? $inspection->user->lastName : "" }} @if($inspection->user->companyName)voor {{ $inspection->user->companyName }}@endif</p>
        @if($situation->intrede)
            <br>
            {!! Config('contract.legal_in') !!}
        @else
            <br>
            {!! Config('contract.legal_uit') !!}
        @endif
    @else
        <p>Met betrekking tot het pand gelegen te {{  $situation->address->address }}, @if($situation->address->postBus) {{  $situation->address->postBus }}, @endif
            @if($situation->address->zip || $situation->address->city) {{  $situation->address->zip }} {{  $situation->address->city }} @endif
            eigendom van {{ $situation->owner ? $situation->owner->name : "" }}, werd op datum van {{ \Carbon\Carbon::parse($situation->date)->format('d-m-Y')}} een gedetailleerde plaatsbeschrijving gedaan.
            De plaatsbeschrijving is uitgevoerd door {{ $inspection->user ? $inspection->user->firstName : "" }} {{ $inspection->user ? $inspection->user->lastName : "" }} @if($inspection->user->companyName)voor {{ $inspection->user->companyName }}@endif</p>
        <br>
        {!! Config('contract.legal_aanvang') !!}
    @endif
</section>
