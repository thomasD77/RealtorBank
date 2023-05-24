<div class="col-md-6">
    <strong class="w-100">{{ __('Bovenverdieping') }}</strong>
    <div class="section-body listing-table">
        <div class="table-responsive">
            <table class="table table-striped" style="width: 100%">
                <thead>
                <tr>
                    <th>{{ __('Titel') }}</th>
                    <th>{{ __('Up') }}</th>
                    <th>{{ __('Down') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($upperFloorParam as $item)
                    <tr>
                        <td>{{ $item->title }}</td>
                        <td>
                            @if($minUpper != $item->order)
                                <button class="btn btn-sm" wire:click="itemUp({{ $item }})">
                                    <i class="fa fa-arrow-up"></i>
                                </button>
                            @endif
                        </td>
                        <td>
                            @if($maxUpper != $item->order)
                                <button class="btn btn-sm" wire:click="itemDown({{ $item }})">
                                    <i class="fa fa-arrow-down"></i>
                                </button>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
