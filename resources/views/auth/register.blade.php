<x-sidebar>
    @guest
        <x-register-form />
    @endguest

    @auth

    @endauth
</x-sidebar>