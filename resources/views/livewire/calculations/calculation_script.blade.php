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

</script>
