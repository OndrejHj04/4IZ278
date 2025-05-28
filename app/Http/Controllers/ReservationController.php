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
    public function store(Request $request) { }
    public function show($id) { 
        $reservation = Reservation::find($id);
        return view('reservations.show', ['reservation' => $reservation]);
    }
    public function edit($id) { }
    public function update(Request $request, $id) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'from_date' => 'required|date|before:to_date',
            'to_date' => 'required|date|after:from_date',
        ]);
        $reservation = Reservation::findOrFail($id);
        $reservation->update($validated);

        return redirect()->route('reservations.show', $reservation->id)->with('success', 'Reservation updated successfully!');

    }
    public function destroy($id) { }
}
