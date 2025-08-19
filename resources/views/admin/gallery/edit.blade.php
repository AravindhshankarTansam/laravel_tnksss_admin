@extends('layouts.app')
@vite('resources/css/app.css')

@section('title', 'Edit Gallery')

@section('content')
<div class="p-6 bg-gray-50 min-h-screen">
    <div class="max-w-3xl mx-auto bg-white shadow-lg rounded-lg p-6">
        <h2 class="text-3xl font-bold mb-6 text-gray-800">Edit Gallery</h2>

        @if ($errors->any())
            <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
                <ul class="list-disc pl-6">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('gallery.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-gray-700">Title (English)</label>
                <input type="text" name="title_en" class="w-full border rounded-lg p-2" 
                       value="{{ old('title_en', $gallery->title_en) }}" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Title (Tamil)</label>
                <input type="text" name="title_ta" class="w-full border rounded-lg p-2" 
                       value="{{ old('title_ta', $gallery->title_ta) }}">
            </div>

            <div class="mb-4">
                <label class="block">Description (English)</label>
                <textarea name="desc_en" id="desc_en" class="w-full border rounded p-2">{{ old('desc_en', $gallery->desc_en) }}</textarea>
            </div>

            <div class="mb-4">
                <label class="block">Description (Tamil)</label>
                <textarea name="desc_ta" id="desc_ta" class="w-full border rounded p-2">{{ old('desc_ta', $gallery->desc_ta) }}</textarea>
            </div>

            <div class="mb-4">
                <label class="block">Current Image</label>
                <img src="{{ asset('storage/' . $gallery->image) }}" alt="Gallery Image" class="w-32 h-32 object-cover rounded mb-2">
                <input type="file" name="image" accept="image/png,image/jpeg" class="w-full border p-2">
            </div>

            <div class="mb-4">
                <label class="block">Date</label>
                <input type="date" name="date" class="w-full border rounded p-2" 
                    value="{{ old('date', $gallery->date->format('Y-m-d')) }}" required>

            </div>

            <div class="mb-4 flex items-center space-x-3">
                <label class="inline-flex relative items-center cursor-pointer">
                    <input type="checkbox" name="is_public" value="1" class="sr-only peer"
                           {{ $gallery->is_public ? 'checked' : '' }}>
                    <div class="w-12 h-6 bg-gray-300 rounded-full peer-checked:bg-green-500 
                                relative after:content-[''] after:absolute after:left-1 after:top-1 
                                after:w-4 after:h-4 after:bg-white after:rounded-full after:transition-all 
                                peer-checked:after:translate-x-6">
                    </div>
                </label>
                <span class="font-medium text-gray-700">
                    {{ $gallery->is_public ? 'Active' : 'Inactive' }}
                </span>
            </div>

            <div class="flex justify-end space-x-3">
                <a href="{{ route('gallery.index') }}" class="px-4 py-2 bg-gray-300 rounded-lg">Cancel</a>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg">Update</button>
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
