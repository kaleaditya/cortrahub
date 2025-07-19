<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cities = City::with(['country', 'state'])->get();
        return view('cities.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = Country::where('is_active', 1)->orderBy('name')->get();
        return view('cities.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'country_id' => 'required|exists:countries,id',
                'state_id' => 'required|exists:states,id',
                'name' => 'required|string|max:255',

            ]);

            City::create([
                'country_id' => $request->country_id,
                'state_id' => $request->state_id,
                'name' => $request->name,
                'code' => $request->code,
                'is_active' => 1
            ]);

            return redirect()->route('cities.index')
                ->with('success', 'City created successfully.');
        } catch (\Exception $e) {
            Log::error('Error creating city: ' . $e->getMessage());
            return redirect()->back()
                ->withInput()
                ->with('error', 'Error creating city. Please try again.');
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
    public function edit(City $city)
    {
        $countries = Country::where('is_active', 1)->orderBy('name')->get();
        $states = State::where('country_id', $city->country_id)
                      ->where('is_active', 1)
                      ->orderBy('name')
                      ->get();
        return view('cities.edit', compact('city', 'countries', 'states'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, City $city)
    {
        try {
            $request->validate([
                'country_id' => 'required|exists:countries,id',
                'state_id' => 'required|exists:states,id',
                'name' => 'required|string|max:255',

            ]);

            $city->update([
                'country_id' => $request->country_id,
                'state_id' => $request->state_id,
                'name' => $request->name,
                'code' => $request->code,
            ]);

            return redirect()->route('cities.index')
                ->with('success', 'City updated successfully.');
        } catch (\Exception $e) {
            Log::error('Error updating city: ' . $e->getMessage());
            return redirect()->back()
                ->withInput()
                ->with('error', 'Error updating city. Please try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(City $city)
    {
        try {
            $city->delete();
            return redirect()->route('cities.index')
                ->with('success', 'City deleted successfully.');
        } catch (\Exception $e) {
            Log::error('Error deleting city: ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'Error deleting city. Please try again.');
        }
    }

    public function getStates(Request $request)
    {
        $states = State::where('country_id', $request->country_id)
            ->where('is_active', true)
            ->get();
        return response()->json($states);
    }

    function statusChange($id){
        $city = City::where('id',$id)->first();
        if($city->is_active == 1){
            $status = 0;
        }else{
            $status = 1;
        }
        // return $status;
        $city->is_active = $status;
        $city->save();
        return redirect()->back()->with('message','Status Changed.');
    }
}
