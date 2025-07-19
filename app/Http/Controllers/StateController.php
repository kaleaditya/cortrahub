<?php

namespace App\Http\Controllers;

use App\Models\State;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $states = State::with('country')->latest()->paginate(10);
        return view('states.index', compact('states'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = Country::where('is_active', true)->get();
        return view('states.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'country_id' => 'required|exists:countries,id',
            'name' => 'required|string|max:255',

            'is_active' => 'boolean'
        ]);

        State::create($request->all());

        return redirect()->route('states.index')
            ->with('success', 'State created successfully.');
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
    public function edit(State $state)
    {
        $countries = Country::where('is_active', true)->get();
        return view('states.edit', compact('state', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, State $state)
    {
        $request->validate([
            'country_id' => 'required|exists:countries,id',
            'name' => 'required|string|max:255',

            'is_active' => 'boolean'
        ]);

        $state->update($request->all());

        return redirect()->route('states.index')
            ->with('success', 'State updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(State $state)
    {
        $state->delete();

        return redirect()->route('states.index')
            ->with('success', 'State deleted successfully.');
    }

    public function getByCountry(Request $request)
    {
        try {
            Log::info('getByCountry called with request:', $request->all());

            if (!$request->has('country_id')) {
                Log::warning('Country ID not provided in request');
                return response()->json(['error' => 'Country ID is required'], 400);
            }

            $countryId = $request->country_id;
            Log::info('Fetching states for country_id: ' . $countryId);

            // First check if the country exists
            $countryExists = DB::table('countries')->where('id', $countryId)->exists();
            if (!$countryExists) {
                Log::warning('Country not found with ID: ' . $countryId);
                return response()->json(['error' => 'Country not found'], 404);
            }

            $states = State::where('country_id', $countryId)
                          ->where('is_active', 1)
                          ->orderBy('name')
                          ->get(['id', 'name']);

            Log::info('States fetched:', ['count' => $states->count(), 'states' => $states->toArray()]);

            // Return the states data
            return response()->json([
                'states' => $states->toArray()
            ]);

        } catch (\Exception $e) {
            Log::error('Error in getByCountry: ' . $e->getMessage(), [
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString()
            ]);
            return response()->json(['error' => 'Failed to fetch states: ' . $e->getMessage()], 500);
        }
    }

     function statusChange($id){
        $state = State::where('id',$id)->first();
        if($state->is_active == 1){
            $status = 0;
        }else{
            $status = 1;
        }
        // return $status;
        $state->is_active = $status;
        $state->save();
        return redirect()->back()->with('message','Status Changed.');
    }


}
