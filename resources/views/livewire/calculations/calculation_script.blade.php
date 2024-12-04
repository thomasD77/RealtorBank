<script>

    document.addEventListener('DOMContentLoaded', function () {
        window.addEventListener('show-delete-confirmation', event => {
            $('#deleteConfirmationModal').modal('show');
        });

        window.addEventListener('hide-delete-confirmation', event => {
            $('#deleteConfirmationModal').modal('hide');
        });

        window.addEventListener('show-edit-vetustate', event => {
            $('#editVetustateModal').modal('show');
        });

        window.addEventListener('hide-edit-vetustate', event => {
            $('#editVetustateModal').modal('hide');
        });
    });

    document.addEventListener('livewire:load', function () {
        Livewire.hook('message.processed', (message, component) => {
            initializeDropdown();
        });

        initializeDropdown(); // Initialiseer de functionaliteit bij de eerste keer laden
    });

    document.addEventListener('DOMContentLoaded', function () {
        // Livewire hooks en initialisatie
        document.addEventListener('livewire:load', function () {
            // Initialiseer de dropdown functionaliteit bij laden
            initializeDropdown();

            // Herinitialiseer de dropdown functionaliteit na Livewire DOM updates
            Livewire.hook('message.processed', (message, component) => {
                initializeDropdown();
            });
        });

        function initializeDropdown() {
            const dropdownButton = document.getElementById('dropdownButton');
            const dropdownMenu = document.getElementById('dropdownMenu');

            if (dropdownButton && dropdownMenu) {
                // Verwijder bestaande event listeners om dubbele bindings te voorkomen
                dropdownButton.removeEventListener('click', toggleDropdown);
                window.removeEventListener('click', closeDropdown);

                // Voeg nieuwe event listeners toe
                dropdownButton.addEventListener('click', toggleDropdown);
                window.addEventListener('click', closeDropdown);
            }

            function toggleDropdown(event) {
                event.stopPropagation(); // Voorkom dat de klik naar de window bubbelt
                dropdownMenu.classList.toggle('show');
            }

            function closeDropdown(event) {
                if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                    dropdownMenu.classList.remove('show');
                }
            }
        }
    });

</script>
