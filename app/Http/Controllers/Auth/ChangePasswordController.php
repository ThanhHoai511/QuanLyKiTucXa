<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('auth.passwords.edit', compact('user'));
    }
    public function update(Request $request)
    {
        $this->validate($request, [
            'oldPassword' => 'required|min:6|max:32',
            'newPassword' => 'required|min:6|max:32',
            'confirmPassword' => 'required|min:6|max:32|same:newPassword'
        ]);
        $user = Auth::user();
        if (!Hash::check($request->oldPassword, $user->password)) {
            return redirect()->back()->withErrors(['oldPassword' => 'Mật khẩu cũ không chính xác']);
        }
        $user->password = Hash::make($request->newPassword);
        $user->save();
        Auth::logout();
        return redirect()->route('login');
    }
}
