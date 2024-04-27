<div>
    <div class="single-add-property">
        <a class="breadcrumb-link" href="{{ route('situation.edit', [$inspection, $claim->situation->id]) }}"><p class="breadcrumb-title text-md-right text-dark"><strong><< {{ __('beschrijvingen') }}</strong></p></a>

        @if($claim->situation->intrede != 0)
            <h3>{{ __('Addendum') }}</h3>
        @else
            <h3>{{ __('Status huurschade contract') }}</h3>
        @endif
        <form action="{{ route('toggle.claim') }}" method="post">
            @csrf
            <input type="hidden" name="claim" value="{{ $claim->id }}">
            <button class="btn btn-dark">
                @if($lock)
                    {{ __('Openen') }}
                @else
                    {{ __('Sluiten') }}
                @endif
            </button>
            @if($lock)
                <p class="text-muted">
                    {{ __('*Een contract kan alleen aangepast worden wanneer je deze opent.') }}
                    {{ __('Dit kan door op deze knop te klikken.') }}
                </p>
            @else
                <p class="text-muted mt-1">{{ __('*Om een contract te printen moet deze eerst gesloten worden. Druk op deze knop om alle gegevens vast te zetten.') }}</p>
            @endif
        </form>
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

    <style>
        .m-signature-pad {
            position: relative;
            font-size: 10px;
            width: 700px;
            height: 400px;
            top: 50%;
            left: 50%;

            border: 1px solid #e8e8e8;
            background-color: #fff;
            /*box-shadow: 0 1px 4px rgba(0, 0, 0, 0.27), 0 0 40px rgba(0, 0, 0, 0.08) inset;*/
            border-radius: 4px;
        }

        .m-signature-pad:before, .m-signature-pad:after {
            position: absolute;
            z-index: -1;
            content: "";
            width: 40%;
            height: 10px;
            left: 20px;
            bottom: 10px;
            background: transparent;
            -webkit-transform: skew(-3deg) rotate(-3deg);
            -moz-transform: skew(-3deg) rotate(-3deg);
            -ms-transform: skew(-3deg) rotate(-3deg);
            -o-transform: skew(-3deg) rotate(-3deg);
            transform: skew(-3deg) rotate(-3deg);
            /*box-shadow: 0 8px 12px rgba(0, 0, 0, 0.4);*/
        }

        .m-signature-pad:after {
            left: auto;
            right: 20px;
            -webkit-transform: skew(3deg) rotate(3deg);
            -moz-transform: skew(3deg) rotate(3deg);
            -ms-transform: skew(3deg) rotate(3deg);
            -o-transform: skew(3deg) rotate(3deg);
            transform: skew(3deg) rotate(3deg);
        }

        .m-signature-pad--body {
            position: absolute;
            left: 20px;
            right: 20px;
            top: 20px;
            bottom: 80px;
            border: 1px solid #f4f4f4;
        }

        .m-signature-pad--body
        canvas {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            border-radius: 4px;
            /*box-shadow: 0 0 5px rgba(0, 0, 0, 0.02) inset;*/
        }

        .m-signature-pad--footer {
            position: absolute;
            left: 20px;
            right: 20px;
            bottom: 20px;
            height: 60px;
        }

        .m-signature-pad--footer
        .description {
            color: #C3C3C3;
            text-align: center;
            font-size: 1.2em;
            margin-top: 1em;
        }

        .m-signature-pad--footer
        .left, .right {
            position: absolute;
            bottom: 0;
        }

        .m-signature-pad--footer
        .left {
            left: 0;
        }

        .m-signature-pad--footer
        .right {
            right: 0;
        }

        @media screen and (max-width: 1024px) {
            .m-signature-pad {
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                width: auto;
                height: auto;
                min-width: 250px;
                min-height: 250px;
                margin: 5%;
            }
            #github {
                display: none;
            }
        }

        @media screen and (min-device-width: 768px) and (max-device-width: 1024px) {
            .m-signature-pad {
                margin: 10%;
            }
        }

        @media screen and (max-height: 320px) {
            .m-signature-pad--body {
                left: 0;
                right: 0;
                top: 0;
                bottom: 32px;
            }
            .m-signature-pad--footer {
                left: 20px;
                right: 20px;
                bottom: 4px;
                height: 28px;
            }
            .m-signature-pad--footer
            .description {
                font-size: 1em;
                margin-top: 1em;
            }
        }

    </style>


    @if(!$lock)
        <div class="p-5 the-five" style="background-color: #1d293e;">
            <div class="row">
                <div class="col-md-6 bg-white px-0">
                    <form method="POST" action="{{ route('create.signature.claim') }}">
                        <input type="hidden" name="tenant" value="1">
                        <input type="hidden" name="claim" value="{{ $claim->id }}">
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
                    <form method="POST" action="{{ route('create.signature.claim') }}">
                        <input type="hidden" name="tenant" value="0">
                        <input type="hidden" name="claim" value="{{ $claim->id }}">
                        @csrf
                        <div class="col-md-11">
                            <label class="py-3" for="">{{ __('Handtekening') }} {{ $claim->situation->owner ? $claim->situation->owner->name : "" }} </label>
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
    @endif

    <div class="invoice mb-0">
        <div class="card border-0">
            <div class="card-body p-0">
                <div class="text-right">
                    @if($lock)
                        <span class="badge badge bg-danger text-white p-3">{{ __('Gesloten') }}</span>
                    @else
                        <span class="badge badge bg-success text-white p-3">{{ __('Open') }}</span>
                    @endif
                </div>
                <div class="row p-5 the-five">
                    <div class="col-md-6">
                        <!-- <img src="{{ asset('assets/images/logo.svg') }}" width="80" alt="Logo"> -->
                    </div>

                    <div class="col-md-6 text-right">
                        <p class="font-weight-bold mb-1">{{ __('Contract opgemaakt op') }}</p>
                        @if($lock)
                            <p>{{ \Carbon\Carbon::parse($claim->date)->format('d-m-Y')}}</p>
                        @else
                            <input type="date" class="form-control"wire:change="changeDate"
                                   wire:model.defer="date">
                        @endif
                    </div>
                </div>

                <hr>

                <!-- Credentials authorized parties -->
                <div class="row p-5 the-five">

                    <div class="text-center w-100 my-4">
                        @if($claim->situation->intrede != 0)
                            <h3>{{ __('ADDENDUM ') }} <br> {{ __('HUURSCHADE ') }}</h3>
                        @else
                            <h1>{{ __('PLAATSBESCHRIJVING ') }} <br> {{ __('HUURSCHADE ') }}</h1>
                        @endif
                    </div>

                    <div class="my-5 w-100">
                    @if($damages->isNotEmpty())
                        @foreach($damages as $damage)
                            <div class="row">
                                <div class="col-md-2">
                                    <h6>Naam:</h6>
                                </div>
                                <div class="col-md-4">
                                    <h5>{{ $damage->title }}</h5>
                                </div>
                                <div class="col-md-2">
                                    <h6>Datum:</h6>
                                </div>
                                <div class="col-md-4">
                                    <h5>{{ $damage->date }}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <h6>Beschrijving:</h6>
                                </div>
                                <div class="col-md-12">
                                    <h5>{{ $damage->description }}</h5>
                                </div>
                            </div>
                            <hr class="mb-5">
                        @endforeach
                    </div>
                    @else
                        <p>{{ __('Er zijn is geen schade gevonden of actief gemarkeerd om in dit contract te printen.') }}</p>
                    @endif

                </div>

                @if($claim->situation->intrede == 3 && $relation_intrede->date)
                    <div class="row p-5 the-five">
                        <p>Voor het pand te {{  $inspection->address->address }}, @if($inspection->address->postBus) {{  $inspection->address->postBus }}, @endif
                            @if($inspection->address->zip || $inspection->address->city) {{  $inspection->address->zip }} {{  $inspection->address->city }} @endif
                            , eigendom van {{ $situation->owner ? $situation->owner->name : "" }}
                            en verhuurd aan {{ $situation->tenant ? $situation->tenant->name : "" }}, werd op datum van {{ $relation_intrede->date }} een gedetailleerde @if($situation->intrede) intrede @else uittrede @endif gedaan
                            door {{ $inspection->user ? $inspection->user->firstName : "" }} {{ $inspection->user ? $inspection->user->lastName : "" }} @if($inspection->user->companyName)voor {{ $inspection->user->companyName }}@endif
                        </p>
                    </div>
                @else
                    <div class="row p-5 the-five">
                        <p>Er werd nog geen intrede opgemaakt of daar een datum geselecteerd voor deze plaatsbeschrijving. Gelieve dit eerst in orde te maken voor een addendum toe te voegen.</p>
                   </div>
                @endif

                <!-- Signatures -->
                <section class="signature">
                    <div class="row p-5 the-five">
                        <div class="col-12">
                            @if($claim->date)
                                <hr>
                                <p class="date-title">{{ __('Opnamedatum') }}: {{ $claim->date }}</p>
                            @endif
                        </div>

                        <div class="col-md-6 ">
                            <strong>{{ __('HUURDERS') }}</strong><br>
                            <span class="mt-0" style="font-style: italic; font-size: 10px">gelezen en goedgekeurd</span>
                            <p>{{  $claim->situation->tenant ? $claim->situation->tenant->name : "" }}</p>
                            @if($claim->signature_tenant)
                                <img class="img-fluid" src="{{ asset('assets/signatures'. '/' . $claim->signature_tenant) }}">
                            @endif
                        </div>

                        <div class="col-md-6 text-right">
                            <strong>{{ __('VERHUURDERS') }}</strong><br>
                            <span class="mt-0" style="font-style: italic; font-size: 10px">gelezen en goedgekeurd</span>
                            <p>{{  $claim->situation->owner ? $claim->situation->owner->name : "" }}</p>
                            @if($claim->signature_owner)
                                <img class="img-fluid" src="{{ asset('assets/signatures'. '/' . $claim->signature_owner) }}">
                            @endif
                        </div>

                    </div>
                </section>

            </div>

            @if($lock)
                <div class="single-add-property">
                    <h3>{{ __('Mandaat printen') }}</h3>
                    <a href="{{ route('print.claim', [$inspection, $claim, $situation]) }}" class="btn btn-dark">{{ __('Printen') }}</a>
                </div>
            @endif

        </div>
    </div>
</div>
</div>


