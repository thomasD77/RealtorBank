<div>
    @switch($outdoor->code)

        @case(\App\Enums\OutdoorKey::Walls->value)
            <livewire:outdoor.elements.material
                :dynamicArea="$outdoorArea"
            />
            <livewire:outdoor.elements.finish
                :dynamicArea="$outdoorArea"
            />
        @break

        @case(\App\Enums\OutdoorKey::Windows->value)
            <livewire:outdoor.elements.material
                :dynamicArea="$outdoorArea"
            />
            <livewire:outdoor.elements.colors
                :dynamicArea="$outdoorArea"
            />
            <livewire:outdoor.elements.windowsill
                :dynamicArea="$outdoorArea"
            />
        @break

        @case(\App\Enums\OutdoorKey::Roof->value)
            <livewire:outdoor.elements.roof
                :dynamicArea="$outdoorArea"
            />
            <livewire:outdoor.elements.footh
                :dynamicArea="$outdoorArea"
            />
            <livewire:outdoor.elements.chimney
                :dynamicArea="$outdoorArea"
            />
            <livewire:outdoor.elements.solar
                :dynamicArea="$outdoorArea"
            />
        @break

        @case(\App\Enums\OutdoorKey::Mailbox->value)
            <livewire:outdoor.elements.types
                :dynamicArea="$outdoorArea"
            />
            <livewire:outdoor.elements.material
                :dynamicArea="$outdoorArea"
            />
            <livewire:outdoor.elements.lock
                :dynamicArea="$outdoorArea"
            />
        @break

        @case(\App\Enums\OutdoorKey::OutdoorTrap->value)
            <livewire:outdoor.elements.material
                :dynamicArea="$outdoorArea"
            />
            <livewire:outdoor.elements.handrail
                :dynamicArea="$outdoorArea"
            />
        @break

        @case(\App\Enums\OutdoorKey::Balcony->value)
            <livewire:outdoor.elements.balustrade
                :dynamicArea="$outdoorArea"
            />
        @break

        @case(\App\Enums\OutdoorKey::DriveWayMaterial->value)
            <livewire:outdoor.elements.material
                :dynamicArea="$outdoorArea"
            />
        @break

        @case(\App\Enums\OutdoorKey::FootPathMaterial->value)
            <livewire:outdoor.elements.material
                :dynamicArea="$outdoorArea"
            />
        @break

        @case(\App\Enums\OutdoorKey::Gate->value)
            <livewire:outdoor.elements.material
                :dynamicArea="$outdoorArea"
            />
            <livewire:outdoor.elements.gate
                :dynamicArea="$outdoorArea"
            />
            <livewire:outdoor.elements.parts
                :dynamicArea="$outdoorArea"
            />
            <livewire:outdoor.elements.lock
                :dynamicArea="$outdoorArea"
            />
        @break

        @case(\App\Enums\OutdoorKey::Fence->value)
            <livewire:outdoor.elements.material
                :dynamicArea="$outdoorArea"
            />
            <livewire:outdoor.elements.fence
                :dynamicArea="$outdoorArea"
            />
        @break

        @case(\App\Enums\OutdoorKey::GardenGate->value)
            <livewire:outdoor.elements.material
                :dynamicArea="$outdoorArea"
            />
            <livewire:outdoor.elements.lock
                :dynamicArea="$outdoorArea"
            />
        @break

