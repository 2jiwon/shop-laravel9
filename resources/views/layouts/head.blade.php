<!DOCTYPE html>
<html lang="ko">
  <head>
  <meta charset="utf-8"/>
  <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <title>Home | FANCYTANK SHOP</title>

  <meta property="og:title" content="Home | FANCYTANK SHOP"/>
  <meta property="og:locale" content="ko_KR"/>
  <meta name="theme-color" content="#118ab2"/>
  <meta property="og:url" content="https://shop.fancytank.com/"/>
  <meta name="description" content=""/>
  <meta property="og:site_name" content="FANCYTANK SHOP"/>
  <meta property="og:image" content=""/>

  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css"
    integrity="sha256-imWjOiEEAcjWdL1+inhBu1dWYFyXuiO9vpJVEQd3y/c="
    crossorigin="anonymous"/>

  <link
    rel="stylesheet"
    href="/assets/theme/styles/main.min.css"
    media="screen"
    crossorigin="anonymous"/>
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.6.12/dist/css/splide.min.css"/>
 
  @vite(['resources/css/app.css'])

  <link rel="stylesheet" href="{{ asset('assets/theme/styles/custom.css') }}"/>

  <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

  <style>
    	[x-cloak] { display: none; }
  </style>
</head>

<body
  x-data="{
      modal: false,
      mobileMenu: false,
      mobileSearch: false,
      mobileCart: false
  }"
  :class="{ 'overflow-hidden max-h-screen': modal || mobileMenu }"
  @keydown.escape="modal = false">
    
    <div id="main">

    @include('layouts.navigation')