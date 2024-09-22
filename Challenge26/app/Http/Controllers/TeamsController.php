<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TeamRequest;
use App\Models\Team;

class TeamsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = Team::all();
        return view('matches.administrator.teams', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('matches.administrator.createTeam');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TeamRequest $request)
    {

        $data = $request->except('_token');

        try {
            $team = Team::create($data);
            return redirect()->route('teams')->with('success', "Team $team->name successfully created!");
        } catch (\Exception $exception) {
            return redirect()->route('teams')->with('error', 'Something went wrong!');
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
        $team = team::find($id);
        if ($team) {
            return view('matches.administrator.editTeam', compact('team'));
        } else {
            return redirect()->route('teams')->with('error', 'Something went wrong!');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TeamRequest $request, string $id)
    {
        $team = Team::find($id);
        $data = $request->except('_token');

        if ($team) {
            try {
                $team->update($data);
                return redirect()->route('teams')->with('success', "Team $team->name successfully updated!");
            } catch (\Exception $exception) {
                return redirect()->route('teams')->with('error', 'Something went wrong!');
            }
        } else {
            return redirect()->route('teams')->with('error', 'Something went wrong!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $team = Team::find($id);

        if ($team) {
            $name = $team->name;
            $team->delete();
            return redirect()->route('teams')->with('success', "Team $name successfully deleted!");
        } else {
            return redirect()->route('teams')->with('error', 'Something went wrong!');
        }
    }
}
