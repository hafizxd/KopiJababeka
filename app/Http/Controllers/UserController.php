<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index() {
        $users = User::orderBy('created_at', 'desc')->paginate(10);

        return view('users.index', compact('users'));
    }

    public function store(Request $request) {
        $request->validate([
            'user_id' => 'required',
            'user_name' => 'required',
            'user_login' => 'required',
            'password' => 'required'
        ]);

        $userExists = User::where('User-ID', $request->user_id)->exists();
        if ($userExists) {
            throw ValidationException::withMessages([
                'user_id' => 'User ID sudah ada',
            ]);
        }

        $userExists = User::where('User-Login', $request->user_login)->exists();
        if ($userExists) {
            throw ValidationException::withMessages([
                'user_login' => 'User ID sudah ada',
            ]);
        }

        User::create([
            'User-ID' => $request->user_id,
            'User-Name' => $request->user_name,
            'User-Login' => $request->user_login,
            'Password' => Hash::make($request->password),
        ]);

        return redirect()->back();
    }

    public function edit($id) {
        $userDetail = User::findOrFail($id);
        $users = User::orderBy('created_at', 'desc')->paginate(10);

        return view('users.edit', compact('userDetail', 'users'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'user_name' => 'required'
        ]);

        $user = User::findOrFail($id);

        $user->update([
            'User-Name' => $request->user_name,
        ]);

        return redirect()->back();
    }

    public function delete($id) {
        $userCount = User::count();
        if ($userCount <= 1) {
            throw ValidationException::withMessages([
                'user_id' => 'Harus ada minimal 1 user',
            ]);
        }

        User::findOrFail($id)->delete();

        return redirect()->route('user.index');
    }
}
