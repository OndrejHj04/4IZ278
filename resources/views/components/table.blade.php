@props(["dataLength"])

<div class="flex-1 relative overflow-x-auto shadow-md sm:rounded-lg {{ $dataLength % 2 === 1 ? 'bg-gray-800' : 'bg-gray-900' }}">
    <table class="w-full text-sm text-left rtl:text-right text-gray-400">
        {{ $slot }}
    </table>
</div>