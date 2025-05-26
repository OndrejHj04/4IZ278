<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index() { 
        return view('reservations.index');
    }
    public function create() {
        return view('reservations.create');
    }
    public function store(Request $request) { }
    public function show($id) { }
    public function edit($id) { }
    public function update(Request $request, $id) { }
    public function destroy($id) { }
}
