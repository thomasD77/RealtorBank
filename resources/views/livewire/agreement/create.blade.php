<div>

    @include('livewire.agreement.css')

    {{--Header with title--}}
    <div class="single-add-property">
        <a class="breadcrumb-link" href="{{ route('quote.edit', [$inspection, $agreement->situation->id, $quote]) }}"><p class="breadcrumb-title text-md-right text-dark"><strong><< {{ __('Offerte') }}</strong></p></a>

        <h3>{{ __('Akkoord schade offerte') }}</h3>

        @if (session()->has('successTenant'))
            <div class="btn btn-success flash_message">
                {{ session('successTenant') }}
            </div>
        @endif
        @if (session()->has('success'))
            <div class="btn btn-success flash_message">
                {{ session('success') }}
            </div>
        @endif
    </div>

    {{--Signatures--}}
    <div class="p-5 the-five" style="background-color: #1d293e;">
        <div class="row">
            <div class="col-md-6 bg-white px-0">
                <form method="POST" action="{{ route('create.signature.agreement') }}">
                    <input type="hidden" name="tenant" value="1">
                    <input type="hidden" name="agreement" value="{{ $agreement->id }}">
                    @csrf
                    <div class="col-md-11">
                        <label class="py-3" for="">{{ __('Handtekening') }} {{ $situation->tenant->name }}</label>
                        <br/>
                        <div id="sig_tenant"></div>
                        <br/>
                        <div class="text-right">
                            <button id="clear65" class="btn btn-danger btn-sm">{{ __('wissen') }}</button>
                        </div>
                        <textarea id="signature65" name="signed" style="display: none"></textarea>
                    </div>
                    <br/>
                    <button class="btn btn-dark m-3">{{ __('Submit') }}</button>
                </form>
            </div>
            <div class="col-md-6 bg-white px-0">
                <form method="POST" action="{{ route('create.signature.agreement') }}">
                    <input type="hidden" name="tenant" value="0">
                    <input type="hidden" name="agreement" value="{{ $agreement->id }}">
                    @csrf
                    <div class="col-md-11">
                        <label class="py-3" for="">{{ __('Handtekening') }} {{ $agreement->situation->owner ? $agreement->situation->owner->name : "" }} </label>
                        <br/>
                        <div id="sig" style="touch-action: none;"></div>
                        <br/>
                        <div class="text-right">
                            <button id="clear" class="btn btn-danger btn-sm">{{ __('wissen') }}</button>
                        </div>
                        <textarea id="signature64" name="signed" style="display: none"></textarea>
                    </div>
                    <br/>
                    <button class="btn btn-dark m-3">{{ __('Submit') }}</button>
                </form>
            </div>
        </div>
    </div>

    {{--Contract--}}
    <div class="invoice mb-0">
        <div class="card border-0">
            <div class="card-body p-0">
                <div class="row p-5 the-five">
                    <div class="col-md-6">
                        <!-- <img src="{{ asset('assets/images/logo.svg') }}" width="80" alt="Logo"> -->
                    </div>

                    <div class="col-md-6 text-right">
                        <p class="font-weight-bold mb-1">{{ __('Contract opgemaakt op') }}</p>
                        <p>{{ today()->format('d-m-Y')}}</p>
                    </div>
                </div>

                <hr>

                <!-- Credentials authorized parties -->
                <div class="row p-5 the-five">

                    <div class="text-center w-100 my-4">

                        <h3>{{ __('Akkoord schade') }}</h3>

                    </div>

                    <div class="my-5 w-100">
                        @if($damages && $damages->isNotEmpty())
                            <table class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th class="title-column">{{ __('Titel') }}</th>
                                    <th class="description-column">{{ __('Beschrijving') }}</th>
                                    <th class="location-column">{{ __('Locatie') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($damages as $damage)
                                    <tr>
                                        <td class="title-column">{{ $damage->damage_title ?? '-' }}</td>
                                        <td class="description-column">{{ $damage->damage_description ?? '-' }}</td>
                                        <td class="location-column">
                                            <strong>{{ $damage->damage_date ? $damage->damage_date : '-' }}</strong><br>
                                            <p style="text-decoration: underline">
                                                @if($damage->basicArea)
                                                    {{ $damage->basicArea->floor->title ?? '-' }} >>
                                                    {{ $damage->basicArea->room->title ?? '-' }} >>
                                                    {{ $damage->basicArea->area->title ?? '-' }}
                                                @elseif($damage->general)
                                                    {{ $damage->general->room->floor->title ?? '-' }} >>
                                                    {{ $damage->general->room->title ?? '-' }}
                                                @elseif($damage->specificArea)
                                                    {{ $damage->specificArea->room->floor->title ?? '-' }} >>
                                                    {{ $damage->specificArea->room->title ?? '-' }} >>
                                                    {{ $damage->specificArea->specific->title ?? '-' }}
                                                @elseif($damage->conformArea)
                                                    {{ $damage->conformArea->floor->title ?? '-' }} >>
                                                    {{ $damage->conformArea->room->title ?? '-' }} >>
                                                    {{ $damage->conformArea->conform->title ?? '-' }}
                                                @elseif($damage->techniqueArea)
                                                    {{ $damage->techniqueArea->technique->title ?? '-' }}
                                                @elseif($damage->outdoorArea)
                                                    {{ $damage->outdoorArea->room->title ?? '-' }} >>
                                                    {{ $damage->outdoorArea->outdoor->title ?? '-' }}
                                                @endif
                                            </p>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            <p>{{ __('Geen schades geselecteerd.') }}</p>
                        @endif

                </div>

                <div class="row p-5 the-five">
                    <p>Voor het pand te {{  $inspection->address->address }}, @if($inspection->address->postBus) {{  $inspection->address->postBus }}, @endif
                        @if($inspection->address->zip || $inspection->address->city) {{  $inspection->address->zip }} {{  $inspection->address->city }} @endif
                        , eigendom van {{ $situation->owner ? $situation->owner->name : "" }}
                        en verhuurd aan {{ $situation->tenant ? $situation->tenant->name : "" }}, werd een schade opmeting gedaan
                        door {{ $inspection->user ? $inspection->user->firstName : "" }} {{ $inspection->user ? $inspection->user->lastName : "" }} @if($inspection->user->companyName)voor {{ $inspection->user->companyName }}@endif
                    </p>
                </div>

                <!-- Signatures -->

                    <div class="signature row p-5 the-five w-100">
                        <div class="col-12">
                            <p>{{ __('Datum') }}: {{ today()->format('d-m-Y')}}</p>
                        </div>

                        <div class="col-md-6 ">
                            <strong>{{ __('HUURDERS') }}</strong><br>
                            <span class="mt-0" style="font-style: italic; font-size: 10px">gelezen en goedgekeurd</span>
                            <p>{{  $agreement->situation->tenant ? $agreement->situation->tenant->name : "" }}</p>
                            @if($agreement->signature_tenant)
                                <img class="img-fluid" src="{{ asset('assets/signatures'. '/' . $agreement->signature_tenant) }}">
                            @endif
                        </div>

                        <div class="col-md-6 text-right">
                            <strong>{{ __('VERHUURDERS') }}</strong><br>
                            <span class="mt-0" style="font-style: italic; font-size: 10px">gelezen en goedgekeurd</span>
                            <p>{{  $agreement->situation->owner ? $agreement->situation->owner->name : "" }}</p>
                            @if($agreement->signature_owner)
                                <img class="img-fluid" src="{{ asset('assets/signatures'. '/' . $agreement->signature_owner) }}">
                            @endif
                        </div>
                    </div>

            </div>

            <div class="single-add-property">
                <h3>{{ __('Akkoord printen') }}</h3>
                <a href="{{ route('print.agreement', [$inspection, $situation, $quote, $agreement]) }}" class="btn btn-dark">{{ __('Printen') }}</a>
            </div>

        </div>
    </div>
</div>
</div>
