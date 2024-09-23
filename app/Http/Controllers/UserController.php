<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\Common;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    use Common;

    public function create()
    {

        return view('admin.add_user');

    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'user_name' => 'required|string|max:100|unique:users,user_name',
            'email' => 'required|string|email|max:100|unique:users,email',
            'phone' => 'required|min:11|numeric',
            'password' => 'required|string|min:8',

        ]);

        $data['password'] = Hash::make($data['password']);

        $data['active'] = 1;

        if ($data['active'] == 1) {

            $data['email_verified_at'] = Carbon::now();
        }

        // dd($request->all());

        User::create($data);
        return redirect()->route('users.admin');

    }

    public function index()
    {

        $users = User::get();
        return view('admin.users', compact('users'));
    }

    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('admin.edit_user', compact('user'));
    }

    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'user_name' => 'required|string|max:100|unique:users,user_name,' . $id,
            'email' => 'required|string|email|max:100|unique:users,email,' . $id,
            'phone' => 'required|min:11|numeric',
            'password' => 'nullable|string|min:8',

        ]);

        // if ($request->has('password')) {
        //     $data['password'] = Hash::make($data['password']); //to hashed
        // }

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        if (isset($request->active) && $request->active == '1') {
            $data['active'] = 1;
            $data['email_verified_at'] = Carbon::now();
        } else {
            $data['active'] = 0;
            $data['email_verified_at'] = null;
        }

        // dd($request->all());

        User::where('id', $id)->update($data);

        return redirect()->route('users.admin');

    }
}
