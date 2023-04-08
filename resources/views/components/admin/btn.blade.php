@props(['type', 'for', 'click', 'xclick'])

@php
$base_class = 'inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs uppercase tracking-widest shadow-sm';

switch ($for) {
    case 'submit':
        $v_class = ' bg-amber-400 hover:bg-amber-600 focus:bg-amber-600';
        break;
    case 'cancel':
        $v_class = ' bg-gray-300 hover:bg-gray-400 focus:bg-gray-400';
        break;
    default:
        # code...
        break;
}

$click  = empty($click)  ? [] : ['onclick' => $click];
$xclick = empty($xclick) ? [] : ['@click' => $xclick];

@endphp

<button {{ $attributes->merge($click)->merge($xclick)->merge(['type' => $type, 'class' => $base_class.$v_class]) }}>
    {{ $slot }}
</button>

