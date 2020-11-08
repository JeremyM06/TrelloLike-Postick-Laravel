<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Table;
use App\Col;
use App\Card;
use App\Com;


class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('boards', [
            'table' => Table::all()->where('user_id', Auth::user()->id),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $userCo = Auth::user();
        $table = new Table();
        $table->title = $request->title;
        $table->user_id = $userCo->id;
        $table->save();

        $table = Table::all()->last();
        $col = new Col();
        $col->title = 'À faire';
        $col->table_id = $table->id;
        $col->save();
        $col = new Col();
        $col->title = 'En cours';
        $col->table_id = $table->id;
        $col->save();
        $col = new Col();
        $col->title = 'Urgent';
        $col->table_id = $table->id;
        $col->save();

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        return view('tables', [
            'table' => $request->tableId,
            'tables' => Table::all()->where('id', $request->tableId),
            'cols' => Col::all()->where('table_id', $request->tableId),
            'cards' => Card::all(),
            'coms' => Com::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
