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
            <livewire:outdoor.elements.types
                :dynamicArea="$outdoorArea"
            />
            <livewire:outdoor.elements.count
                :dynamicArea="$outdoorArea"
            />
            <livewire:outdoor.elements.movementdetector
                :dynamicArea="$outdoorArea"
            />
        @break

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

    @endswitch
</div>
