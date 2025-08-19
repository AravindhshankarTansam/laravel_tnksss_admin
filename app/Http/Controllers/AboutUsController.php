<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AboutUs;

class AboutUsController extends Controller
{
    // Admin: list all
    public function index()
    {
        $about = AboutUs::all();
        return view('admin.aboutus.index', compact('about'));
    }

    // Show create form
    public function create()
    {
        return view('admin.aboutus.create');
    }

    // Store
    public function store(Request $request)
    {
        $request->validate([
            'menu_title_en' => 'required|string|max:255',
            'menu_title_ta' => 'nullable|string|max:255',
            'desc_en' => 'nullable|string',
            'desc_ta' => 'nullable|string',
            'is_public' => 'nullable|boolean',
        ]);

        AboutUs::create([
            'menu_title_en' => $request->menu_title_en,
            'menu_title_ta' => $request->menu_title_ta,
            'desc_en' => $request->desc_en,
            'desc_ta' => $request->desc_ta,
            'is_public' => $request->has('is_public') ? 1 : 0,
        ]);

        return redirect()->route('aboutus.index')->with('success', 'About Us added successfully!');
    }

    // Edit form
    public function edit(AboutUs $about)
    {
        return view('admin.aboutus.edit', compact('about'));
    }

    // Update
    public function update(Request $request, AboutUs $about)
    {
        $request->validate([
            'menu_title_en' => 'required|string|max:255',
            'menu_title_ta' => 'nullable|string|max:255',
            'desc_en' => 'nullable|string',
            'desc_ta' => 'nullable|string',
            'is_public' => 'nullable|boolean',
        ]);

        $about->update([
            'menu_title_en' => $request->menu_title_en,
            'menu_title_ta' => $request->menu_title_ta,
            'desc_en' => $request->desc_en,
            'desc_ta' => $request->desc_ta,
            'is_public' => $request->has('is_public') ? 1 : 0,
        ]);

        return redirect()->route('aboutus.index')->with('success', 'About Us updated successfully!');
    }

    public function destroy(AboutUs $aboutus)
    {
        $aboutus->delete();
        return redirect()->route('admin.aboutus.index')->with('success', 'About Us deleted successfully!');
    }

    // Public JSON API
    public function public()
    {
        $about = AboutUs::where('is_public', 1)->get();

        return response()->json([
            'success' => true,
            'data' => $about
        ], 200, [
            'Access-Control-Allow-Origin' => '*',
            'Access-Control-Allow-Methods' => 'GET, POST, PUT, DELETE, OPTIONS',
            'Access-Control-Allow-Headers' => 'Content-Type, Authorization',
        ]);
    }
}
