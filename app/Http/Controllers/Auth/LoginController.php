<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserLoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function create() {
        return view('login.index');

    }

    public function store(UserLoginRequest $request)
    {
        $data = $request->validated();
        $result = Auth::attempt($data);
        if ($result) {
            $request->session()->regenerate();
            return redirect(route('home'));
        }
    }

    public function destroy(Request $request)
    {
        Auth::logout();
        return redirect(route('home'));
    }



}
