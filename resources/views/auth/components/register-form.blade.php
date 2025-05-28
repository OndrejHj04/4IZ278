<div class="flex flex-1 min-h-full flex-col justify-center px-6 py-12 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900">Welcome to Chata app</h2>
        <p class="mt-2 text-center text-sm font-bold tracking-tight text-gray-700">Create your account!</p>
    </div>

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        <form class="space-y-6" action="{{ route('register') }}" method="POST">
            @csrf

            <x-input type="text" name="first_name">First name</x-input>
            <x-input type="text" name="last_name">Last name</x-input>
            <x-input type="email" name="email">Email address</x-input>
            <x-input type="date" name="birth_date">Birth date</x-input>
            <x-input type="password" name="password">Password</x-input>
            <x-input type="password" name="password_confirmation">Confirm password</x-input>

            <x-button type="submit">Register</x-button>
        </form>

        <p class="mt-10 text-center text-sm/6 text-gray-500">
           Already have an account?
            <a href={{route('show.login')}} class="font-semibold text-indigo-600 hover:text-indigo-500">Login here!</a>
        </p>
    </div>
</div>
