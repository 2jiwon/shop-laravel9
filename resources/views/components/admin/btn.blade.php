@props(['type', 'type2', 'click', 'click2'])

@php
$base_class = 'inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs uppercase tracking-widest shadow-sm';

switch ($type2) {
    case 'submit':
        $v_class = ' bg-amber-400 hover:bg-amber-600 focus:bg-amber-600';
        break;
    case 'cancel':
        $v_class = ' bg-gray-300 hover:bg-gray-400 focus:bg-gray-400';

    default:
        # code...
        break;
}

$click  = empty($click)  ? [] : ['onclick' => $click];
$click2 = empty($click2) ? [] : ['@click' => $click2];

@endphp

<button {{ $attributes->merge($click)->merge($click2)->merge(['type' => $type, 'class' => $base_class.$v_class]) }}>
    {{ $slot }}
</button>

