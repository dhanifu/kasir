<?php

namespace App\Http\Controllers;

use App\Services\StuffService;
use App\Services\UserService;
use App\Services\TransactionService;

use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(StuffService $stuff, UserService $user, TransactionService $transaction)
    {
        $totalStuff = $stuff->countData();
        $totalUser = $user->countData();
        $totalTransaction = $transaction->countData();
        $transactionToday = $transaction->countToday();

        return view('home', compact('totalStuff', 'totalUser', 'totalTransaction', 'transactionToday'));
    }
}
