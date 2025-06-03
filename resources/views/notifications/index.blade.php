@php
use App\Helpers\DateFormatter;
use App\ReservationStatus;
@endphp

<x-sidebar>
    <div class="flex-1 flex flex-col gap-2">
        <x-table :dataLength="count($notifications)">
            <x-table-head>
                <x-table-cell header>
                    Date
                </x-table-cell>
                <x-table-cell header>
                    User
                </x-table-cell>
                <x-table-cell header>
                    Reservation
                </x-table-cell>
                <x-table-cell header>
                    Content
                </x-table-cell>
                <x-table-cell header>
                    Read
                </x-table-cell>
            </x-table-head>
            <x-table-body>
                @foreach ($notifications as $notification)
                    <x-table-row>
                        <x-table-cell>
                            {{ DateFormatter::formatTimestamp($notification->created_at) }}
                        </x-table-cell>
                        <x-table-cell>
                            <a href="{{route('users.show', $notification->reservation->id )}}" class="text-blue-600 font-semibold hover:underline">{{ $notification->user->fullName() }}</a>
                        </x-table-cell>
                        <x-table-cell>
                            <a href="{{route('reservations.show', $notification->reservation->id )}}" class="text-blue-600 font-semibold hover:underline">{{ $notification->reservation->name }}</a>
                        </x-table-cell>
                        <x-table-cell>
                            {{ $notification->content  }}
                        </x-table-cell>
                        <x-table-cell>
                            @if($notification->read)
                                <x-check-icon class="text-green-500" />
                            @else
                                <x-cross-icon class="text-red-500" />
                            @endif
                        </x-table-cell>
                    </x-table-row>
                @endforeach
            </x-table-body>
        </x-table>
    </div>
</x-sidebar>