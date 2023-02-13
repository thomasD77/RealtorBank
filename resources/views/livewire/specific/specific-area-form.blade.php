<div>
    @switch($specific->code)
        @case(\App\Enums\SpecificKey::Trap)
            <livewire:specific.elements.material
                :conformArea="$conformArea"
            />

            <livewire:specific.elements.handrail
                :conformArea="$conformArea"
            />
        @break

        @case(\App\Enums\SpecificKey::WallRack)
            <livewire:specific.elements.material
                :specificArea="$specificArea"
            />

            <livewire:specific.elements.shelves
                :specificArea="$specificArea"
            />
        @break
    @endswitch
</div>
