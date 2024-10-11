<div>
    <div class="single-add-property">
        <a href="{{ route('situation.index', $inspection) }}"><p class="breadcrumb-title text-md-right text-dark"><strong><< {{ __('overzicht') }}</strong></p></a>
        @if (session()->has('successPDF'))
            <div class="btn btn-success flash_message mb-3">
                {{ session('successPDF') }}
            </div>
        @endif
        <h3>{{ __('Beschrijvingen') }}</h3>
        <div class="property-form-group">
            <div class="row">
                <div class="col-md-6 dropdown faq-drop">
                    <ul>
                        <li class="fl-wrap filter-tags clearfix">
                            <div class="checkboxes float-left">
                                <div class="filter-tags-wrap">
                                    <input id="check-a" type="checkbox" wire:click="intredeSubmit({{1}})"  @if($intrede == 1) checked @endif>
                                    <label for="check-a">{{ __('Intrede') }}</label>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6 dropdown faq-drop">
                    <ul>
                        <li class="fl-wrap filter-tags clearfix">
                            <div class="checkboxes float-left">
                                <div class="filter-tags-wrap">
                                    <input id="check-c" type="checkbox" wire:click="intredeSubmit({{0}})" @if($intrede === 0) checked @endif>
                                    <label for="check-c">{{ __('Uittrede') }}</label>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6 dropdown faq-drop">
                    <ul>
                        <li class="fl-wrap filter-tags clearfix">
                            <div class="checkboxes float-left">
                                <div class="filter-tags-wrap">
                                    <input id="check-d" type="checkbox" wire:click="intredeSubmit({{2}})" @if($intrede == 2) checked @endif>
                                    <label for="check-d">{{ __('Aanvang van werken') }}</label>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="col-md-6 dropdown faq-drop">
                    <ul>
                        <li class="fl-wrap filter-tags clearfix">
                            <div class="checkboxes float-left">
                                <div class="filter-tags-wrap">
                                    <input id="check-e" type="checkbox" wire:click="intredeSubmit({{3}})" @if($intrede == 3) checked @endif
                                    @if(!$addendum_check) disabled @endif>
                                    <label for="check-e">{{ __('Addendum') }} @if(!$addendum_check) <p style="font-size:12px; text-transform: lowercase">{{ __('*er werd nog geen intrede gekoppeld voor deze PB') }}</p> @endif</label>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-6 col-md-12">
                    <p>
                        <label for="date">{{ __('Datum') }}</label>
                        <input type="date" wire:change="editDate" wire:model="date" id="date">
                    </p>
                </div>
            </div>
        </div>
    </div>

    @if($intrede === 0 || $intrede == 1 || $intrede == 2 || $intrede == 3)
        <div class="single-add-property">
            @if($intrede != 2)
                <h3>{{ __('Verhuurder') }}</h3>
            @else
                <h3>{{ __('Eigenaar') }}</h3>
            @endif
            <div class="property-form-group">
                <form wire:submit.prevent="ownerSubmit">
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <p>
                                <label for="name">{{ __('Naam') }}</label>
                                <input type="text" wire:model="name" placeholder="Vul hier de naam in" id="name">
                            </p>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <p>
                                <label for="email">{{ __('E-mail') }}</label>
                                <input type="text" wire:model="email" placeholder="Vul hier de e-mail in" id="email">
                            </p>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <p>
                                <label for="phone">{{ __('Phone') }}</label>
                                <input type="text" wire:model="phone" placeholder="Vul hier de telefoon in" id="phone">
                            </p>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-12 mt-5">
                            <button type="submit" class="btn btn-dark">save</button>
                            @if (session()->has('successOwner'))
                                <div class="btn btn-success flash_message">
                                    {{ session('successOwner') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>

        @if($situation->intrede != 2)
            <div class="single-add-property">
            <h3>{{ __('Huurder') }}</h3>
            <div class="property-form-group">
                <form wire:submit.prevent="tenantSubmit">
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <p>
                                <label for="nameTenant">{{ __('Naam') }}</label>
                                <input type="text" wire:model="nameTenant" placeholder="Vul hier de naam in" id="nameTenant">
                            </p>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <p>
                                <label for="emailTenant">{{ __('E-mail') }}</label>
                                <input type="text" wire:model="emailTenant" placeholder="Vul hier de e-mail in" id="emailTenant">
                            </p>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <p>
                                <label for="phoneTenant">{{ __('Phone') }}</label>
                                <input type="text" wire:model="phoneTenant" placeholder="Vul hier de telefoon in" id="phoneTenant">
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mt-5">
                            <button type="submit" class="btn btn-dark">save</button>
                            @if (session()->has('successTenant'))
                                <div class="btn btn-success flash_message">
                                    {{ session('successTenant') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @endif

        @if($intrede === 0)
            <div class="single-add-property">
            <p class="mb-0">{{ $nameTenant }}</p>
            <h3>{{ __('Verhuist naar') }} <small style="text-transform: lowercase">(*{{ __('optioneel') }})</small></h3>
            <div class="property-form-group">
                <form wire:submit.prevent="addressSubmit">
                    <div class="row">
                        <div class="col-sm-6">
                            <p class="form-group">
                                <label for="currentAddress">{{ __('Adres') }}</label>
                                <input class="form-control" type="text" wire:model="currentAddress" placeholder="Vul hier de adres in" id="currentAddress">
                                @error('currentAddress') <span class="error text-danger">{{ $message }}</span> @enderror
                            </p>
                        </div>
                        <div class="col-sm-6">
                            <p class="form-group">
                                <label for="currentPostBus">{{ __('Bus nummer') }}</label>
                                <input class="form-control" type="text" wire:model="currentPostBus" placeholder="Vul hier de bus nummer in" id="currentPostBus">
                                @error('currentPostBus') <span class="error text-danger">{{ $message }}</span> @enderror
                            </p>
                        </div>
                        <div class="col-sm-6">
                            <p class="form-group">
                                <label for="currentZip">{{ __('Postcode') }}</label>
                                <input class="form-control" type="text" wire:model="currentZip" placeholder="Vul hier je postcode in" id="currentZip">
                                @error('currentZip') <span class="error text-danger">{{ $message }}</span> @enderror
                            </p>
                        </div>
                        <div class="col-sm-6">
                            <p class="form-group">
                                <label for="currentCity">{{ __('Stad') }}</label>
                                <input class="form-control" type="text" wire:model="currentCity" placeholder="Vul hier je stad in" id="currentCity">
                                @error('currentCity') <span class="error text-danger">{{ $message }}</span> @enderror
                            </p>
                        </div>
                        <div class="col-sm-6">
                            <p class="form-group">
                                <label for="currentCountry">{{ __('Land') }}</label>
                                <input class="form-control" type="text" wire:model="currentCountry" placeholder="Vul hier je land in" id="currentCountry">
                                @error('currentCountry') <span class="error text-danger">{{ $message }}</span> @enderror
                            </p>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-dark">save</button>
                    @if (session()->has('successAddress'))
                        <div class="btn btn-success flash_message">
                            {{ session('successAddress') }}
                        </div>
                    @endif
                </form>
            </div>
        </div>
        @endif

        @if($intrede != 2)
            <div class="single-add-property">
                <h3>{{ __('Extra') }}</h3>
                <div class="property-form-group">
                    <form wire:submit.prevent="extraSubmit">
                        <div class="row">
                            <div class="col-md-12">
                                <p>
                                    <label for="extra">{{ __('Extra') }}</label>
                                    <textarea type="text" wire:model="extra" placeholder="Vul hier extra gegevens in" id="extra"></textarea>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 mt-5">
                                <button type="submit" class="btn btn-dark">save</button>
                                @if (session()->has('successExtra'))
                                    <div class="btn btn-success flash_message">
                                        {{ session('successExtra') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        @endif

        @if($intrede == 2)
            <div class="single-add-property">
            <h3>{{ __('Bouwwerken') }}</h3>
            <div class="property-form-group">
                <form wire:submit.prevent="locationStartWorkerSubmit">
                    <div class="row">
                        <div class="col-12">
                            <p>
                                <label for="client">{{ __('Opdrachtgever') }}</label>
                                <input type="text" wire:model="client" placeholder="Vul hier de opdrachtgever in..." id="client"></input>
                            </p>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <p>
                                <label for="address">{{ __('Adres') }}</label>
                                <input type="text" wire:model="address" placeholder="Vul hier je adres in" id="address">
                            </p>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <p>
                                <label for="city">{{ __('Bus') }}</label>
                                <input type="text" wire:model="postBus" placeholder="Vul hier je bus in" id="postBus">
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <p>
                                <label for="state">{{ __('Postcode') }}</label>
                                <input type="text" wire:model="zip" placeholder="Vul hier je postcode in" id="zip">
                            </p>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <p>
                                <label for="country">{{ __('Stad') }}</label>
                                <input type="text" wire:model="city" placeholder="Vul hier je stad in" id="city">
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <p class="no-mb first">
                                <label for="latitude">{{ __('Land') }}</label>
                                <input type="text" wire:model="country" placeholder="Vul hier je land in" id="country">
                            </p>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-12 mt-5">
                            <button type="submit" class="btn btn-dark">save</button>
                            @if (session()->has('successStartWorkerAddress'))
                                <div class="btn btn-success flash_message">
                                    {{ session('successStartWorkerAddress') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>

{{--        <div class="single-add-property">--}}
{{--                <h3>{{ __('Media') }}</h3>--}}
{{--                <div class="property-form-group">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-md-12">--}}
{{--                            <form wire:submit.prevent="saveMedia">--}}
{{--                                <div class="dropzone--custom">--}}
{{--                                    <input class="py-5 w-100 file--button" type="file" wire:model="media" multiple>--}}
{{--                                    <p class="mx-5">Klik hier om bestanden toe te voegen.</p>--}}
{{--                                </div>--}}
{{--                                <button class="btn btn-dark my-4" type="submit">Save Photo</button>--}}
{{--                                @if($media)--}}
{{--                                    <div class="btn  btn-success text-white">media ready!</div>--}}
{{--                                @endif--}}
{{--                                @error('media.*') <span class="text-danger">{{ $message }}</span> @enderror--}}
{{--                            </form>--}}
{{--                            <div wire:loading.block class="mb-2">--}}
{{--                                <i class="fa fa-clock mr-1 ml-2"></i>uploading...--}}
{{--                            </div>--}}
{{--                            @if (session()->has('process'))--}}
{{--                                <div class="btn btn-info flash_message">--}}
{{--                                    {{ session('process') }}--}}
{{--                                </div>--}}
{{--                            @endif--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="row">--}}
{{--                        @foreach($files as $file)--}}
{{--                            <div class="col-md-4 col-lg-3 mt-4">--}}
{{--                                <div class="img-wrapper">--}}
{{--                                    <button wire:click="deleteMedia({{ $file->id }})" class="btn btn-danger delete"><span style="font-weight: bold">x</span></button>--}}

{{--                                    --}}{{--     <button wire:click="rotateMedia({{ $file->id }})" class="btn btn-dark rotate"><i class="fa fa-rotate-left text-white"></i></button>--}}

{{--                                    <a class="d-md-none d-lg-block" data-fancybox="gallery" href="{{ asset('assets/images/' . $folder . '/' . $file->file_original) }}">--}}
{{--                                        <div class="img--cover"--}}
{{--                                             style="background-image: url('{{ asset('assets/images/' . $folder . '/crop' . '/' . $file->file_crop) }}');">--}}
{{--                                        </div>--}}
{{--                                    </a>--}}

{{--                                    --}}{{--Temp fix for background images not displaying on tablets--}}
{{--                                    <a class="d-none d-md-block d-lg-none" data-fancybox="gallery" href="{{ asset('assets/images/' . $folder . '/' . $file->file_original) }}">--}}
{{--                                        <div style=" min-height: 125px ; background-image: url('{{ asset('assets/images/' . $folder . '/crop' . '/' . $file->file_crop) }}'); background-repeat: no-repeat; background-position: center; background-size: cover">--}}
{{--                                        </div>--}}
{{--                                    </a>--}}

{{--                                </div>--}}
{{--                            </div>--}}
{{--                        @endforeach--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

        @endif

        <div class="single-add-property">
            <div class="d-flex justify-content-end">
                <button class="border-0 {{ $showArchived ? 'btn-common btn-sm' : 'btn-dark btn' }}  mb-3" wire:click="toggleArchived">
                    {{ $showArchived ? 'Archief' : 'Actief' }}
                </button>
            </div>
            <h3>{{ __('Schade') }}</h3>
            <div class="property-form-group">
                @if($damages->isNotEmpty())
                    <div class="section-body listing-table">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>{{ __('Titel') }}</th>
                                    <th>{{ __('Datum') }}</th>
                                    @if(!$showArchived)
                                        <th>{{ __('PDF') }}</th>
                                    @endif
                                    <th>
                                        @if(!$showArchived)
                                            {{ __('Archiveer') }}
                                        @else
                                            {{ __('Activeer') }}
                                        @endif
                                    </th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($damages as $damage)
                                    <tr>
                                        <td>{{ $damage->title }}</td>
                                        <td>{{ \Illuminate\Support\Carbon::parse($damage->date)->format('d-m-Y') }}</td>
                                        @if(!$showArchived)
                                            <td><input type="checkbox"
                                                       @if($damage->situations()->where('damage_id', $damage->id)->where('situation_id', $situation->id)->pluck('print_pdf')->first() == 1) checked @endif
                                                       wire:click="togglePdfPrint({{ $damage->id }})"
                                                       wire:key="pdf_print-{{ $damage->id }}">
                                            </td>
                                        @endif
                                        <td>
                                            <button wire:click="archive({{ $damage->id }})"
                                                    wire:key="archive-{{ $damage->id }}"
                                                    class=" {{ $showArchived ? 'btn-common btn-sm border-0' : 'btn-dark btn' }}"
                                            >
                                            @if(!$showArchived)
                                                <i class="fa fa-archive"></i>
                                            @else
                                                <i class="fa fa-refresh"></i>
                                            @endif
                                            </button>
                                        </td>
                                        <td class="edit">
                                            <a href="{{ route('damage.edit', [ $inspection, $damage]) }}"><i class="fa fa-pencil-alt text-dark"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <!--pagination-->
                            <div class="pagination-container">
                                <nav>
                                    <ul class="pagination d-flex justify-content-center">
                                        {{ $damages->links() }}
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <small>*{{ __('Bij een nieuwe beschrijving worden telkens alle schade gevallen gemarkeerd t.e.m. de vorige geregistreerde intrede. De schade voor deze intrede werd gearchiveerd.') }}</small>
                    <br>
                    <small>*{{ __('Tip: zorg dat je vorige intrede steeds een datum bevat.') }}</small>
                    <br>
                    <small style="font-weight: bold">
                        @if($last_intrede && $last_intrede->date)
                            {{ __('Laatste intrede opgemaakt op:') }} {{ \Illuminate\Support\Carbon::parse($last_intrede->date)->format('d-m-Y') }}
                        @else
                            {{ __('Er werd geen datum geselecteerd voor de (vorige) intrede.') }}
                        @endif
                    </small>
                @else
                <p>{{ __('Er werd geen schade opgenomen.') }}</p>
                @endif
            </div>
        </div>

        @if($situation->intrede == 0 && $damages->isNotEmpty())
            <div class="single-add-property">
                <div class="d-flex justify-content-end">
                    <button wire:click="addInvoice" class="btn-sm btn-common mb-3" style="border: none"><i class="fa fa-plus mr-1"></i>{{ __('Offerte') }}</button>
                </div>
                <h3>{{ __('Offerte') }}</h3>
                <div class="property-form-group">
                    @if($invoices->isNotEmpty())
                        <div class="section-body listing-table">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>{{ __('Titel') }}</th>
                                        <th>{{ __('Datum') }}</th>
                                        <th>{{ __('Actie') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($invoices as $invoice)
                                            <tr>
                                                <td>{{ $invoice->title }}</td>
                                                <td>{{ $invoice->date }}</td>
                                                <td class="edit">
                                                    <a href="{{ route('invoice.edit', [ $inspection, $situation, $invoice ]) }}"><i class="fa fa-pencil-alt text-dark"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @else
                        <small>*{{ __('Er werden nog geen offertes aangemaakt voor deze uittrede.') }}</small>
                    @endif
                </div>
            </div>
        @endif

        @if($situation->intrede == 0 && $damages->isNotEmpty()  || $situation->intrede == 3 && $damages->isNotEmpty() )
            <div class="single-add-property">
                @if($situation->intrede != 0)
                    <h3>{{ __('Addendum') }}</h3>
                @else
                    <h3>{{ __('Huurschade contract') }}</h3>
                @endif
                <div class="property-form-group">
                    @if($claim)
                        <div class="section-body listing-table">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>{{ __('Titel') }}</th>
                                        <th>{{ __('Datum') }}</th>
                                        <th>{{ __('Actie') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>{{ __('Contract') }}</td>
                                        <td>{{ $claim->date }}</td>
                                        <td class="edit">
                                            <a href="{{ route('rentalClaim.edit', [ $inspection, $claim ]) }}"><i class="fa fa-pencil-alt text-dark"></i></a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        @endif

        @if($situation->intrede != 3)
            <div class="single-add-property">
            <h3>{{ __('PDF genereren')  }}</h3>

            <div class="property-form-group">
                <a href="{{ route('generate.inspection', [$inspection, $situation]) }}" class="btn btn-dark mb-3"><i class="fa fa-file-pdf mr-2"></i>{{ __('PDF SYNC') }}</a>

                @if($pdfs->isNotEmpty())
                    <div class="section-body listing-table">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>{{ __('Titel') }}</th>
                                    <th>{{ __('File') }}</th>
                                    <th>{{ __('Datum') }}</th>
                                    <th>{{ __('Actie') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($pdfs as $pdf)
                                    <tr>
                                        <td>{{ $pdf->title }}</td>
                                        <td>
                                            @if($pdf->status == \App\Enums\Status::Pending->value)
                                                <span class="badge badge-pill bg-warning px-3 py-2 text-white">{{ $pdf->status }}</span>
                                            @else
                                                <a class="mx-4" target="_blank" href="{{ asset('assets/inspections/pdf/' . $pdf->file_original) }}"><i class="fa fa-file-pdf text-dark"></i></a>
                                            @endif
                                        </td>
                                        <td>{{ $pdf->created_at->format('d-m-Y -  H:i:s') }}</td>
                                        <td class="edit">
                                            <form wire:submit.prevent="deletePDF({{ $pdf->id }})">
                                                <button class="btn_trash" type="submit"><i class="fa fa-trash text-danger"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <p class="pt-5">*refresh regelmatig deze pagina om de status van de PDF te updaten.</p>
                @endif
            </div>
        </div>
        @endif

        @if($situation->intrede != 3)
            <div class="single-add-property">
                @if($situation->intrede != 2)
                    <h3>{{ __('Mandaat') }}</h3>
                @else
                    <h3>{{ __('Handtekenen') }}</h3>
                @endif
            <div class="property-form-group">
                @if($contract)
                    <div class="section-body listing-table">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>{{ __('Titel') }}</th>
                                    <th>{{ __('Datum') }}</th>
                                    <th>{{ __('Actie') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ __('Contract') }}</td>
                                        <td>{{ $contract->date }}</td>
                                        <td class="edit">
                                            <a href="{{ route('contract.edit', [ $inspection, $contract]) }}"><i class="fa fa-pencil-alt text-dark"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        @endif

        <div class="single-add-property">
            <h3>{{ __('Verwijderen') }}</h3>
            <div class="property-form-group">
                <!-- Button trigger modal -->
                <div class="text-right">
                    <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModal">
                        <i class="fa fa-trash mx-2"></i> {{ __('Delete') }}
                    </button>
                </div>


                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">{{ __('Verwijderen') }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>{{ __('Ben je zeker om deze beschrijving te verwijderen?') }}</p>
                                <form wire:submit.prevent="deleteSituation">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-dark">Verwijderen</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>




