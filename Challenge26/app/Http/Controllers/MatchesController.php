<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests\MatchRequest;

use App\Models\Team;
use App\Models\Matches;


class MatchesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $matches =  Matches::orderBy('date', 'asc')->get();
        return view('matches.administrator.matches', compact('matches'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teams = Team::all();
        return view('matches.administrator.createMatch', compact('teams'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MatchRequest $request)
    {
        $data = $request->except('_token');

        try {
            $match = Matches::create($data);
            return redirect()->route('matches')->with('success', 'Match successfully created!');
        } catch (\Exception $exception) {
            return redirect()->route('matches')->with('error', 'Something went wrong!');
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
        $match = Matches::find($id);
        $teams = Team::all();
        if ($match) {
            return view('matches.administrator.editMatch', compact('match', 'teams'));
        } else {
            return redirect()->route('matches')->with('error', 'Something went wrong!');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MatchRequest $request, string $id)
    {
        $match = Matches::find($id);
        $id = $match->id;
        $data = $request->except('_token');

        if ($match) {
            try {
                $match->update($data);
                return redirect()->route('matches')->with('success', "Match with ID $id successfully updated!");
            } catch (\Exception $exception) {
                return redirect()->route('matches')->with('error', 'Something went wrong!');
            }
        } else {
            return redirect()->route('matches')->with('error', 'Something went wrong!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $match = Matches::find($id);
        $id = $match->id;

        if ($match) {
            $match->delete();
            return redirect()->route('matches')->with('success', "Match with ID $id successfully deleted!");
        } else {
            return redirect()->route('matches')->with('error', 'Something went wrong!');
        }
    }
}
