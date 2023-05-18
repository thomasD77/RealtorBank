@if($item->media->isNotEmpty())
    @for ($i = 0; $i <= count($item->media); $i++ )
        <div class="row" style="margin-top: 0.8rem">
            @if(isset($item->media[$i]))
                @if($item->media[$i]->orientation == 'v')
                    <div class="column img--cover"
                         style="
                        background-color: rgb(228,229,233);
                        background-image: url('{{ asset('assets/images/' . $folder . '/crop' . '/' . $item->media[$i]->file_crop) }}');
                        background-position: center;
                        background-repeat: no-repeat;
                        background-size: contain; height: 150px;
                        ">
                    </div>
                @else
                    <div class="column img--cover"
                         style="
                         background-image: url('{{ asset('assets/images/' . $folder . '/crop' . '/' . $item->media[$i]->file_crop) }}');
                         background-position: center;
                         background-size: cover; height: 150px
                         ">
                    </div>
                @endif
            @endif
            @php
                $i += 1;
            @endphp
            @if(isset($item->media[$i]))
                @if($item->media[$i]->orientation == 'v')
                    <div class="column img--cover"
                        style="
                        background-color: rgb(228,229,233);
                        background-image: url('{{ asset('assets/images/' . $folder . '/crop' . '/' . $item->media[$i]->file_crop) }}');
                        background-position: center;
                        background-repeat: no-repeat;
                        background-size: contain; height: 150px;
                        ">
                    </div>
                @else
                    <div class="column img--cover"
                         style="
                         background-image: url('{{ asset('assets/images/' . $folder . '/crop' . '/' . $item->media[$i]->file_crop) }}');
                         background-position: center;
                         background-size: cover; height: 150px
                         ">
                    </div>
                @endif
            @endif
            @php
                $i += 1;
            @endphp
            @if(isset($item->media[$i]))
                @if($item->media[$i]->orientation == 'v')
                    <div class="column img--cover"
                             style="
                        background-color: rgb(228,229,233);
                        background-image: url('{{ asset('assets/images/' . $folder . '/crop' . '/' . $item->media[$i]->file_crop) }}');
                        background-position: center;
                        background-repeat: no-repeat;
                        background-size: contain; height: 150px;
                        ">
                    </div>
                @else
                    <div class="column img--cover"
                         style="
                         background-image: url('{{ asset('assets/images/' . $folder . '/crop' . '/' . $item->media[$i]->file_crop) }}');
                         background-position: center;
                         background-size: cover; height: 150px
                         ">
                    </div>
                @endif
            @endif
        </div>
    @endfor
@endif
