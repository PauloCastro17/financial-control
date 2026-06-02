<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{

    public function index() :View
    {
        return view('users.profile');
    }

    public function update(Request $request)
    {
        try {
            User::query()
                ->where('id', $request->input('id'))
                ->whereIn('status', [0, 1])
                ->update([
                    'name' => $request->input('name'),
                    'dateofbirth' => $request->input('date'),
                    'phone' => $request->input('phone'),
                ]);

            return redirect()->route('site.profile')->with('alert', [
                'message' => "Usuário atualizado com sucesso!",
                'type' => 'success',
            ]);
        }
        catch (QueryException $e) {
            return redirect()->route('site.profile')->with('alert', [
                'message' => "Ocorreu um erro ao atualizar o usuário!",
                'type' => 'danger',
            ]);
        }
    }
}
