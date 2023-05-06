<div class="single-add-property">

    <h3 class="" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
        {{ __('Schade opmetingen') }}
    </h3>

    <div class="collapse" id="collapseExample" wire:ignore.self>

        <div class="d-flex justify-content-end">
            <a wire:click="createDamage" wire:loading.attr="disabled" class="btn btn-common mb-3"><i class="fa fa-plus"></i>{{ __('NIEUW') }}</a>
        </div>

        @if($damages)
            <table class="basic-table">
                <thead>
                <tr>
                    <th>{{ __('Title') }}</th>
                    <th>{{ __('Datum') }}</th>
                    <th>{{ __('Actie') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($damages as $damage)
                    <tr>
                        <td>{{ $damage->title ?? "" }}</td>
                        <td>{{ $damage->date ?? "" }}</td>
                        <td>
                            <a href="{{ route('damage.edit', [ $inspection, $damage ]) }}" class="text-success"><i class="fa fa-pencil-alt text-dark"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <!--end of table-->
            <!--pagination-->
            <div class="pagination-container">
                <nav>
                    <ul class="pagination d-flex justify-content-center">
                        {{ $damages->links() }}
                    </ul>
                </nav>
            </div>
        @endif
    </div>
</div>
