<?php


namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function index()
    {
        $languages = Language::all();
        return view('languages.index', compact('languages'));
    }

    public function create()
    {
        return view('languages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);
        Language::create($request->all());
        return redirect()->route('languages.index')->with('message', 'Language created successfully.');
    }

    public function edit(Language $language)
    {
        return view('languages.edit', compact('language'));
    }

    public function update(Request $request, Language $language)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);
        $language->update($request->all());
        return redirect()->route('languages.index')->with('message', 'Language updated successfully.');
    }

    public function destroy(Language $language)
    {
        $language->delete();
        return redirect()->route('languages.index')->with('message', 'Language deleted successfully.');
    }

      function languageChange($id){
        $role_info = Language::find($id);
            if($role_info->is_active == 1){
                $status = 0;
            }else{
                $status = 1;
            }
            // return $status;
            $role_info->is_active = $status;
            $role_info->save();
            return redirect()->back()->with('message','Status Changed.');
    }


}

