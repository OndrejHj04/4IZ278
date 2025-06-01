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
                            <form>
                                @csrf
                                <button class="text-red-500 underline font-semibold cursor-pointer">sign out</button>
                            </form>
                        </x-table-cell>
                    </x-table-row>
                @endforeach
            </x-table-body>
        </x-table>
    </div>
</x-sidebar>