<div>
    <div class="single-add-property">
        <h3>{{ __('Eigenaar')  }}</h3>
        <div class="property-form-group">
            <div class="row">
                <div class="col-12 mb70">
                    <table class="basic-table">
                        <thead>
                        <tr>
                            <th>{{ __('Naam') }}</th>
                            <th>{{ __('E-mail') }}</th>
                            <th>{{ __('Telefoon') }}</th>
                            <th>{{ __('Actie') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($inspection->owner)
                            <tr>
                                <td >{{ $inspection->owner->name ?? "" }}</td>
                                <td>{{ $inspection->owner->email ?? "" }}</td>
                                <td>{{ $inspection->owner->phone ?? "" }}</td>
                                <td>
                                    <a href="{{ route('inspection.edit', $inspection->id) }}" class="edit text-success"><i class="fa fa-pencil"></i></a>
                                </td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                    <!--end of table-->
                </div>
            </div>
        </div>
    </div>

    <div class="single-add-property">
        <h3>{{ __('Laatste intrede')  }}</h3>
        <div class="property-form-group">
            <div class="row">
                <div class="col-12 mb70">
                    <table class="basic-table">
                        <thead>
                        <tr>
                            <th>{{ __('Datum') }}</th>
                            <th>{{ __('Naam') }}</th>
                            <th>{{ __('E-mail') }}</th>
                            <th>{{ __('Telefoon') }}</th>
                            <th>{{ __('Actie') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($current_situation)
                            <tr>
                                <td>{{ \Carbon\Carbon::parse($current_situation->date)->format('Y-m-d h:i:s') ?? "" }}</td>
                                <td>{{ $current_situation->tenant->name ?? "" }}</td>
                                <td>{{ $current_situation->tenant->email ?? "" }}</td>
                                <td>{{ $current_situation->tenant->phone ?? "" }}</td>
                                <td>
                                    <a href="{{ route('inspection.edit', $inspection->id) }}" class="edit text-success"><i class="fa fa-pencil"></i></a>
                                </td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                    <!--end of table-->
                </div>
            </div>
        </div>
    </div>

    <div class="single-add-property">
        <h3>{{ __('Laatste uittrede')  }}</h3>
        <div class="property-form-group">
            <div class="row">
                <div class="col-12 mb70">
                    <table class="basic-table">
                        <thead>
                        <tr>
                            <th>{{ __('Datum') }}</th>
                            <th>{{ __('Naam') }}</th>
                            <th>{{ __('E-mail') }}</th>
                            <th>{{ __('Telefoon') }}</th>
                            <th>{{ __('Actie') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($current_situation_out)
                            <tr>
                                <td>{{ \Carbon\Carbon::parse($current_situation_out->date)->format('Y-m-d h:i:s') ?? "" }}</td>
                                <td>{{ $current_situation_out->tenant->name ?? "" }}</td>
                                <td>{{ $current_situation_out->tenant->email ?? "" }}</td>
                                <td>{{ $current_situation_out->tenant->phone ?? "" }}</td>
                                <td>
                                    <a href="{{ route('inspection.edit', $inspection->id) }}" class="edit text-success"><i class="fa fa-pencil"></i></a>
                                </td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                    <!--end of table-->
                </div>
            </div>
        </div>
    </div>

    <div class="single-add-property">
        <h3>{{ __('Geschiedenis')  }}</h3>
        <div class="property-form-group">
            <div class="row">
                <div class="col-12 mb70">
                    <table class="basic-table">
                        <thead>
                        <tr>
                            <th>{{ __('In/uittrede') }}</th>
                            <th>{{ __('Datum') }}</th>
                            <th>{{ __('Naam') }}</th>
                            <th>{{ __('E-mail') }}</th>
                            <th>{{ __('Telefoon') }}</th>
                            <th>{{ __('Actie') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($situations)
                            @foreach($situations as $situation)
                                <tr>
                                <td>{{ $situation->intrede ? 'Intrede' : "Uitrede" }}</td>
                                <td>{{ $situation->date ?? "" }}</td>
                                <td>{{ $situation->tenant->name ?? "" }}</td>
                                <td>{{ $situation->tenant->email ?? "" }}</td>
                                <td>{{ $situation->tenant->phone ?? "" }}</td>
                                <td>
                                    <a href="{{ route('inspection.edit', $inspection->id) }}" class="edit text-success"><i class="fa fa-pencil"></i></a>
                                </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                    <!--end of table-->
                </div>
            </div>
        </div>
    </div>
</div>
