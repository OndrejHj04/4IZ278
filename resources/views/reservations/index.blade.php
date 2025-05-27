<x-sidebar>
    <div class="flex-1 flex flex-col gap-2">
        <x-table>
            <x-table-head>
                <x-table-cell header>
                    Reservation name
                </x-table-cell>
                <x-table-cell header>
                    Reservation leader
                </x-table-cell>
                <x-table-cell header>
                    From
                </x-table-cell>
                <x-table-cell header>
                    To
                </x-table-cell>
                <x-table-cell header>
                    Created_at
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
                            {{ $reservation->leader }}
                        </x-table-cell>
                        <x-table-cell>
                            {{ $reservation->from_date }}
                        </x-table-cell>
                        <x-table-cell>
                            {{ $reservation->to_date }}
                        </x-table-cell>
                        <x-table-cell>
                            {{ $reservation->created_at }}
                        </x-table-cell>
                        <x-table-cell>
                            <a href="#" class="text-blue-600 font-semibold hover:underline">Edit</a>
                        </x-table-cell>
                    </x-table-row>
                @endforeach
            </x-table-body>
        </x-table>
        <div>
            {{ $reservations->links() }}
        </div>
    </div>
</x-sidebar>