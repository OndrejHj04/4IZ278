@props(['value'=>old($attributes->get('name'))])

<div >
    <div class="flex items-center justify-between">
        <label for="{{ $attributes->get('name') }}" class="block text-sm/6 font-medium text-gray-900">{{ $slot }}</label>
    </div>
    <div class="mt-2">
        <input {{ $attributes->merge(['id' => 'password_confirmation',  'type'=>'text']) }} required value="{{ $value }}"
            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
    </div>
    @error($attributes->get('name'))
        <p class="text-center text-red-500 font-semibold text-sm">{{ $message }}</p>
    @enderror
</div> 
