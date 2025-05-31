@php
use App\Helpers\DateFormatter;
use App\ReservationStatus;
@endphp

<x-sidebar>
    <div class="space-y-3" action="">
        @admin
            <form class="space-y-6" action="{{ route('reservations.update', $reservation->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <x-input name="name" :value="$reservation->name">Name</x-input>
                <x-select name="status" :value="$reservation->status" :options="ReservationStatus::toOptions()">Status</x-select>
                <x-input type="date" name="from_date" :value="$reservation->from_date">From</x-input>
                <x-input type="date" name="to_date" :value="$reservation->to_date">To</x-input>
                <x-button type="submit">Edit</x-button>
            </form>
        @else
            <p>Name: {{ $reservation->name}}</p>      
            <p>Status: {{ $reservation->status }}</p>
            <p>From: {{ DateFormatter::formatDate($reservation->from_date) }}</p>
            <p>To: {{ DateFormatter::formatDate($reservation->to_date) }}</p>
        @endadmin        
        <p>Created at: {{ DateFormatter::formatTimestamp($reservation->created_at) }}</p>
        <p>Updated at: {{ DateFormatter::formatTimestamp($reservation->update_at) }}</p>
        @admin
            <form method="POST" action="{{ route('reservations.destroy', $reservation->id)  }}">
                @csrf
                @method('DELETE')
                <x-button type="submit" theme="error">Delete</x-button>
            </form>
        @endadmin
    </div>
    <form method="POST" action="{{ route('reservations.remove-members', $reservation->id) }}" class="w-[500px] flex flex-col gap-2">
        @csrf
        <h2 class="text-center text-xl">Reservation members</h2>
        <x-table class="mb-2" dataLength="{{ count($reservation_members) }}">
            <x-table-body>
                @foreach($reservation_members as $member)
                    <x-table-row>
                        <x-table-cell>{{ $member->fullName() }}</x-table-cell>
                        <x-table-cell>{{ $member->email }}</x-table-cell>
                        <x-table-cell>
                            <input type="checkbox" name="{{$member->id}}" checked />
                        </x-table-cell>
                    </x-table-row>
                @endforeach
            </x-table-body>
        </x-table>
        {{ $reservation_members->links() }}
        <x-button theme="error" type="submit">Remove users</x-button>
    </form>
    <form method="POST" action="{{ route('reservations.add-users', $reservation->id) }}" class="w-[500px] flex flex-col gap-2">
        @csrf
        <h2 class="text-center text-xl">Add new users to reservation</h2>
        <x-table class="mb-2" dataLength="{{ count($reservation_users_outside) }}">
            <x-table-body>
                @foreach($reservation_users_outside as $user)
                    <x-table-row>
                        <x-table-cell>{{ $user->fullName() }}</x-table-cell>
                        <x-table-cell>{{ $user->email }}</x-table-cell>
                        <x-table-cell>
                            <input type="checkbox" name="{{$user->id}}" />
                        </x-table-cell>
                    </x-table-row>
                @endforeach
            </x-table-body>
        </x-table>
        {{ $reservation_users_outside->links() }}
        <x-button type="submit">Add users</x-button>
    </div>
</x-sidebar>