<?php

namespace App\Http\Controllers;

use App\Services\StuffService;
use App\Services\UserService;

use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(StuffService $stuff, UserService $user)
    {
        $totalStuff = $stuff->countData();
        $totalUser = $user->countData();
        return view('home', compact('totalStuff', 'totalUser'));
    }
}
