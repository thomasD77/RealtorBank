<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Category Dropdown
        var categoryButton = document.getElementById('categoryDropdownButton');
        var categoryMenu = document.getElementById('categoryDropdownMenu');

        categoryButton.addEventListener('click', function(event) {
            event.stopPropagation(); // Prevent the click event from bubbling up
            categoryMenu.classList.toggle('show');
            subcategoryMenu.classList.remove('show'); // Ensure other dropdown is closed
        });

        // Subcategory Dropdown
        var subcategoryButton = document.getElementById('subcategoryDropdownButton');
        var subcategoryMenu = document.getElementById('subcategoryDropdownMenu');

        subcategoryButton.addEventListener('click', function(event) {
            event.stopPropagation(); // Prevent the click event from bubbling up
            subcategoryMenu.classList.toggle('show');
            categoryMenu.classList.remove('show'); // Ensure other dropdown is closed
        });

        // Close dropdowns if the user clicks outside of them
        window.addEventListener('click', function() {
            categoryMenu.classList.remove('show');
            subcategoryMenu.classList.remove('show');
        });
    });

</script>
