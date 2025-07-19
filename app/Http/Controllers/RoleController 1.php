<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\RoleInfo;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        //  $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
        //  $this->middleware('permission:role-create', ['only' => ['create','store']]);
        //  $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
        //  $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): View
    {
        dd('dfg');
        $roles = Role::orderBy('id','DESC')->where('id','!=',52)->get();
        return view('roles.index',compact('roles'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        $permission = Permission::get();
        return view('roles.create',compact('permission'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|dimensions:width=60,height=60',
        ], [
            'image.dimensions' => 'The image must be exactly 60 pixels in width and 60 pixels in height.',
            'image.required' => 'The image field is required.',
            'image.image' => 'The uploaded file must be an image.',
            'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif, svg.',
        ]);


        $permissionsID = ["1"=>1];



        // $permissionsID = array_map(
        //     function($value) { return (int)$value; },
        //     $request->input('permission')
        // );
        // return $permissionsID;

        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($permissionsID);


        $uploaded = '';
        if ($request->hasFile('image'))
        {
            $image = $request->file('image');
            $uploaded = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/all_image');
            $image->move($destinationPath, $uploaded);
        }

         $roleInfo = new RoleInfo();
         $roleInfo->role_id = $role->id;
         $roleInfo->image = $uploaded;
        //  $roleInfo->meta_title = $request->meta_title;
        //  $roleInfo->meta_kewords = $request->meta_kewords;
        //  $roleInfo->meta_description = $request->meta_description;
         $roleInfo->is_active = $request->is_active;
         $roleInfo->save();

        return redirect()->route('roles.index')
                        ->with('message','Role created successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): View
    {
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
            ->where("role_has_permissions.role_id",$id)
            ->get();

        return view('roles.show',compact('role','rolePermissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id): View
    {
        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();

        return view('roles.edit',compact('role','permission','rolePermissions'));
    }


    public function update(Request $request, $id): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required',

        ]);

        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();

        // $permissionsID = array_map(
        //     function($value) { return (int)$value; },
        //     $request->input('permission')
        // );

        $permissionsID = ["1"=>1];


        $role->syncPermissions($permissionsID);


        $uploaded = '';
        if ($request->hasFile('image'))
        {
            $image = $request->file('image');
            $uploaded = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/all_image');
            $image->move($destinationPath, $uploaded);
        }
        else{
            $uploaded=$request->old_image;
        }

         $roleInfo =  RoleInfo::where('role_id',$id)->first();
         $roleInfo->role_id = $role->id;
         $roleInfo->image = $uploaded;
         $roleInfo->meta_title = $request->meta_title;
         $roleInfo->meta_kewords = $request->meta_kewords;
         $roleInfo->meta_description = $request->meta_description;
         $roleInfo->is_active = $request->is_active;
         $roleInfo->save();

        return redirect()->route('roles.index')
                        ->with('success','Role updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id): RedirectResponse
    {
        DB::table("roles")->where('id',$id)->delete();
        return redirect()->route('roles.index')
                        ->with('message','Role deleted successfully');
    }
    function statusChange($id){
        $role_info = RoleInfo::where('role_id',$id)->first();
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