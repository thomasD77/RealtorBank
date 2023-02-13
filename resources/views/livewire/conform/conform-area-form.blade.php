<div>
    @switch($conform->code)
        @case(\App\Enums\ConformKey::Connection)
            <livewire:conform.elements.electronics
                :conformArea="$conformArea"
            />

            <livewire:conform.elements.phone
                :conformArea="$conformArea"
            />

            <livewire:conform.elements.internet
                :conformArea="$conformArea"
            />

            <livewire:conform.elements.audio
                :conformArea="$conformArea"
            />
        @break

        @case(\App\Enums\ConformKey::Lighting)
            <livewire:conform.elements.types
                :conformArea="$conformArea"
            />

            <livewire:conform.elements.count
                :conformArea="$conformArea"
            />
        @break

        @case(\App\Enums\ConformKey::SmokeDetector)
            <livewire:conform.elements.present
                :conformArea="$conformArea"
            />
        @break

        @case(\App\Enums\ConformKey::Socket)
            <livewire:conform.elements.materials
                :conformArea="$conformArea"
            />

            <livewire:conform.elements.colors
                :conformArea="$conformArea"
            />

            <livewire:conform.elements.single
                :conformArea="$conformArea"
            />

            <livewire:conform.elements.multiple
                :conformArea="$conformArea"
            />

            <livewire:conform.elements.brand
                :conformArea="$conformArea"
            />
        @break

        @case(\App\Enums\ConformKey::Switches)
            <livewire:conform.elements.materials
                :conformArea="$conformArea"
            />

            <livewire:conform.elements.colors
                :conformArea="$conformArea"
            />

            <livewire:conform.elements.single
                :conformArea="$conformArea"
            />

            <livewire:conform.elements.multiple
                :conformArea="$conformArea"
            />

            <livewire:conform.elements.brand
                :conformArea="$conformArea"
            />
        @break

        @case(\App\Enums\ConformKey::Ventilator)
            <livewire:conform.elements.materials
                :conformArea="$conformArea"
            />

            <livewire:conform.elements.colors
                :conformArea="$conformArea"
            />
        @break

        @case(\App\Enums\ConformKey::VentilationGrid)
            <livewire:conform.elements.materials
                :conformArea="$conformArea"
            />

            <livewire:conform.elements.colors
                :conformArea="$conformArea"
            />
        @break

    @endswitch
</div>
