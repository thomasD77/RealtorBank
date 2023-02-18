<div>
    @switch($conform->code)
        @case(\App\Enums\ConformKey::Connection->value)
            <livewire:conform.elements.electronics
                :dynamicArea="$conformArea"
            />

            <livewire:conform.elements.phone
                :dynamicArea="$conformArea"
            />

            <livewire:conform.elements.internet
                :dynamicArea="$conformArea"
            />

            <livewire:conform.elements.audio
                :dynamicArea="$conformArea"
            />
        @break

        @case(\App\Enums\ConformKey::Lighting->value)
            <livewire:conform.elements.types
                :dynamicArea="$conformArea"
            />

            <livewire:conform.elements.count
                :dynamicArea="$conformArea"
            />
        @break

        @case(\App\Enums\ConformKey::SmokeDetector->value)
            <livewire:conform.elements.present
                :dynamicArea="$conformArea"
            />
        @break

        @case(\App\Enums\ConformKey::Socket->value)
            <livewire:conform.elements.materials
                :dynamicArea="$conformArea"
            />

            <livewire:conform.elements.colors
                :dynamicArea="$conformArea"
            />

            <livewire:conform.elements.single
                :dynamicArea="$conformArea"
            />

            <livewire:conform.elements.multiple
                :dynamicArea="$conformArea"
            />

            <livewire:conform.elements.brand
                :dynamicArea="$conformArea"
            />
        @break

        @case(\App\Enums\ConformKey::Switches->value)
            <livewire:conform.elements.materials
                :dynamicArea="$conformArea"
            />

            <livewire:conform.elements.colors
                :dynamicArea="$conformArea"
            />

            <livewire:conform.elements.single
                :dynamicArea="$conformArea"
            />

            <livewire:conform.elements.multiple
                :dynamicArea="$conformArea"
            />

            <livewire:conform.elements.brand
                :dynamicArea="$conformArea"
            />
        @break

        @case(\App\Enums\ConformKey::Ventilator->value)
            <livewire:conform.elements.materials
                :dynamicArea="$conformArea"
            />

            <livewire:conform.elements.colors
                :dynamicArea="$conformArea"
            />
        @break

        @case(\App\Enums\ConformKey::VentilationGrid->value)
            <livewire:conform.elements.materials
                :dynamicArea="$conformArea"
            />

            <livewire:conform.elements.colors
                :dynamicArea="$conformArea"
            />
        @break

    @endswitch
</div>
