@php
use App\Helpers\DateFormatter;
use App\UserRole;
@endphp

<x-sidebar>
    <div class="space-y-3" action="">
        @admin
            <form class="space-y-6" action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <x-input name="first_name" :value="$user->first_name">First name</x-input>
                <x-input name="last_name" :value="$user->last_name">Last name</x-input>
                <x-select name="role" :value="$user->role" :options="UserRole::toOptions()">Role</x-select>
                <x-input type="date" name="birth_date" :value="$user->birth_date">Birth date</x-input>
                <x-button type="submit">Edit</x-button>
            </form>
        @else
            <p>Name: {{ $user->fullName() }}</p>      
            <p>Role: {{ $user->role }}</p>
        @endadmin        
        <p>Email: {{ $user->email }}</p>
        <p>Birth date: {{ DateFormatter::formatDate($user->birth_date) }}</p>
        <p>Created at: {{ DateFormatter::formatTimestamp($user->created_at) }}</p>
        <p>Updated at: {{ DateFormatter::formatTimestamp($user->update_at) }}</p>
    </div>
</x-sidebar>