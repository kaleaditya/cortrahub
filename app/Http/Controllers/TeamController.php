<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use DB;
class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::get();
        return view('team.index', compact('teams'));
    }

    public function create()
    {
        return view('team.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $uploaded = '';
        if ($request->hasFile('image'))
        {
            $image = $request->file('image');
            $uploaded = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/all_image');
            $image->move($destinationPath, $uploaded);
        }

        $team = New Team();
        $team->name = $request->name;
        $team->designation = $request->designation;
        $team->description = $request->description;
        $team->image = $uploaded;
        $team->save();
        return redirect()->route('teams.index')->with('message', 'Team created.');
    }

    public function edit(Team $team)
    { 
        return view('team.edit', compact('team'));
    }

    public function update(Request $request, Team $team)
    {
        // return $team;
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
        $uploaded = '';
        if ($request->hasFile('image'))                                                                                 
        {
            $image = $request->file('image');
            $uploaded = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/all_image');
            $image->move($destinationPath, $uploaded);
        }else{
            $uploaded = $request->old_image;
        }
        $team = Team::find($team->id);
        $team->name = $request->name;
        $team->designation = $request->designation;
        $team->description = $request->description;
        $team->image = $uploaded;
        $team->save();
        return redirect()->route('teams.index')->with('message', 'Team created.');
    }

    public function destroy(Team $team)
    {
        $team->delete();
        return redirect()->route('teams.index')->with('message', 'Team deleted.');
    }

}


