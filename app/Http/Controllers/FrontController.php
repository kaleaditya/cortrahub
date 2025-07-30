<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\RoleInfo;
use App\Models\Countries;
use App\Models\Experience;
use App\Models\User;
use App\Models\Country;
use App\Models\Product;
use App\Models\Language;
use App\Models\UserImage;
use App\Models\VideoGallery;
use App\Models\ManageDocument;
use Illuminate\Support\Facades\Log;
use App\Models\Cms;
use App\Models\City;
use App\Models\Team;
use App\Models\Company;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Hash as FacadesHash;
use Spatie\Permission\Models\Role;
use App\Models\Plan;
class FrontController extends Controller
{
    function frontHome(){
        $experience = Experience::get();
        $products = Product::get();
        $roles = DB::table('roles')
            ->where('roles.is_active', 1)
            ->where('roles.id', '!=',1)
            ->get();
        $citys = City::get();
        $feacherdUsers = User::where('is_featured','1')->with('city_info')->get();
        //    return $roles;
        $country = Countries::where('is_active',1)->get();
        return view('welcome',compact('roles','country','feacherdUsers','experience','products','citys'));
    }

    public function directoryList($slug)
    {
        $categories = DB::table('roles')->where('is_active', 1)->where('id', '!=', 1)->get();
        $countries = Country::all();
        $languages = Language::all();

        // Get the selected role and the cross-level role
        $role = DB::table('roles')->where('slug', $slug)->first();
        $crossLevelRole = DB::table('roles')->where('slug', 'cross-level')->first();
        $roleInfo = RoleInfo::where('slug', $slug)->first();

        // Prepare role names for the query
        $roleNames = [];
        if ($role) {
            $roleNames[] = $role->name;
        }
        if ($crossLevelRole) {
            $roleNames[] = $crossLevelRole->name;
        }

        // Experience: for the selected role only
        $experience = $role ? Experience::where('category_id', $role->id)->get() : collect();

        // Build the user query for both roles
        $query = User::role($roleNames)->with('video_list', 'city_info')->where('is_active', '1');

        // Apply filters
        if (request('country_id')) {
            $query->where('country_id', request('country_id'));
        }
        if (request('state_id')) {
            $query->where('state_id', request('state_id'));
        }
        if (request('city_id')) {
            $query->where('city_id', request('city_id'));
        }
        if (request('experience')) {
            $query->whereRaw("FIND_IN_SET(?, experience)", [request('experience')]);
        }
        if (request('name')) {
            $query->where('name', 'LIKE', '%' . request('name') . '%');
        }

        $users = $query->get();

        // Featured users for both roles
        $feacherdUsers = User::role($roleNames)->where('is_featured', '1')->get();

        // Get company's shortlisted trainers if logged in
        $shortlistedTrainerIds = collect();
        if (Auth::guard('company')->check()) {
            $company = Auth::guard('company')->user();
            $shortlistedTrainerIds = $company->trainers()->pluck('trainer_id');
        }

        return view('front.directory_list', compact(
            'role', 'slug', 'users', 'feacherdUsers',
            'countries', 'categories', 'experience', 'languages', 'shortlistedTrainerIds'
        ));
    }

    function directoryList12($slug){
        $categories = DB::table('roles')
            ->where('roles.is_active', 1)
            ->where('roles.id', '!=',1)
            ->get();
        $experience = Experience::get();
        $countries = Country::all();
        $languages = Language::get();
        $roleInfo = RoleInfo::where('slug',$slug)->first();
        $role = DB::table('roles')->where('slug',$slug)->first();
        $users = User::role($role->name)->with('video_list','city_info')->where('is_featured','0')->get();
        $feacherdUsers = User::role($role->name)->where('is_featured','1')->get();
        // return $role;
        return view('front.directory_list',compact('role','slug','users','feacherdUsers','countries','categories','experience','languages'));
    }

    function directoryDetails($slug){
          $feacherdUsers = User::where('is_featured','1')->get();
            $user = User::where('slug',$slug)->first();
            $certificates = UserImage::where('user_id',$user->id)->get();
            $videoGallery = VideoGallery::where('user_id',$user->id)->get();
            $documents = ManageDocument::where('user_id',$user->id)->get();
            
            // Check if trainer is already in company's list
            $isInList = false;
            if (Auth::guard('company')->check()) {
                $company = Auth::guard('company')->user();
                $isInList = $company->trainers()->where('trainer_id', $user->id)->exists();
            }
            
            // return $certificates;
        return view('front.directory_details',compact('user','feacherdUsers','videoGallery','certificates','documents','isInList'));
    }
    function directoryDirectory(){
        return "comming soon...";
    }


    function about(){
        $cms = Cms::find(2);
        // return $cms;
        return view('front.cms',compact('cms'));
    }
    

    function terms(){
        $cms = Cms::find(3);
        return view('front.cms',compact('cms'));
    }

       function refund(){
        $cms = Cms::find(6);
        return view('front.cms',compact('cms'));
    }

