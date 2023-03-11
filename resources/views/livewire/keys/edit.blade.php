<div>
    <div class="single-add-property">

        <h3>{{  __('Sleutel') }} - {{ $key->title }}</h3>

        <ul class="accordion accordion-1 one-open">

            <livewire:keys.elements.types
                :dynamicArea="$key"
            />

            <livewire:keys.elements.count
                :dynamicArea="$key"
            />

            <livewire:keys.elements.extra
                :dynamicArea="$key"
            />


        </ul>
    </div>

    <div class="single-add-property">
        <ul class="accordion accordion-1 one-open">

            <livewire:keys.elements.media
                :dynamicArea="$key"
            />

        </ul>
    </div>
</div>

