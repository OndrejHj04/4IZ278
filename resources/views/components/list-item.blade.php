@props(['link', 'createLink', 'disabled' => false])

<li {{ $attributes->class([
        'flex text-gray-900 rounded-lg text-white transition-all group hover:bg-gray-100 hover:bg-gray-700 items-center',
        'cursor-default pointer-events-none opacity-50' => $disabled
    ]) }}>
    <a href="{{ $link }}" class="flex-1 p-2">
       {{ $slot }}
    </a>
</li>