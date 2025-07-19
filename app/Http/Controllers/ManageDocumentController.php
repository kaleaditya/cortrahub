<?php


// app/Http/Controllers/ManageDocumentController.php

namespace App\Http\Controllers;

use App\Models\ManageDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ManageDocumentController extends Controller
{
    public function index(Request $request)
    {
        $userId = $request->query('user_id');
        $documents = ManageDocument::when($userId, fn($q) => $q->where('user_id', $userId))->latest()->get();

        return view('manage-documents.index', compact('documents', 'userId'));
    }

    public function create(Request $request)
    {
        $userId = $request->query('user_id');
        return view('manage-documents.create', compact('userId'));
    }

    public function store(Request $request)
{
    // $request->validate([
    //     'user_id' => 'required|exists:users,id',
    //     'document' => 'required|file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,txt',
    //     // 'status' => 'sometimes|boolean',
    // ]);

    $uploaded = null;

    if ($request->hasFile('document')) {
        $file = $request->file('document');
        $uploaded = time() . '.' . $file->getClientOriginalExtension();
        $destinationPath = public_path('/all_user_documents');
        $file->move($destinationPath, $uploaded);
    }

    ManageDocument::create([
        'user_id' => $request->user_id,
        'document' => $uploaded, // ✅ Save filename
        'status' => $request->has('status') ? 1 : 0, // ✅ Save boolean value (0 or 1)
    ]);

    return redirect()->route('manage-documents.index', ['user_id' => $request->user_id])
                     ->with('success', 'Document added successfully.');
}


    public function edit(ManageDocument $manageDocument)
    {
        return view('manage-documents.edit', compact('manageDocument'));
    }

   public function update(Request $request, ManageDocument $manageDocument)
{
    $request->validate([
        'document' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,txt',
        // 'status' => 'sometimes|boolean',
    ]);

    // Handle file upload if new document is provided
    if ($request->hasFile('document')) {
        // Delete old file
        $oldPath = public_path('/all_user_documents/' . $manageDocument->document);
        if (file_exists($oldPath)) {
            unlink($oldPath);
        }

        // Upload new file
        $file = $request->file('document');
        $uploaded = time() . '.' . $file->getClientOriginalExtension();
        $destinationPath = public_path('/all_user_documents');
        $file->move($destinationPath, $uploaded);

        $manageDocument->document = $uploaded;
    }

    // Update status
    $manageDocument->status = $request->has('status') ? 1 : 0;

    $manageDocument->save();

    return redirect()->route('manage-documents.index', ['user_id' => $manageDocument->user_id])
                     ->with('success', 'Document updated successfully.');
}


    public function destroy(ManageDocument $manageDocument)
    {
        // Delete file
        if ($manageDocument->document && Storage::disk('public')->exists($manageDocument->document)) {
            Storage::disk('public')->delete($manageDocument->document);
        }

        $manageDocument->delete();

        return redirect()->back()->with('success', 'Document deleted successfully.');
    }
}


?>
