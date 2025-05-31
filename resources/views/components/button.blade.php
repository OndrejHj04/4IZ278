@props(['theme' => 'primary', 'disabled' => false])

@php
    $base_classes = "flex w-full justify-center rounded-md px-3 py-1.5 text-sm text-sm/6 font-semibold shadow-xs cursor-pointer disabled:cursor-not-allowed disabled:opacity-50";
    $theme_classes = '';

    switch($theme){
        case 'primary':
            $theme_classes = ' bg-blue-600 hover:bg-blue-500 text-white';
            break;

        case 'error':
            $theme_classes = ' bg-red-600 hover:bg-red-500 text-white';
            break;
    }

    $classes = $base_classes . $theme_classes;
@endphp

<button
    {{ $attributes->merge(['class'=>$classes, 'disabled' => $disabled]) }}
>{{ $slot }}</button>