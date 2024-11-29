<style>
    /* Container styling */
    .damage-container {
        border: 1px solid #ddd;
        border-radius: 8px;
        margin-bottom: 20px;
        padding: 0;
        background-color: #fff;
    }

    /* Header styling */
    .damage-header {
        padding: 15px;
        font-size: 16px;
        font-weight: bold;
        display: flex;
        justify-content: space-between;
        border-radius: 8px 8px 0 0;
    }

    .damage-header.bg-dark {
        background-color: #343a40; /* Dark background */
        color: #fff; /* White text */
    }

    .damage-date {
        font-size: 14px;
        font-weight: normal;
        color: #ccc;
    }

    /* Table styling */
    .damage-table, .calculation-table {
        width: 100%;
        border-collapse: collapse;
        margin: 0;
    }

    .damage-table th, .damage-table td, .calculation-table th, .calculation-table td {
        padding: 10px;
        text-align: left;
    }

    .damage-table th {
        background-color: #f8f9fa;
        font-weight: bold;
    }

    /* Column widths */
    .title-column {
        width: 30%; /* Breder voor de titel */
    }

    .location-column {
        width: 20%; /* Breder voor locatie details */
    }

    .description-column {
        width: 65%; /* Plaatst beschrijving aan het einde */
    }

    .approved-column {
        width: 5%; /* Kleinste kolom voor checkbox */
    }

    /* Calculation container styling */
    .calculation-container {
        margin-top: 10px;
        padding: 10px;
        background-color: #f7f7f7;
        border-top: 1px solid #ddd;
        border-radius: 0 0 8px 8px;
    }

    .calculation-table th {
        background-color: #f1f1f1;
    }

    /* Minder borders */
    .damage-table th, .damage-table td, .calculation-table th, .calculation-table td {
        border-bottom: 1px solid #ddd;
    }

    .damage-table tr:last-child td, .calculation-table tr:last-child td {
        border-bottom: none;
    }

    /* Rechts uitlijnen voor totalen */
    .text-right {
        text-align: right;
    }

    .font-weight-bold {
        font-weight: bold;
    }

    .calculation-summary .summary-value {
        text-align: right;
        display: inline-block;
        width: 100%;
    }

    /* Extra styling voor samenvattingen */
    .calculation-summary .summary-label {
        display: inline-block;
        width: 70%;
    }

    .calculation-table th:last-child, .calculation-table td:last-child {
        width: 10%; /* Halve breedte van de originele 'Totaal'-kolom */
        text-align: right; /* Rechts uitlijnen van cijfers */
    }
</style>
