<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

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

    public function create(Request $data)
    {
        dd($data->input());
    }
}
