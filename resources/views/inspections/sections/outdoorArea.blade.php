@foreach($room->outdoorAreas as $item)
    @if($item->material || $item->finish || $item->color ||
        $item->windowsill || $item->type || $item->footh ||
        $item->cover || $item->chimney || $item->solar ||
        $item->lock || $item->handrail || $item->balustrade ||
        $item->parts || $item->count || $item->movementDetector ||
        $item->gras || $item->hedges || $item->trees ||
        $item->single || $item->double || $item->brand ||
        $item->crane || $item->glassInlay || $item->handle ||
        $item->mailbox || $item->peephole || $item->window ||
        $item->doorBel || $item->dorpel || $item->analysis || $item->extra || $item->plinth
        || $item->plaster || $item->ventilationGrille || $item->glazing || $item->rollerShutter || $item->windowDecoration
        || $item->hor || $item->fallProtection || $item->construction || $item->canopyLight || $item->canopySwitch)
        <section>
            <table class="table">
                <tr class="row--head--list">
                    <th>{{ $room->floor->title }} | {{ $item->room->title }} | {{  $item->outdoor->title }}</th>
                    <th></th>
                </tr>
                @if($item->material)
                    <tr class="row--text--list">
                        <th>{{ __('Materiaal') }}</th>
                        <th>{{ $item->material }}</th>
                    </tr>
                @endif
                @if($item->window)
                    <tr class="row--text--list">
                        <th>{{ __('Raam') }}</th>
                        <th>{{ $item->window }}</th>
                    </tr>
                @endif
                @if($item->plaster)
                    <tr class="row--text--list">
                        <th>{{ __('Pleisterwerk') }}</th>
                        <th>{{ $item->plaster }}</th>
                    </tr>
                @endif
                @if($item->finish)
                    <tr class="row--text--list">
                        <th>{{ __('Afwerking') }}</th>
                        <th>{{ $item->finish }}</th>
                    </tr>
                @endif
                @if($item->type)
                    <tr class="row--text--list">
                        <th>{{ __('Type') }}</th>
                        <th>{{ $item->type }}</th>
                    </tr>
                @endif
                @if($item->color)
                    <tr class="row--text--list">
                        <th>{{ __('Kleuren') }}</th>
                        <th>{{ $item->color }}</th>
                    </tr>
                @endif
                @if($item->ventilationGrille)
                    <tr class="row--text--list">
                        <th>{{ __('Ventilatie rooster') }}</th>
                        <th>{{ $item->ventilationGrille }}</th>
                    </tr>
                @endif
                @if($item->glazing)
                    <tr class="row--text--list">
                        <th>{{ __('Beglazing') }}</th>
                        <th>{{ $item->glazing }}</th>
                    </tr>
                @endif
                @if($item->handle)
                    <tr class="row--text--list">
                        <th>{{ __('Klink') }}</th>
                        <th>{{ $item->handle }}</th>
                    </tr>
                @endif
                @if($item->windowsill)
                    <tr class="row--text--list">
                        <th>{{ __('Vensterbank') }}</th>
                        <th>{{ $item->windowsill }}</th>
                    </tr>
                @endif
                @if($item->rollerShutter)
                    <tr class="row--text--list">
                        <th>{{ __('Rolluiken') }}</th>
                        <th>{{ $item->rollerShutter }}</th>
                    </tr>
                @endif
                @if($item->windowDecoration)
                    <tr class="row--text--list">
                        <th>{{ __('Raamdecoratie') }}</th>
                        <th>{{ $item->windowDecoration }}</th>
                    </tr>
                @endif
                @if($item->hor)
                    <tr class="row--text--list">
                        <th>{{ __('Hor') }}</th>
                        <th>{{ $item->hor }}</th>
                    </tr>
                @endif
                @if($item->fallProtection)
                    <tr class="row--text--list">
                        <th>{{ __('Valbeveiliging') }}</th>
                        <th>{{ $item->fallProtection }}</th>
                    </tr>
                @endif
                @if($item->footh)
                    <tr class="row--text--list">
                        <th>{{ __('Footh') }}</th>
                        <th>{{ $item->footh }}</th>
                    </tr>
                @endif
                @if($item->cover)
                    <tr class="row--text--list">
                        <th>{{ __('Bedekking') }}</th>
                        <th>{{ $item->cover }}</th>
                    </tr>
                @endif
                @if($item->chimney)
                    <tr class="row--text--list">
                        <th>{{ __('Schoorsteen') }}</th>
                        <th>{{ $item->chimney }}</th>
                    </tr>
                @endif
                @if($item->solar)
                    <tr class="row--text--list">
                        <th>{{ __('Zonnepanelen') }}</th>
                        <th>{{ $item->solar }}</th>
                    </tr>
                @endif
                @if($item->lock)
                    <tr class="row--text--list">
                        <th>{{ __('Slot') }}</th>
                        <th>{{ $item->lock }}</th>
                    </tr>
                @endif
                @if($item->handrail)
                    <tr class="row--text--list">
                        <th>{{ __('Leuning') }}</th>
                        <th>{{ $item->handrail }}</th>
                    </tr>
                @endif
                @if($item->balustrade)
                    <tr class="row--text--list">
                        <th>{{ __('Balustrade') }}</th>
                        <th>{{ $item->balustrade }}</th>
                    </tr>
                @endif
                @if($item->parts)
                    <tr class="row--text--list">
                        <th>{{ __('Stukken') }}</th>
                        <th>{{ $item->parts }}</th>
                    </tr>
                @endif
                @if($item->count)
                    <tr class="row--text--list">
                        <th>{{ __('Aantal') }}</th>
                        <th>{{ $item->count }}</th>
                    </tr>
                @endif
                @if($item->movementDetector)
                    <tr class="row--text--list">
                        <th>{{ __('Bewegingsdetector') }}</th>
                        <th>{{ $item->movementDetector }}</th>
                    </tr>
                @endif
                @if($item->gras)
                    <tr class="row--text--list">
                        <th>{{ __('Gras') }}</th>
                        <th>{{ $item->gras }}</th>
                    </tr>
                @endif
                @if($item->hedges)
                    <tr class="row--text--list">
                        <th>{{ __('Hagen') }}</th>
                        <th>{{ $item->hedges }}</th>
                    </tr>
                @endif
                @if($item->trees)
                    <tr class="row--text--list">
                        <th>{{ __('Bomen') }}</th>
                        <th>{{ $item->trees }}</th>
                    </tr>
                @endif
                @if($item->single)
                    <tr class="row--text--list">
                        <th>{{ __('Enkelvoudig') }}</th>
                        <th>{{ $item->single }}</th>
                    </tr>
                @endif
                @if($item->double)
                    <tr class="row--text--list">
                        <th>{{ __('Meervoudig') }}</th>
                        <th>{{ $item->double }}</th>
                    </tr>
                @endif
                @if($item->brand)
                    <tr class="row--text--list">
                        <th>{{ __('Merk') }}</th>
                        <th>{{ $item->brand }}</th>
                    </tr>
                @endif
                @if($item->crane)
                    <tr class="row--text--list">
                        <th>{{ __('Kraan') }}</th>
                        <th>{{ $item->crane }}</th>
                    </tr>
                @endif
                @if($item->glassInlay)
                    <tr class="row--text--list">
                        <th>{{ __('Glasinleg') }}</th>
                        <th>{{ $item->glassInlay }}</th>
                    </tr>
                @endif
                @if($item->double)
                    <tr class="row--text--list">
                        <th>{{ __('Meervoudig') }}</th>
                        <th>{{ $item->double }}</th>
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
                @if($item->mailbox)
                    <tr class="row--text--list">
                        <th>{{ __('Brievenbus') }}</th>
                        <th>{{ $item->mailbox }}</th>
                    </tr>
                @endif
                @if($item->doorBel)
                    <tr class="row--text--list">
                        <th>{{ __('Deurbel') }}</th>
                        <th>{{ $item->doorBel }}</th>
                    </tr>
                @endif
                @if($item->dorpel)
                    <tr class="row--text--list">
                        <th>{{ __('Dorpel') }}</th>
                        <th>{{ $item->dorpel }}</th>
                    </tr>
                @endif
                @if($item->plinth)
                    <tr class="row--text--list">
                        <th>{{ __('Plinten') }}</th>
                        <th>{{ $item->plinth }}</th>
                    </tr>
                @endif
                @if($item->construction)
                    <tr class="row--text--list">
                        <th>{{ __('Opbouw') }}</th>
                        <th>{{ $item->construction }}</th>
                    </tr>
                @endif
                @if($item->canopyLight)
                    <tr class="row--text--list">
                        <th>{{ __('Luifel verlichting') }}</th>
                        <th>{{ $item->canopyLight }}</th>
                    </tr>
                @endif
                @if($item->canopySwitch)
                    <tr class="row--text--list">
                        <th>{{ __('Luifel bediening') }}</th>
                        <th>{{ $item->canopySwitch }}</th>
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

    @include('inspections.sections.media' , [ 'folder' => \App\Enums\ImageStorageDirectory::OutdoorArea->value ])

    @include('inspections.sections.damages' , [ 'damages' => $item->damages, 'title' => $item->outdoor->title ])

@endforeach


