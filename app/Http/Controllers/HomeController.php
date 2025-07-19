<?php

namespace App\Http\Controllers;

use App\Models\ManageOrder;
use App\Models\UserImage;
use App\Models\VideoGallery;
use Illuminate\Http\Request;
use App\Models\Wishlist;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function wishlistStore($id){

        $exists = Wishlist::where('user_id', Auth::id())
                      ->where('member_id', $id)
                      ->exists();

        if ($exists) {
            return redirect()->back()->with('message', 'This item is already in your wishlist.');
        }

        Wishlist::create([
            'user_id' => Auth::id(),
            'member_id' => $id,
        ]);
        return redirect()->back()->with('message', 'Added to wishlist!');
    }

    public function wishlistDestroy($id)
    {
        $wishlist = Wishlist::findOrFail($id);
        $wishlist->delete();
        return redirect()->back()->with('message', 'Removed from wishlist.');
    }

    public function wishlistList(){
        $data = Wishlist::where('user_id',Auth::id())->with('member')->get();
        // return $data;
        return view('wishlistList.index',compact('data'));
    }





    public function index()
    {

        $user = Auth::user();

        if ($user->is_active == 0) {
            Auth::logout();

            return redirect()->route('login')->withErrors([
                'email' => 'Your account is not active. Please contact the administrator.',

            ]);
        }

        if(Auth::id() == 2 ){
            return view('dashboard');
        }else{

            $imagescount = UserImage::where('user_id',Auth::id())->count();
            $videoscount = VideoGallery::where('user_id',Auth::id())->count();

            return view('userdashboard',compact('imagescount','videoscount'));
        }



    }
}
