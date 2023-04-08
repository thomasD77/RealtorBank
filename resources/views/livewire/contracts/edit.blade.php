<div>
    <div class="single-add-property">
        <a class="breadcrumb-link" href="{{ route('situation.edit', [$inspection, $contract->situation->id]) }}"><p class="breadcrumb-title text-md-right text-dark"><strong><< {{ __('in/uittrede') }}</strong></p></a>

        <h3>{{ __('Status contract') }}</h3>
        <form action="{{ route('toggle.contract') }}" method="post">
            @csrf
            <input type="hidden" name="contract" value="{{ $contract->id }}">
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
                    <form method="POST" action="{{ route('create.signature') }}">
                        <input type="hidden" name="tenant" value="0">
                        <input type="hidden" name="contract" value="{{ $contract->id }}">
                        @csrf
                        <div class="col-md-11">
                            <label class="py-3" for="">{{ __('Handtekening') }} {{ $contract->situation->owner ? $contract->situation->owner->name : "" }} </label>
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
                        @if (session()->has('success'))
                            <div class="btn btn-success flash_message">
                                {{ session('success') }}
                            </div>
                        @endif
                    </form>
                </div>
                <div class="col-md-6 bg-white px-0">
                    <form method="POST" action="{{ route('create.signature') }}">
                        <input type="hidden" name="tenant" value="1">
                        <input type="hidden" name="contract" value="{{ $contract->id }}">
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
                        @if (session()->has('successTenant'))
                            <div class="btn btn-success flash_message">
                                {{ session('successTenant') }}
                            </div>
                        @endif
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
                        <img src="{{ asset('assets/images/logo.svg') }}" width="80" alt="Logo">
                    </div>

                    <div class="col-md-6 text-right">
                        <p class="font-weight-bold mb-1">{{ __('Contract opgemaakt op') }}</p>
                        @if($lock)
                            <p>{{ \Carbon\Carbon::parse($contract->date)->format('d-m-Y')}}</p>
                        @else
                            <input type="date" class="form-control"wire:change="changeDate"
                                   wire:model.defer="date">
                        @endif
                    </div>
                </div>


                <div class="row p-5 the-five">
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="border-0 text-uppercase small font-weight-bold">{{ __('Beschrijving') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>{!! $contract->legal !!}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row pb-5 p-5 the-five">
                    <div class="col-md-6">
                        <h3 class="font-weight-bold mb-4">{{ __('Verkoper/verhuurder') }}</h3>
                        <p class="mb-0 font-weight-bold">{{  $contract->situation->owner ? $contract->situation->owner->name : "" }}</p>
                        <p class="mb-0"><span class="text-dark">{{  $contract->situation->owner ? $contract->situation->owner->phone : "" }}</p>
                        <p class="mb-1"><span class="text-dark">{{  $contract->situation->owner ? $contract->situation->owner->email : "" }}</p>

                        <p class="mb-0">
                            {{  $inspection->address->address }}
                            @if($inspection->address->postBus) {{  $inspection->address->postBus }} @endif
                            @if($inspection->address->zip || $inspection->address->city) ,{{  $inspection->address->zip }} {{  $inspection->address->city }} @endif
                        </p>
                        <p>
                            @if($inspection->address->country) {{  $inspection->address->country }} @endif
                        </p>
                    </div>

                    <div class="col-md-6 text-right">
                        <h3 class="font-weight-bold mb-4">{{ __('Koper/huurder ') }}</h3>
                        <p class="mb-0 font-weight-bold">{{  $contract->situation->tenant ? $contract->situation->tenant->name : "" }}</p>
                        <p class="mb-0"><span class="text-dark">{{  $contract->situation->tenant ? $contract->situation->tenant->phone : "" }}</p>
                        <p class="mb-1"><span class="text-dark">{{  $contract->situation->tenant ? $contract->situation->tenant->email : "" }}</p>
                    </div>
                </div>


                <div class="row pb-5 p-5 the-five">
                    <div class="col-md-6">
                        <h5 class="font-weight-bold mb-4">{{ __('Gelezen en goedgekeurd') }}</h5>
                        <img src="{{ asset('assets/signatures'. '/' . $contract->signature_owner) }}" alt="">
                    </div>

                    <div class="col-md-6 text-right">
                        <h5 class="font-weight-bold mb-4">{{ __('Gelezen en goedgekeurd') }}</h5>
                        <img src="{{ asset('assets/signatures'. '/' . $contract->signature_tenant) }}" alt="">
                    </div>
                </div>

                @if($lock)
                    <div class="single-add-property">
                        <h3>{{ __('Contract printen') }}</h3>
                        <a href="{{ route('print.contract', [$inspection, $contract]) }}" class="btn btn-dark">{{ __('Printen') }}</a>
                    </div>
                @endif

            </div>
        </div>
    </div>
</div>


