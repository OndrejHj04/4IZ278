<x-sidebar>
    @guest
        <x-login-form/>
    @endguest

    @auth

    @endauth
</x-sidebar>