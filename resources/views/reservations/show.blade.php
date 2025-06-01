@php
use App\Helpers\DateFormatter;
use App\ReservationStatus;
@endphp

<script>
    document.addEventListener('DOMContentLoaded', ()=>{
        let changedMembersCount = 0
        const membersCheckbox = document.querySelectorAll('.member-checkbox')
        const removeMembersButton = document.querySelector('#remove-members')

        membersCheckbox.forEach((checkbox)=>{
            checkbox.addEventListener('change', ({ target })=>{
                if(target.checked) changedMembersCount--
                else changedMembersCount++

                if(changedMembersCount > 0){
                    removeMembersButton.innerHTML = `Remove users (${changedMembersCount})`
                    removeMembersButton.disabled = false
                    return
                }
                removeMembersButton.innerHTML = `Remove users`
                removeMembersButton.disabled = true
            })
        })

        let changedUserCount = 0
        const usersCheckbox = document.querySelectorAll('.user-checkbox')
        const removeUsersButton = document.querySelector('#add-users')

        usersCheckbox.forEach((checkbox)=>{
            checkbox.addEventListener('change', ({ target })=>{
                if(target.checked) changedUserCount++
                else changedUserCount--

                if(changedUserCount > 0){
                    removeUsersButton.innerHTML = `Add users (${changedUserCount})`
                    removeUsersButton.disabled = false
                    return
                }
                removeUsersButton.innerHTML = `Add users`
                removeUsersButton.disabled = true
            })
        })
    })
    
</script>

<x-sidebar>
    <div class="flex flex-col gap-3">
        <h2 class="text-center text-xl">Reservation information</h2>
        @admin
            <form class="flex gap-3 flex-col h-full" action="{{ route('reservations.update', $reservation->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <x-input name="name" :value="$reservation->name">Name</x-input>
                <x-select name="status" :value="$reservation->status" :options="ReservationStatus::toOptions()">Status</x-select>
                <x-input type="date" name="from_date" :value="$reservation->from_date">From</x-input>
                <x-input type="date" name="to_date" :value="$reservation->to_date">To</x-input>
                <x-button  class="mt-auto">Edit</x-button>
            </form>
            <form method="POST" action="{{ route('reservations.destroy', $reservation->id)  }}">
                @csrf
                @method('DELETE')
                <x-button  theme="error">Delete</x-button>
            </form>
        @else
            <p>Name: {{ $reservation->name}}</p>      
            <p>Status: {{ $reservation->status }}</p>
            <p>From: {{ DateFormatter::formatDate($reservation->from_date) }}</p>
            <p>To: {{ DateFormatter::formatDate($reservation->to_date) }}</p>
            <p>Created at: {{ DateFormatter::formatTimestamp($reservation->created_at) }}</p>
            <p>Updated at: {{ DateFormatter::formatTimestamp($reservation->update_at) }}</p>
        @endadmin        
    </div>
    <form method="POST" action="{{ route('reservations.remove-members', $reservation->id) }}" class="flex flex-col gap-3">
        @csrf
        <h2 class="text-center text-xl">Reservation members</h2>
        <x-table class="mb-2" dataLength="{{ count($reservation_members) }}">
            <x-table-body>
                @foreach($reservation_members as $member)
                    <x-table-row>
                        <x-table-cell>{{ $member->fullName() }}</x-table-cell>
                        <x-table-cell>{{ $member->email }}</x-table-cell>
                        <x-table-cell>
                            <input type="checkbox" class="member-checkbox" name="{{$member->id}}" checked />
                        </x-table-cell>
                    </x-table-row>
                @endforeach
            </x-table-body>
        </x-table>
        <x-button disabled theme="error" id="remove-members">Remove users</x-button>
    </form>
    <form method="POST" action="{{ route('reservations.add-users', $reservation->id) }}" class="flex flex-col gap-3">
        @csrf
        <h2 class="text-center text-xl">Add new users to reservation</h2>
        <x-table class="mb-2" dataLength="{{ count($reservation_users_outside) }}">
            <x-table-body>
                @foreach($reservation_users_outside as $user)
                    <x-table-row>
                        <x-table-cell>{{ $user->fullName() }}</x-table-cell>
                        <x-table-cell>{{ $user->email }}</x-table-cell>
                        <x-table-cell>
                            <input type="checkbox" class="user-checkbox" name="{{$user->id}}" />
                        </x-table-cell>
                    </x-table-row>
                @endforeach
            </x-table-body>
        </x-table>
        <x-button disabled  id="add-users">Add users</x-button>
    </form>
</x-sidebar>