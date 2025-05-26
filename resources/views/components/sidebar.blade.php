@vite('resources/css/app.css')
 
 <aside id="default-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
    <ul class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800 flex flex-col">

          <x-list-item link="/">Home</x-list-item>
          <x-list-item link="/reservations">Reservations</x-list-item>
          <x-list-item link="/users">Users</x-list-item>
        
          @auth
            <form class="mt-auto" action="{{ route('logout') }}" method="POST">
                @csrf
                <x-list-button class="text-red-500">Logout</x-list-button>
            </form>
          @endauth
    </ul>
 </aside>
 
 <div class="p-4 sm:ml-64">
    {{ $slot }}
 </div>