<x-sidebar>
    @guest
        @include('auth.components.login-form')
    @endguest
</x-sidebar>