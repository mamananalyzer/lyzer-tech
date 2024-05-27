<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Belanja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Hashids\Hashids;
use DataTables;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // dd($request->all());

        $users = User::all();
        $totalUsers = User::count();

        // Count of users created today
        $usersCreatedToday = User::whereDate('created_at', Carbon::today())->count();

        // Count of users created on any day except today
        $usersCreatedExceptToday = User::whereDate('created_at', '<>', Carbon::today())->count();

        $session = round($usersCreatedToday/$usersCreatedExceptToday*100, 2);
        // dd($users);
        return view('base.users', compact('users', 'totalUsers'
        , 'session'
        ));
    }

    public function getData()
    {
        // Fetch the data for the current month
        $users = User::all();
        // $users = User::whereMonth('created_at', Carbon::now()->month)->get();
    
        return DataTables::of($users)
            ->editColumn('created_at', function ($user) {
                return $user->created_at->format('Y-m-d H:i');
            })
            ->addColumn('action', function($user) {
                return '<a href="#edit-'.$user->id.'" class="btn btn-xs btn-primary">Edit</a>';
            })
            ->make(true);
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
        // Handle form submission logic here
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|max:255',
            'address' => 'required|max:255',
            'state' => 'required|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the allowed file types and size as needed
            'role_id' => 'required'
        ]);
        
        // Provide a default value for 'is_active'
        $validatedData['password'] = $request->input('password', '12345');
        $passwordHashed = Hash::make($validatedData['password']);        

        $yearOfJoin = Carbon::now()->year;
        // $randomNumber = generateRandomDigits(4);
        $validatedData['id_no'] = $yearOfJoin . 1234;
        
        $validatedData['company'] = $request->input('company', "PT. LyZer-Tech");
        $validatedData['is_active'] = $request->input('is_active', 1);

        // Generate QR code from id_no
        $qrCodePath = 'qrcodes/' . $validatedData['id_no'] . '.png';
        QrCode::format('png')->size(200)->generate($validatedData['id_no'], storage_path('app/public/' . $qrCodePath));
        // Store QR code path in the validated data
        $validatedData['qr'] = $qrCodePath;     
        
        $validatedData['join_date'] = Carbon::now();
        $validatedData['expire_date'] = Carbon::now()->addYears(5);

        // Handle file upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $validatedData['image'] = $imagePath;
        } else {
            return redirect()->back()->withErrors(['image' => 'Image upload failed'])->withInput();
        }
        
        // Create a new User instance
        $user = new User([
            'name' => $validatedData['name'],
            'password' => $passwordHashed,
            'id_no' => $validatedData['id_no'],
            'company' => $validatedData['company'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'address' => $validatedData['address'],
            'state' => $validatedData['state'],
            'image' => $validatedData['image'],
            'role_id' => $validatedData['role_id'],
            'is_active' => $validatedData['is_active'],
            'qr' => $validatedData['qr'],
            'join_date' => $validatedData['join_date'],
            'expire_date' => $validatedData['expire_date'],
        ]);

        // dd($user); // Dump and die

        $user->save();

        return redirect('/users')->with('success', 'Form submitted successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($hashId)
    {
        $hashids = new Hashids();
        $id = $hashids->decode($hashId)[0];
        $user = User::findOrFail($id);
        // dd($user);
        return view('base.usersShow', compact('user'));
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

    public function logout()
    {
        Auth::logout();

        // Redirect to the home page or any other desired page after logout
        return redirect('/');
    }
}
