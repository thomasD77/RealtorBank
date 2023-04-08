@if($item->media->isNotEmpty())
    @for ($i = 0; $i <= count($item->media); $i++ )
        <div class="row">
            @if(isset($item->media[$i]))
                <div class="column img--cover"
                     style="background-image: url('{{ asset('assets/images/' . $folder . '/crop' . '/' . $item->media[$i]->file_crop) }}');
                         background-position: center;
                         background-size: cover; height: 150px">
                </div>
            @endif
            @php
                $i += 1;
            @endphp
            @if(isset($item->media[$i]))
                <div class="column img--cover"
                     style="background-image: url('{{ asset('assets/images/' . $folder . '/crop' . '/' . $item->media[$i]->file_crop) }}');
                         background-position: center;
                         background-size: cover; height: 150px;">
                </div>
            @endif
            @php
                $i += 1;
            @endphp
            @if(isset($item->media[$i]))
                <div class="column img--cover"
                     style="background-image: url('{{ asset('assets/images/' . $folder . '/crop' . '/' . $item->media[$i]->file_crop) }}');
                         background-position: center;
                         background-size: cover; height: 150px">
                </div>
            @endif
        </div>
    @endfor
@endif
