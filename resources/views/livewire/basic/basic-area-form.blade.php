<div>
    @switch($area->code)
        @case(\App\Enums\AreaKey::Floor->value)
            <livewire:basic.elements.materials
                :dynamicArea="$basicArea"
            />

            <livewire:basic.elements.colors
                :dynamicArea="$basicArea"
            />

            <livewire:basic.elements.plinths
                :dynamicArea="$basicArea"
            />
        @break

       @case(\App\Enums\AreaKey::Celling->value)
            <livewire:basic.elements.materials
                :dynamicArea="$basicArea"
            />

            <livewire:basic.elements.types
                :dynamicArea="$basicArea"
            />

            <livewire:basic.elements.colors
                :dynamicArea="$basicArea"
            />
        @break

        @case(\App\Enums\AreaKey::Door->value)
            <livewire:basic.elements.materials
                :dynamicArea="$basicArea"
            />

            <livewire:basic.elements.colors
                :dynamicArea="$basicArea"
            />

            <livewire:basic.elements.handle
                :dynamicArea="$basicArea"
            />

            <livewire:basic.elements.lists
                :dynamicArea="$basicArea"
            />

            <livewire:basic.elements.key
                :dynamicArea="$basicArea"
            />

            <livewire:basic.elements.doorpump
                :dynamicArea="$basicArea"
            />

            <livewire:basic.elements.doorstop
                :dynamicArea="$basicArea"
            />
        @break

        @case(\App\Enums\AreaKey::Heating->value)
            <livewire:basic.elements.materials
                :dynamicArea="$basicArea"
            />

            <livewire:basic.elements.types
                :dynamicArea="$basicArea"
            />

            <livewire:basic.elements.energy
                :dynamicArea="$basicArea"
            />
        @break

        @case(\App\Enums\AreaKey::Wall->value)
            <livewire:basic.elements.materials
                :dynamicArea="$basicArea"
            />

            <livewire:basic.elements.plaster
                :dynamicArea="$basicArea"
            />

            <livewire:basic.elements.finish
                :dynamicArea="$basicArea"
            />

            <livewire:basic.elements.colors
                :dynamicArea="$basicArea"
            />
        @break

        @case(\App\Enums\AreaKey::Window->value)
            <livewire:basic.elements.materials
                :dynamicArea="$basicArea"
            />

            <livewire:basic.elements.types
                :dynamicArea="$basicArea"
            />

            <livewire:basic.elements.colors
                :dynamicArea="$basicArea"
            />

            <livewire:basic.elements.ventilationgrille
                :dynamicArea="$basicArea"
            />

            <livewire:basic.elements.glazing
                :dynamicArea="$basicArea"
            />

            <livewire:basic.elements.handle
                :dynamicArea="$basicArea"
            />

            <livewire:basic.elements.windowsill
                :dynamicArea="$basicArea"
            />

            <livewire:basic.elements.rollershutter
                :dynamicArea="$basicArea"
            />

            <livewire:basic.elements.windowdecoration
                :dynamicArea="$basicArea"
            />

            <livewire:basic.elements.hor
                :dynamicArea="$basicArea"
            />

            <livewire:basic.elements.fallprotection
                :dynamicArea="$basicArea"
            />

    @endswitch
</div>
