@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block w-full pl-3 pr-4 py-2 border-l-4 border-teal-500 text-left text-sm font-medium text-teal-700  bg-teal-50  focus:outline-none transition duration-150 ease-in-out'
            : 'block w-full pl-3 pr-4 py-2 border-l-4 border-transparent text-left text-sm font-medium text-gray-600  hover:text-gray-800 :text-gray-200 hover:bg-gray-50 :bg-gray-700/50 hover:border-gray-300 :border-gray-600 focus:outline-none transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
