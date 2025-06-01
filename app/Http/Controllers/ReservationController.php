<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::with('leader')->paginate(10);
        return view('reservations.index', ['reservations' => $reservations]);
    }

    public function create() {
        return view('reservations.create');
    }

    public function removeMembers(Request $request, $id){
        $reservation = Reservation::findOrFail($id);
        $idsToKeep = array_filter(array_keys($request->all()), 'is_numeric');
        $reservation->members()->sync($idsToKeep);

        return redirect()->back();
    }

    public function addUsers(Request $request, $id){
        $reservation = Reservation::findOrFail($id);
        $idsToAdd = array_filter(array_keys($request->all()), 'is_numeric');
        $reservation->members()->syncWithoutDetaching($idsToAdd);
    
        return redirect()->back();
    }

    public function signOut(Request $request, $id){
        $reservation = Reservation::findOrFail($id);
        $user_id = $request->user_id;
        $reservation->members()->detach($user_id);

    return redirect()->back();
    }

    public function show($id) { 
        $reservation = Reservation::findOrFail($id);

        $reservation_members = $reservation->members()->get();
        $reservation_users_outside = $reservation->outsideUsers()->get();
        return view('reservations.show', ['reservation' => $reservation, 'reservation_members' => $reservation_members, 'reservation_users_outside' => $reservation_users_outside]);
    }

    public function update(Request $request, $id) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required',
            'from_date' => 'required|date|before:to_date',
            'to_date' => 'required|date|after:from_date',
        ]);
        $reservation = Reservation::findOrFail($id);
        $reservation->update($validated);

        return redirect()->route('reservations.show', $reservation->id)->with('success', 'Reservation updated successfully!');

    }

    public function destroy($id) {
        $reservation = Reservation::findOrFail($id);
        $reservation->delete();

        return redirect(route('reservations.index'));
    }
}
