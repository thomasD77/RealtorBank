<div>
    <!-- Print Button -->
    <div class="print-button-container text-center mb-4">
        <a href="javascript:window.print()" class="btn btn-dark">{{ __('Contract printen') }}</a>
    </div>
    <div class="invoice mb-0">
        <div class="card border-0">
            <div class="card-body p-0">
                <div class="row p-5 the-five">
                    <div class="col-md-6">
                        <img src="{{ asset('assets/images/logo.svg') }}" width="80" alt="Logo">
                    </div>

                    <div class="col-md-6 text-right">
                        <p class="font-weight-bold mb-1">{{ __('Contract opgemaakt op') }}</p>
                        <input type="date" class="form-control" wire:model="date">
                    </div>
                </div>

                <hr class="my-5">

                <div class="row pb-5 p-5 the-five">
                    <div class="col-md-6">
                        <h3 class="font-weight-bold mb-4">{{ __('Contract door') }}</h3>
                        <p class="mb-0 font-weight-bold">{{ $realtor->firstName }} {{ $realtor->lastName }}</p>
                        <p class="mb-0">RealtorBank</p>
                        <p class="mb-0">Est St, 77 - Central Park, NYC</p>
                        <p class="mb-0">{{ $realtor->phone }}</p>
                        <p class="mb-0">{{ $realtor->email }}</p>
                    </div>

                    <div class="col-md-6 text-right">
                        <h3 class="font-weight-bold mb-4">{{ __('Contract voor ') }}</h3>
                        <p class="mb-1"><span class="text-muted">{{ $situation->tenant->name }}</p>
                        <p class="mb-1"><span class="text-muted">{{ $situation->tenant->email }}</p>
                        <p class="mb-1"><span class="text-muted">{{ $situation->tenant->phone }}</p>
                    </div>
                </div>

                <div class="row p-5 the-five">
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="border-0 text-uppercase small font-weight-bold">Description</th>
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

                <div class="d-flex flex-row-reverse bg-dark text-white p-4">
                    <div class="py-3 px-5 text-left">
                        <div class="mb-2">Grand Total</div>
                        <div class="h2 font-weight-light">$42.79</div>
                    </div>

                    <div class="py-3 px-5 text-right">
                        <div class="mb-2">Discount</div>
                        <div class="h2 font-weight-light">10%</div>
                    </div>

                    <div class="py-3 px-5 text-left">
                        <div class="mb-2">Sub - Total</div>
                        <div class="h2 font-weight-light">$47.55</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
