@php
use App\Helpers\DateFormatter;
@endphp

<x-sidebar>
    <div>
        <p>Name: {{ $user->fullName() }}</p>
        <p>Role: {{ $user->role }}</p>
        <p>Email: {{ $user->email }}</p>
        <p>Birth date: {{ DateFormatter::formatDate($user->birth_date) }}</p>
        <p>Created at: {{ DateFormatter::formatDate($user->created_at) }}</p>
        <p>Updated at: {{ DateFormatter::formatDate($user->update_at) }}</p>
    </div>
</x-sidebar>