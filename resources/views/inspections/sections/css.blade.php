<style>
    .img-fluid img {
        max-width: 100%;
        height: auto;
    }
    p {
        margin: 5px;
        font-weight: normal;
    }
    strong {
        margin-bottom: 0;
        padding-right: 8px;
        font-weight: bold;
    }
    h1, h2, h3 {
        font-family: Arial, Helvetica, sans-serif;
    }
    h3 {
        font-size: 0.7rem;
        text-transform: uppercase;
    }
    .table {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }
    section {
        page-break-inside: avoid;
    }

    .table td, .table th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    .table tr:nth-child(even){background-color: #f2f2f2;}

    .table th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        color: white;
        background-color:  #f2f2f2;
        font-size: 14px;
        page-break-before: always;
        font-weight: normal;
    }
    .row--head th {
        background-color: #31c77f !important;
    }
    .row--head--list tr {
        padding: 2rem;

    }
    .row--head--list th {
        background-color: rgba(36, 50, 74, 0.7); !important;
        opacity: 0.8;
        padding: 0.2rem;
    }
    .row--text th {
        background-color: transparent;
        color: black;
        border: none;
        border-bottom: 1px solid  #f2f2f2; !important;
        font-weight: normal;
    }
    .row--text--list th {
        background-color: transparent;
        color: black;
        border: none;
        border-bottom: 1px solid  #f2f2f2; !important;
        padding: 0;
        font-weight: normal;
    }
    .icon {
        margin-right: 250px;
    }
    .date-title {
        font-size: 13px;
        margin-bottom: 5px;
        font-style: italic;
    }
    .textareaExtra th {
        max-width: 200px;
        padding: 1rem 0;
        font-size: 11px;
        font-weight: normal;
    }
    .renderImage img {
        page-break-inside: avoid;
        padding: 2rem 0;
        width: 50%;
        background-color: transparent;
        border: none;
    }

    .column {
        float: left;
        width: 33%;
        margin-bottom: 2px;
    }

    .column img {
        max-width: 95%;
    }

    /* Clear floats after the columns */
    .row:after {
        content: "";
        display: table;
        clear: both;
        padding-bottom: 2rem;
    }

</style>
