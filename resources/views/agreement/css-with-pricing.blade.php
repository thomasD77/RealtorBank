<style>
    /* Table layout and column widths */
    .table {
        table-layout: fixed; /* Forces fixed column widths */
        width: 100%; /* Full width of the container */
        border-collapse: collapse; /* Removes spacing between table cells */
    }

    /* Styling table headers and cells */
    .table th, .table td {
        border: 1px solid #ddd;
        padding: 15px;
        vertical-align: top;
        text-align: left;
        word-wrap: break-word; /* Ensures text wraps within cells */
    }

    /* Specific column widths */
    .location-column {
        width: 20%; /* Adjusts the width of the first column */
    }
    .title-column{
        width: 20%; /* Equal width for the remaining columns */
    }
    .description-column{
        width: 50%; /* Equal width for the remaining columns */
    }
    .approved-column {
        width: 5%; /* Equal width for the remaining columns */
    }
    h1 {
        font-size: 1.7rem;
        font-family: Montserrat, sans-serif;
    }
    h2{
        font-size: 1.2rem;
        font-family: Montserrat, sans-serif;
    }
    h3 {
        font-family: Montserrat, sans-serif;
        font-size: 0.7rem;
        text-transform: uppercase;
    }
    p {
        font-family: Montserrat, sans-serif;
        font-size: 14px;
        margin: 5px;
        font-weight: normal;
    }
    strong {
        margin-bottom: 0;
        padding-right: 8px;
        font-weight: bold;
    }

    .table {
        border-collapse: collapse;
        width: 100%;
        padding-top: 50px;
        font-size: 0.8rem !important;
        font-family: Montserrat, sans-serif;
    }

    section {
        page-break-inside: avoid !important;
    }

    .column {
        float: left;
        width: 50%;
        margin-right: 5px;
    }

    .column-half {
        float: right;
        width: 50%;
        margin-right: 5px;
    }

    /* Clear floats after the columns */
    .row:after {
        content: "";
        display: table;
        clear: both;
        padding-bottom: 5px;
    }

    .signature img {
        width: 75%;
    }

    .column-sig {
        float: left;
        width: 33%;
    }
    header {
        position: fixed;
        top: -25px;
        left: 0px;
        right: 0px;

        font-size: 0.8rem !important;
        font-family: Montserrat, sans-serif;

        /** Extra personal styles **/
        background-color: rgba(135, 140, 155, 0.7);
        color: white;
        text-align: center;
        line-height: 1.3rem;
    }
    strong  {
        font-family: Montserrat, sans-serif;
    }
    footer {
        position: fixed;
        bottom: -25px;
        left: 0px;
        right: 0px;

        font-size: 0.8rem !important;
        font-family: Montserrat, sans-serif;

        /** Extra personal styles **/
        background-color: rgba(135, 140, 155, 0.7);
        color: white;
        text-align: center;
        line-height: 1.5rem;
    }

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
        page-break-inside: avoid;
        font-size: 0.8rem !important;
        font-family: Montserrat, sans-serif;

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
        margin-bottom: 0;

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

    /* General Table Styling */
    .summary-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        background-color: #f9f9f9;
        page-break-inside: avoid;

        font-size: 0.8rem !important;
        font-family: Montserrat, sans-serif;
    }

    .summary-table tfoot {
        background-color: #f7f7f7;
        font-weight: bold;
        border-top: 2px solid #ddd;
    }

    .summary-table td {
        padding: 10px;
        vertical-align: middle;
        text-align: left;
    }

    .summary-table .label-cell {
        text-align: right;
        padding-right: 15px;
        font-size: 14px;
        white-space: nowrap;
    }

    .summary-table .value-cell {
        text-align: right;
        font-size: 16px;
        width: 150px;
    }

    /* Input Styling */
    .summary-table .highlighted-input {
        font-size: 0.8rem !important;
        font-family: Montserrat, sans-serif;

        width: 120px;
        padding: 5px;
        border: 1px solid #ccc;
        border-radius: 4px;
        background-color: yellow;
        text-align: right;
    }

    /* Textarea Styling */
    .summary-table .remarks-field {
        width: 100%;
        height: 80px;
        padding: 8px;
        font-size: 14px;
        border: 1px solid #ccc;
        border-radius: 4px;
        resize: vertical;
        background-color: #fff;
    }

    /* Small Notes Styling */
    .summary-table small {
        font-style: italic;
        font-size: 12px;
        color: #666;
    }

    /* Focus Styling */
    .summary-table input:focus,
    .summary-table textarea:focus {
        background-color: #f0f8ff;
        outline: none;
        border-color: #80bdff;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.25);
    }
</style>
