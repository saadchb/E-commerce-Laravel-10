<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Login.Registre');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            $request->validate([
                'nom' => 'required |min:3',
                'prenom' => 'required |min:3',
                'adresse' => 'required',
                'ville' => 'required',
                'tel' => 'required',                
                'email' => 'required | email |unique:users',
                'password' => 'required |min:8 |max:50|confirmed',
                'nom' => 'required',
            ]);
            // $imagePath = $request->file('image')->store('images','public');
            $users = new User([
                'nom'=>$request->get('nom'),
                'prenom'=>$request->get('prenom'),
                'ville'=>$request->get('ville'),
                'tel'=>$request->get('tel'),
                // 'image'=>$imagePath,
                'adresse'=>$request->get('adresse'),
                'email'=>$request->get('email'),
                'password'=>$request->get('password'),
            ]);
        //  $users->isAdmin = $request->has('isAdmin') ? true : false;
        $users->save();

        return redirect()->route('login');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);
        $table = 'dachboard';
        return view('Backend.profile',compact('user','table'));
    }
    public function ProfileUser(string $id)
    {
        $user = User::findOrFail($id);
        $table = 'dachboard';
        return view('user.profile',compact('user','table'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user , string $id)
    {
        // Validate user input
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$id,
            'image' => 'image|mimes:jpeg,png,jpg,gif', // Assuming image upload
        ]);
    
        // Find the user by ID
        $user = User::findOrFail($id);
    
        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $user->image = $imagePath;
        }
    
        // Update user attributes
        $user->nom = $request->input('nom');
        $user->prenom = $request->input('prenom');
        $user->ville = $request->input('ville');
        $user->tel = $request->input('tel');
        $user->adresse = $request->input('adresse');
        $user->email = $request->input('email');
    
        // Check if password is being updated and hash it
        // if ($request->filled('password')) {
        //     $user->password = Hash::make($request->input('password'));
        // }
    // dd($user);
        // Save the updated user
        $user->save();
        return back()->with('success', 'succes');

   
    }

    public function changePassword(Request $request, $id)
    {
        // Validate the request data
        // $request->validate([
        //     'current_password' => 'required',
        //     'new_password' => 'required|string|min:8|confirmed',
        // ]);
    
        // Find the user by ID
        $user = User::findOrFail($id);
    
        // Verify the current password
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->with('error', 'The current password is incorrect.');
        }
    
        // Update the password
        $user->password = Hash::make($request->new_password);
        // dd($user);
        $user->save();
    
        // Redirect back with a success message
        return back()->with('success', 'Password changed successfully.');
    }
    


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        Session::flush();

        Auth::logout();
        return  to_route('login');
    }
}
