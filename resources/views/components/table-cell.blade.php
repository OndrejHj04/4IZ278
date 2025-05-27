@props(['header' => false])
<td @class([
    "px-6 py-4",
    'first-of-type:text-white first-of-type:font-semibold' => !$header
    ])>
    {{ $slot }}
</td>