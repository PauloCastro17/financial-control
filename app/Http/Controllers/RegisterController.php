<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class RegisterController extends Controller
{
    //
    public function index(): View
    {
        return view('register');
    }

    public function store(RegisterRequest $request)
    {
        $user = User::query()->create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ]);

        Auth::login($user);

        return redirect()->route('site.dashboard')->with('success', "Seja bem vindo(a) ao nosso sistema, {$user->name}!");
    }


}
