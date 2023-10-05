<div class="dashborad-box single-add-property">
    <h3 class="title">{{ __('Mijn sleutels') }}</h3>
    <div class="section-body listing-table">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>{{ __('Titel') }}</th>
                    <th>{{ __('Media') }}</th>
                    <th>{{ __('Aantal') }}</th>
                    <th>{{ __('Actie') }}</th>
                </tr>
                </thead>
                <tbody>
                @if($keys)
                    @foreach($keys as $key)
                        <tr>
                            <td>{{ $key->title }}</td>
                            <td class="rating"><span>{{ $key->media->count() }}</span></td>
                            <td class="rating"><span>@if($key->count == "") 0 @else {{ $key->count }} @endif</span></td>
                            <td class="edit"><a href="{{ route('key.edit', [ $inspection, $key ]) }}"><i class="fa fa-pencil-alt text-dark"></i></a></td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
