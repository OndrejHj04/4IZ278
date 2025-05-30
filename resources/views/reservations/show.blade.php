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
                <x-button type="submit" class="bg-red-600 hover:bg-red-500">Delete</x-button>
            </form>
        @endadmin
    </div>
</x-sidebar>