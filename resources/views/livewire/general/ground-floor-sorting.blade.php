<div class="col-md-6">
    <strong class="w-100">{{ __('Gelijkvloers') }}</strong>
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
                @foreach($groundFloorParam as $item)
                    <tr>
                        <td>{{ $item->title }}</td>
                        <td>
                            @if($item->order != $minGround)
                                <div wire:loading.remove>
                                    <button class="btn btn-sm" wire:key="(itemUp-{{ $item->id }})" wire:click="itemUp({{ $item }})">
                                        <i class="fa fa-arrow-up"></i>
                                    </button>
                                </div>
                            @endif
                        </td>
                        <td>
                            @if($maxGround != $item->order)
                                <div wire:loading.remove>
                                    <button class="btn btn-sm" wire:key="(itemDown-{{ $item->id }})" wire:click="itemDown({{ $item }})">
                                        <i class="fa fa-arrow-down"></i>
                                    </button>
                                </div>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