    function team(){
        $teams = Team::get();
        return view('front.team',compact('teams'));
    }

    function privacy(){
        $cms = Cms::find(4);
         return view('front.cms',compact('cms'));
    }

    function registration(){
        $cms = Cms::find(5);
         return view('front.cms',compact('cms'));
    }

     function feedback(){
        $cms = Cms::find(6);
         return view('front.cms',compact('cms'));
    }

    function pricing(){
        return view('pricing');
    }

    public function add(Request $request)
    {
        $input = $request->all();
        $password="12345678";
        $input['show_password'] = $password;
        $input['password'] = FacadesHash::make($password);
        $user = User::create($input);
        $user->assignRole($request->input('roles'));
        Mail::to($user->email)->send(new UserCreatedMail($user));
        return redirect()->route('users.index')
                        ->with('message','User created successfully and email sent');
    }

    public function register_form(){
        $rolesDate = Role::orderBy('id','DESC')->where('id','!=',1)->get();
        $plans = Plan::orderBy('id')->get();
        return view('register_form',compact('rolesDate','plans'));
    }
    
    public function company_store(request $request){

        $password = '12345678';
        $encPassword = FacadesHash::make($password);
        $slug = Str::slug($request->your_name);
        
        $company = new User();
        $company->company_name = $request->company_name;
        $company->name = $request->your_name;
        $company->email = $request->email;
        $company->designation = $request->designation;
        $company->phone = $request->mobile;
        $company->website = $request->website;
        $company->show_password = $password;
        $company->slug = $slug;
        $company->password = $encPassword;
        $company->website = $request->website;
        $company->save();

        return redirect()->route('front.home')->with('message','Thank you for register.');
    }
    
     public function company_register(){
        return view('company_register');
    }
    public function registrtionStore(Request $request)
    {
        try {
            // Validate the incoming request data
            $validated = $request->validate([
                'name' => 'required|string|max:200|min:2|regex:/^[a-zA-Z ]+$/',
                'phone' => 'required|string|max:13|min:10|unique:users,phone',
                'email' => 'required|email|max:200|min:2|unique:users,email',
                'whatsapp' => 'required|string|max:12|min:10',
                'register_as' => 'required|array', // Validate as array
                'register_as.*' => 'exists:roles,id', // Each must exist
                'plan_type' => 'required|exists:plans,value',
            ]);
              // slug code start here
                $name = $validated['name'];
                $baseSlug = Str::slug($name);
                $slug = $baseSlug;
                $counter = 1;

                // Check for existing slugs
                while (User::where('slug', $slug)->exists()) {
                $slug = $baseSlug . '-' . $counter;
                $counter++;
                }

                // Now assign slug
                $validated['slug'] = $slug;
            //slug code end here

            // Start a database transaction
            DB::beginTransaction();

            // Generate a random password
            // $randomPassword = Str::random(12);
            $randomPassword = '12345678';
            $hashedPassword = Hash::make($randomPassword);

            // Prepare data for storage
            $userData = [
                'name' => $validated['name'],
                'phone' => $validated['phone'],
                'email' => $validated['email'],
                'whatsup' => $validated['whatsapp'], // Map 'whatsapp' to 'whatsup' column
                'plan_type' => $validated['plan_type'],
                'password' => $hashedPassword,
                'show_password' => $randomPassword, // Note: Insecure; consider removing
                'is_active' => true,
                'slug' => $slug,
            ];

            // Store the user in the database
            // Equivalent SQL:
            // INSERT INTO users (name, phone, email, whatsup, password, show_password, is_active, slug, created_at, updated_at)
            // VALUES (:name, :phone, :email, :whatsup, :password, :show_password, 1, :slug, NOW(), NOW())
            $user = User::create($userData);

            // Assign multiple roles
            $roleIds = $validated['register_as'];
            $roleNames = \Spatie\Permission\Models\Role::whereIn('id', $roleIds)->pluck('name')->toArray();
            $user->syncRoles($roleNames);

            // Commit the transaction
            DB::commit();
            return redirect()->route('thankyou');

            // Redirect with success message
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Validation failed; Laravel handles redirect with errors automatically
            throw $e;
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Role not found
            DB::rollBack();
            Log::error('Role not found for ID: ' . $request->register_as, ['exception' => $e]);
            return redirect()->back()->withErrors(['register_as' => 'Invalid role selected.']);
        } catch (QueryException $e) {
            // Database error (e.g., duplicate slug)
            DB::rollBack();
            Log::error('Database error during user registration: ' . $e->getMessage(), ['request' => $request->all()]);
            return redirect()->back()->withErrors(['error' => 'An error occurred while registering. Please try again.']);
        } catch (\Exception $e) {
            // Catch any other unexpected errors
            DB::rollBack();
            Log::error('Unexpected error during user registration: ' . $e->getMessage(), ['request' => $request->all()]);
            return redirect()->back()->withErrors(['error' => 'An unexpected error occurred. Please contact support.']);
        }
    }

}