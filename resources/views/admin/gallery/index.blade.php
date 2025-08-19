@extends('layouts.app')
@vite('resources/css/app.css')

@section('title', 'Gallery List')

@section('content')
<div class="p-6 bg-gray-50 min-h-screen">
    <div class="max-w-6xl mx-auto bg-white shadow-lg rounded-lg p-6">
        <h2 class="text-3xl font-bold mb-6 text-gray-800">Gallery</h2>

        <a href="{{ route('gallery.create') }}" 
           class="px-4 py-2 mb-4 inline-block bg-blue-600 text-white rounded-lg">
           Add Gallery
        </a>
        <table class="min-w-full border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border px-3 py-2">#</th>
                    <th class="border px-3 py-2">Image</th>
                    <th class="border px-3 py-2">Title (EN)</th>
                    <th class="border px-3 py-2">Title (TA)</th>
                    <th class="border px-3 py-2">Description (EN)</th>
                    <th class="border px-3 py-2">Description (Tamil)</th>
                    <th class="border px-3 py-2">Date</th>
                    <th class="border px-3 py-2">Status</th>
                    <th class="border px-3 py-2">Action</th> <!-- New column -->
                </tr>
            </thead>
            <tbody>
                @foreach($galleries as $gallery)
                <tr>
                    <td class="border px-3 py-2">{{ $loop->iteration }}</td> 
                    <td class="border px-3 py-2">
                        <img src="{{ asset('storage/' . $gallery->image) }}" 
                            alt="Gallery Image" class="w-20 h-20 object-cover rounded">
                    </td>
                    <td class="border px-3 py-2">{{ $gallery->title_en }}</td>
                    <td class="border px-3 py-2">{{ $gallery->title_ta }}</td>
                    <td class="border px-3 py-2">
                        {!! Str::limit($gallery->desc_en, 50) !!}
                    </td>

                    <td class="border px-3 py-2">
                        {!! Str::limit($gallery->desc_ta, 50) !!}
                    </td>


                    <td class="border px-3 py-2">{{ $gallery->date }}</td>
                    <td class="border px-3 py-2">
                        <span class="{{ $gallery->is_public ? 'bg-green-100 text-green-700 px-2 py-1 rounded' : 'bg-red-100 text-red-700 px-2 py-1 rounded' }}">
                            {{ $gallery->is_public ? 'Public' : 'Private' }}
                        </span>
                    </td>
                    <td class="border px-3 py-2">
                        <a href="{{ route('gallery.edit', $gallery->id) }}" 
                        class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700">
                        Edit
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
