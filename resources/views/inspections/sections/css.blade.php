<style>
    h1 {
        text-align: center;
    }
    h1, h2, h3 {
        font-family: Montserrat, sans-serif;
    }
    h1, h2 {
        margin-bottom: 3px;
    }
    h1 {
        font-size: 1.7rem;
    }
    h2{
        font-size: 1.2rem;
    }
    h3 {
        font-size: 0.7rem;
        text-transform: uppercase;
    }
    p {
        font-family: Montserrat, sans-serif;
        font-size: 14px;
        margin: 5px;
        font-weight: normal;
    }
    .img-fluid img {
        max-width: 100%;
        height: auto;
    }

    .inspection-information {
        page-break-after: always;
    }

    strong {
        margin-bottom: 0;
        padding-right: 8px;
        font-weight: bold;
    }

    .table {
        font-family: Montserrat, sans-serif;
        border-collapse: collapse;
        width: 100%;
        padding-top: 15px;
    }

    section {
        page-break-inside: avoid !important;
    }

    /*Table*/
    .table td, .table th {
        border: 1px solid #ddd;
        padding: 8px;
    }
    .table tr:nth-child(even){background-color: #f2f2f2;}
    .table th {
        text-align: left;
        color: white;
        background-color:  #f2f2f2;
        font-size: 14px;
        page-break-before: always;
        font-weight: normal;
    }
    .row--head th {
        background-color: rgba(36, 50, 74, 0.7); !important;
        text-transform: uppercase;
    }
    .row--head--list tr {
        padding: 2rem;
    }
    .row--head--list th {
        background-color: rgba(36, 50, 74, 0.7); !important;
        opacity: 0.8;
        padding: 0.2rem;
    }
    .damages th {
        background-color: rgba(74, 36, 42, 0.7); !important;
        opacity: 0.8;
        padding: 0.2rem;
    }
    .row--head--list th:first-child {
        width: 65%;
    }
    .row--text th {
        background-color: transparent;
        color: black;
        border: none;
        border-bottom: 1px solid  #f2f2f2; !important;
        font-weight: normal;
        margin: 0;
        padding: 0;
    }
    .row--text--list th {
        background-color: transparent;
        color: black;
        border: none;
        border-bottom: 1px solid  #f2f2f2; !important;
        padding: 0;
        font-weight: normal;
    }
    .textareaExtra th {
        max-width: 200px;
        padding: 1rem 0;
        font-size: 11px;
        font-weight: normal;
    }

    .icon {
        margin-right: 250px;
    }
    .date-title {
        font-size: 13px;
        margin-bottom: 5px;
    }

    .renderImage img {
        page-break-inside: avoid;
        padding: 2rem 0;
        width: 50%;
        background-color: transparent;
        border: none;
    }
    .img--cover {
        aspect-ratio: 3/2;
    }

    .column {
        float: left;
        width: 32.775%;
        margin-right: 5px;
    }

    .column-half {
        float: left;
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

    .keep {
        page-break-inside: avoid !important;
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

    .main-sig {
        page-break-before: initial;
        position: fixed;
        bottom: 0;
        left: 0px;
        right: 0px;
    }

    .spacer {
        height: 100px;
    }

    .slot {
        page-break-before: always;
    }

    .marker {
        width: 30px;
        height: 18px;
        background-color: yellow;
    }

    .break {
        page-break-after: always;
    }

</style>
