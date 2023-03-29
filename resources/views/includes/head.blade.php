<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="html 5 template">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>RealtorBank</title>

    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i%7CMontserrat:600,800" rel="stylesheet">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Fancybox -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css"
    />

    <!-- Signature  -->
    @include('includes.signature.script-1')
    @include('includes.signature.script-2')
    @include('includes.signature.script-3')
    @include('includes.signature.script-4')
    @include('includes.signature.script-5')
    <script type="text/javascript" src="{{ asset('assets/signature/jquery.ui.touch-punch.min.js') }}"></script>

    @vite(['resources/js/main.js'])

    @livewireStyles
</head>
