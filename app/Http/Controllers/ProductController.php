<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use DB;
class ProductController extends Controller
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
    public function index()
    {
        $products = Product::with('role')->orderBy('id','desc')->get();
        return view('products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        $roles = DB::table('roles')->where('id','!=',1)->get();
        return view('products.create',compact('roles'));
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


        Product::create($request->all());

        return redirect()->route('products.index')
                        ->with('message','Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product): View
    {
        return view('products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product): View
    {
        $roles = DB::table('roles')->where('id','!=',1)->get();
        return view('products.edit',compact('product','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product): RedirectResponse
    {
         request()->validate([
            'title' => 'required',

        ]);

        $product->update($request->all());

        return redirect()->route('products.index')
                        ->with('message','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();

        return redirect()->route('products.index')
                        ->with('message','Product deleted successfully');
    }

    function productChange($id){
        $role_info = Product::find($id);
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
