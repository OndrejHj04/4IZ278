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
    public function update(Request $request, $id) { }
    public function destroy($id) { }
}