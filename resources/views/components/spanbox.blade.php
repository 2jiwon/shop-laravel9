@props(['status'])

@php
$base_class = 'border px-4 py-3 inline-block rounded font-hk ';
$add_class = '';

switch ($status) {
    case 0:
        $add_class = 'bg-v-pink border-v-red text-v-red';
        break;
    case 1:
        $add_class = 'bg-primary-lightest border border-primary-light text-primary';
        break;
    case 2:
        $add_class = 'bg-v-green-light border border-v-green text-v-green';
        break;
    case 3:
        $add_class = 'bg-primary-lightest border border-primary-light text-primary';
        break;
    case 4:
        $add_class = 'bg-v-blue-light border border-v-blue text-v-blue';
        break;
    case 5:
        $add_class = 'bg-v-blue-light border border-v-blue-dark text-v-blue-dark';
        break;
    case 6:
        $add_class = 'bg-v-blue-light border border-v-blue text-v-blue';
        break;
    case 7:
        $add_class = 'bg-v-orange-light border border-v-orange text-v-orange';
        break;
    case 8:
        $add_class = 'bg-v-purple-light border border-v-purple text-v-purple';
        break;
    default:
        break;
}
@endphp

<span {{ $attributes->merge(['class' => $base_class.$add_class]) }}>{{ $slot }}</span>