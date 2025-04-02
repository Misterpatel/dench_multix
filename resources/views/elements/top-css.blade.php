<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description"
        content="Manage Leads, Job order & distribution for your business from single system. Complete business management system: Biz Setu.">
    <!-- <meta name="author" content="Spruko Technologies Private Limited"> -->
    <meta name="keywords"
        content="Manage Leads, Job order & distribution for your business from single system. Complete business management system: Biz Setu.">

    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/images/brand/favicon.ico')}}" />

    <!-- TITLE -->
    <title>Business Management System</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- BOOTSTRAP CSS -->
    <link id="style" href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" />

    <!-- STYLE CSS -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/dark-style.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/transparent-style.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/skin-modes.css')}}" rel="stylesheet" />

    <!--- FONT-ICONS CSS -->
    <link href="{{asset('assets/css/icons.css')}}" rel="stylesheet" />

    <!-- COLOR SKIN CSS -->
    <link id="theme" rel="stylesheet" type="text/css" media="all" href="{{asset('assets/colors/color1.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/toastr.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/toastr.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/sweetalert2.min.css')}}">
<!-- Summernote CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.css" rel="stylesheet">

    <style>
        .error {
            color: red;
        }

        .select2-container {
            width: 100% !important;
        }

        .heading {
            background-color: #f0f0f0;
            display: block;
            width: 100%;
            border-radius: 5px;
            height: 25px;
            margin-top: 20px;
            margin-bottom: 20px;
            font-weight: 800;
            text-align: center;
            color: black;
        }

        .border-left {
            border-left: 1px solid #dbdbdb;
        }

        .border-right {
            border-right: 1px solid #dbdbdb;
        }

        .border-bottom {
            border-bottom: 1px solid #dbdbdb;
        }

        .border-top {
            border-top: 1px solid #dbdbdb;
        }

        .blue-thick-border {
            border: 5px solid #05c3fb;
            border-radius: 5px;
        }

        .c3-chart-arcs {
            transform: translate(368.3999938964844px, 153px);
        }

        h2 {
            margin-bottom: 20px;
        }

        .form-section {
            display: flex;
            justify-content: space-between;
        }

        .zone-container {
            width: 45%;
        }


        select,
        input,
        p {
            display: block;
            margin-bottom: 10px;
        }

        select,
        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
        }

        .outlet-list {
            list-style-type: none;
            padding: 0;
            border: 1px solid #ddd;
            height: 200px;
            overflow-y: auto;
        }

        .outlet-list li {
            padding: 8px;
            border-bottom: 1px solid #ddd;
            cursor: move;
        }

        .outlet-list li:last-child {
            border-bottom: none;
        }

        .save-btn {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .container {
        display: flex;
        margin: 20px;
    }

    .calendar,
    .draggable-list {
        background-color: white;
        border-radius: 5px;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .calendar {
        flex: 1;
        margin-right: 20px;
    }

    .draggable-list {
        flex: 0.5;
        display: flex;
        flex-direction: column;
    }

    #calendar {
        width: 100%;
        border-collapse: collapse;
    }

    #calendar th,
    #calendar td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: center;
    }

    /* Make <strong> tags bold */
    strong {
        font-weight: bold;
    }

    .pjp-settings {
        margin-top: 20px;
    }

    .pjp-settings label {
        display: block;
        margin-bottom: 5px;
    }

    .pjp-settings input,
    .pjp-settings select {
        margin-bottom: 10px;
        width: 100%;
    }

    .pjp-settings input[type="date"],
    .pjp-settings input[type="number"] {
        padding: 5px;
        font-size: 1em;
        margin-left: 5px;
    }

    .user-info {
        margin-bottom: 20px;
    }

    .beat-list {
        flex: 1;
        overflow-y: auto;
        /* Allow scrolling if content overflows */
    }

    #beats {
        list-style-type: none;
        padding: 0;
        margin: 0;
        max-height: 200px;
        /* Set a fixed height for the list container */
        overflow-y: auto;
        /* Adds a vertical scrollbar if content exceeds max-height */
    }

    #beats li {
        padding: 10px;
        margin: 5px 0;
        background-color: lightblue;
        border-radius: 3px;
        cursor: move;
        /* Indicate draggable items */
    }


    #save-pjp {
        margin-top: 10px;
        padding: 10px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    #save-pjp:hover {
        background-color: #0056b3;
    }

    /* Highlight today's date with a blue background */
    .today {
        background-color: lightblue;
        color: black;
        font-weight: bold;
    }

    /* Highlight the range of dates with a different background color */
    .highlight {
        background-color: lightblue;
        color: black;
    }

    /* Additional styling for calendar controls */
    .calendar-controls {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 10px;
    }

    .calendar-controls button {
        padding: 5px;
        margin: 0 5px;
        cursor: pointer;
    }

    .calendar-controls span {
        font-size: 1.2em;
        margin: 0 10px;
    }

    .dropped-item {
        background-color: #e0e0e0;
        border-radius: 3px;
        padding: 5px;
        margin: 5px 0;
        font-size: 0.9em;
        color: #333;
        box-sizing: border-box;
        width: 100%;
        overflow: hidden;
    }

    #calendar td {
        height: 50px;
        width: 14%;
        box-sizing: border-box;
        overflow: hidden;
        position: relative;
    }

    /* Increase size of search input */
    #search {
        width: 100%;
        padding: 10px;
        font-size: 1em;
        margin-bottom: 10px;
    }

    .pjp-settings label {
        font-weight: bold;
    }

    </style>
</head>
