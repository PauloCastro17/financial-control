<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class DashboardController extends Controller
{
    //
    public function index(): View
    {

        $payments = auth()->user()->payments()
            ->where("status", "COMPLETED")
            ->selectRaw('DATE_FORMAT(created_at, "%Y-%m") as month, SUM(value) as total')
            ->groupBy('month')
            ->orderBy('month')
            ->get()
            ->map(fn($item) => [
                'x' => \Carbon\Carbon::createFromFormat('Y-m', $item->month)->format('M/Y'),
                'y' => number_format($item->total, 2, '.', '')
            ]);

        $transactions = auth()->user()->transactions()
            ->where("status", "COMPLETED")
            ->selectRaw('DATE_FORMAT(created_at, "%Y-%m") as month, SUM(value) as total')
            ->groupBy('month')
            ->orderBy('month')
            ->get()
            ->map(fn($item) => [
                'x' => \Carbon\Carbon::createFromFormat('Y-m', $item->month)->format('M/Y'),
                'y' => number_format($item->total, 2, '.', '')
            ]);


        return view('dashboard.dashboard', ["subPagMenu" => "dashboard", "payments" => $payments, "transactions" => $transactions]);
    }

}
