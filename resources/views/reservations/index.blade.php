@php
use App\Helpers\DateFormatter;
use App\ReservationStatus;
@endphp

<x-sidebar>
    <div class="flex-1 flex flex-col gap-2">
        <x-table dataLength="{{ count($reservations) }}">
            <x-table-head>
                <x-table-cell header>
                    Name
                </x-table-cell>
                <x-table-cell header>
                    Leader
                </x-table-cell>
                <x-table-cell header>
                    Status
                </x-table-cell>
                <x-table-cell header>
                    From
                </x-table-cell>
                <x-table-cell header>
                    To
                </x-table-cell>
                <x-table-cell header>
                    Created
                </x-table-cell>
                <x-table-cell header />
            </x-table-head>
            <x-table-body>
                @foreach ($reservations as $reservation)
                    <x-table-row>
                        <x-table-cell>
                            {{ $reservation->name }}
                        </x-table-cell>
                        <x-table-cell>
                            {{ $reservation->leader->first_name . ' ' . $reservation->leader->last_name }}
                        </x-table-cell>
                        <x-table-cell>
                            {{ $reservation->status }}
                        </x-table-cell>
                        <x-table-cell>
                            {{ DateFormatter::formatDate($reservation->from_date) }}
                        </x-table-cell>
                        <x-table-cell>
                            {{ DateFormatter::formatDate($reservation->to_date) }}
                        </x-table-cell>
                        <x-table-cell>
                            {{ DateFormatter::formatTimestamp($reservation->created_at) }}
                        </x-table-cell>
                        <x-table-cell>
                            <a href="{{route('reservations.show', $reservation->id)}}" class="text-blue-600 font-semibold hover:underline">Edit</a>
                        </x-table-cell>
                    </x-table-row>
                @endforeach
            </x-table-body>
        </x-table>
    </div>
</x-sidebar>