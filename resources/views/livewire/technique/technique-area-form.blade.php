<div>
    @switch($technique->code)

        @case(\App\Enums\TechniqueKey::FuseBox->value)
            <livewire:technique.elements.types
                :dynamicArea="$techniqueArea"
            />
        @break

        @case(\App\Enums\TechniqueKey::cvDevice->value)
            <livewire:technique.elements.fuel
                :dynamicArea="$techniqueArea"
            />
            <livewire:technique.elements.brand
                :dynamicArea="$techniqueArea"
            />
        @break

        @case(\App\Enums\TechniqueKey::Boiler->value)
            <livewire:technique.elements.model
                :dynamicArea="$techniqueArea"
            />
            <livewire:technique.elements.fuel
                :dynamicArea="$techniqueArea"
            />
            <livewire:technique.elements.brand
                :dynamicArea="$techniqueArea"
            />
        @break

        @case(\App\Enums\TechniqueKey::WaterSoftener->value)
            <livewire:technique.elements.brand
                :dynamicArea="$techniqueArea"
            />
        @break

        @case(\App\Enums\TechniqueKey::WaterPump->value)
            <livewire:technique.elements.types
                :dynamicArea="$techniqueArea"
            />
            <livewire:technique.elements.brand
                :dynamicArea="$techniqueArea"
            />
        @break

        @case(\App\Enums\TechniqueKey::Airco->value)
            <livewire:technique.elements.brand
                :dynamicArea="$techniqueArea"
            />
        @break

        @case(\App\Enums\TechniqueKey::VentilationGroup->value)
            <livewire:technique.elements.brand
                :dynamicArea="$techniqueArea"
            />
        @break

        @case(\App\Enums\TechniqueKey::SolarPanels->value)
            <livewire:technique.elements.count
                :dynamicArea="$techniqueArea"
            />
        @break

        @case(\App\Enums\TechniqueKey::Converter->value)
            <livewire:technique.elements.brand
                :dynamicArea="$techniqueArea"
            />
        @break

    @endswitch
</div>
