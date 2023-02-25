<div class="dashborad-box single-add-property">
    <h3 class="title">{{ __('Mijn documenten') }}</h3>
    <div class="section-body listing-table">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>{{ __('Titel') }}</th>
                    <th>{{ __('Referentie') }}</th>
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
                                <td>{{ $document->reference }}</td>
                                <td>{{ $document->date }}</td>
                                <td class="rating"><span>5</span></td>
                                <td class="edit"><a href="{{ route('document.edit', [ $inspection, $document ]) }}"><i class="fa fa-pencil text-success"></i></a></td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
