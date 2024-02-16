<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Http\Requests\CreateUserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Session;




class UserController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');
        $users = User::query()
        ->when($search, function ($query) use ($search) {
            return $query->where('first_name', 'like', '%'.$search.'%')
                         ->orWhere('last_name', 'like', '%'.$search.'%')
                         ->orWhere('email', 'like', '%'.$search.'%');
        })
        ->paginate(10);
        return view('users.index', compact('users'));
    }
    public function create()
    {
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateUserRequest $request)
    {
         // Retrieve validated data from the request
         $validatedData = $request->validated();

         // Create the user
         $user = User::create([
             'first_name' => $validatedData['first_name'],
             'last_name' => $validatedData['last_name'],
             'email' => $validatedData['email'],
             'password' => bcrypt($validatedData['password']),
         ]);
 
         // Attach roles to the user
         $user->roles()->sync($validatedData['roles']);
 
         // Redirect to a success page or route
         $users = User::with('roles')->paginate(10);
         Session::flash('success', 'User created successfully.');
         return view('users.index', compact('users'));
    }

    /**
     * Show the form for editing the specified user.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();

        // Pass user details and roles to the view
        return view('users.edit', compact('user','roles'));
    }

    /**
     * Update the specified user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        // Validate the request data
        $validatedData = $request->validated();

        $user->update([
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'email' => $validatedData['email'],
        ]);
        if ($request->filled('password')) {
            $user->update([
                'password' => bcrypt($validatedData['password']),
            ]);
        }

        if (isset($validatedData['roles'])) {
                    $user->roles()->sync($validatedData['roles']); // Sync user roles
        }

        Session::flash('success', 'User updated successfully.');
        return redirect()->route('users.edit', $user->id);
    }

    /**
     * Remove the specified user from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}