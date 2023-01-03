@props(['active', 'icon'])

@php
$base_classes = 'flex items-center text-white py-4 pl-6 nav-item ';
$a_classes = ($active) ? 'active-nav-link' : 'opacity-75 hover:opacity-100';

$i_classes = 'fas mr-3';
@endphp

<a {{ $attributes->merge(['class' => $base_classes.$a_classes]) }}>
    <i {{ $icon->attributes->class([$i_classes]) }}></i>
    {{ $slot }}
</a>
    