<x-sidebar>
    @guest
        @include('auth.components.register-form')
    @endguest
</x-sidebar>