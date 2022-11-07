<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Contracts\Role;

use function PHPUnit\Framework\returnSelf;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'firstName' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'phoneNumber' => ['required', 'digits:11'],
            'emergencyNumber1' => ['required', 'digits:11'],
            'emergencyNumber2' => ['required', 'digits:11'],
            'address' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'integer'],
        ]);

        User::create([
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'phoneNumber' => $request->phoneNumber,
            'emergencyNumber1' => $request->emergencyNumber1,
            'emergencyNumber2' => $request->emergencyNumber2,
            'address' => $request->address,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect('/admin/users')->with('message', 'User Created Successfully');
    }

    public function edit(int $userId)
    {
        $user = User::findOrFail($userId);
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, int $userId)
    {
        $validated = $request->validate([
            'firstName' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'phoneNumber' => ['required', 'digits:11'],
            'emergencyNumber1' => ['required', 'digits:11'],
            'emergencyNumber2' => ['required', 'digits:11'],
            'address' => ['required', 'string', 'max:255'],
            'role' => ['required', 'integer'],
        ]);

        User::findOrFail($userId)->update([
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'phoneNumber' => $request->phoneNumber,
            'emergencyNumber1' => $request->emergencyNumber1,
            'emergencyNumber2' => $request->emergencyNumber2,
            'address' => $request->address,
            'role' => $request->role,
        ]);

        return redirect('/admin/users')->with('message', 'User Updated Successfully');
    }

    public function delete(int $userId)
    {
        $user = User::findOrFail($userId);
        $user->delete();
        return redirect('/admin/users')->with('message', 'User Deleted Successfully');
    }
}
