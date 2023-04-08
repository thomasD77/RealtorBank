@foreach($room->specificAreas as $item)
    @if($item->material || $item->handrail || $item->shelves ||
        $item->color || $item->present || $item->finish ||
        $item->dorpel || $item->glassInlay || $item->handle ||
        $item->mailbox || $item->peephole || $item->window ||
        $item->doorBel || $item->brand ||
        $item->type || $item->model || $item->doors || $item->drawers ||
        $item->rod || $item->trap ||
        $item->mirror || $item->toiletPaperHolder || $item->cupboard ||
        $item->stop || $item->crane || $item->siphon ||
        $item->angleCrane || $item->rinse || $item->seat ||
        $item->energy || $item->cabLow || $item->cabLowDoors ||
        $item->cabLowDrawers || $item->cabLowShelves || $item->cabHigh ||
        $item->cabinet || $item->cabinetDoors || $item->cabinetDrawers ||
        $item->cabinetShelves || $item->cutleryDrawer || $item->kitchenHandle ||
        $item->filter || $item->lighting || $item->manual ||
        $item->zones || $item->bakingTray || $item->rooster ||
        $item->shelf || $item->vegetableTray || $item->doorBins ||
        $item->cutleryBasket || $item->floor || $item->walls ||
        $item->shower || $item->protection || $item->casing ||
        $item->position || $item->vaporBarrier || $item->service ||
        $item->analysis || $item->extra || $item->cabHighDoors ||
        $item->cabHighDrawers || $item->cabHighShelves)
        <section>
            <table class="table">
            <tr class="row--head--list">
                <th>{{ $room->floor->title }} | {{ $item->room->title }} | {{  $item->specific->title }}</th>
                <th></th>
            </tr>
            @if($item->handrail)
                <tr class="row--text--list">
                    <th>{{ __('Leuning') }}</th>
                    <th>{{ $item->handrail }}</th>
                </tr>
            @endif
            @if($item->material)
                <tr class="row--text--list">
                    <th>{{ __('Materiaal') }}</th>
                    <th>{{ $item->material }}</th>
                </tr>
            @endif
            @if($item->shelves)
                <tr class="row--text--list">
                    <th>{{ __('Legplanken') }}</th>
                    <th>{{ $item->shelves }}</th>
                </tr>
            @endif
            @if($item->color)
                <tr class="row--text--list">
                    <th>{{ __('Kleur') }}</th>
                    <th>{{ $item->color }}</th>
                </tr>
            @endif
            @if($item->present)
                <tr class="row--text--list">
                    <th>{{ __('Aanwezig') }}</th>
                    <th>{{ $item->present }}</th>
                </tr>
            @endif
            @if($item->finish)
                <tr class="row--text--list">
                    <th>{{ __('Afwerking') }}</th>
                    <th>{{ $item->finish }}</th>
                </tr>
            @endif
            @if($item->dorpel)
                <tr class="row--text--list">
                    <th>{{ __('Dorpel') }}</th>
                    <th>{{ $item->dorpel }}</th>
                </tr>
            @endif
            @if($item->glassInlay)
                <tr class="row--text--list">
                    <th>{{ __('Glasinleg') }}</th>
                    <th>{{ $item->glassInlay }}</th>
                </tr>
            @endif
            @if($item->handle)
                <tr class="row--text--list">
                    <th>{{ __('Klink') }}</th>
                    <th>{{ $item->handle }}</th>
                </tr>
            @endif
            @if($item->mailbox)
                <tr class="row--text--list">
                    <th>{{ __('Brievenbus') }}</th>
                    <th>{{ $item->mailbox }}</th>
                </tr>
            @endif
            @if($item->peephole)
                <tr class="row--text--list">
                    <th>{{ __('Kijkgat') }}</th>
                    <th>{{ $item->peephole }}</th>
                </tr>
            @endif
            @if($item->window)
                <tr class="row--text--list">
                    <th>{{ __('Raam') }}</th>
                    <th>{{ $item->window }}</th>
                </tr>
            @endif
            @if($item->doorBel)
                <tr class="row--text--list">
                    <th>{{ __('Deurbel') }}</th>
                    <th>{{ $item->doorBel }}</th>
                </tr>
            @endif
            @if($item->brand)
                <tr class="row--text--list">
                    <th>{{ __('Merk') }}</th>
                    <th>{{ $item->brand }}</th>
                </tr>
            @endif
            @if($item->type)
                <tr class="row--text--list">
                    <th>{{ __('Type') }}</th>
                    <th>{{ $item->type }}</th>
                </tr>
            @endif
            @if($item->model)
                <tr class="row--text--list">
                    <th>{{ __('Model') }}</th>
                    <th>{{ $item->model }}</th>
                </tr>
            @endif
            @if($item->doors)
                <tr class="row--text--list">
                    <th>{{ __('Deuren') }}</th>
                    <th>{{ $item->doors }}</th>
                </tr>
            @endif
            @if($item->drawers)
                <tr class="row--text--list">
                    <th>{{ __('Lades') }}</th>
                    <th>{{ $item->drawers }}</th>
                </tr>
            @endif
            @if($item->rod)
                <tr class="row--text--list">
                    <th>{{ __('Rod') }}</th>
                    <th>{{ $item->rod }}</th>
                </tr>
            @endif
            @if($item->trap)
                <tr class="row--text--list">
                    <th>{{ __('Trap') }}</th>
                    <th>{{ $item->trap }}</th>
                </tr>
            @endif
            @if($item->mirror)
                <tr class="row--text--list">
                    <th>{{ __('Spiegel') }}</th>
                    <th>{{ $item->mirror }}</th>
                </tr>
            @endif
            @if($item->toiletPaperHolder)
                <tr class="row--text--list">
                    <th>{{ __('Toiletpapier houder') }}</th>
                    <th>{{ $item->toiletPaperHolder }}</th>
                </tr>
            @endif
            @if($item->cupboard)
                <tr class="row--text--list">
                    <th>{{ __('Kastje') }}</th>
                    <th>{{ $item->cupboard }}</th>
                </tr>
            @endif
            @if($item->stop)
                <tr class="row--text--list">
                    <th>{{ __('Stop') }}</th>
                    <th>{{ $item->stop }}</th>
                </tr>
            @endif
            @if($item->crane)
                <tr class="row--text--list">
                    <th>{{ __('Kraan') }}</th>
                    <th>{{ $item->crane }}</th>
                </tr>
            @endif
            @if($item->siphon)
                <tr class="row--text--list">
                    <th>{{ __('Sifon') }}</th>
                    <th>{{ $item->siphon }}</th>
                </tr>
            @endif
            @if($item->angleCrane)
                <tr class="row--text--list">
                    <th>{{ __('Hoekkraan') }}</th>
                    <th>{{ $item->angleCrane }}</th>
                </tr>
            @endif
            @if($item->rinse)
                <tr class="row--text--list">
                    <th>{{ __('Spoeling') }}</th>
                    <th>{{ $item->rinse }}</th>
                </tr>
            @endif
            @if($item->seat)
                <tr class="row--text--list">
                    <th>{{ __('Zitting') }}</th>
                    <th>{{ $item->seat }}</th>
                </tr>
            @endif
            @if($item->energy)
                <tr class="row--text--list">
                    <th>{{ __('Energie') }}</th>
                    <th>{{ $item->energy }}</th>
                </tr>
            @endif
            @if($item->cabLow)
                <tr class="row--text--list">
                    <th>{{ __('Lage kasten') }}</th>
                    <th>{{ $item->cabLow }}</th>
                </tr>
            @endif
            @if($item->cabLowDoors)
                <tr class="row--text--list">
                    <th>{{ __('Lage kasten | deuren') }}</th>
                    <th>{{ $item->cabLowDoors }}</th>
                </tr>
            @endif
            @if($item->cabLowDrawers)
                <tr class="row--text--list">
                    <th>{{ __('Lage kasten | lades') }}</th>
                    <th>{{ $item->cabLowDrawers }}</th>
                </tr>
            @endif
            @if($item->cabLowShelves)
                <tr class="row--text--list">
                    <th>{{ __('Lage kasten | legplanken') }}</th>
                    <th>{{ $item->cabLowShelves }}</th>
                </tr>
            @endif

            @if($item->cabHigh)
                <tr class="row--text--list">
                    <th>{{ __('Hoge kasten') }}</th>
                    <th>{{ $item->cabHigh }}</th>
                </tr>
            @endif
            @if($item->cabHighDoors)
                <tr class="row--text--list">
                    <th>{{ __('Hoge kasten | deuren') }}</th>
                    <th>{{ $item->cabHighDoors }}</th>
                </tr>
            @endif
            @if($item->cabHighDrawers)
                <tr class="row--text--list">
                    <th>{{ __('Hoge kasten | lades') }}</th>
                    <th>{{ $item->cabHighDrawers }}</th>
                </tr>
            @endif
            @if($item->cabHighShelves)
                <tr class="row--text--list">
                    <th>{{ __('Hoge kasten | legplanken') }}</th>
                    <th>{{ $item->cabHighShelves }}</th>
                </tr>
            @endif

            @if($item->cabinet)
                <tr class="row--text--list">
                    <th>{{ __('Boven kasten') }}</th>
                    <th>{{ $item->cabinet }}</th>
                </tr>
            @endif
            @if($item->cabinetDoors)
                <tr class="row--text--list">
                    <th>{{ __('Boven kasten | deuren') }}</th>
                    <th>{{ $item->cabinetDoors }}</th>
                </tr>
            @endif
            @if($item->cabinetDrawers)
                <tr class="row--text--list">
                    <th>{{ __('Boven kasten | lades') }}</th>
                    <th>{{ $item->cabinetDrawers }}</th>
                </tr>
            @endif
            @if($item->cabinetShelves)
                <tr class="row--text--list">
                    <th>{{ __('Boven kasten | legplanken') }}</th>
                    <th>{{ $item->cabinetShelves }}</th>
                </tr>
            @endif

            @if($item->cutleryDrawer)
                <tr class="row--text--list">
                    <th>{{ __('Besteklade') }}</th>
                    <th>{{ $item->cutleryDrawer }}</th>
                </tr>
            @endif
            @if($item->kitchenHandle)
                <tr class="row--text--list">
                    <th>{{ __('Klink') }}</th>
                    <th>{{ $item->kitchenHandle }}</th>
                </tr>
            @endif
            @if($item->filter)
                <tr class="row--text--list">
                    <th>{{ __('Filter') }}</th>
                    <th>{{ $item->filter }}</th>
                </tr>
            @endif
            @if($item->lighting)
                <tr class="row--text--list">
                    <th>{{ __('Verlichting') }}</th>
                    <th>{{ $item->lighting }}</th>
                </tr>
            @endif
            @if($item->manual)
                <tr class="row--text--list">
                    <th>{{ __('Handleiding') }}</th>
                    <th>{{ $item->manual }}</th>
                </tr>
            @endif
            @if($item->zones)
                <tr class="row--text--list">
                    <th>{{ __('Zones') }}</th>
                    <th>{{ $item->zones }}</th>
                </tr>
            @endif
            @if($item->bakingTray)
                <tr class="row--text--list">
                    <th>{{ __('Bakplaten') }}</th>
                    <th>{{ $item->bakingTray }}</th>
                </tr>
            @endif
            @if($item->rooster)
                <tr class="row--text--list">
                    <th>{{ __('Rooster') }}</th>
                    <th>{{ $item->rooster }}</th>
                </tr>
            @endif
            @if($item->shelf)
                <tr class="row--text--list">
                    <th>{{ __('Legplaat') }}</th>
                    <th>{{ $item->shelf }}</th>
                </tr>
            @endif
            @if($item->vegetableTray)
                <tr class="row--text--list">
                    <th>{{ __('Groentenbak') }}</th>
                    <th>{{ $item->vegetableTray }}</th>
                </tr>
            @endif
            @if($item->doorBins)
                <tr class="row--text--list">
                    <th>{{ __('Bakjes in deur') }}</th>
                    <th>{{ $item->doorBins }}</th>
                </tr>
            @endif
            @if($item->cutleryBasket)
                <tr class="row--text--list">
                    <th>{{ __('Bestekmandje') }}</th>
                    <th>{{ $item->cutleryBasket }}</th>
                </tr>
            @endif
            @if($item->floor)
                <tr class="row--text--list">
                    <th>{{ __('Vloer') }}</th>
                    <th>{{ $item->floor }}</th>
                </tr>
            @endif
            @if($item->walls)
                <tr class="row--text--list">
                    <th>{{ __('Muren') }}</th>
                    <th>{{ $item->walls }}</th>
                </tr>
            @endif
            @if($item->manual)
                <tr class="row--text--list">
                    <th>{{ __('Handleiding') }}</th>
                    <th>{{ $item->manual }}</th>
                </tr>
            @endif
            @if($item->shower)
                <tr class="row--text--list">
                    <th>{{ __('Douche') }}</th>
                    <th>{{ $item->shower }}</th>
                </tr>
            @endif
            @if($item->protection)
                <tr class="row--text--list">
                    <th>{{ __('Bescherming') }}</th>
                    <th>{{ $item->protection }}</th>
                </tr>
            @endif
            @if($item->casing)
                <tr class="row--text--list">
                    <th>{{ __('Omkasting') }}</th>
                    <th>{{ $item->casing }}</th>
                </tr>
            @endif
            @if($item->position)
                <tr class="row--text--list">
                    <th>{{ __('Plaats') }}</th>
                    <th>{{ $item->position }}</th>
                </tr>
            @endif
            @if($item->vaporBarrier)
                <tr class="row--text--list">
                    <th>{{ __('Dampscherm') }}</th>
                    <th>{{ $item->vaporBarrier }}</th>
                </tr>
            @endif
            @if($item->service)
                <tr class="row--text--list">
                    <th>{{ __('Bediening') }}</th>
                    <th>{{ $item->service }}</th>
                </tr>
            @endif

            @if($item->analysis)
                <tr class="row--text--list">
                    <th>{{ __('Analyse') }}</th>
                    <th>{{ $item->analysis }}</th>
                </tr>
            @endif
            @if($item->extra)
                <tr class="row--text--list textareaExtra">
                    <th>{{ __('Extra') }}</th>
                    <th class="">{{ $item->extra }}</th>
                </tr>
            @endif
        </table>
        </section>
    @endif

    @include('inspections.sections.media' , [ 'folder' => \App\Enums\ImageStorageDirectory::SpecificArea->value ])
@endforeach

