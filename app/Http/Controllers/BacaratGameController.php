<?php

namespace App\Http\Controllers;

use App\BacaratGame;
use Illuminate\Http\Request;

class BacaratGameController extends Controller
{

    public function newGame(){
        return view('games.bacarat.main', []);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BacaratGame  $bacaratGame
     * @return \Illuminate\Http\Response
     */
    public function show(BacaratGame $bacaratGame)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BacaratGame  $bacaratGame
     * @return \Illuminate\Http\Response
     */
    public function edit(BacaratGame $bacaratGame)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BacaratGame  $bacaratGame
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BacaratGame $bacaratGame)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BacaratGame  $bacaratGame
     * @return \Illuminate\Http\Response
     */
    public function destroy(BacaratGame $bacaratGame)
    {
        //
    }
}
