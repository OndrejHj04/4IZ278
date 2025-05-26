<x-sidebar>
    @guest
        <div>no signed in</div>
    @endauth

    @auth
        <div>signed in</div>
    @endauth
</x-sidebar>