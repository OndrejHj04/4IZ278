<div class="flex flex-1 min-h-full flex-col justify-center">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        <h2 class="mt-10 text-center text-2xl font-bold tracking-tight text-gray-900">Welcome to Chata app</h2>
        <p class="mt-2 text-center text-sm font-bold tracking-tight text-gray-700">Login to continue</p>
    </div>

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        <form class="space-y-6" action="{{ route('login') }}" method="POST">
            @csrf

            <x-input type="email" name="email">Email address</x-input>
            <x-input type="password" name="password">Password</x-input>
            <x-button type="submit">Sign in</x-button>
            @if ($errors->has('credentials'))
                <p class="text-center text-red-500 font-semibold">You have provided wrong credentials!</p>
            @endif
            
        </form>

        <p class="mt-10 text-center text-sm/6 text-gray-500">
            No account?
            <a href={{route('show.register')}} class="font-semibold text-indigo-600 hover:text-indigo-500">Create one here!</a>
        </p>
    </div>
</div>
