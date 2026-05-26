<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class DashboardController extends Controller
{
    //
    public function index(): View
    {
        $dataChart = auth()->user()
            ->transactions()
            ->where('status_transaction', 'PAID')
            ->selectRaw("DATE_FORMAT(transaction_date, '%Y-%m') as month,
                                    SUM(CASE WHEN type = 'INCOME' THEN amount ELSE 0 END) as income,
                                    SUM(CASE WHEN type = 'EXPENSE' THEN amount ELSE 0 END) as expense")
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $transactions = auth()->user()
            ->transactions()
            ->with(['category', 'wallet'])
            ->where('status_transaction', 'PAID')
            ->whereIn('status', [0, 1])
            ->orderBy('transaction_date', 'desc')
            ->limit(3)
            ->get();

        $months = $dataChart->pluck('month');
        $income = $dataChart->pluck('income');
        $expense = $dataChart->pluck('expense');

        $allExpenseTransactions = auth()->user()
            ->transactions()
            ->where('status_transaction', 'PAID')
            ->where('type', 'EXPENSE')
            ->sum('amount');

        $allIncomeTransactions = auth()->user()
            ->transactions()
            ->where('status_transaction', 'PAID')
            ->where('type', 'INCOME')
            ->sum('amount');

        $allValuesWallets = auth()->user()
            ->wallets()
            ->whereIn('status', [0, 1])
            ->sum('balance');

        $finalBalance = ($allValuesWallets + $allIncomeTransactions) - $allExpenseTransactions;


        return view('dashboard.dashboard', compact('months', 'income', 'expense', 'transactions', 'allExpenseTransactions', 'allIncomeTransactions', 'finalBalance'));

    }

}
