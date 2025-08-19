@extends('layouts.app')

@section('title', 'Edit About Us')

@section('content')
<div class="p-6 bg-gray-50 min-h-screen">
    <div class="max-w-3xl mx-auto bg-white shadow-lg rounded-lg p-6">
        <h2 class="text-3xl font-bold mb-6 text-gray-800">Edit About Us</h2>

        @if ($errors->any())
            <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
                <ul class="list-disc pl-6">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.aboutus.update', $about->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-gray-700">Menu Title (English)</label>
                <input type="text" name="menu_title_en" class="w-full border rounded-lg p-2" 
                       value="{{ $about->menu_title_en }}" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Menu Title (Tamil)</label>
                <input type="text" name="menu_title_ta" class="w-full border rounded-lg p-2" 
                       value="{{ $about->menu_title_ta }}">
            </div>
            <!-- Description EN -->
            <div>
                <label class="block font-medium text-gray-700">Description (English)</label>
                <textarea id="desc_en" name="desc_en" class="w-full border rounded px-3 py-2">{{ $about->desc_en }}</textarea>
            </div>

            <!-- Description TA -->
            <div>
                <label class="block font-medium text-gray-700">Description (Tamil)</label>
                <textarea id="desc_ta" name="desc_ta" class="w-full border rounded px-3 py-2">{{ $about->desc_ta }}</textarea>
            </div>

            <div class="mb-4 flex items-center">
                <label class="mr-2 text-gray-700">Public</label>
                <label class="inline-flex items-center cursor-pointer">
                    <input type="checkbox" name="is_public" value="1" class="sr-only peer" 
                           {{ $about->is_public ? 'checked' : '' }}>
                    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer 
                        peer-checked:bg-blue-600 relative 
                        after:content-[''] after:absolute after:top-[2px] after:left-[2px] 
                        after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 
                        after:transition-all peer-checked:after:translate-x-full peer-checked:after:border-white">
                    </div>
                </label>
            </div>

            <div class="flex justify-end">
                <button type="submit" 
                        class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700">
                        Update
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
