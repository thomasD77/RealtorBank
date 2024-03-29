<div class="dashborad-box single-add-property">
    <div class="text-right">
        <a href="{{ route('create.document', $inspection) }}" class="btn btn-common mb-3 text-white"><i class="fa fa-plus mr-2"></i>{{ __('Document') }}</a>
    </div>
    <h3 class="title">{{ __('Mijn documenten') }}</h3>
    <div class="section-body listing-table">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>{{ __('Titel') }}</th>
                    <th>{{ __('Datum') }}</th>
                    <th>{{ __('Media') }}</th>
                    <th>{{ __('Actie') }}</th>
                </tr>
                </thead>
                <tbody>
                    @if($documents)
                        @foreach($documents as $document)
                            <tr>
                                <td>{{ $document->title }}</td>
                                <td>{{ $document->date }}</td>
                                <td class="rating"><span>{{ $document->media->count() }}</span></td>
                                <td class="edit"><a href="{{ route('document.edit', [ $inspection, $document ]) }}"><i class="fa fa-pencil-alt text-dark"></i></a></td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>

            <!--pagination-->
            <div class="pagination-container">
                <nav>
                    <ul class="pagination d-flex justify-content-center">
                        {{ $documents->links() }}
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
