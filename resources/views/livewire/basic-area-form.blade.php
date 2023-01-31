<div>
    <h5 class="uppercase mb40">Accordions</h5>
    <ul class="accordion accordion-1 one-open">
        <li class="active">
            <div class="title">
                <span>Materialen</span>
            </div>
            <div class="content p-4">
                <div class="row">
                    @foreach($materials as $material)
                        <div class="col-md-6">
                            <div class="d-flex">
                                <input type="checkbox" @if($basicArea->material == $material) checked @endif  wire:click="select('{{ $material }}')"><p>{{ $material }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </li>
        <li>
            <div class="title">
                <span>Toggle Information</span>
            </div>
            <div class="content">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </p>
            </div>
        </li>
        <li>
            <div class="title">
                <span>Nice Touch</span>
            </div>
            <div class="content">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </p>
            </div>
        </li>
    </ul>
</div>
