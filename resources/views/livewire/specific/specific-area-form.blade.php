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
    @endswitch
</div>
