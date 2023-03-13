@if($item->media)
    @for ($i = 0; $i <= count($item->media); $i++ )
        <div class="row">
            @if(isset($item->media[$i]))
                <div class="column">
                    <img src="{{ asset('assets/images/' . $folder . '/crop' . '/' . $item->media[$i]->file_crop) }}" alt="picture">
                </div>
            @endif
            @php
                $i += 1;
            @endphp
            @if(isset($item->media[$i]))
                <div class="column">
                    <img src="{{ asset('assets/images/' . $folder . '/crop' . '/' . $item->media[$i]->file_crop) }}" alt="picture">
                </div>
            @endif
            @php
                $i += 1;
            @endphp
            @if(isset($item->media[$i]))
                <div class="column">
                    <img src="{{ asset('assets/images/' . $folder . '/crop' . '/' . $item->media[$i]->file_crop) }}" alt="picture">
                </div>
            @endif
        </div>
    @endfor
@endif
