@php
use App\Helpers\DateFormatter;
@endphp

<x-sidebar>
    <div method="POST" class="flex flex-col gap-3">
        <h2 class="text-center text-xl">My reservations</h2>
        <x-table class="mb-2" dataLength="{{ count($user_reservations) }}">
            <x-table-body>
                @foreach($user_reservations as $reservation)
                    <x-table-row>
                        <x-table-cell>{{ $reservation->name }}</x-table-cell>
                        <x-table-cell>{{ $reservation->date() }}</x-table-cell>
                        <x-table-cell>
                            <form method="POST" action="{{ route('reservations.sign-out', $reservation->id) }}">
                                @csrf
                                @method('DELETE')
                                <input hidden name="user_id" value="{{ Auth::user()->id }}" />
                                <button class="text-red-500 underline font-semibold cursor-pointer">sign out</button>
                            </form>
                        </x-table-cell>
                    </x-table-row>
                @endforeach
            </x-table-body>
        </x-table>
    </div>

    <div method="POST" class="flex flex-col gap-3">
        <h2 class="text-center text-xl">Future reservations</h2>
        <x-table class="mb-2" dataLength="{{ count($future_reservations) }}">
            <x-table-body>
                @foreach($future_reservations as $reservation)
                    <x-table-row>
                        <x-table-cell>{{ $reservation->name }}</x-table-cell>
                        <x-table-cell>začíná za: {{ DateFormatter::timeFromNow($reservation->from_date) }}</x-table-cell>
                        <x-table-cell>
                            <a class="text-blue-600 font-semibold underline" href="{{ route('reservations.show', $reservation->id) }}">detail</a>
                        </x-table-cell>
                    </x-table-row>
                @endforeach
            </x-table-body>
        </x-table>
    </div>
</x-sidebar>