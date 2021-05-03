<?php

namespace App\Http\Controllers;


use app\Models\User as User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Role as Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function users()
    {
        $users = User::all();
        $user = Auth::user();
        return view('User.user', compact('user','users'));
    }
    public function tbuser(){
        $roles = Role::all();
        return view('User.tambah', compact('roles'));
    }
    public function hpsuser(Request $req)
    {
        $user = User::find($req->get('id'));
        Storage::delete('public/photo_user/' . $req->get('photo'));
        $user->delete();

        return redirect()->route('admin.Users');
    }
    public function insertUser(Request $request)
    {


        $user = new User();
        $user->name = $request->get('name');
        $user->username = $request->get('username');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));
        $user->roles_id = $request->get('role');
        if ($request->hasFile('photo')) {
            $extension = $request->file('photo')->extension();
            $filename = 'photo_user_' . time() . '.' . $extension;
            $request->file('photo')->storeAs('public/photo_user', $filename);
            $user->photo = $filename;
        }

        $user->save();

        return redirect()->route('admin.Users');
    }
    public function edituser($user)
    {
        $datas = DB::table('users')->where('id',$user)->get();
        $datas->roles = Role::get();

        return view('User.edit', compact('datas'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->get('name');
        $user->username = $request->get('username');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));
        $user->roles_id = $request->get('role');
        if ($request->hasFile('photo')) {
            $extension = $request->file('photo')->extension();
            $filename = 'photo_user_' . time() . '.' . $extension;
            $request->file('photo')->storeAs('public/photo_user', $filename);
            
        Storage::delete('public/photo_user/' . $request->get('old_photo'));
            $user->photo = $filename;
        }

        $user->save();

        return redirect()->route('admin.Users');
    }
}
