<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Carbon;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        $totalUsers = User::count();

        // Count of users created today
        $usersCreatedToday = User::whereDate('created_at', Carbon::today())->count();

        // Count of users created on any day except today
        $usersCreatedExceptToday = User::whereDate('created_at', '<>', Carbon::today())->count();

        $session = round($usersCreatedToday/$usersCreatedExceptToday*100, 2);
        // dd($session);
        return view('base.users', compact('users', 'totalUsers', 'session'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all()); // Dump and die

        // Handle form submission logic here
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the allowed file types and size as needed
            'role_id' => 'required'
            // 'qr' => 'nullable|string',
            // 'password' => 'required|string|min:8',
        ]);
        
        // Provide a default value for 'is_active'
        $validatedData['is_active'] = $request->input('is_active', 1);
                
        // Handle file upload
        $imagePath = $request->file('image')->store('images', 'public');
        
        // Create a new User instance
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'image' => $imagePath,
            'role_id' => $validatedData['role_id'],
            'is_active' => $validatedData['is_active'],
            // 'qr' => $validatedData['qr'],
            // 'password' => $validatedData['password'],
        ]);

        // dd($user->all()); // Dump and die


        $user->save();

        return redirect('/users')->with('success', 'Form submitted successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('base.usersShow');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_user)
    {
        $user = User::find($id_user);

        if ($user) {
            $user->delete();
            return redirect()->back()->with('success', 'User deleted successfully.');
        }

        return redirect()->back()->with('error', 'User not found.');
    }
}
