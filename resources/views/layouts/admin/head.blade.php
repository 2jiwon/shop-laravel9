<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ADMIN') }}</title>

    <meta name="description" content="">

    <!-- Tailwind -->
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet"> -->
    @vite(['resources/css/app.css'])
    
    <!-- custom css -->
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}"/>

    <!-- Tinymce -->
    <script src="https://cdn.tiny.cloud/1/ttm2ripndo2cw7gbv5crh3gxgykustof3wq45gb3rsmx885j/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
    tinymce.init({
        selector: '#detail',
        height: 300, 
        menubar: 'edit format'
    });

    tinymce.init({
        selector: '#edit_detail',
        height: 300, 
        menubar: 'edit format'
    });
    </script>
</head>
<body class="bg-gray-100 flex">