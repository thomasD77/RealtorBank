<div>
    @switch($specific->code)
        @case(\App\Enums\SpecificKey::Trap->value)
            <livewire:specific.elements.material
                :dynamicArea="$specificArea"
            />
            <livewire:specific.elements.handrail
                :dynamicArea="$specificArea"
            />
        @break

        @case(\App\Enums\SpecificKey::WallRack->value)
            <livewire:specific.elements.material
                :dynamicArea="$specificArea"
            />
            <livewire:specific.elements.shelves
                :dynamicArea="$specificArea"
            />
        @break

        @case(\App\Enums\SpecificKey::DoorOutside->value)
        <livewire:specific.elements.material
            :dynamicArea="$specificArea"
        />
        <livewire:specific.elements.colors
            :dynamicArea="$specificArea"
        />
        <livewire:specific.elements.glassinlay
            :dynamicArea="$specificArea"
        />
        <livewire:specific.elements.peephole
            :dynamicArea="$specificArea"
        />
        <livewire:specific.elements.window
            :dynamicArea="$specificArea"
        />
        <livewire:specific.elements.doorbell
            :dynamicArea="$specificArea"
        />
        <livewire:specific.elements.dorpel
            :dynamicArea="$specificArea"
        />
        @break

        @case(\App\Enums\SpecificKey::Alarm->value)
        <livewire:specific.elements.dynamicbrand
            :dynamicArea="$specificArea"
        />
        <livewire:specific.elements.colors
            :dynamicArea="$specificArea"
        />
        @break

        @case(\App\Enums\SpecificKey::VideoPhone->value)
        <livewire:specific.elements.dynamicbrand
            :dynamicArea="$specificArea"
        />
        <livewire:specific.elements.colors
            :dynamicArea="$specificArea"
        />
        @break

        @case(\App\Enums\SpecificKey::DoorBell->value)
        <livewire:specific.elements.types
            :dynamicArea="$specificArea"
        />
        <livewire:specific.elements.model
            :dynamicArea="$specificArea"
        />
        @break

        @case(\App\Enums\SpecificKey::BuildInCupboard->value)
        <livewire:specific.elements.cupboardtypes
            :dynamicArea="$specificArea"
        />
        <livewire:specific.elements.shelves
            :dynamicArea="$specificArea"
        />
        <livewire:specific.elements.doors
            :dynamicArea="$specificArea"
        />
        <livewire:specific.elements.drawers
            :dynamicArea="$specificArea"
        />
        <livewire:specific.elements.rod
            :dynamicArea="$specificArea"
        />
        <livewire:specific.elements.handlecount
            :dynamicArea="$specificArea"
        />
        @break

        @case(\App\Enums\SpecificKey::AtticHatch->value)
        <livewire:specific.elements.material
            :dynamicArea="$specificArea"
        />
        <livewire:specific.elements.finish
            :dynamicArea="$specificArea"
        />
        <livewire:specific.elements.colors
            :dynamicArea="$specificArea"
        />
        <livewire:specific.elements.trap
            :dynamicArea="$specificArea"
        />
        @break

        @case(\App\Enums\SpecificKey::Trap->value)
        <livewire:specific.elements.material
            :dynamicArea="$specificArea"
        />
        <livewire:specific.elements.handle
            :dynamicArea="$specificArea"
        />
        @break

        @case(\App\Enums\SpecificKey::Mirror->value)
        <livewire:specific.elements.present
            :dynamicArea="$specificArea"
        />
        <livewire:specific.elements.lighting
            :dynamicArea="$specificArea"
        />
        @break

        @case(\App\Enums\SpecificKey::ToiletPaperHolder->value)
        <livewire:specific.elements.material
            :dynamicArea="$specificArea"
        />
        @break

        @case(\App\Enums\SpecificKey::Closet->value)
        <livewire:specific.elements.cupboardtypes
            :dynamicArea="$specificArea"
        />
        <livewire:specific.elements.shelves
            :dynamicArea="$specificArea"
        />
        <livewire:specific.elements.doors
            :dynamicArea="$specificArea"
        />
        <livewire:specific.elements.drawers
            :dynamicArea="$specificArea"
        />
        <livewire:specific.elements.rod
            :dynamicArea="$specificArea"
        />
        <livewire:specific.elements.handlecount
            :dynamicArea="$specificArea"
        />
        @break

        @case(\App\Enums\SpecificKey::WashingSink->value)
        <livewire:specific.elements.typecount
            :dynamicArea="$specificArea"
        />
        <livewire:specific.elements.sinkmodel
            :dynamicArea="$specificArea"
        />
        <livewire:specific.elements.material
            :dynamicArea="$specificArea"
        />
        <livewire:specific.elements.colors
            :dynamicArea="$specificArea"
        />
        <livewire:specific.elements.crane
            :dynamicArea="$specificArea"
        />
        <livewire:specific.elements.stop
            :dynamicArea="$specificArea"
        />
        <livewire:specific.elements.siphon
            :dynamicArea="$specificArea"
        />
        <livewire:specific.elements.anglecrane
            :dynamicArea="$specificArea"
        />
        @break

        @case(\App\Enums\SpecificKey::ToiletBrush->value)
        <livewire:specific.elements.model
            :dynamicArea="$specificArea"
        />
        @break

        @case(\App\Enums\SpecificKey::Toilet->value)
        <livewire:specific.elements.toilettype
            :dynamicArea="$specificArea"
        />
        <livewire:specific.elements.material
            :dynamicArea="$specificArea"
        />
        <livewire:specific.elements.colors
            :dynamicArea="$specificArea"
        />
        <livewire:specific.elements.rinse
            :dynamicArea="$specificArea"
        />
        <livewire:specific.elements.seat
            :dynamicArea="$specificArea"
        />
        <livewire:specific.elements.anglecrane
            :dynamicArea="$specificArea"
        />
        @break

        @case(\App\Enums\SpecificKey::TowelRail->value)
        <livewire:specific.elements.material
            :dynamicArea="$specificArea"
        />
        @break

        @case(\App\Enums\SpecificKey::FirePlace->value)
        <livewire:specific.elements.fireplacetypes
            :dynamicArea="$specificArea"
        />
        <livewire:specific.elements.fireplacematerial
            :dynamicArea="$specificArea"
        />
        <livewire:specific.elements.fireplaceenergy
            :dynamicArea="$specificArea"
        />
        @break

        @case(\App\Enums\SpecificKey::DecorativeFirePlace->value)
        <livewire:specific.elements.decorativefireplacematerial
            :dynamicArea="$specificArea"
        />
        @break

        @case(\App\Enums\SpecificKey::Thermostat->value)
        <livewire:specific.elements.types
            :dynamicArea="$specificArea"
        />
        <livewire:specific.elements.model
            :dynamicArea="$specificArea"
        />
        <livewire:specific.elements.thermostatbrand
            :dynamicArea="$specificArea"
        />
        @break

        @case(\App\Enums\SpecificKey::KitchenCloset->value)
        <livewire:specific.elements.colors
            :dynamicArea="$specificArea"
        />


        <livewire:specific.elements.cablow
            :dynamicArea="$specificArea"
        />
        <livewire:specific.elements.cablowdoors
            :dynamicArea="$specificArea"
        />
        <livewire:specific.elements.cablowdrawers
            :dynamicArea="$specificArea"
        />
        <livewire:specific.elements.cablowshelves
            :dynamicArea="$specificArea"
        />

        <livewire:specific.elements.cabhigh
            :dynamicArea="$specificArea"
        />
        <livewire:specific.elements.cabhighdoors
            :dynamicArea="$specificArea"
        />
        <livewire:specific.elements.cabhighdrawers
            :dynamicArea="$specificArea"
        />
        <livewire:specific.elements.cabhighshelves
            :dynamicArea="$specificArea"
        />

        <livewire:specific.elements.cabinet
            :dynamicArea="$specificArea"
        />
        <livewire:specific.elements.cabinetdoors
            :dynamicArea="$specificArea"
        />
        <livewire:specific.elements.cabinetdrawers
            :dynamicArea="$specificArea"
        />
        <livewire:specific.elements.cabinetshelves
            :dynamicArea="$specificArea"
        />

        <livewire:specific.elements.cutlerydrawer
            :dynamicArea="$specificArea"
        />

        <livewire:specific.elements.handlecount
            :dynamicArea="$specificArea"
        />


        @break



    @endswitch
</div>
