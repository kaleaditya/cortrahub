<?php

namespace App\Http\Controllers;

use App\Models\VideoGallery;
use Illuminate\Http\Request;

class VideoGalleryController extends Controller
{




   public function index(Request $request)
    {
        $query = VideoGallery::query();

        if ($request->has('user_id')) {
            $query->where('user_id', $request->user_id);
        }

        $videos = $query->latest()->get();

        return view('video-galleries.index', compact('videos'));
    }

    public function create(Request $request)
    {
       $selectedUserId = $request->user_id; // This will be 15 or whichever user

    return view('video-galleries.create', compact('selectedUserId'));
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'link' => 'required|url',
        //     'user_id' => 'required|exists:users,id'
        // ]);


         $uploaded = '';
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $uploaded = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/all_user_image');
                $image->move($destinationPath, $uploaded);
            }

        VideoGallery::create([
            'link' => $uploaded,
            'user_id' => $request->user_id,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('video-galleries.index', ['user_id' => $request->user_id])
            ->with('success', 'Video added successfully');
    }

    public function edit(VideoGallery $videoGallery)
    {
        return view('video-galleries.edit', compact('videoGallery'));
    }

    public function update(Request $request, VideoGallery $videoGallery)
    {
        $request->validate([
            'link' => 'required|url',
        ]);

        $videoGallery->update([
            'link' => $request->link,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('video-galleries.index', ['user_id' => $videoGallery->user_id])
            ->with('success', 'Video updated successfully');
    }

    public function destroy(VideoGallery $videoGallery)
    {
        $videoGallery->delete();
        return redirect()->back()->with('success', 'Video deleted successfully');
    }
}
