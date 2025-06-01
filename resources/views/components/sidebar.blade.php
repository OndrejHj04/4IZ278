@vite('resources/css/app.css')
 
 <aside id="default-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
    <ul class="h-full px-3 py-4 overflow-y-auto bg-gray-800 flex flex-col">

          <x-list-item link="{{ route('home') }}">Home</x-list-item>
          <x-list-item link="{{ route('reservations.index') }}" createLink="{{ route('reservations.create') }}" :disabled="!auth()->check()">Reservations</x-list-item>
          <x-list-item link="{{ route('users.index') }}" :disabled="!auth()->check()">Users</x-list-item>

          @admin
            <x-list-item link="{{ route('notifications.index') }}">Notifications</x-list-item>
          @endadmin
        
          @auth
            <form class="mt-auto" action="{{ route('logout') }}" method="POST">
                @csrf
                <x-list-button class="text-red-500">Logout</x-list-button>
            </form>
          @endauth
    </ul>
 </aside>
 
<div {{ $attributes->merge(["class"=>"flex p-4 sm:ml-64 h-screen gap-6" ]) }}>
  {{ $slot }}
</div>