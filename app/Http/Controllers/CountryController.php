<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $countries = Country::latest()->paginate(10);
        return view('countries.index', compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('countries.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'nullable|string|max:3',
            'phone_code' => 'nullable|string|max:20',
            'is_active' => 'boolean'
        ]);

        Country::create($request->all());

        return redirect()->route('countries.index')
            ->with('success', 'Country created successfully.');
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
    public function edit(Country $country)
    {
        return view('countries.edit', compact('country'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Country $country)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'nullable|string|max:3',
            'phone_code' => 'nullable|string|max:20',
            'is_active' => 'boolean'
        ]);

        $country->update($request->all());

        return redirect()->route('countries.index')
            ->with('success', 'Country updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Country $country)
    {
        $country->delete();

        return redirect()->route('countries.index')
            ->with('success', 'Country deleted successfully.');
    }

    function statusChange($id){
        $country = Country::where('id',$id)->first();
        if($country->is_active == 1){
            $status = 0;
        }else{
            $status = 1;
        }
        // return $status;
        $country->is_active = $status;
        $country->save();
        return redirect()->back()->with('message','Status Changed.');
    }

}
