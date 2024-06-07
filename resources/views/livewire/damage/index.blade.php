<div class="single-add-property">

    <h3 class="d-flex justify-content-between" data-toggle="collapse" href="#collapseDamage" role="button" aria-expanded="false" aria-controls="collapseExample">
        {{ __('Algemene Schade opmetingen') }}
        <i class="fa fa-arrow-down"></i>
    </h3>

    <div class="collapse @if($damages->isNotEmpty()) show @endif" id="collapseDamage" wire:ignore.self >

        <div class="d-flex justify-content-end">
            <a wire:click="createDamage" wire:loading.attr="disabled" class="btn btn-common mb-3"><i class="fa fa-plus"></i>{{ __('NIEUW') }}</a>
        </div>

        @if($damages)
            <table class="basic-table">
                <thead>
                <tr>
                    <th>{{ __('Titel') }}</th>
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
