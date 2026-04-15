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

        return view('dashboard.dashboard', [
            "subPagMenu" => "dashboard",
            /*"categories" => $categories,
            "payments" => $paymentsSeries,
            "transactions" => $transactionsSeries,*/
        ]);

    }

}
