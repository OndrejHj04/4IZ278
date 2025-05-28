<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        $users = User::paginate(10);
        return view('users.index', ['users' => $users]);
    }
    public function store(Request $request) { }
    public function show($id) {
        $user = User::find($id);
        return view('users.show', ['user' => $user]);
    }
    public function edit($id) { }
    public function update(Request $request, $id) {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'birth_date' => 'required|date|before_or_equal:today',
        ]);
        $user = User::findOrFail($id);
        $user->update($validated);

        return redirect()->route('users.show', $user->id)->with('success', 'User updated successfully!');
     }
    public function destroy($id) { }
}