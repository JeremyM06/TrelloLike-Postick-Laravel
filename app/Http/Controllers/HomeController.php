<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Blade;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        header("Refresh: 2; URL=/table");
        return view('home');
    }
}
