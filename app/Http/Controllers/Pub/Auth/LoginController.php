<?php

namespace App\Http\Controllers\Pub\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pub\Login\StoreRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('Pub.Auth.login');
    }

    public function login(StoreRequest $request)
    {
        $request->validated();
        $user = User::where('login', $request->login)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            if (Auth::user()->is_admin) {
                return redirect()->route('admin.index');
            } else {
                return redirect()->route('pub.url.index');
            }
        } else {
            return redirect()->back()->with('error', 'Login or password is incorrect');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.index')->with('success', 'You have successfully logout');
    }

}
