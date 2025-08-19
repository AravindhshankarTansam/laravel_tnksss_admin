@extends('layouts.app')

@section('title', 'Slider List')

@section('content')
<div class="p-6 bg-gray-50 min-h-screen">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Sliders</h2>
<a href="{{ route('admin.slider.create') }}" class="px-5 py-2 bg-blue-600 text-white rounded-lg">
    Add New Slider
</a>

    </div>

    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white shadow rounded-lg border border-gray-200">
            <thead>
                <tr class="bg-blue-100 text-left">
                    <th class="px-4 py-2 border-b">#</th>
                    <th class="px-4 py-2 border-b">Title (EN)</th>
                    <th class="px-4 py-2 border-b">Title (TA)</th>
                    <th class="px-4 py-2 border-b">Images</th>
                    <th class="px-4 py-2 border-b">Description (EN)</th>
                    <th class="px-4 py-2 border-b">Description (TA)</th>
                    <th class="px-4 py-2 border-b">Actions</th>
                </tr>
            </thead>
<tbody>
@forelse($sliders as $index => $slider)
<tr class="hover:bg-gray-50 text-sm">
    <!-- Index -->
    <td class="px-4 py-2 border-b text-center">{{ $index + 1 }}</td>

    <!-- Title EN -->
    <td class="px-4 py-2 border-b break-words max-w-xs">
        {{ $slider->title_en }}
    </td>

    <!-- Title TA -->
    <td class="px-4 py-2 border-b break-words max-w-xs">
        {{ $slider->title_ta }}
    </td>

    <!-- Images -->
    <td class="px-4 py-2 border-b flex flex-wrap">
        @if($slider->images)
            @foreach($slider->images as $image)
                <img src="{{ $image }}" class="w-16 h-16 rounded object-cover mr-2 mb-2">
            @endforeach
        @endif
    </td>

<!-- Description EN -->
<td class="px-4 py-2 border-b break-words max-w-xs">
    {!! $slider->desc_en !!}
</td>

<!-- Description TA -->
<td class="px-4 py-2 border-b break-words max-w-xs">
    {!! $slider->desc_ta !!}
</td>


    <!-- Actions -->
    <td class="px-4 py-2 border-b flex items-center space-x-4">
        <!-- Toggle for is_public (readonly) -->
        <label class="inline-flex items-center cursor-default">
            <div class="w-14 h-5 rounded-full relative transition-colors duration-300 {{ $slider->is_public ? 'bg-green-500' : 'bg-gray-300' }}">
                <div class="absolute top-1 left-1 w-3 h-3 bg-white rounded-full shadow-md transition-transform duration-300 {{ $slider->is_public ? 'translate-x-8' : '' }}"></div>
            </div>
            <span class="ml-3 text-sm font-medium select-none">
                {{ $slider->is_public ? 'Active' : 'Inactive' }}
            </span>
        </label>

        <!-- Edit button -->
        <a href="{{ route('admin.slider.edit', $slider->id) }}" 
            class="text-blue-600 hover:text-blue-800" 
            title="Edit Slider">
                <!-- Heroicon: Pencil -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                        d="M15.232 5.232l3.536 3.536M9 13l6-6 3 3-6 6H9v-3z"/>
                </svg>
        </a>
    </td>
</tr>
@empty
<tr>
    <td colspan="7" class="px-4 py-2 text-center text-gray-500">No sliders found.</td>
</tr>
@endforelse
</tbody>

        </table>
    </div>
</div>

@endsection
