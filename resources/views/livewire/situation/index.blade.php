<div>
    <div class="single-add-property">

        <div class="d-flex justify-content-end">
            <a href="{{ route('create.situation', $inspection) }}" class="btn btn-common mb-3"><i class="fa fa-plus mr-2"></i>{{ __('NIEUW') }}</a>
        </div>

        <h3>{{ __('Contracten')  }}</h3>
        <div class="property-form-group">
            <div class="row">
                <div class="col-12 mb70">
                    <table class="basic-table">
                        <thead>
                        <tr>
                            <th>{{ __('Type') }}</th>
                            <th>{{ __('Datum') }}</th>
                            <th>{{ __('Actie') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($situations)
                            @foreach($situations as $situation)
                                <tr>
                                <td>
                                    <a href="{{ route('situation.edit', [ $inspection, $situation ]) }}" class="no-edit">
                                        @if($situation->intrede == 1)
                                            {{ __('Intrede')}}
                                        @elseif($situation->intrede === 0)
                                            {{ __('Uittrede')}}
                                        @elseif($situation->intrede === 2)
                                            {{ __('Aanvang van werken')}}
                                        @elseif($situation->intrede === 3)
                                            {{ __('Addendum')}}
                                        @endif
                                    </a>
                                </td>
                                <td>{{ $situation->date ?? "" }}</td>
                                <td>
                                    <a href="{{ route('situation.edit', [ $inspection, $situation ]) }}" class="text-success"><i class="fa fa-pencil-alt text-dark"></i></a>
                                </td>
                                </tr>
                            @endforeach
                        @endif

                        </tbody>
                    </table>
                    <!--end of table-->

                    <!--pagination-->
                    <div class="pagination-container">
                        <nav>
                            <ul class="pagination d-flex justify-content-center">
                                {{ $situations->links() }}
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
