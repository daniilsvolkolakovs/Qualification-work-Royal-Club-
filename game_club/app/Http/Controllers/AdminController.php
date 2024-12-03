<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{

    public function index(Request $request)
    {
        $sortField = $request->input('sort');
        $sortOrder = $request->input('order') ?? 'asc';
        $searchQuery = $request->input('search');

        $users = User::query();

        // Apply search filter if a search query is provided
        if ($searchQuery) {
            $users->where('name', 'like', '%' . $searchQuery . '%')
                ->orWhere('email', 'like', '%' . $searchQuery . '%')
                ->orWhere('usertype', 'like', '%' . $searchQuery . '%');
        }

        // Apply sorting if a sort field is specified
        if ($sortField) {
            $users->orderBy($sortField, $sortOrder);
        }

        $users = $users->get();

        return view('admin.user', compact('users', 'sortField', 'sortOrder', 'searchQuery'));
    }

    // Method for editing the user
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.edit-user', compact('user'));
    }

    // Method for updating user
    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|min:1', // Name must be at least 1 character
            'email' => 'required|email|unique:users,email,' . $id, // Email must be unique except for the current user
            'usertype' => 'required|string|in:admin,manager,user', // Usertype validation
        ]);

        // Find the user and update their information
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->usertype = $request->usertype;
        $user->save();

        return redirect()->route('admin.users')->with('success', 'User updated successfully');
    }

    // Method for deleting the user
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('admin.users')->with('success', 'User deleted successfully');
    }
}