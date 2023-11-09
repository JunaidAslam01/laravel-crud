<?php

namespace App\Http\Controllers\BackPanel;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    public function dashboard()
    {

        $users = User::all();
        $data['users'] = $users;
        return view('admin.dashboard', $data);
    }
    public function edit($id)
    {
        $user = User::where('id', $id)->first();
        $data['user'] = $user;
        return view('admin.user.edit', $data);
    }
    public function update(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|max:255',
                'email' => [
                    'required',
                    'email',
                    'max:255',
                    Rule::unique('users')->ignore($id),
                ],
                'role' => 'required|in:admin,user',
            ]);

            $user = User::where('id', $id)->first();
            $user->name = $validatedData['name'];
            $user->email = $validatedData['email'];
            $user->role = $validatedData['role'];
            $user->save();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
        
        return redirect('admin/dashboard')->with('success', 'User updated successfully');

    }

    public function destroy($id)
    {
        try {
            $user = User::where('id', $id)->first();
            $user->delete();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'User failed to delete');
        }

        return redirect()->back()->with('success', 'User deleted successfully');
    }

    public function create()
    {
        return view('admin.user.create');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users')->ignore($request->id),
            ],
            'password' => 'required|min:8',
            'role' => 'required|in:admin,user',
        ]);

        try {
            $user = new User;
            $user->name = $validatedData['name'];
            $user->email = $validatedData['email'];
            $user->password = Hash::make($validatedData['password']);
            $user->role = $validatedData['role'];
            $user->save();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'User failed to added');
        }


        return redirect('admin/dashboard')->with('success', 'User added successfully');
    }
}
