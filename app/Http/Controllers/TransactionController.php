<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\View\View;
use JetBrains\PhpStorm\NoReturn;

class TransactionController extends Controller
{
    //
    public function index() :View
    {

        $transactions = auth()->user()
            ->transactions()
            ->with('category')
            ->get();

        return view('transactions.transactions', compact('transactions'));
    }

    public function store(Request $request)
    {
        $category = $request->input('category') ;

        $newCategory = null;
        $idCategory = 0;

        if (is_numeric($category)) {
            // já é uma categoria existente
            $idCategory = (int) $category;
        } else {
            // nova categoria
            $newCategory = Category::create([
                'user_id' => auth()->id(),
                'name' => $category,
            ]);

            $idCategory = $newCategory->id;
        }

        $newTransaction = Transaction::query()->create([
            'user_id' => auth()->user()->id,
            'type' => $request->input('type'),
            'amount' => $request->input('amount'),
            'status' => 'PENDING',
            'category_id' => $idCategory,
            'description' => "TESE"
        ]);

        return redirect()->route('site.transactions')->with('success', "Transação cadastrada com sucesso!, {$newTransaction->status}");

    }
}
