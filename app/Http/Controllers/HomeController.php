<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Blade;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Null_;

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
        $user = Auth::user();
        if ($user->photo == NULL) {

            $user->photo = 'a' . (($user->id) % 10);
            $user->save();
        }
        header("Refresh: 2; URL=/table");
        return view('home');
    }
}
