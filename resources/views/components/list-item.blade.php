@props(['link', 'createLink', 'disabled' => false])

<li {{ $attributes->class([
        'flex text-gray-900 rounded-lg text-white transition-all group hover:bg-gray-100 hover:bg-gray-700 items-center',
        'cursor-default pointer-events-none opacity-50' => $disabled
    ]) }}>
    <a href="{{ $link }}" class="flex-1 p-2">
       {{ $slot }}
    </a>
    @if (isset($createLink))
        <a href="{{ $createLink }}" class="bg-purple-600 mx-2 text-white font-bold px-3 py-1 rounded-full flex items-center group-hover:opacity-100 opacity-0 justify-center text-sm transition-opacity duration-300 p-2">
            new
        </a> 
    @endif
</li>