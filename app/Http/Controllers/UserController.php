<?php

namespace App\Http\Controllers;
use App\Models\State;
use App\Models\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Experience;
use App\Models\Country;
use App\Models\Language;
use App\Models\Product;
use Illuminate\Support\Str;
use App\Models\User;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Auth;
use Illuminate\Support\Arr;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Mail\UserCreatedMail;
use Illuminate\Support\Facades\Hash as FacadesHash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): View
    {
        $data = User::latest()->where('id','!=',2)->get();
        return view('users.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }


    function sendMail($id)
    {
        try {
            $user = User::findOrFail($id);
            Mail::to($user->email)->send(new UserCreatedMail($user));
            $user->mail_status = 1;
            $user->save();
            return redirect()->back()->with('message', 'Email sent successfully');

        } catch (\Exception $e) {
            // Log the error if needed: Log::error($e);
            return redirect()->back()->with('error', 'Something went wrong while sending the email.');
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        $roles = Role::pluck('name','name')->all();
        $experiences = Experience::where('is_active',1)->get();
        $languages = Language::where('is_active',1)->get();
        $others = Product::where('is_active',1)->get();
        return view('users.create',compact('roles','experiences','languages','others'));
    }

    public function store(Request $request)
    {



        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);

         $uploaded = '';
        if ($request->hasFile('image'))
        {
            $image = $request->file('image');
            $uploaded = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/all_image');
            $image->move($destinationPath, $uploaded);
        }



        $input = $request->all();
        $input['show_password'] = $request->password;
        $input['password'] = FacadesHash::make($input['password']);
        $input['slug'] = Str::slug($request->name);
        $input['image'] = $uploaded;

        $user = User::create($input);
        $user->assignRole($request->input('roles'));
        Mail::to($user->email)->send(new UserCreatedMail($user));
        return redirect()->route('users.index')
                        ->with('message','User created successfully and email sent');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): View
    {
        $user = User::find($id);
        return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $countries = Country::all();
        $user = User::find($id);
        $roleIds = $user->roles->pluck('id');
        
        $roles = Role::where('id', '!=', 1)->pluck('name', 'name')->all();
        $selectedRoles = $user->roles->pluck('name')->toArray(); // ['Finance']
        $userRole = $user->roles->pluck('name','name')->all();
        $experiences = Experience::where('category_id',$roleIds[0])->where('is_active',1)->get();
        $languages = Language::where('is_active',1)->get();
        $others = Product::where('category_id',$roleIds[0])->where('is_active',1)->get();
    // return $user;

        $userfindId = Auth::id();
        if($userfindId == 2){
            return view('users.edit', compact('user', 'roles', 'userRole', 'experiences', 'languages', 'others','countries','selectedRoles'));

        }else{
            return view('users.formedit', compact('user', 'roles', 'userRole', 'experiences', 'languages', 'others','countries','selectedRoles'));
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        
        
        $this->validate($request, [
            'header_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|dimensions:width=830,height=320',
            'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|dimensions:width=830,height=320',
            'youtube_intro' => 'nullable|url',
            'youtube_channel' => 'nullable|url',
   
], [
    'header_image.dimensions' => 'Header image must be exactly 830 x 320 pixels.',
    'banner_image.dimensions' => 'Banner image must be exactly 830 x 320 pixels.',
]);

     

        $uploaded = '';
        if ($request->hasFile('image'))
        {
            $image = $request->file('image');
            $uploaded = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/all_image');
            $image->move($destinationPath, $uploaded);
        }else{
            $uploaded = $request->old_image;
        }


         $uploadedbanner_image = '';
        if ($request->hasFile('banner_image'))
        {
            $banner_image = $request->file('banner_image');
            $uploadedbanner_image = time() . '.q' . $banner_image->getClientOriginalExtension();
            $destinationPath = public_path('/all_image');
            $banner_image->move($destinationPath, $uploadedbanner_image);
        }else{
            $uploadedbanner_image = $request->old_banner_image;
        }


         $uploadedheader_image = '';
        if ($request->hasFile('header_image'))
        {
            $header_image = $request->file('header_image');
            $uploadedheader_image = time() . '.3' . $header_image->getClientOriginalExtension();
            $destinationPath = public_path('/all_image');
            $header_image->move($destinationPath, $uploadedheader_image);
        }else{
            $uploadedheader_image = $request->old_header_image;
        }



        $input = $request->all();
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));
        }
        // Handle multi-selects (convert arrays to CSV)

        $user = User::find($id);
            // if(Auth::id() != 2){
        $input['experience'] = isset($input['experience']) ? implode(',', $input['experience']) : '';
        $input['language'] = isset($input['language']) ? implode(',', $input['language']) : '';
        $input['other'] = isset($input['other']) ? implode(',', $input['other']) : '';
        $input['image'] = $uploaded;
        $input['header_image'] = $uploadedheader_image;
        $input['banner_image'] = $uploadedbanner_image;

            // }

        $user->update($input);
        // DB::table('model_has_roles')->where('model_id',$id)->delete();

        // $user->assignRole($request->input('roles'));

        if(Auth::id() == 2 ){

            return redirect()->route('users.index')
                            ->with('message','User updated successfully');
        }else{

           return redirect()->back()
                            ->with('message','User updated successfully');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id): RedirectResponse
    {
        User::find($id)->delete();
        return redirect()->route('users.index')
                        ->with('message','User deleted successfully');
    }

     public function getStates($country_id)
    {
        $states = State::where('country_id', $country_id)->get();
        return response()->json($states);
    }

    public function getCities($state_id)
    {
        $cities = City::where('state_id', $state_id)->get();
        return response()->json($cities);
    }

}