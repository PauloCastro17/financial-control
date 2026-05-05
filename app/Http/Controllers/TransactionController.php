<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\View\View;
use JetBrains\PhpStorm\NoReturn;

class TransactionController extends Controller
{
    //
    public function index(Request $request) :View
    {

        $search = trim($request->input('search'));

        $transactions = auth()->user()
            ->transactions()
            ->with('category')
            ->orderBy('created_at', 'desc')
            ->when($search, function ($query) use ($search) {
                $query->whereHas('category', function ($q) use ($search) {
                    $q->where('name', 'LIKE', "%{$search}%");
                });
            })
            ->get();

        $categories = auth()->user()->categories()->get();

        return view('transactions.transactions', compact('transactions', 'categories'));
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

        return redirect()->route('site.transactions')->with('alert', [
            'message' => "Transação cadastrada com sucesso!",
            'type' => 'success',
        ]);

    }

    public function destroy(Request $request)
    {
        $idTransaction = $request->input('id-transaction');

        Transaction::query()->where('id', $idTransaction)->delete();

        return redirect()->route('site.transactions')->with('alert', [
            'message' => "Transação deletada com sucesso!",
            'type' => 'success',
        ]);

    }

    public function edit(string $id)
    {
        $dataTransaction = Transaction::query()->with('category')->find($id);

        if(!$dataTransaction) {
            return redirect()->route('site.transactions')->with('alert', [
                'message' => "Erro ao buscar dados da tr deletada com sucesso!",
                'type' => 'success',
            ]);
        }

        return response()->json([
            'transaction' => $dataTransaction
        ]);
    }


    public function update(Request $request)
    {
        $category = $request->input('category_update') ;

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

        $updateTransaction = Transaction::query()
            ->where('id', $request->input('id-transaction'))
            ->update([
            'user_id' => auth()->user()->id,
            'type' => $request->input('type_update'),
            'amount' => $request->input('amount_update'),
            'status' => 'PENDING',
            'category_id' => $idCategory,
            'description' => "TESE"
        ]);

        return redirect()->route('site.transactions')->with('alert', [
            'message' => "Transação atualizada com sucesso!",
            'type' => 'success',
        ]);
    }
}
