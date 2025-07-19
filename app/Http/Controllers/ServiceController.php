<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use DB;
class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index','show']]);
         $this->middleware('permission:product-create', ['only' => ['create','store']]);
         $this->middleware('permission:product-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $products = Service::with('role')->orderBy('id','desc')->get();
        return view('service.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        $roles = DB::table('roles')->where('id','!=',1)->get();
        return view('service.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'title' => 'required',
        ]);


        Service::create($request->all());

        return redirect()->route('service.index')
                        ->with('message','Service created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service): View
    {
        return view('products.show',compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $Service): View
    {

        $roles = DB::table('roles')->where('id','!=',1)->get();
        return view('service.edit',compact('Service','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $Service): RedirectResponse
    {
         request()->validate([
            'title' => 'required',

        ]);

        $Service->update($request->all());

        return redirect()->route('service.index')
                        ->with('message','Service updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $Service): RedirectResponse
    {
        $Service->delete();

        return redirect()->route('service.index')
                        ->with('message','Service deleted successfully');
    }

    function serviceChange($id){
        $role_info = Service::find($id);
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
