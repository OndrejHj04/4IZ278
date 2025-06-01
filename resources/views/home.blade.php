@php
use App\Helpers\DateFormatter;
@endphp

<script>

    function toggleNotification(el){
        const shortText = el.querySelector('.shortText');
        const fullText = el.querySelector('.fullText');

        if (fullText.classList.contains('hidden')) {
            shortText.classList.add('hidden');
            fullText.classList.remove('hidden');
        } else {
            shortText.classList.remove('hidden');
            fullText.classList.add('hidden');
        }
    }

</script>

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
        <h2 class="text-center text-xl">All future reservations</h2>
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


    <div method="POST" class="flex flex-col gap-3 max-w-[500px]">
        <h2 class="text-center text-xl">My notifications</h2>
        <x-table class="mb-2" dataLength="{{ count($user_notifications) }}">
            <x-table-body>
                @foreach($user_notifications as $notification)
                    <x-table-row>
                        <x-table-cell>
                            <div class="cursor-pointer" title="Click to toggle text" onclick="toggleNotification(this)">
                                <span class="fullText hidden">{{ $notification->content }}</span>
                                <span class="shortText">{{ $notification->shortContent() }}</span>
                            </div>
                        </x-table-cell>
                        <x-table-cell>obdrženo: {{ DateFormatter::timeFromNow($notification->created_at) }}</x-table-cell>
                        <x-table-cell>
                            @if(!$notification->read)
                                <form method="POST" action="{{ route('notifications.read', $notification->id)  }}">
                                    @csrf
                                    @method('PATCH')
                                    <button class="text-green-600 font-semibold underline cursor-pointer">přečteno</button>
                                </form>
                            @endif
                        </x-table-cell>
                    </x-table-row>
                @endforeach
            </x-table-body>
        </x-table>
    </div>
</x-sidebar>