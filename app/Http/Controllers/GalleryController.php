<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galleries = Gallery::latest()->get();
        return view('admin.gallery.index', compact('galleries'));
    }

    public function create()
    {
        return view('admin.gallery.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title_en' => 'required|string|max:255',
            'title_ta' => 'nullable|string|max:255',
            'desc_en'  => 'nullable|string',
            'desc_ta'  => 'nullable|string',
            'image'    => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'date'     => 'required|date',
        ]);

        $imagePath = $request->file('image')->store('galleries', 'public');

        Gallery::create([
            'title_en' => $request->title_en,
            'title_ta' => $request->title_ta,
            'desc_en'  => $request->desc_en,
            'desc_ta'  => $request->desc_ta,
            'image'    => $imagePath,
            'date'     => $request->date,
            'is_public'=> $request->has('is_public'),
        ]);

        return redirect()->route('gallery.index')->with('success', 'Gallery item created successfully.');
    }

    public function edit(Gallery $gallery)
    {
        return view('admin.gallery.edit', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'title_en' => 'required|string|max:255',
            'title_ta' => 'nullable|string|max:255',
            'desc_en'  => 'nullable|string',
            'desc_ta'  => 'nullable|string',
            'image'    => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'date'     => 'required|date',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('galleries', 'public');
            $gallery->image = $imagePath;
        }

        $gallery->title_en  = $request->title_en;
        $gallery->title_ta  = $request->title_ta;
        $gallery->desc_en   = $request->desc_en;
        $gallery->desc_ta   = $request->desc_ta;
        $gallery->date      = $request->date;
        $gallery->is_public = $request->has('is_public');
        $gallery->save();

        return redirect()->route('gallery.index')->with('success', 'Gallery item updated successfully.');
    }

}
