<x-sidebar>
    <form class="space-y-6" action="{{ route('reservations.store') }}" method="POST">
        <h2 class="text-xl font-semibold">Create reservation</h2>
        @csrf
        <x-input type="text" name="name">Name</x-input>
        <x-input type="date" name="from_date">From date</x-input>
        <x-input type="date" name="to_date">To date</x-input>

        <x-button >Create</x-button>
    </form>
</x-sidebar>