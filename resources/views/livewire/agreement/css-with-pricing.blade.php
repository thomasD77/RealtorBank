<style>
    /* General Table Styling */
    .table {
        table-layout: fixed;
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
    }

    .table th, .table td {
        padding: 10px;
        text-align: left;
        word-wrap: break-word;
    }

    /* Specific Column Widths */
    .title-column {
        width: 30%;
    }

    .location-column {
        width: 20%;
    }

    .description-column {
        width: 40%;
    }

    .total-column {
        width: 10%;
        text-align: right;
    }
    .tax-column {
        width: 10%;
        text-align: right;
    }

    /* Damage Container Styling */
    .damage-container {
        margin-bottom: 20px;
        background-color: #fff;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    }

    .damage-header {
        padding: 10px;
        font-size: 16px;
        font-weight: bold;
        background-color: #343a40;
        color: #fff;
        display: flex;
        justify-content: space-between;
    }

    .damage-table tbody tr:not(:last-child) td {
        border-bottom: 1px solid #ddd;
    }

    /* Calculation Styling */
    .calculation-summary {
        font-weight: bold;
        background-color: #f7f7f7;
    }

    .calculation-summary td {
        border: none;
    }

    .text-right {
        text-align: right;
    }

    /* Reduced Borders */
    .table th {
        background-color: #f8f9fa;
        font-weight: bold;
        border-bottom: 1px solid #ddd;
    }

    .table td {
        border: none;
    }

    /* Highlight rows for summary */
    .calculation-summary {
        border-top: 2px solid #ddd;
        background-color: #fefefe;
    }

    .calculation-summary td {
        text-align: right; /* Rechterkant van de cel */
        padding-right: 10px; /* Extra ruimte aan de rechterkant */
    }

    .summary-label {
        float: left; /* Label aan de linkerkant van de cel */
        font-weight: normal; /* Eventueel aanpasbaar voor stijl */
    }

    .summary-value {
        float: right; /* Waarde aan de rechterkant van de cel */
        font-weight: bold; /* Eventueel aanpasbaar voor stijl */
    }


</style>
