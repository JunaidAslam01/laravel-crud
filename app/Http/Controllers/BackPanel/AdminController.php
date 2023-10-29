<?php

namespace App\Http\Controllers\BackPanel;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(){

        $users = User::all();
        $data['users'] = $users;
        return view('admin.dashboard', $data);
    }
    public function edit($id){
      $user = User::where('id',$id)->first();
      $data['user']= $user;
      return view('admin.user.edit', $data);
    }
    public function update(Request $request, $id){
        $user = User::where('id',$id)->first();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->status = $request->status;

        $user->save();

        return redirect('admin/dashboard');
    }
    public function destroy(Request $request, $id){
        $user = User::where('id',$id)->first();
        $user->delete();

        return back()->withSuccess('User deleted successfully');
    }
}