{{--        @case(\App\Enums\OutdoorKey::Outdoorlight->value)--}}
{{--            <livewire:outdoor.elements.types--}}
{{--                :dynamicArea="$outdoorArea"--}}
{{--            />--}}
{{--            <livewire:outdoor.elements.count--}}
{{--                :dynamicArea="$outdoorArea"--}}
{{--            />--}}
{{--            <livewire:outdoor.elements.movementdetector--}}
{{--                :dynamicArea="$outdoorArea"--}}
{{--            />--}}
{{--        @break--}}

        @case(\App\Enums\OutdoorKey::Mailbox->value)
            <livewire:outdoor.elements.types
                :dynamicArea="$outdoorArea"
            />
            <livewire:outdoor.elements.count
                :dynamicArea="$outdoorArea"
            />
            <livewire:outdoor.elements.lock
                :dynamicArea="$outdoorArea"
            />
        @break

        @case(\App\Enums\OutdoorKey::Planting->value)
            <livewire:outdoor.elements.gras
                :dynamicArea="$outdoorArea"
            />
            <livewire:outdoor.elements.hedges
                :dynamicArea="$outdoorArea"
            />
            <livewire:outdoor.elements.trees
                :dynamicArea="$outdoorArea"
            />
        @break

        @case(\App\Enums\OutdoorKey::Fence->value)
            <livewire:outdoor.elements.material
                :dynamicArea="$outdoorArea"
            />
            <livewire:outdoor.elements.types
                :dynamicArea="$outdoorArea"
            />
        @break

        @case(\App\Enums\OutdoorKey::GardenGate->value)
            <livewire:outdoor.elements.material
                :dynamicArea="$outdoorArea"
            />
            <livewire:outdoor.elements.lock
                :dynamicArea="$outdoorArea"
            />
        @break

        @case(\App\Enums\OutdoorKey::OutdoorLight->value)
            <livewire:outdoor.elements.outdoorlight
                :dynamicArea="$outdoorArea"
            />
            <livewire:outdoor.elements.count
                :dynamicArea="$outdoorArea"
            />
            <livewire:outdoor.elements.movementdetector
                :dynamicArea="$outdoorArea"
            />
        @break

        @case(\App\Enums\OutdoorKey::TerraceMaterial->value)
            <livewire:outdoor.elements.material
                :dynamicArea="$outdoorArea"
            />
        @break

        @case(\App\Enums\OutdoorKey::Crane->value)
            <livewire:outdoor.elements.crane
                :dynamicArea="$outdoorArea"
            />
        @break

        @case(\App\Enums\OutdoorKey::Sockets->value)
            <livewire:outdoor.elements.single
                :dynamicArea="$outdoorArea"
            />
            <livewire:outdoor.elements.double
                :dynamicArea="$outdoorArea"
            />
            <livewire:outdoor.elements.material
                :dynamicArea="$outdoorArea"
            />
            <livewire:outdoor.elements.colors
                :dynamicArea="$outdoorArea"
            />
            <livewire:outdoor.elements.brand
                :dynamicArea="$outdoorArea"
            />
        @break

        @case(\App\Enums\OutdoorKey::OutsideDoor->value)
            <livewire:outdoor.elements.material
                :dynamicArea="$outdoorArea"
            />
            <livewire:outdoor.elements.colors
                :dynamicArea="$outdoorArea"
            />
            <livewire:outdoor.elements.glassinlay
                :dynamicArea="$outdoorArea"
            />
            <livewire:outdoor.elements.handle
                :dynamicArea="$outdoorArea"
            />
            <livewire:outdoor.elements.mailbox
                :dynamicArea="$outdoorArea"
            />
            <livewire:outdoor.elements.peephole
                :dynamicArea="$outdoorArea"
            />
            <livewire:outdoor.elements.window
                :dynamicArea="$outdoorArea"
            />
            <livewire:outdoor.elements.doorbell
                :dynamicArea="$outdoorArea"
            />
            <livewire:outdoor.elements.dorpel
                :dynamicArea="$outdoorArea"
            />
        @break

        @case(\App\Enums\OutdoorKey::Celling->value)
            <livewire:outdoor.elements.material
                :dynamicArea="$outdoorArea"
            />

            <livewire:outdoor.elements.types
                :dynamicArea="$outdoorArea"
            />

            <livewire:outdoor.elements.colors
                :dynamicArea="$outdoorArea"
            />
        @break

        @case(\App\Enums\OutdoorKey::Wall->value)
            <livewire:outdoor.elements.material
                :dynamicArea="$outdoorArea"
            />

            <livewire:outdoor.elements.plaster
                :dynamicArea="$outdoorArea"
            />

            <livewire:outdoor.elements.finish
                :dynamicArea="$outdoorArea"
            />

            <livewire:outdoor.elements.colors
                :dynamicArea="$outdoorArea"
            />
        @break

        @case(\App\Enums\OutdoorKey::OutsideWindows->value)
            <livewire:outdoor.elements.material
                :dynamicArea="$outdoorArea"
            />

            <livewire:outdoor.elements.window
                :dynamicArea="$outdoorArea"
            />

            <livewire:outdoor.elements.colors
                :dynamicArea="$outdoorArea"
            />

            <livewire:outdoor.elements.ventilationgrille
                :dynamicArea="$outdoorArea"
            />

            <livewire:outdoor.elements.glazing
                :dynamicArea="$outdoorArea"
            />

            <livewire:outdoor.elements.handle
                :dynamicArea="$outdoorArea"
            />

            <livewire:outdoor.elements.windowsill
                :dynamicArea="$outdoorArea"
            />

            <livewire:outdoor.elements.rollershutter
                :dynamicArea="$outdoorArea"
            />

            <livewire:outdoor.elements.windowdecoration
                :dynamicArea="$outdoorArea"
            />

            <livewire:outdoor.elements.hor
                :dynamicArea="$outdoorArea"
            />

            <livewire:outdoor.elements.fallprotection
                :dynamicArea="$outdoorArea"
            />
        @break

        @case(\App\Enums\OutdoorKey::Switches->value)
            <livewire:outdoor.elements.material
                :dynamicArea="$outdoorArea"
            />

            <livewire:outdoor.elements.colors
                :dynamicArea="$outdoorArea"
            />

            <livewire:outdoor.elements.single
                :dynamicArea="$outdoorArea"
            />

            <livewire:outdoor.elements.multiple
                :dynamicArea="$outdoorArea"
            />

            <livewire:outdoor.elements.brand
                :dynamicArea="$outdoorArea"
            />
        @break

        @case(\App\Enums\OutdoorKey::Lighting->value)
            <livewire:outdoor.elements.types
                :dynamicArea="$outdoorArea"
            />

            <livewire:outdoor.elements.count
                :dynamicArea="$outdoorArea"
            />
        @break

        @case(\App\Enums\OutdoorKey::Handrail->value)
            <livewire:outdoor.elements.teraccehandrail
                :dynamicArea="$outdoorArea"
            />

            <livewire:outdoor.elements.construction
                :dynamicArea="$outdoorArea"
            />
        @break

        @case(\App\Enums\OutdoorKey::Canopy->value)
            <livewire:outdoor.elements.canopylight
                :dynamicArea="$outdoorArea"
            />

            <livewire:outdoor.elements.canopyswitch
                :dynamicArea="$outdoorArea"
            />
        @break

    @endswitch
</div>
