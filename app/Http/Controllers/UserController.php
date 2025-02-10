<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin')->except(['profile', 'updateProfile']);
    }

    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:admin,doctor,staff',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'specialization' => 'required_if:role,doctor|nullable|string',
        ]);

        $validated['password'] = Hash::make($validated['password']);
        
        User::create($validated);

        return redirect()->route('users.index')
            ->with('success', 'User created successfully.');
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'role' => 'required|in:admin,doctor,staff',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'specialization' => 'required_if:role,doctor|nullable|string',
            'is_active' => 'boolean'
        ]);

        if ($request->filled('password')) {
            $validated['password'] = Hash::make($request->password);
        }

        $user->update($validated);

        return redirect()->route('users.index')
            ->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        if ($user->id === auth()->id()) {
            return back()->with('error', 'You cannot delete your own account.');
        }

        $user->delete();

        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully.');
    }

    public function profile()
    {
        $user = auth()->user();
        return view('users.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = auth()->user();
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'current_password' => 'required_with:new_password|password',
            'new_password' => 'nullable|min:8|confirmed',
        ]);

        if ($request->filled('new_password')) {
            $validated['password'] = Hash::make($request->new_password);
        }


        return back()->with('success', 'Profile updated successfully.');
    }
}