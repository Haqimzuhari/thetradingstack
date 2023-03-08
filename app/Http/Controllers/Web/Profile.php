<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Profile as ModelsProfile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Profile extends Controller
{
    public function index(Request $request) {
        if ($request->has('update_account')) {
            User::where('id', $request->input('user_id'))->update([
                'email' => $request->input('email'),
            ]);
            return redirect()->back()->with('toast', ['success', 'Update account success']);
        }

        if ($request->has('update_personal')) {
            ModelsProfile::where('user_id', $request->input('user_id'))->update([
                'fullname' => $request->input('fullname'),
                'phone' => $request->input('phone'),
            ]);
            return redirect()->back()->with('toast', ['success', 'Update personal information success']);
        }

        if ($request->has('update_password')) {
            $user = User::find($request->input('user_id'));
            if (Hash::check($request->input('current_password'), $user->password)) {
                $new_password = $request->input('new_password');
                if ($new_password === $request->input('confirm_new_password')) {
                    $user->password = Hash::make($new_password);
                    $user->save();
                    return redirect()->back()->with('toast', ['success', 'Password updated']);
                }
                return redirect()->back()->with('toast', ['warning', 'New password not identical']);
            }
            return redirect()->back()->with('toast', ['warning', 'Invalid current password']);
        }

        return view('web.profile.index', [
            'user' => User::find(auth()->user()->id),
        ]);
    }
}
