<div>
    @switch($area->code)
        @case(\App\Enums\AreaKey::Floor)
        <livewire:basic.elements.materials
            :BasicArea="$basicArea"
        />

        <livewire:basic.elements.colors
            :BasicArea="$basicArea"
        />

        <livewire:basic.elements.plinths
            :BasicArea="$basicArea"
        />
        @break

       @case(\App\Enums\AreaKey::Celling)
        <livewire:basic.elements.materials
            :BasicArea="$basicArea"
        />

        <livewire:basic.elements.types
            :BasicArea="$basicArea"
        />

        <livewire:basic.elements.colors
            :BasicArea="$basicArea"
        />
        @break

        @case(\App\Enums\AreaKey::Door)
        <livewire:basic.elements.materials
            :BasicArea="$basicArea"
        />

        <livewire:basic.elements.colors
            :BasicArea="$basicArea"
        />

        <livewire:basic.elements.handle
            :BasicArea="$basicArea"
        />

        <livewire:basic.elements.lists
            :BasicArea="$basicArea"
        />

        <livewire:basic.elements.key
            :BasicArea="$basicArea"
        />

        <livewire:basic.elements.doorpump
            :BasicArea="$basicArea"
        />

        <livewire:basic.elements.doorstop
            :BasicArea="$basicArea"
        />
        @break

        @case(\App\Enums\AreaKey::Heating)
        <livewire:basic.elements.materials
            :BasicArea="$basicArea"
        />

        <livewire:basic.elements.types
            :BasicArea="$basicArea"
        />

        <livewire:basic.elements.energy
            :BasicArea="$basicArea"
        />
        @break

        @case(\App\Enums\AreaKey::Wall)
        <livewire:basic.elements.materials
            :BasicArea="$basicArea"
        />

        <livewire:basic.elements.plaster
            :BasicArea="$basicArea"
        />

        <livewire:basic.elements.finish
            :BasicArea="$basicArea"
        />

        <livewire:basic.elements.colors
            :BasicArea="$basicArea"
        />
        @break

        @case(\App\Enums\AreaKey::Window)
        <livewire:basic.elements.materials
            :BasicArea="$basicArea"
        />

        <livewire:basic.elements.types
            :BasicArea="$basicArea"
        />

        <livewire:basic.elements.colors
            :BasicArea="$basicArea"
        />

        <livewire:basic.elements.ventilationgrille
            :BasicArea="$basicArea"
        />

        <livewire:basic.elements.glazing
            :BasicArea="$basicArea"
        />

        <livewire:basic.elements.handle
            :BasicArea="$basicArea"
        />

        <livewire:basic.elements.windowsill
            :BasicArea="$basicArea"
        />

        <livewire:basic.elements.rollershutter
            :BasicArea="$basicArea"
        />

        <livewire:basic.elements.windowdecoration
            :BasicArea="$basicArea"
        />

        <livewire:basic.elements.hor
            :BasicArea="$basicArea"
        />

        <livewire:basic.elements.fallprotection
            :BasicArea="$basicArea"
        />

    @endswitch
</div>
