<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ContendershipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function twitchIndex(Request $request) {
        $twitchUsers = User::orderBy('twitch_score', 'desc')->paginate(10);
        if ($request->ajax()) {

            return view('twitch-result', compact('twitchUsers'));
        }

//        dd($users);
        return view('contender.twitch.index' , compact( 'twitchUsers'));
    }

    public function index(Request $request)
    {

        $users = User::orderBy('score', 'desc')->paginate(10);
        $twitchUsers = User::orderBy('twitch_score', 'desc')->paginate(10);

        if ($request->ajax()) {

            return view('result', compact('users'));
        }

//        dd($users);
        return view('contender.index' , compact('users'));
//        return view('contender.index');
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
    public function edit($id)
    {
        //
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
