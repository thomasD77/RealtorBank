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
</style>
