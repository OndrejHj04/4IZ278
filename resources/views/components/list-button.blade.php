<li>
    <div class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
      <button type="submit" {{ $attributes->class(['ms-3']) }}>
          {{ $slot }}
      </button>
    </div>
</li>