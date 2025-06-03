@php
use App\Helpers\DateFormatter;
@endphp

<x-sidebar>
    <div class="flex-1 flex flex-col gap-2">
        <x-table :dataLength="count($users) ">
            <x-table-head>
                <x-table-cell header>
                    Name
                </x-table-cell>
                <x-table-cell header>
                    Email
                </x-table-cell>
                <x-table-cell header>
                    Birth date
                </x-table-cell>
                <x-table-cell header>
                    Role
                </x-table-cell>
                <x-table-cell header>
                    Joined
                </x-table-cell>
                <x-table-cell header />
            </x-table-head>
            <x-table-body>
                @foreach ($users as $user)
                    <x-table-row>
                        <x-table-cell>
                            {{ $user->first_name . ' ' . $user->last_name }}
                        </x-table-cell>
                        <x-table-cell>
                            {{ $user->email }}
                        </x-table-cell>
                        <x-table-cell>
                            {{ DateFormatter::formatDate($user->birth_date) }}
                        </x-table-cell>
                        <x-table-cell>
                            {{ $user->role }}
                        </x-table-cell>
                        <x-table-cell>
                            {{ DateFormatter::formatTimestamp($user->created_at) }}
                        </x-table-cell>
                        <x-table-cell>
                            <a href="{{route('users.show', $user->id)}}" class="text-blue-600 font-semibold underline">Detail</a>
                        </x-table-cell>
                    </x-table-row>
                @endforeach
            </x-table-body>
        </x-table>
    </div>
</x-sidebar>