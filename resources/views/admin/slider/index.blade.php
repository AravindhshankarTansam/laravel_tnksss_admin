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
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 border-b">{{ $index + 1 }}</td>
<td class="px-4 py-2 border-b">
    <span class="title-en" data-value="{!! $slider->title_en !!}"></span>
</td>
<td class="px-4 py-2 border-b">
    <span class="title-ta" data-value="{!! $slider->title_ta !!}"></span>
</td>

                        <td class="px-4 py-2 border-b">
                            @if($slider->images)
                                @foreach($slider->images as $image)
                                    <img src="{{ $image }}" class="w-16 h-16 rounded object-cover mr-1 mb-1 inline-block">
                                @endforeach
                            @endif
                        </td>
<td class="px-4 py-2 border-b">
    <span class="desc-en" data-value="{!! $slider->desc_en !!}"></span>
</td>
<td class="px-4 py-2 border-b">
    <span class="desc-ta" data-value="{!! $slider->desc_ta !!}"></span>
</td>
<td class="px-4 py-2 border-b flex items-center space-x-2">
    <!-- Toggle for is_public -->
<!-- Toggle for is_public (readonly) -->
<label class="inline-flex items-center cursor-default">
    <input type="checkbox" class="sr-only peer" {{ $slider->is_public ? 'checked' : '' }} disabled>

    <div class="w-16 h-8 bg-gray-300 rounded-full relative transition-colors duration-300 peer-checked:bg-green-500">
        <div class="absolute top-1 left-1 w-6 h-6 bg-white rounded-full shadow-md transition-transform duration-300
                    peer-checked:translate-x-8 flex items-center justify-center text-xs">
            ✖️
        </div>
    </div>

    <span class="ml-3 text-sm font-medium select-none">
        <span class="inline peer-checked:hidden">Inactive</span>
        <span class="hidden peer-checked:inline">Active</span>
    </span>
</label>


    <!-- Edit button -->
    <a href="{{ route('admin.slider.edit', $slider->id) }}" 
       class="text-blue-600 hover:text-blue-800" 
       title="Edit Slider">
        <!-- Heroicon: Pencil -->
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-5.586-4.414l5-5a2.828 2.828 0 114 4l-5 5L13 7l-1.586-1.586z"/>
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
<!-- Script -->
 <script>
document.querySelectorAll('.title-en, .title-ta, .desc-en, .desc-ta').forEach(el => {
    el.innerHTML = el.dataset.value;
});

</script>

@endsection
