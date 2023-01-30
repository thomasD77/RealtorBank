<div>
    <form wire:submit.prevent="submit">

        <div class="select-option">
            <i class="ti-angle-down"></i>



        </div>


        <button type="submit">Save Contact</button>
    </form>


    <select class="custom-select" wire:model="selectMember" id="inputGroupSelect01">
        <option selected>Choose...</option>
        <option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option>
    </select>

    <p>{{ $selectMember }}</p>
</div>
