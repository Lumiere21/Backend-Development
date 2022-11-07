<?php

namespace App\Http\Controllers;

use id;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index() 
    {
        return view('profile.users.profile');
    }

    public function updateUserInfo(Request $request) 
    {
        $request->validate([
            'firstName' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'phoneNumber' => ['required', 'digits:11'],
            'emergencyNumber1' => ['required', 'digits:11'],
            'emergencyNumber2' => ['required', 'digits:11'],
            'address' => ['required', 'string', 'max:255'],
        ]);

        $user = User::findOrFail(Auth::user()->id);
        $user->update([
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'phoneNumber' => $request->phoneNumber,
            'emergencyNumber1' => $request->emergencyNumber1,
            'emergencyNumber2' => $request->emergencyNumber2,
            'address' => $request->address,
        ]);

        $user->userInfo()->updateOrCreate(
            [
                'user_id' => $user->id,
            ],
            [
                'gender' => $request->gender,  
            ]
        );

        return redirect()->back()->with('message', 'User Profile Updated');
    }
}
