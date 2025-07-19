<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;
use DB;
class ExperienceController extends Controller
{
    public function index()
    {
        $experiences = Experience::with('role')->get();
        $roles = DB::table('roles')->where('id','!=',1)->get();
        // return $experiences;
        return view('experience.index', compact('experiences','roles'));
    }

    public function create()
    {
         $roles = DB::table('roles')->where('id','!=',1)->get();
        return view('experience.create',compact('roles'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
        ]);
        $data['is_active'] = $request->has('is_active') ? 1 : 0;
        $data['category_id'] = $request->category_id;

        Experience::create($data);

        return redirect()->route('experiences.index')->with('message', 'Experience created.');
    }

    public function edit(Experience $experience)
    { $roles = DB::table('roles')->where('id','!=',1)->get();
        return view('experience.edit', compact('experience','roles'));
    }

    public function update(Request $request, Experience $experience)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
        ]);
        $data['is_active'] = $request->has('is_active') ? 1 : 0;
        $data['category_id'] = $request->category_id;

        $experience->update($data);

        return redirect()->route('experiences.index')->with('message', 'Experience updated.');
    }

    public function destroy(Experience $experience)
    {
        $experience->delete();
        return redirect()->route('experiences.index')->with('message', 'Experience deleted.');
    }

     function experienceChange($id){
        $role_info = Experience::find($id);
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

