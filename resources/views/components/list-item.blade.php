@props(['link', 'disabled' => false])

<li {{ $attributes }}>
    <a href="{{ $link }}" @class(["flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700", 'cursor-default pointer-events-none opacity-50' => $disabled])>
       <span class="ms-3">{{ $slot }}</span>
    </a>
</li>