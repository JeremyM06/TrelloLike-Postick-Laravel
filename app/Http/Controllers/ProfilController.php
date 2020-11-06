<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Expr\Isset_;

class ProfilController extends Controller
{

    public function index()
    {
        return view('profil', [
            'user' => User::all()->where('id', Auth::user()->id),
        ]);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request)
    {
        $request->validate([
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|string|email|max:255|unique:users',
            'password' => 'nullable|string|min:3|confirmed',

        ]);
        $user = Auth::user();

        if ($request->name) {
            $user->name = $request->name;
        }


        if ($request->email) {
            $user->email = $request->email;
        }

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }


        $user->save();
        return back();
    }


    public function destroy($id)
    {
        //
    }
}
