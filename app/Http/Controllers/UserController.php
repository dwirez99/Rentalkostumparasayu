<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\RentLogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile()
    {

        $rentlogs = RentLogs::with(['user', 'kosta'])->where('user_id', Auth::user()->id)->get();
    return view('profile',['rent_logs' => $rentlogs] );
    }

public function editprofile(Request $request)
{
if ($request->username != Auth::user()->username) {
    $validated = $request->validate([
        'username' => 'required|unique:users|max:100',
    ]);
}
    $user = User::where('id',Auth::user()->id)->first();
    $user->slug = null;
    $user->update($request->all());

    return redirect('profile')->with('status','Profile Updated Successfully');
}

    public function index()
    {
        $users = User::where('role_id', 2)->where('status', 'active')->get();
        return view('users', ['users' => $users]);
    }

    public function registeredUser()
    {
        $registeredUsers = User::where('status', 'inactive')->where('role_id', 2)->get();
        return view('registered-users', ['registeredUsers' => $registeredUsers]);
    }

    public function show($slug)
    {

        $user = User::where('slug', $slug)->first();
        $rentlogs = RentLogs::with(['user', 'kosta'])->where('user_id', $user->id)->get();
        return view('user-detail', ['user' => $user, 'rent_logs' => $rentlogs]);
    }
    public function approve($slug)
    {
       $user = User::where('slug', $slug)->first();
       $user->status = 'active';
       $user->save();
       return redirect('user-detail/'.$slug)->with('status','User Approved Successfully');
    }
    public function destroy($slug)
    {
        $user = User::where('slug', $slug)->first();
        $user->delete();
        return redirect('users')->with('status','User Banned Successfully');
    }
    public function bannedUser()
    {
        $bannedUsers = User::onlyTrashed()->get();
        return view('users-banned', ['bannedUsers' => $bannedUsers]);
    }
    public function restore($slug)
    {
        $user = User::withTrashed()->where('slug', $slug)->first();
        $user->restore();
        return redirect('users')->with('status','User Restored Successfully');
    }
}
