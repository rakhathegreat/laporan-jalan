@props(['kondisi' => 'Baik'])

@php
    $classes = [
        'Baik' => 'px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800',
        'Rusak' => 'px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800',
        'Rusak Berat' => 'px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800',
    ];

    $defaultClass = 'px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800';
@endphp

<p {{ $attributes->merge(['class' => $classes[$kondisi] ?? $defaultClass]) }}>
    {{ $slot }}
</p>
