<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\View\View;

class WalletController extends Controller
{
    //
    public function index(Request $request) :View
    {
        $search = trim($request->input('search'));

        $wallets = auth()->user()
            ->wallets()
            ->whereIn('status', [0, 1])
            ->orderBy('created_at', 'desc')
            ->when($search, function ($query) use ($search) {
                $query->where('name', 'LIKE', "%$search%");
            })
            ->get();

        return view('wallets.wallets', compact('wallets'));

    }

    public function store(Request $request)
    {
        Wallet::query()->create([
            'name' => $request->input('name'),
            'balance' => $request->input('balance'),
            'type' => $request->input('type'),
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('site.wallets')->with('alert', [
            'message' => "Carteira cadastrada com sucesso!",
            'type' => 'success',
        ]);
    }

    public function edit(string $id)
    {
        $dataWallet = Wallet::query()->find($id);

        if(!$dataWallet) {
            return redirect()->route('site.wallets')->with('alert', [
                'message' => "Erro ao buscar dados da carteira!",
                'type' => 'error',
            ]);
        }

        return response()->json([
            'wallet' => $dataWallet
        ]);
    }

    public function update(Request $request)
    {
        Wallet::query()
            ->where('id', $request->input('id-wallet'))
            ->update([
                'name' => $request->input('name_update'),
                'balance' => $request->input('balance_update'),
                'type' => $request->input('type_update'),
        ]);

        return redirect()->route('site.wallets')->with('alert', [
            'message' => "Carteira atualizada com sucesso!",
            'type' => 'success',
        ]);
    }
}
