<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource (admin).
     */
    public function index()
    {
        $galleries = Gallery::latest()->get();
        return view('admin.gallery.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     */
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

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gallery $gallery)
    {
        return view('admin.gallery.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     */
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

    /**
     * Public API to get galleries with full image URLs.
     */
    public function public()
    {
        $galleries = Gallery::where('is_public', 1)->latest()->get()->map(function($gallery) {
            return [
                'id' => $gallery->id,
                'title_en' => $gallery->title_en,
                'title_ta' => $gallery->title_ta,
                'desc_en' => $gallery->desc_en,
                'desc_ta' => $gallery->desc_ta,
                'date' => $gallery->date,
                'image' => asset('storage/' . $gallery->image), // Full URL
                'is_public' => $gallery->is_public,
            ];
        });

        return response()->json([
            'success' => true,
            'data' => $galleries
        ], 200, [
            'Access-Control-Allow-Origin' => '*',
            'Access-Control-Allow-Methods' => 'GET, POST, PUT, DELETE, OPTIONS',
            'Access-Control-Allow-Headers' => 'Content-Type, Authorization',
        ]);
    }
}
