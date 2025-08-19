<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\GalleryController;


// Redirect root URL to login page
Route::get('/', function () {
    return redirect()->route('login');
});

// Admin-only routes
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // ADMIN Slider routes
    Route::get('/slider', [SliderController::class, 'index'])->name('slider.index');      
    Route::get('/slider/create', [SliderController::class, 'create'])->name('admin.slider.create'); 
    Route::post('/slider/store', [SliderController::class, 'store'])->name('admin.slider.store');   
    Route::get('/slider/{slider}/edit', [SliderController::class, 'edit'])->name('admin.slider.edit'); // <-- Add this
    Route::put('/slider/{slider}', [SliderController::class, 'update'])->name('admin.slider.update');
    // ADMIN About US
    Route::get('/about', [AboutUsController::class, 'index'])->name('aboutus.index');
    Route::get('/about/create', [AboutUsController::class, 'create'])->name('admin.aboutus.create');
    Route::post('/about/store', [AboutUsController::class, 'store'])->name('admin.aboutus.store');
    Route::get('/about/{about}/edit', [AboutUsController::class, 'edit'])->name('admin.aboutus.edit');
    Route::put('/about/{about}', [AboutUsController::class, 'update'])->name('admin.aboutus.update');
    Route::delete('/about/{about}', [AboutUsController::class, 'destroy'])->name('admin.aboutus.destroy');
    // ADMIN Gallery
    Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
    Route::get('/gallery/create', [GalleryController::class, 'create'])->name('gallery.create');
    Route::post('/gallery/store', [GalleryController::class, 'store'])->name('gallery.store');
    Route::get('/gallery/{gallery}/edit', [GalleryController::class, 'edit'])->name('gallery.edit');
    Route::put('/gallery/{gallery}', [GalleryController::class, 'update'])->name('gallery.update');




});

// Public 
// sliders
Route::get('/public/sliders', [SliderController::class, 'public'])->name('sliders.public');
Route::get('/public/about', [AboutUsController::class, 'public'])->name('about.public');

require __DIR__.'/auth.php';
