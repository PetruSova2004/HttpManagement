<?php

namespace App\Http\Controllers\Pub\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pub\Register\StoreRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('Pub.Auth.register');
    }

    public function store(StoreRequest $request)
    {
        $request->validated();
        $user = User::where('login', $request->login)->first();
        if ($user) {
            return redirect()->back()->with('error', 'A user with that login already exists');
        } else {
            $createdUser = User::create([
                'name' => $request->name,
                'login' => $request->login,
                'password' =>Hash::make($request->password)
            ]);
            auth()->login($createdUser);
            return redirect()->route('pub.url.index');
        }
    }

}
