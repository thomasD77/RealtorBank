<script>
    // Get the dropdown elements
    var dropdownButton = document.getElementById('dropdownButton');
    var dropdownMenu = document.getElementById('dropdownMenu');

    // Toggle the visibility of the dropdown when the button is clicked
    dropdownButton.addEventListener('click', function() {
        dropdownMenu.classList.toggle('show');
    });

    // Close the dropdown if the user clicks outside of it
    window.addEventListener('click', function(event) {
        if (!event.target.matches('#dropdownButton')) {
            if (dropdownMenu.classList.contains('show')) {
                dropdownMenu.classList.remove('show');
            }
        }
    });

    document.addEventListener('DOMContentLoaded', function () {
        window.addEventListener('show-delete-confirmation', event => {
            $('#deleteConfirmationModal').modal('show');
        });

        window.addEventListener('hide-delete-confirmation', event => {
            $('#deleteConfirmationModal').modal('hide');
        });
    });
</script>
