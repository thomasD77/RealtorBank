@if($keys->isNotEmpty())
    <section class="techniques">
        <h2>{{ __('Sleutels') }}</h2>
        @foreach($keys as $item)
        <table class="table">
            <tr class="row--head--list">
                <th>{{  $item->title }}</th>
                <th></th>
            </tr>
            @if($item->type)
                <tr class="row--text--list">
                    <th>{{ __('Type') }}</th>
                    <th>{{ $item->type }}</th>
                </tr>
            @endif
            @if($item->count)
                <tr class="row--text--list">
                    <th>{{ __('Aantal') }}</th>
                    <th>{{ $item->count }}</th>
                </tr>
            @endif
            @if($item->extra)
                <tr class="row--text--list textareaExtra">
                    <th class="">{{ $item->extra }}</th>
                    <th></th>
                </tr>
            @endif
        </table>

        @include('inspections.sections.media' , [ 'folder' => \App\Enums\ImageStorageDirectory::Keys->value ])

    @endforeach
    </section>
@endif

