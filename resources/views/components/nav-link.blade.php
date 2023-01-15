@props(['active'])

@php
$classes = ($active ?? false)
            ? 'transition-all hover:font-bold hover:text-secondary px-4 py-3 border-l-2 border-primary hover:border-secondary font-dohyeon text-2xl font-bold text-primary'
            : 'transition-all hover:font-bold hover:text-secondary px-4 py-3 border-l-2 border-gray-300 hover:border-secondary  font-dohyeon text-2xl text-grey-darkest';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
