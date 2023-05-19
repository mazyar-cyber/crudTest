<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\Test;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;


class SettingController extends Controller
{
    public function create()
    {
        $user = Auth::user();
        return view('users.setting', compact('user'));
    }

    public function changePassword(Request $request)
    {

        $user = User::find(Auth::id());
        // return Validator::make($request, [
        //     'new_password' => ['required', 'string', 'min:8', 'confirmed'],
        // ]);
        $user->password = Hash::make($request->new_password);
        $user->save();
        \Illuminate\Support\Facades\Session::flash('password-changed', 'Your paswwrod changed successfully!');
        return redirect()->back();
    }


    public function deleteAC(Request $request)
    {
        // return $request->all();
        $user = User::find(Auth::user()->id)->delete();
        return redirect()->back();
    }


    public function validator(Test $request)
    {
        return 'ok';
    }
}
