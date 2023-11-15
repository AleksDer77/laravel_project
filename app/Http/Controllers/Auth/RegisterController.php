<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create() {
        return view('register.index');
    }

    public function store(UserRegisterRequest $request)
    {
        $data = $request->validated();
        User::query()->create($data);
           return redirect (route('login'));
    }
}
