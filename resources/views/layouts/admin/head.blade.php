<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <meta name="description" content="">

    <!-- Tailwind -->
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet"> -->
    @vite(['resources/css/app.css'])
    
    <!-- custom css -->
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}"/>

    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');
        .font-family-karla { font-family: karla; }
        .bg-sidebar { background: #118ab2; }
        .cta-btn { color: #118ab2; }
        .upgrade-btn { background: #073b4c; }
        .upgrade-btn:hover { background: #0038fd; }
        .active-nav-link { background: #073b4c; }
        .nav-item:hover { background: #073b4c; }
        .account-link:hover { background: #118ab2; }
    </style>

     <!-- Tinymce -->
     <script src="https://cdn.tiny.cloud/1/ttm2ripndo2cw7gbv5crh3gxgykustof3wq45gb3rsmx885j/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
        <script>
        tinymce.init({
            selector:'#detail',
            height: 300, 
            menubar: 'edit format'
        });
        </script>
</head>
<body class="bg-gray-100 font-family-karla flex">