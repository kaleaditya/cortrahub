<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserImage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Storage;

class UserImageController extends Controller
{

 public function index(Request $request)
    {
        $query = UserImage::query();

        if ($request->has('user_id')) {
            $query->where('user_id', $request->user_id);
        }

        $userImages = $query->latest()->get();

        return view('user-images.index', compact('userImages'));
    }

    public function create(Request $request)
    {
        $selectedUserId = $request->user_id;
        return view('user-images.create', compact('selectedUserId'));
    }

   public function store(Request $request)
    {
        try {
            // Validate the incoming request
            // $validated = $request->validate([
            //     'image' => 'required|image|dimensions:width=400,height=400|max:20', // 20KB max, 400x400 px
            //     'status' => 'sometimes|boolean',
            // ]);

            // Start a database transaction
            DB::beginTransaction();

            // Handle image upload
            $uploaded = '';
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $uploaded = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/all_user_image');
                $image->move($destinationPath, $uploaded);
            }

            // Create the user image record
            // Equivalent SQL:
            // INSERT INTO user_images (user_id, image, status, created_at, updated_at)
            // VALUES (:user_id, :image, :status, NOW(), NOW())
            UserImage::create([
                'user_id' => Auth::id(), // Use authenticated user's ID
                'image' => $uploaded, // Use the uploaded filename
                'status' => $request->has('status') ? $request->status : true,
            ]);

            // Commit the transaction
            DB::commit();

            // Redirect to the index with user_id filter
            return redirect()->route('user-images.index', ['user_id' => Auth::id()])
                ->with('success', 'Image added successfully.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Validation failed; Laravel handles redirect with errors
            throw $e;
        } catch (\Exception $e) {
            // Roll back transaction on error
            DB::rollBack();
            Log::error('Failed to store user image: ' . $e->getMessage(), ['request' => $request->all()]);
            return redirect()->back()->withErrors(['error' => 'An error occurred while uploading the image.']);
        }
    }

    public function edit(UserImage $userImage)
    {
        return view('user-images.edit', compact('userImage'));
    }

    public function update(Request $request, UserImage $userImage)
    {

        // Validate the incoming request
            $validated = $request->validate([
                'image' => 'nullable|image|dimensions:width=400,height=400|max:20', // 20KB max, 400x400 px


                'status' => 'sometimes|boolean',
            ]);
            // Handle image upload
            if ($request->hasFile('image')) {
                // Store new image
                $image = $request->file('image');
                $uploaded = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/all_user_image');
                $image->move($destinationPath, $uploaded);
                $userImage->image = $uploaded;
            }
            // Update status
            $userImage->status = $request->has('status') ? $request->status : $userImage->status;
            $userImage->save();
            // Redirect to the index with user_id filter
            return redirect()->route('user-images.index', ['user_id' => $userImage->user_id])
                ->with('success', 'Image updated successfully.');

    }

    public function destroy(UserImage $userImage)
    {
        if ($userImage->image && \Storage::disk('public')->exists($userImage->image)) {
            \Storage::disk('public')->delete($userImage->image);
        }

        $userImage->delete();

        return redirect()->back()->with('success', 'Image deleted successfully.');
    }
}
