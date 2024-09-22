<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Player;
use App\Http\Requests\PlayerRequest;



class PlayersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $players = Player::all();
        return view('matches.administrator.players', compact('players'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teams = Team::all();
        return view('matches.administrator.createPlayer', compact('teams'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PlayerRequest $request)
    {
        $data = $request->except('_token');

        try {
            $player = Player::create($data);
            return redirect()->route('players')->with('success', "Player $player->name successfully created!");
        } catch (\Exception $exception) {
            return redirect()->route('players')->with('error', 'Something went wrong!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $player = Player::find($id);
        $teams = Team::all();

        if ($player) {
            return view('matches.administrator.editPlayer', compact('player', 'teams'));
        } else {
            return redirect()->route('players')->with('error', 'Something went wrong!');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PlayerRequest $request, string $id)
    {
        $player = Player::find($id);
        $data = $request->except('_token');

        if ($player) {
            try {
                $player->update($data);
                return redirect()->route('players')->with('success', "Player $player->name successfully updated!");
            } catch (\Exception $exception) {
                return redirect()->route('players')->with('error', 'Something went wrong!');
            }
        } else {
            return redirect()->route('players')->with('error', 'Something went wrong!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $player = Player::find($id);

        if ($player) {
            $name = $player->name;
            $player->delete();
            return redirect()->route('players')->with('success', "Player $name successfully deleted!");
        } else {
            return redirect()->route('players')->with('error', 'Something went wrong!');
        }
    }
}
