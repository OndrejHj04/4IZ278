@props(['value', 'options' => []])

<div>
    @if($slot->isNotEmpty())
        <div class="flex items-center justify-between mb-2">
            <label for="{{ $attributes->get('name') }}" class="block text-sm/6 font-medium text-gray-900">
                {{ $slot }}
            </label>
        </div>
    @endif
    <div>
        <select
            {{ $attributes->merge(['id' => $attributes->get('name')]) }}
            required
            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
        >
            @foreach ($options as $option)
                <option value="{{ $option }}" {{ $option == $value ? 'selected' : '' }}>{{ $option }}</option>
            @endforeach
        </select>
    </div>
    @error($attributes->get('name'))
        <p class="text-center text-red-500 font-semibold text-sm">{{ $message }}</p>
    @enderror
</div>