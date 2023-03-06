@props(['key'])

@php
$base_class = 'text-xs focus:outline-none text-white focus:ring-4 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 ';
$v_class = ' text-gray-900 bg-white border border-gray-300 hover:bg-gray-100 focus:ring-gray-200 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700';
switch ($key) {
    case '0':
        $v_class = ' bg-red-700 hover:bg-red-800 focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800';
        break;
    case '2':
        $v_class = ' bg-green-700 hover:bg-green-800 focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800';
        break;
    case '3':
        $v_class = ' bg-purple-500 hover:bg-purple-600 focus:ring-purple-400 dark:focus:ring-purple-900';
        break;
    case '4':
        $v_class = ' bg-yellow-500 hover:bg-yellow-600 focus:ring-yellow-400 dark:focus:ring-yellow-900';
        break;
    case '6':
        $v_class = ' bg-blue-700 hover:bg-blue-800 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800';
        break;
    case '7':
        $v_class = ' bg-green-700 hover:bg-green-800 focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800';
        break;
    
    default:
        # code...
        break;
}

@endphp

<button type="button" {{ $attributes->merge(['class' => $base_class.$v_class])}}>
    {{ $slot }}
</button>