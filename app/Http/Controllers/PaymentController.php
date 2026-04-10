<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class PaymentController extends Controller
{
    public function index() :View
    {
        $payments = auth()->user()->payments;

        return view('payments.payments', ["subPagMenu" => "payments", "payments" => $payments]);
    }
}
