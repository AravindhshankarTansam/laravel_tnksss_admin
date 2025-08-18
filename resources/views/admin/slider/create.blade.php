@extends('layouts.app')
@vite('resources/css/app.css')

@section('title', 'Add Slider')

@section('content')
<div class="p-6 bg-gray-50 min-h-screen">
    <div class="max-w-3xl mx-auto bg-white shadow-lg rounded-lg p-6">
        <h2 class="text-3xl font-bold mb-6 text-gray-800">Add New Slider</h2>

        <!-- Validation Errors -->
        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form -->
        <form action="{{ route('admin.slider.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <!-- Title EN -->
            <div>
                <label class="block font-medium text-gray-700">Title (English)</label>
                <input type="text" name="title_en" class="w-full border rounded px-3 py-2" required>
            </div>

            <!-- Title TA -->
            <div>
                <label class="block font-medium text-gray-700">Title (Tamil)</label>
                <input type="text" name="title_ta" class="w-full border rounded px-3 py-2">
            </div>

            <!-- Images -->
            <div>
                <label class="block font-medium text-gray-700">Images</label>
                <input 
                    type="file" 
                    name="images[]" 
                    multiple 
                    accept=".jpg,.jpeg,.png" 
                    class="w-full border rounded px-3 py-2" 
                    required
                >
            </div>

            <!-- Description EN -->
            <div>
                <label class="block font-medium text-gray-700">Description (English)</label>
                <textarea id="desc_en" name="desc_en" class="w-full border rounded px-3 py-2"></textarea>
            </div>

            <!-- Description TA -->
            <div>
                <label class="block font-medium text-gray-700">Description (Tamil)</label>
                <textarea id="desc_ta" name="desc_ta" class="w-full border rounded px-3 py-2"></textarea>
            </div>

<div class="flex items-center space-x-3">
    <label class="relative inline-flex items-center cursor-pointer">
        <input 
            type="checkbox" 
            name="is_public" 
            value="1" 
            class="sr-only peer"
            {{ isset($slider) && $slider->is_public ? 'checked' : '' }}
        >
        <div class="group peer ring-0 bg-gradient-to-tr from-rose-100 via-rose-400 to-rose-500 
                    rounded-full outline-none duration-300 w-16 h-8 shadow-md
                    after:duration-300 after:content-['✖️'] after:rounded-full after:absolute 
                    after:bg-gray-50 after:h-6 after:w-6 after:top-1 after:left-1 
                    after:-rotate-180 after:flex after:justify-center after:items-center 
                    peer-checked:translate-x-0 peer-checked:bg-emerald-500 
                    peer-checked:after:translate-x-8 peer-checked:after:content-['✔️'] 
                    peer-hover:after:scale-95 peer-checked:after:rotate-0 
                    peer-checked:bg-gradient-to-tr peer-checked:from-green-100 
                    peer-checked:via-lime-400 peer-checked:to-lime-500">
        </div>
    </label>
</div>

            <!-- Buttons -->
            <div class="flex justify-between mt-4">
                <a href="{{ route('slider.index') }}" class="px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400">
                    Cancel
                </a>

                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition-colors">
                    Save Slider
                </button>
            </div>
        </form>
    </div>
</div>

<!-- CKEditor CDN -->
<script src="https://cdn.ckeditor.com/ckeditor5/38.1.0/classic/ckeditor.js"></script>
<script>
ClassicEditor.create(document.querySelector('#desc_en')).catch(error => console.error(error));
ClassicEditor.create(document.querySelector('#desc_ta')).catch(error => console.error(error));
</script>
@endsection
