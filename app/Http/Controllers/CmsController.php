<?php

namespace App\Http\Controllers;

use App\Models\Cms;
use App\Models\Company;
use Illuminate\Http\Request;

class CmsController extends Controller
{
    public function index()
    {
        $cms = Cms::latest()->get();
        return view('cms.index', compact('cms'));
    }

    public function create()
    {
        return view('cms.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'page_title' => 'nullable|string|max:255',
            'meta_title' => 'nullable|string|max:255',
            'meta_keywords' => 'nullable|string',
            'meta_description' => 'nullable|string',
        ]);

        Cms::create([
            'title' => $request->title,
            'description' => $request->description,
            'page_title' => $request->page_title,
            'meta_title' => $request->meta_title,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description,
            'is_active' => $request->has('is_active') ? 1 : 0
        ]);

        return redirect()->route('cms.index')
            ->with('success', 'CMS page created successfully.');
    }

    public function show(Cms $cms)
    {
        return view('cms.show', compact('cms'));
    }

    public function edit($id)
    {
        $cms = Cms::find($id);
        return view('cms.edit', compact('cms'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'page_title' => 'nullable|string|max:255',
            'meta_title' => 'nullable|string|max:255',
            'meta_keywords' => 'nullable|string',
            'meta_description' => 'nullable|string',
        ]);

        $cms = Cms::find($id);
        $cms->update([
            'title' => $request->title,
            'description' => $request->description,
            'page_title' => $request->page_title,
            'meta_title' => $request->meta_title,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description,
            'is_active' => $request->has('is_active') ? 1 : 0
        ]);

        return redirect()->route('cms.index')
            ->with('success', 'CMS page updated successfully.');
    }

    public function destroy($id)
    {
        $cms = Cms::find($id);
        $cms->delete();
        return redirect()->route('cms.index')
            ->with('success', 'CMS page deleted successfully.');
    }

    function getCompany(){
        $companies = Company::get();
        return view('company.index',compact('companies'));
    }
    function companyShow($id){
        $company = Company::find($id);
        // return $company;
        return view('company.show',compact('company'));
    }
}
