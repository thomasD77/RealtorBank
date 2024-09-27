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
        // Herinitialiseer de dropdown functionaliteit na Livewire DOM update
        Livewire.hook('message.processed', (message, component) => {
            initializeDropdown();
        });

        // Initialiseer de dropdown functionaliteit bij de eerste keer laden
        initializeDropdown();

        function initializeDropdown() {
            var dropdownButton = document.getElementById('dropdownButton');
            var dropdownMenu = document.getElementById('dropdownMenu');

            if (dropdownButton && dropdownMenu) {
                dropdownButton.addEventListener('click', function() {
                    dropdownMenu.classList.toggle('show');
                });

                window.addEventListener('click', function(event) {
                    if (!event.target.matches('#dropdownButton')) {
                        if (dropdownMenu.classList.contains('show')) {
                            dropdownMenu.classList.remove('show');
                        }
                    }
                });
            }
        }
    });

</script>
