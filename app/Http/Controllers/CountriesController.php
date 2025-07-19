<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\ManageOrder;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class CountriesController extends Controller
{
    public function index()
    {
        $countries = Country::orderBy('id', 'desc')->get();
        return view('countries.index', compact('countries'));
    }

    public function create()
    {
        return view('countries.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2',
        ]);

        Country::create($request->all());
        return redirect()->route('countries')->with('message', 'Country created successfully.');
    }

    public function edit($id)
    {
        $country = Country::findOrFail($id);
        return view('countries.edit', compact('country'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:2',
        ]);

        $country = Country::findOrFail($id);
        $country->update($request->all());
        return redirect()->route('countries')->with('message', 'Country updated successfully.');
    }

    public function destroy($id)
    {
        $country = Country::findOrFail($id);
        $country->delete();
        return redirect()->route('countries')->with('message', 'Country deleted successfully.');
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
