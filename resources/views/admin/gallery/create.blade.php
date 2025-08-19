@extends('layouts.app')
@vite('resources/css/app.css')

@section('title', 'Add Gallery')

@section('content')
<div class="p-6 bg-gray-50 min-h-screen">
    <div class="max-w-3xl mx-auto bg-white shadow-lg rounded-lg p-6">
        <h2 class="text-3xl font-bold mb-6 text-gray-800">Add New Gallery</h2>

        <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label class="block text-gray-700">Title (English)</label>
                <input type="text" name="title_en" class="w-full border rounded-lg p-2" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Title (Tamil)</label>
                <input type="text" name="title_ta" class="w-full border rounded-lg p-2">
            </div>

            <div class="mb-4">
                <label class="block">Description (English)</label>
                <textarea name="desc_en" id="desc_en" class="w-full border rounded p-2"></textarea>
            </div>

            <div class="mb-4">
                <label class="block">Description (Tamil)</label>
                <textarea name="desc_ta" id="desc_ta" class="w-full border rounded p-2"></textarea>
            </div>

            <div class="mb-4">
                <label class="block">Image</label>
                <input type="file" name="image" accept="image/png,image/jpeg" class="w-full border p-2" required>
            </div>

            <div class="mb-4">
                <label class="block">Date</label>
                <input type="date" name="date" class="w-full border rounded p-2" required>
            </div>

            <div class="mb-4 flex items-center">
                <label for="is_public" class="mr-3 text-gray-700">Public</label>
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" name="is_public" id="is_public" value="1" class="sr-only peer" checked>
                    <div class="w-11 h-6 bg-gray-300 rounded-full peer peer-checked:bg-green-500 
                                after:content-[''] after:absolute after:top-[2px] after:left-[2px] 
                                after:bg-white after:border-gray-300 after:border after:rounded-full 
                                after:h-5 after:w-5 after:transition-all 
                                peer-checked:after:translate-x-full peer-checked:after:border-white">
                    </div>
                </label>
            </div>


            <div class="flex justify-end space-x-3">
                <a href="{{ route('gallery.index') }}" class="px-4 py-2 bg-gray-300 rounded-lg">Cancel</a>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg">Save</button>
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
