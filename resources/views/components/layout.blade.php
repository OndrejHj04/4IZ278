<div>
    <ul>
        <li>
            <a href="/">home</a>
        </li>

        @guest
            <li>
                <a href="/register">register</a>
            </li>
            <li>
                <a href="/login">login</a>
            </li>
        @endguest
        
        @auth
            <li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button>logout</button>
                </form>
            </li>
        @endauth
    </ul>
    {{ $slot }}
</div>