<div>
    @switch($technique->code)

        @case(\App\Enums\TechniqueKey::FuseBox->value)
            <livewire:technique.elements.types
                :techniqueArea="$techniqueArea"
            />
        @break

        @case(\App\Enums\TechniqueKey::cvDevice->value)
            <livewire:technique.elements.fuel
                :techniqueArea="$techniqueArea"
            />
            <livewire:technique.elements.brand
                :techniqueArea="$techniqueArea"
            />
        @break

        @case(\App\Enums\TechniqueKey::Boiler->value)
            <livewire:technique.elements.model
                :techniqueArea="$techniqueArea"
            />
            <livewire:technique.elements.fuel
                :techniqueArea="$techniqueArea"
            />
            <livewire:technique.elements.brand
                :techniqueArea="$techniqueArea"
            />
        @break

        @case(\App\Enums\TechniqueKey::WaterSoftener->value)
            <livewire:technique.elements.brand
                :techniqueArea="$techniqueArea"
            />
        @break

        @case(\App\Enums\TechniqueKey::WaterPump->value)
            <livewire:technique.elements.types
                :techniqueArea="$techniqueArea"
            />
            <livewire:technique.elements.brand
                :techniqueArea="$techniqueArea"
            />
        @break

        @case(\App\Enums\TechniqueKey::Airco->value)
            <livewire:technique.elements.brand
                :techniqueArea="$techniqueArea"
            />
        @break

        @case(\App\Enums\TechniqueKey::VentilationGroup->value)
            <livewire:technique.elements.brand
                :techniqueArea="$techniqueArea"
            />
        @break

        @case(\App\Enums\TechniqueKey::SolarPanels->value)
            <livewire:technique.elements.count
                :techniqueArea="$techniqueArea"
            />
        @break

        @case(\App\Enums\TechniqueKey::Converter->value)
            <livewire:technique.elements.brand
                :techniqueArea="$techniqueArea"
            />
        @break

    @endswitch
</div>
