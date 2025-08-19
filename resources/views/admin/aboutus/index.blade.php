@extends('layouts.app')

@section('title', 'Manage About Us')

@section('content')
<div class="p-6 bg-gray-50 min-h-screen">
    <div class="max-w-6xl mx-auto bg-white shadow-lg rounded-lg p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold text-gray-800">About Us List</h2>
            
            <!-- Add About Us Button -->
            <a href="{{ route('admin.aboutus.create') }}" 
               class="px-4 py-2 bg-green-600 text-white rounded-lg shadow hover:bg-green-700">
                + Add About Us
            </a>
        </div>

        <table class="w-full border-collapse border border-gray-300">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border border-gray-300 px-3 py-2">#</th>
                    <th class="border border-gray-300 px-3 py-2">Menu Title (EN)</th>
                    <th class="border border-gray-300 px-3 py-2">Menu Title (TA)</th>
                    <th class="border border-gray-300 px-3 py-2">Description (EN)</th>
                    <th class="border border-gray-300 px-3 py-2">Description (TA)</th>
                    <th class="border border-gray-300 px-3 py-2">Public</th>
                    <th class="border border-gray-300 px-3 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($about as $item)
                <tr>
                    <td class="border border-gray-300 px-3 py-2">{{ $item->id }}</td>
                    <td class="border border-gray-300 px-3 py-2">{{ $item->menu_title_en }}</td>
                    <td class="border border-gray-300 px-3 py-2">{{ $item->menu_title_ta }}</td>
                    <td class="border border-gray-300 px-3 py-2">{!! $item->desc_en !!}</td>
                    <td class="border border-gray-300 px-3 py-2">{!! $item->desc_ta !!}</td>

                    <td class="border border-gray-300 px-3 py-2 
                        {{ $item->is_public ? 'bg-green-100 text-green-700 font-semibold' : 'bg-red-100 text-red-700 font-semibold' }}">
                        {{ $item->is_public ? 'Yes' : 'No' }}
                    </td>

                    <td class="border border-gray-300 px-3 py-2 flex space-x-2">
                        <a href="{{ route('admin.aboutus.edit', $item->id) }}" 
                           class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">Edit</a>

                        <form action="{{ route('admin.aboutus.destroy', $item->id) }}" 
                              method="POST" 
                              onsubmit="return confirm('Are you sure you want to delete this?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
