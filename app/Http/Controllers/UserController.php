<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;



class UserController extends Controller
{
    // Display a listing of the users
    public function index()
    {
        $users = User::all();
        $usr=\Auth::user();
        if(!$usr->type){
        return view('admin.users.index', compact('users'));
        }else{
           return  Redirect::route('delco-summary');
  
        }
    }

    // Show the form for creating a new user
    public function create()
    {
        return view('admin.users.create');
    }

    // Store a newly created user in storage
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'area' => 'required',
            'project' => 'required',
            'vendor' => 'required',
        ]);
    
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);
        $data['type'] = true; // Set the 'type' field to true
    
        User::create($data);
    
        return redirect()->route('users.index')->with('success', 'User created successfully');
    }
    

    // Show the form for editing the specified user
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    // Update the specified user in storage
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'area' => 'required',
            'project' => 'required',
            'vendor' => 'required',
        ]);
    
        $data = $request->all();
    
        // Set type to true by default, no need for user input
        $data['type'] = true;
    
        // Check if password field is filled and hash it
        if ($request->filled('password')) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']); // Remove password field if not filled
        }
    
        // Update user data
        $user->update($data);
    
        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }
    
    // Remove the specified user from storage
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }
}
