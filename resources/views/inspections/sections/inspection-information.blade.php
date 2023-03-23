<section class="inspection-information">
    <h1>{{ $inspection->title ?? 'DRAFT' }}</h1>
    <p class="date-title">{{ __('Datum opgemaakt') }} | {{ $inspection->created_at }}</p>

    <br>

    @if($inspection->extra)
        <p>{{ $inspection->extra }}</p>
    @endif

    <br>

    <hr>

    <br>

    <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate quo repudiandae similique sunt voluptates.
        Consectetur debitis, id iusto minima mollitia omnis quasi sed. Animi dolore, eveniet facilis iusto officia
        sit.
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate quo repudiandae similique sunt voluptates.
        Consectetur debitis, id iusto minima mollitia omnis quasi sed. Animi dolore, eveniet facilis iusto officia
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate quo repudiandae similique sunt voluptates.
        Consectetur debitis, id iusto minima mollitia omnis quasi sed. Animi dolore, eveniet facilis iusto officia
        sit.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate quo repudiandae similique sunt voluptates.
        Consectetur debitis, id iusto minima mollitia omnis quasi sed. Animi dolore, eveniet facilis iusto officia
        sit.
    </p>

    <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate quo repudiandae similique sunt voluptates.
        Consectetur debitis, id iusto minima mollitia omnis quasi sed. Animi dolore, eveniet facilis iusto officia
        sit.
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate quo repudiandae similique sunt voluptates.
        Consectetur debitis, id iusto minima mollitia omnis quasi sed. Animi dolore, eveniet facilis iusto officia
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate quo repudiandae similique sunt voluptates.
        Consectetur debitis, id iusto minima mollitia omnis quasi sed. Animi dolore, eveniet facilis iusto officia
        sit.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate quo repudiandae similique sunt voluptates.
        Consectetur debitis, id iusto minima mollitia omnis quasi sed. Animi dolore, eveniet facilis iusto officia
        sit.
    </p>

    <br>

    <hr>

    <br>

    <section>
        <h2>{{ __('Persoon van afname plaatsbeschrijving') }}</h2>
        <table class="table">
            @if($inspection->user->firstName || $inspection->user->lastName)
                <tr class="row--text">
                    <th>{{ __('Naam') }}</th>
                    <th>{{ $inspection->user->firstName }} {{ $inspection->user->lastName }}</th>
                </tr>
            @endif
            @if($inspection->user->email)
                <tr class="row--text w-100">
                    <th>{{ __('E-mail') }}</th>
                    <th>{{ $inspection->user->email }}</th>
                </tr>
            @endif
            @if($inspection->user->phone)
                <tr class="row--text w-100">
                    <th>{{ __('Telefoon of GSM') }}</th>
                    <th>{{ $inspection->user->phone }}</th>
                </tr>
            @endif
            @if($inspection->user->companyName)
                <tr class="row--text w-100">
                    <th>{{ __('Bedrijfsnaam') }}</th>
                    <th>{{ $inspection->user->companyName }}</th>
                </tr>
            @endif
            @if($inspection->user->address)
                <tr class="row--text w-100">
                    <th>{{ __('Adres') }}</th>
                    <th>
                        {{ $inspection->user->address->address }}
                        @if($inspection->user->address->postBus)- {{ $inspection->user->address->postBus }}@endif
                        @if($inspection->user->address->zip || $inspection->user->address->city)
                            , {{ $inspection->user->address->zip }} {{ $inspection->user->address->city }}
                        @endif
                        @if($inspection->user->address->country)
                            , {{ $inspection->user->address->country }}
                        @endif
                    </th>
                </tr>
            @endif
            @if($inspection->user->about)
                <tr class="row--text w-100">
                    <th>{{ __('Over mij') }}</th>
                    <th>{{ $inspection->user->about }}</th>
                </tr>
            @endif
        </table>
    </section>

    <br>

    <section>
        @if($inspection->owner->name || $inspection->owner->email || $inspection->owner->phone || $inspection->owner->address || $inspection->owner->postBus || $inspection->owner->zip || $inspection->owner->city || $inspection->owner->country)
            <h2>{{ __('Eigenaar van het eigendom') }}</h2>
            <table class="table">

                @if($inspection->owner->name)
                    <tr class="row--text">
                        <th>{{ __('Naam') }}</th>
                        <th>{{ $inspection->owner->name }}</th>
                    </tr>
                @endif
                @if($inspection->owner->email)
                    <tr class="row--text">
                        <th>{{ __('E-mail') }}</th>
                        <th>{{ $inspection->owner->email }}</th>
                    </tr>
                @endif
                @if($inspection->owner->phone)
                    <tr class="row--text">
                        <th>{{ __('Telefoon') }}</th>
                        <th>{{ $inspection->owner->phone }}</th>
                    </tr>
                @endif
                @if($inspection->owner->address)
                    <tr class="row--text">
                        <th>{{ __('Adres') }}</th>
                        <th>{{ $inspection->owner->address }} @if($inspection->owner->postBus)bus {{ $inspection->owner->postBus }} @endif</th>
                    </tr>
                @endif
                @if($inspection->owner->zip)
                    <tr class="row--text">
                        <th>{{ __('Postcode') }}</th>
                        <th>{{ $inspection->owner->zip }}</th>
                    </tr>
                @endif
                @if($inspection->owner->city)
                    <tr class="row--text">
                        <th>{{ __('Stad') }}</th>
                        <th>{{ $inspection->owner->city }}</th>
                    </tr>
                @endif
                @if($inspection->owner->country)
                    <tr class="row--text">
                        <th>{{ __('Land') }}</th>
                        <th>{{ $inspection->owner->country }}</th>
                    </tr>
                @endif
            </table>
        @endif
    </section>
    
    <section>
        @if($inspection->owner_present || $inspection->tenant_present || $inspection->new_building || $inspection->inhabited || $inspection->furnished || $inspection->first_resident)
            <h2>{{ __('Extra informatie') }}</h2>
            <table class="table">

                @if($inspection->owner_present)
                    <tr class="row--text">
                        <th>{{ __('Eigenaar aanwezig') }}</th>
                        <th><img alt="icon" class="img-fluid" src="{{ asset('assets/images/icons/checkbox.png') }}"></th>
                    </tr>
                @endif

                @if($inspection->tenant_present)
                    <tr class="row--text">
                        <th>{{ __('Huurder aanwezig') }}</th>
                        <th><img alt="icon" class="img-fluid icon" src="{{ asset('assets/images/icons/checkbox.png') }}"></th>
                    </tr>
                @endif

                @if($inspection->new_building)
                    <tr class="row--text">
                        <th>{{ __('Nieuwbouw') }}</th>
                        <th><img alt="icon" class="img-fluid icon" src="{{ asset('assets/images/icons/checkbox.png') }}"></th>
                    </tr>
                @endif

                @if($inspection->inhabited)
                    <tr class="row--text">
                        <th>{{ __('Bewoond') }}</th>
                        <th><img alt="icon" class="img-fluid icon" src="{{ asset('assets/images/icons/checkbox.png') }}"></th>
                    </tr>
                @endif

                @if($inspection->furnished)
                    <tr class="row--text">
                        <th>{{ __('Bemeubeld') }}</th>
                        <th><img alt="icon" class="img-fluid icon" src="{{ asset('assets/images/icons/checkbox.png') }}"></th>
                    </tr>
                @endif

                @if($inspection->first_resident)
                    <tr class="row--text">
                        <th>{{ __('Eerste bewoner') }}</th>
                        <th><img alt="icon" class="img-fluid icon" src="{{ asset('assets/images/icons/checkbox.png') }}"></th>
                    </tr>
                @endif

            </table>
        @endif
    </section>

    <br>
    <br>

    @include('inspections.sections.media' , [ 'folder' => \App\Enums\ImageStorageDirectory::Inspections->value, 'item' => $inspection ])

</section>
