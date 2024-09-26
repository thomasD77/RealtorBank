<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }
    th, td {
        border: 1px solid #ddd;
        padding: 8px;
    }
    th {
        background-color: #f2f2f2;
        text-align: left;
    }
    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    /* Dropdown container */
    .custom-dropdown {
        position: relative;
        display: inline-block;
        width: 100%;
    }

    /* Dropdown container */
    .custom-dropdown {
        position: relative;
        display: inline-block;
    }

    /* Dropdown button styling */
    .custom-dropdown-btn {
        background-color: #343a40;
        color: white;
        padding: 10px 20px;
        font-size: 16px;
        border: none;
        cursor: pointer;
        border-radius: 5px;
        width: 100%;
        text-align: left;
    }

    /* Dropdown content (initially hidden) */
    .custom-dropdown-content {
        display: none;
        position: absolute;
        z-index: 9999; /* Hoge z-index om boven andere elementen te verschijnen */
        background-color: white;
        min-width: 100%;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
        border-radius: 5px;

        max-height: 500px; /* Max hoogte voor de dropdown, zodat het scrollable wordt */
        overflow-y: auto; /* Voeg een scrollbar toe als de content groter is dan 300px */
    }

    /* Dropdown links */
    .custom-dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    /* Change color of dropdown links on hover */
    .custom-dropdown-content a:hover {
        background-color: #f1f1f1;
    }

    /* Show the dropdown content on click */
    .show {
        display: block;
    }

    /* Active dropdown item */
    .custom-dropdown-content a.active {
        background-color: #343a40;
        color: white;
    }

    .dashborad-box {
        margin-bottom: 200px;
    }

    .table th, .table td {
        vertical-align: middle;
        text-align: center;
    }

    .card-header {
        font-size: 1.25rem;
        font-weight: 600;
    }

    .table h5 {
        background-color: #f8f9fa;
        padding: 10px;
        border-radius: 5px;
    }

    .text-center .fa {
        font-size: 1.2rem;
    }

    .text-success {
        color: #28a745 !important;
    }

    .text-danger {
        color: #dc3545 !important;
    }

    .btn-sm {
        padding: 5px 10px;
    }



</style>
