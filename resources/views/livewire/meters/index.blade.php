<div class="dashborad-box single-add-property">
    <h3 class="title">{{ __('Mijn meters') }}</h3>
    <div class="section-body listing-table">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>{{ __('Titel') }}</th>
                    <th>{{ __('Media') }}</th>
                    <th>{{ __('Actie') }}</th>
                </tr>
                </thead>
                <tbody>
                @if($meters)
                    @foreach($meters as $meter)
                        <tr>
                            <td>{{ $meter->title }}</td>
                            <td class="rating"><span>{{ $meter->media->count() }}</span></td>
                            <td class="edit"><a href="{{ route('meter.edit', [ $inspection, $meter ]) }}"><i class="fa fa-pencil-alt text-dark"></i></a></td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
