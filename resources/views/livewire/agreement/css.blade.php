<style>
    .m-signature-pad {
        position: relative;
        font-size: 10px;
        width: 700px;
        height: 400px;
        top: 50%;
        left: 50%;

        border: 1px solid #e8e8e8;
        background-color: #fff;
        /*box-shadow: 0 1px 4px rgba(0, 0, 0, 0.27), 0 0 40px rgba(0, 0, 0, 0.08) inset;*/
        border-radius: 4px;
    }

    .m-signature-pad:before, .m-signature-pad:after {
        position: absolute;
        z-index: -1;
        content: "";
        width: 40%;
        height: 10px;
        left: 20px;
        bottom: 10px;
        background: transparent;
        -webkit-transform: skew(-3deg) rotate(-3deg);
        -moz-transform: skew(-3deg) rotate(-3deg);
        -ms-transform: skew(-3deg) rotate(-3deg);
        -o-transform: skew(-3deg) rotate(-3deg);
        transform: skew(-3deg) rotate(-3deg);
        /*box-shadow: 0 8px 12px rgba(0, 0, 0, 0.4);*/
    }

    .m-signature-pad:after {
        left: auto;
        right: 20px;
        -webkit-transform: skew(3deg) rotate(3deg);
        -moz-transform: skew(3deg) rotate(3deg);
        -ms-transform: skew(3deg) rotate(3deg);
        -o-transform: skew(3deg) rotate(3deg);
        transform: skew(3deg) rotate(3deg);
    }

    .m-signature-pad--body {
        position: absolute;
        left: 20px;
        right: 20px;
        top: 20px;
        bottom: 80px;
        border: 1px solid #f4f4f4;
    }

    .m-signature-pad--body
    canvas {
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        border-radius: 4px;
        /*box-shadow: 0 0 5px rgba(0, 0, 0, 0.02) inset;*/
    }

    .m-signature-pad--footer {
        position: absolute;
        left: 20px;
        right: 20px;
        bottom: 20px;
        height: 60px;
    }

    .m-signature-pad--footer
    .description {
        color: #C3C3C3;
        text-align: center;
        font-size: 1.2em;
        margin-top: 1em;
    }

    .m-signature-pad--footer
    .left, .right {
        position: absolute;
        bottom: 0;
    }

    .m-signature-pad--footer
    .left {
        left: 0;
    }

    .m-signature-pad--footer
    .right {
        right: 0;
    }

    @media screen and (max-width: 1024px) {
        .m-signature-pad {
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            width: auto;
            height: auto;
            min-width: 250px;
            min-height: 250px;
            margin: 5%;
        }
        #github {
            display: none;
        }
    }

    @media screen and (min-device-width: 768px) and (max-device-width: 1024px) {
        .m-signature-pad {
            margin: 10%;
        }
    }

    @media screen and (max-height: 320px) {
        .m-signature-pad--body {
            left: 0;
            right: 0;
            top: 0;
            bottom: 32px;
        }
        .m-signature-pad--footer {
            left: 20px;
            right: 20px;
            bottom: 4px;
            height: 28px;
        }
        .m-signature-pad--footer
        .description {
            font-size: 1em;
            margin-top: 1em;
        }
    }

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

</style>
