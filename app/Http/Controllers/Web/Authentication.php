<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class Authentication extends Controller
{
    public function signIn(Request $request) {
        if ($request->has('sign_in')) {
            if (Auth::attempt($request->only('email', 'password'))) {
                return redirect()->intended(route('index'));
            }
            return redirect()->back()->with('toast', ['warning', 'Unable to sign-in. Please try again', 'Might be invalid email and password combination or account not exists']);
        }
        return view('web.authentication.sign-in');
    }

    public function createAccount(Request $request) {
        if ($request->has('create_account')) {
            if (User::where('email', $request->input('email'))->count() == 0) {
                if ($request->input('password') === $request->input('password_confirmation')) {
                    $user = User::create([
                        'email' => $request->input('email'),
                        'password' => Hash::make($request->input('password')),
                        'role' => 2,
                    ]);

                    Profile::create([
                        'user_id' => $user->id,
                        'fullname' => $request->input('fullname'),
                        'phone' => $request->input('phone'),
                    ]);
                    return redirect()->route('sign-in')->with('toast', ['success', 'Account created', 'Welcome! Let\'s make history together!']);
                } else {
                    return redirect()->back()->with('toast', ['warning', 'Password not identical. Please try again']);
                }
            } else {
                return redirect()->back()->with('toast', ['warning', 'Account already exists. Please Sign In']);
            }
        }

        return view('web.authentication.create-account');
    }

    public function forgotPassword(Request $request) {
        if ($request->has('forgot_password')) {
            $user = User::where('email', $request->input('email'))->first();
            if ($user) {
                return redirect()->route('reset-password', ['id'=>$user->id]);
            }
            return redirect()->back()->with('toast', ['warning', 'Account not found', 'Please make sure you had an account with us']);
        }
        return view('web.authentication.forgot-password');
    }

    public function resetPassword(Request $request) {
        if ($request->has('reset_password')) {
            $user = User::where('id', $request->input('id'))->first();
            if ($request->input('password_new') === $request->input('password_confirmation')) {
                $user->password = Hash::make($request->input('password_new'));
                $user->save();
                return redirect()->route('sign-in')->with('toast', ['success', 'Password reset success']);
            }
            return redirect()->back()->with('toast', ['warning', 'Password not identical. Please try again']);
        }
        return view('web.authentication.reset-password');
    }

    public function signOut() {
        Session::flush();
        Auth::logout();
        return redirect()->route('index');
    }
}
